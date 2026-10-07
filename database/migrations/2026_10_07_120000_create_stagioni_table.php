<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStagioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagioni', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 9)->unique();
            $table->date('dal');
            $table->date('al');
            $table->boolean('corrente')->default(false);
            $table->timestamps();
        });

        // popola la tabella con le stagioni già presenti nei dati
        $date = DB::table('associazione_fornai')
            ->selectRaw('stagione, min(valido_dal) as dal, max(valido_al) as al')
            ->groupBy('stagione')
            ->get()
            ->keyBy('stagione');
        $corrente = env('STAGIONE', '2016-2017');
        $nomi = $date->keys()
            ->merge(DB::table('ordini')->distinct()->pluck('stagione'))
            ->push($corrente)
            ->filter(function ($nome) {
                return preg_match('/^\d{4}-\d{4}$/', $nome);
            })
            ->unique()
            ->sort();

        $adesso = now();
        foreach ($nomi as $nome) {
            [$anno1, $anno2] = explode('-', $nome);
            DB::table('stagioni')->insert([
                'nome' => $nome,
                'dal' => $date[$nome]->dal ?? $anno1.'-09-01',
                'al' => $date[$nome]->al ?? $anno2.'-07-31',
                'corrente' => $nome == $corrente,
                'created_at' => $adesso,
                'updated_at' => $adesso,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stagioni');
    }
}
