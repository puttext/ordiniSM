# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Panoramica

"Ordini Spiga e Madia": applicazione Laravel per gestire gli ordini collettivi (soprattutto di pane) che i GAS (Gruppi di Acquisto Solidale) fanno ai fornai. Il linguaggio del dominio, gli identificatori, le viste e i testi dell'interfaccia sono in italiano: il nuovo codice deve restare coerente.

Il progetto è nato su Laravel 5.3 (2016) ed è stato aggiornato a Laravel 10 con Laravel Shift (`.shift/` e i merge commit "shift-build"). Il framework ora è 10.x, ma buona parte dell'impianto dell'app è ancora quello della 5.x. Si usano ancora `bootstrap/autoload.php`, un `phpunit.xml` nel vecchio formato, rotte con i controller indicati come stringhe e risolti tramite `RouteServiceProvider::$namespace`, Laravel Elixir/gulp per gli asset e gli helper per i form di `laravelcollective/html` nelle viste Blade.

## Comandi

```bash
composer install
php artisan serve                 # server di sviluppo
php artisan migrate               # MySQL (vedi .env); 20161213.sql è un vecchio dump di produzione
php artisan db:seed

vendor/bin/phpunit                               # esegue i test
vendor/bin/phpunit --filter test_basic_example   # un singolo test

npm run dev    # gulp watch (Elixir): compila resources/assets/sass/app.scss e js/app.js
npm run prod
```

L'unico test è l'esempio standard `tests/ExampleTest.php`. Al momento fallisce perché usa `visit()`, un metodo di BrowserKit che non esiste più. Non c'è un linter configurato; i commit di Shift hanno applicato lo stile di codice Laravel (Pint).

## Architettura

- **I modelli stanno in `app/Model/`** (namespace `App\Model`), non in `app/Models`. Il modello utente per l'autenticazione è `App\Model\User`.
- **Ereditarietà su un'unica tabella, `attori`:** `Attore` è la classe base. `Fornaio` e `Gas` la estendono e ridefiniscono `newQuery()` per filtrare sulla colonna `tipo`: `Fornaio` tiene `'fornaio'`, `Gas` tiene `'gas'` e `'rivendita'`. `AssociazioneFornai` (`associazione_fornai`) collega fornai e GAS con `valido_dal`/`valido_al`, `stagione` e il `giorno` di consegna. Molte relazioni (`gas_attivi`, `fornai_attivi`, `User::fornai`) restituiscono solo i collegamenti in cui la data di oggi cade nel periodo di validità.
- **Ordini:** `Ordine` (`ordini`) appartiene a un fornitore (`fornitore_id` → Attore) e ha molti `Prodotto`. `OrdineDettaglio` (`ordini_dettagli`) contiene le quantità che ogni GAS ordina per ciascun prodotto. I totali (`importo`, `kg_farina`, `contributo_des`, `contributo_sm`, ...) sono accessor calcolati, non colonne salvate. Gli ordini di pane sono raggruppati tramite `codice_gruppo` nel formato `P-{fornaio_id}-{giorno}-{anno}-{mese}`, che `Ordine::getGiornoAttribute` interpreta.
- **`BaseModel`** (usato da `Ordine`) cambia la gestione delle date. Imposta `d/m/Y` come formato di conversione a stringa di Carbon, interpreta le date in ingresso come `d/m/Y` e in `setAttribute` trasforma i valori vuoti in `null`. Attenzione quando si modificano campi data.
- **Ruoli e permessi** sono scritti a mano, senza policy né gate. `users.ruolo` corrisponde a un `livello` numerico (`User::COORDINATORE`=20, `GESTORE`=30, `ADMIN`=90, altrimenti 10). I controller confrontano direttamente `\Auth::user()->livello`. Un coordinatore è legato a un fornaio tramite `attore_id`; un utente normale è legato a un GAS tramite `gas_id`.
- **Controller:** il `Controller` base applica il middleware `auth` a tutti i controller e mette a disposizione `$this->dati`, un array passato alle viste con `->with($this->dati)`. I controller principali sono `OrdiniController` (resource più `compila`, il modulo per compilare gli ordini) e `PaneController` (modifica del calendario mensile delle consegne di pane su `ordini/pane/{anno}/{mese}`, con invio facoltativo di un'email ai referenti dei GAS).
- **Configurazione:** `config/parametri.php` contiene la stagione corrente (variabile d'ambiente `STAGIONE`, ad es. `2016-2017`) e i nomi italiani di mesi e giorni. Le traduzioni sono in `lang/it`.
