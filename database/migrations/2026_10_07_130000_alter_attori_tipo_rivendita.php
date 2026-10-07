<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AlterAttoriTipoRivendita extends Migration
{
    /**
     * Aggiunge 'rivendita' ai tipi di attore: il modello Gas lo usa già, ma la
     * migrazione originale non lo prevedeva (in alcuni database era stato aggiunto a mano).
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE attori MODIFY tipo ENUM('gas', 'fornaio', 'mugnaio', 'contadino', 'rivendita') NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
