<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrdineDettaglio extends Model
{
    protected $table = 'ordini_dettagli';

    // protected $primaryKey = 'id_pratica';
    protected $guarded = [];

    public function prodotto()
    {
        return $this->BelongsTo(\App\Model\Prodotto::class, 'prodotto_id');
    }

    public function getImportoAttribute()
    {
        return $this->quantita * $this->prodotto->prezzo_finale;
    }

    public function getKgFarinaAttribute()
    {
        return $this->quantita * $this->prodotto->qta_farina / 1000;
    }

    public function getImportoFornitoreAttribute()
    {
        return $this->quantita * $this->prodotto->prezzo_fornitore;
    }

    public function getContributoDesAttribute()
    {
        return $this->quantita * $this->prodotto->contributo_des;
    }

    public function getContributoSmAttribute()
    {
        return $this->quantita * $this->prodotto->contributo_sm;
    }

    public function getContributiAttribute()
    {
        return $this->contributo_des + $this->contributo_sm;
    }
}
