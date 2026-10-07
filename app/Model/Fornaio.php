<?php

namespace App\Model;

class Fornaio extends Attore
{
    protected $attributes = [
        'tipo' => 'fornaio',
    ];

    protected static $riferimenti = [
        'associazione_fornai' => 'fornaio_id',
        'ordini' => 'fornitore_id',
        'prodotti' => 'fornitore_id',
        'users' => 'attore_id',
    ];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted = true)
            ->where('tipo', '=', 'fornaio');
    }

    public function giorni_gas()
    {
        return $this->hasMany(\App\Model\AssociazioneFornai::class, 'fornaio_id');
    }

    /**
     * Dati riassuntivi mostrati nella scheda del fornaio, come etichetta => testo.
     */
    public function statistiche()
    {
        return [
            'Referenti' => \App\Model\User::where('attore_id', $this->id)->orderBy('name')->pluck('name')->map('trim')->implode(', ') ?: 'nessuno',
            'Prodotti a listino' => $this->pane()->pluck('descrizione')->implode(', ') ?: 'nessuno',
            'Ordini' => static::riassuntoOrdini(\DB::table('ordini')->where('fornitore_id', $this->id)),
            'In anagrafica dal' => $this->created_at ? $this->created_at->format('d/m/Y') : '?',
        ];
    }

    public function gas()
    {
        return $this->belongsToMany(\App\Model\Gas::class, 'associazione_fornai', 'fornaio_id', 'gas_id')
            ->withPivot('giorno', 'stagione', 'valido_dal', 'valido_al');
    }

    public function gas_attivi()
    {
        $oggi = new \Carbon\Carbon;

        return $this->gas_attivi_al($oggi);
    }

    public function gas_attivi_al($data)
    {
        return $this->gas()
            ->whereStagione(\Config::get('parametri.stagione'))
            ->where('valido_dal', '<=', $data)
            ->where('valido_al', '>=', $data);
    }

    public function pane()
    {
        return $this->hasMany(\App\Model\Prodotto::class, 'fornitore_id')
            ->whereOrdineId(0);
    }
}
