<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attore extends Model
{
    protected $table = 'attori';

    // protected $primaryKey = 'id_pratica';
    protected $guarded = [];

    /**
     * Colonne di altre tabelle che fanno riferimento all'attore, come tabella => colonna.
     */
    protected static $riferimenti = [];

    /**
     * Quante righe di altre tabelle fanno riferimento a ciascun attore, per id.
     */
    public static function utilizzi($id = null)
    {
        $conteggi = [];
        foreach (static::$riferimenti as $tabella => $colonna) {
            $righe = \DB::table($tabella)
                ->selectRaw($colonna.' as id, count(*) as n')
                ->when($id, function ($query) use ($colonna, $id) {
                    $query->where($colonna, $id);
                })
                ->groupBy($colonna)
                ->pluck('n', 'id');
            foreach ($righe as $chiave => $n) {
                $conteggi[$chiave] = ($conteggi[$chiave] ?? 0) + $n;
            }
        }

        return $conteggi;
    }

    /**
     * Un attore usato altrove non si può eliminare.
     */
    public function usato()
    {
        return ! empty(static::utilizzi($this->id));
    }

    public function scopeFornai($query)
    {
        return $query
            ->whereTipo('fornaio');
    }

    public function getFullnameAttribute()
    {
        return $this->ragione_sociale.' ('.$this->nome.')';
    }
}
