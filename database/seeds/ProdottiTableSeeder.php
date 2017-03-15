<?php

use Illuminate\Database\Seeder;

class ProdottiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('prodotti')->delete();
        
        \DB::table('prodotti')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ordine_id' => 0,
                'fornitore_id' => 1,
                'tipo' => 'pane',
                'sottotipo' => '1-tipo1',
                'descrizione' => 'Tipo 1',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.6800000000000002,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.25,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'ordine_id' => 0,
                'fornitore_id' => 1,
                'tipo' => 'pane',
                'sottotipo' => '2-integrale',
                'descrizione' => 'Integrale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.6800000000000002,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.25,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'ordine_id' => 0,
                'fornitore_id' => 1,
                'tipo' => 'pane',
                'sottotipo' => '3-segale',
                'descrizione' => 'Segale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.6800000000000002,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.25,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 15,
                'ordine_id' => 0,
                'fornitore_id' => 5,
                'tipo' => 'pane',
                'sottotipo' => '3-segale',
                'descrizione' => 'Segale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.5,
                'contributo_des' => 0.080000000000000002,
                'contributo_sm' => 0.12,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 14,
                'ordine_id' => 0,
                'fornitore_id' => 5,
                'tipo' => 'pane',
                'sottotipo' => '2-integrale',
                'descrizione' => 'Integrale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.5,
                'contributo_des' => 0.080000000000000002,
                'contributo_sm' => 0.12,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 13,
                'ordine_id' => 0,
                'fornitore_id' => 5,
                'tipo' => 'pane',
                'sottotipo' => '1-tipo1',
                'descrizione' => 'Tipo 1',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.5,
                'contributo_des' => 0.080000000000000002,
                'contributo_sm' => 0.12,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 12,
                'ordine_id' => 0,
                'fornitore_id' => 4,
                'tipo' => 'pane',
                'sottotipo' => '3-segale',
                'descrizione' => 'Segale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.7999999999999998,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.23000000000000001,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 11,
                'ordine_id' => 0,
                'fornitore_id' => 4,
                'tipo' => 'pane',
                'sottotipo' => '2-integrale',
                'descrizione' => 'Integrale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.7999999999999998,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.23000000000000001,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'ordine_id' => 0,
                'fornitore_id' => 4,
                'tipo' => 'pane',
                'sottotipo' => '1-tipo1',
                'descrizione' => 'Tipo 1',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.7999999999999998,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.23000000000000001,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 9,
                'ordine_id' => 0,
                'fornitore_id' => 3,
                'tipo' => 'pane',
                'sottotipo' => '3-segale',
                'descrizione' => 'Segale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 4.1600000000000001,
                'contributo_des' => 0.080000000000000002,
                'contributo_sm' => 0.16,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 4,
                'ordine_id' => 0,
                'fornitore_id' => 2,
                'tipo' => 'pane',
                'sottotipo' => '1-tipo1',
                'descrizione' => 'Tipo 1',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.6000000000000001,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.33000000000000002,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 5,
                'ordine_id' => 0,
                'fornitore_id' => 2,
                'tipo' => 'pane',
                'sottotipo' => '2-integrale',
                'descrizione' => 'Integrale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.6000000000000001,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.33000000000000002,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 6,
                'ordine_id' => 0,
                'fornitore_id' => 2,
                'tipo' => 'pane',
                'sottotipo' => '3-segale',
                'descrizione' => 'Segale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 3.6000000000000001,
                'contributo_des' => 0.070000000000000007,
                'contributo_sm' => 0.33000000000000002,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 7,
                'ordine_id' => 0,
                'fornitore_id' => 3,
                'tipo' => 'pane',
                'sottotipo' => '1-tipo1',
                'descrizione' => 'Tipo 1',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 4.1600000000000001,
                'contributo_des' => 0.080000000000000002,
                'contributo_sm' => 0.16,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 8,
                'ordine_id' => 0,
                'fornitore_id' => 3,
                'tipo' => 'pane',
                'sottotipo' => '2-integrale',
                'descrizione' => 'Integrale',
                'quantita' => 'pagnotta',
                'prezzo_fornitore' => 4.1600000000000001,
                'contributo_des' => 0.080000000000000002,
                'contributo_sm' => 0.16,
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}