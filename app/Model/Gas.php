<?php

namespace App\Model;

class Gas extends Attore
{
    protected $attributes = [
        'tipo' => 'gas',
    ];

    protected static $riferimenti = [
        'associazione_fornai' => 'gas_id',
        'ordini_dettagli' => 'gas_id',
        'versamenti' => 'gas_id',
        'users' => 'gas_id',
    ];

    public function fornai()
    {
        return $this->belongsToMany(\App\Model\Fornaio::class, 'associazione_fornai', 'gas_id', 'fornaio_id')
            ->withPivot('giorno', 'stagione', 'valido_dal', 'valido_al');
    }

    public function fornai_attivi()
    {
        $oggi = \Carbon\Carbon::today();

        return $this->fornai_attivi_al($oggi);
    }

    public function fornai_attivi_al($data)
    {
        return $this->fornai()
            ->where('valido_dal', '<=', $data)
            ->where('valido_al', '>=', $data);
    }

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted = true)
            ->whereIn('tipo', ['gas', 'rivendita']);
    }

    public function getFullNameAttribute()
    {
        return $this->nome.' ('.$this->comune.')';
    }

    /**
     * Dati riassuntivi mostrati nella scheda del GAS, come etichetta => testo.
     */
    public function statistiche()
    {
        $stagione = config('parametri.stagione');
        $ordini = \DB::table('ordini')
            ->join('prodotti', 'prodotti.ordine_id', '=', 'ordini.id')
            ->join('ordini_dettagli', 'ordini_dettagli.prodotto_id', '=', 'prodotti.id')
            ->where('ordini_dettagli.gas_id', $this->id)
            ->where('ordini_dettagli.quantita', '>', 0);
        $versato = \DB::table('versamenti')->where('gas_id', $this->id)->where('stagione', $stagione)->sum('importo');

        return [
            'Referenti' => $this->referenti()->orderBy('name')->pluck('name')->map('trim')->implode(', ') ?: 'nessuno',
            'Ordini' => static::riassuntoOrdini($ordini),
            'Versamenti '.$stagione => '€ '.number_format($versato, 2, ',', '.'),
            'In anagrafica dal' => $this->created_at ? $this->created_at->format('d/m/Y') : '?',
        ];
    }

    public function referenti()
    {
        return $this->HasMany(\App\Model\User::class, 'gas_id', 'id');
    }
}
