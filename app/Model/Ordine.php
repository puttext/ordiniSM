<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\Model;

class Ordine extends BaseModel
{
    protected $table = 'ordini';

    // protected $primaryKey = 'id_pratica';
    protected $guarded = [];

    protected $casts = [
        'consegna' => 'datetime',
        'apertura' => 'datetime',
        'chiusura' => 'datetime',
    ];

    public function fornitore()
    {
        return $this->belongsTo(\App\Model\Attore::class, 'fornitore_id');
    }

    public function prodotti()
    {
        return $this->hasMany(\App\Model\Prodotto::class);
    }

    public function prodotti_sort()
    {
        return $this->prodotti()->orderBy('tipo')->orderBy('sottotipo');
    }

    public function fornaio()
    {
        if ($this->tipo = 'pane') {
            return $this->belongsTo(\App\Model\Fornaio::class, 'fornitore_id');
        } else {
            return null;
        }
    }

    public function ordine_gas()
    {
        return $this->HasManyThrough(\App\Model\OrdineDettaglio::class, \App\Model\Prodotto::class, 'ordine_id', 'prodotto_id');
    }

    public function getNumProdottiAttribute()
    {
        return $this->prodotti()->count();
    }

    public function getQuantitaTotaleAttribute()
    {
        /*$totale=0;
        foreach ($this->prodotti as $prodotto){
            $totale+=$prodotto->quantita_totale;
        }
        return $totale;*/
        return $this->ordine_gas->sum('quantita');
    }

    public function getImportoFornitoreAttribute()
    {
        return $this->ordine_gas->sum('importo_fornitore');
    }

    public function getImportoAttribute()
    {
        return $this->ordine_gas->sum('importo');
    }

    public function getKgFarinaAttribute()
    {
        return $this->ordine_gas->sum('kg_farina');
    }

    public function getContributoDesAttribute()
    {
        return $this->ordine_gas->sum('contributo_des');
    }

    public function getContributoSmAttribute()
    {
        return $this->ordine_gas->sum('contributo_sm');
    }

    public function getContributiAttribute()
    {
        return $this->contributo_des + $this->contributo_sm;
    }

    public function getTotaleFornitoreAttribute()
    {
        $totale = 0;
        foreach ($this->prodotti as $prodotto) {
            $totale += $prodotto->importo_fornitore;
        }

        return $totale;
    }

    public function getGiornoAttribute()
    {
        if (substr($this->codice_gruppo, 0, 1) == 'P') {
            $parts = explode('-', $this->codice_gruppo);

            return (int) $parts[2];
        } else {
            return $this->consegna->dayOfWeek;
        }
    }

    public function getGiornoTxtAttribute()
    {
        $date = \Carbon\Carbon::today();
        $date->next($this->giorno);

        return trans('datetime.giorni.'.$date->format('l'));
    }
}
