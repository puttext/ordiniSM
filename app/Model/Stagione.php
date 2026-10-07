<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stagione extends Model
{
    protected $table = 'stagioni';

    protected $guarded = [];

    protected $casts = [
        'dal' => 'date',
        'al' => 'date',
        'corrente' => 'boolean',
    ];

    public static function corrente()
    {
        return self::whereCorrente(true)->first();
    }

    /**
     * Associazioni fornai-GAS della stagione. Si legge la tabella direttamente
     * perché AssociazioneFornai filtra sempre sulla stagione corrente.
     */
    public function associazioni()
    {
        return \DB::table('associazione_fornai')->whereStagione($this->nome);
    }

    public function rendiCorrente()
    {
        \DB::transaction(function () {
            self::where('id', '<>', $this->id)->update(['corrente' => false]);
            $this->corrente = true;
            $this->save();
        });
        config(['parametri.stagione' => $this->nome]);
    }

    /**
     * Nome della stagione successiva, es. 2026-2027 -> 2027-2028
     */
    public function getSuccessivaAttribute()
    {
        [$anno1, $anno2] = explode('-', $this->nome);

        return ($anno1 + 1).'-'.($anno2 + 1);
    }
}
