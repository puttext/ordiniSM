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
     * Dati aggiuntivi mostrati nella scheda del GAS, come etichetta => testo.
     */
    public function dettagli()
    {
        return [
            'Referenti' => $this->referenti()->orderBy('name')->pluck('name')->map('trim')->implode(', ') ?: 'nessuno',
        ];
    }

    public function referenti()
    {
        return $this->HasMany(\App\Model\User::class, 'gas_id', 'id');
    }
}
