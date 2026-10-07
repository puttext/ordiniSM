<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssociazioneFornai extends Model
{
    protected $table = 'associazione_fornai';

    protected $guarded = [];

    public function newQuery($excludeDeleted = true)
    {
        $oggi = new \Carbon\Carbon;

        return parent::newQuery($excludeDeleted = true)
            ->whereStagione(\Config::get('parametri.stagione'));
        // ->where("valido_dal","<=",$oggi)
        // ->where("valido_al",">=",$oggi);
    }

    public function fornaio()
    {
        return $this->belongsTo(\App\Model\Fornaio::class, 'fornaio_id', 'id');
    }

    public function gas()
    {
        return $this->belongsTo(\App\Model\Gas::class, 'gas_id', 'id');
    }
}
