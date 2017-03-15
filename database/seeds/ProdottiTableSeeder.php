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
                'prezzo_fornitore' => 3.68,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.25,
           		'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 3.68,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.25,
           		'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 3.68,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.25,
            	'created_at' => new DateTime(),
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
                'contributo_des' => 0.08,
                'contributo_sm' => 0.12,
           		'created_at' => new DateTime(),
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
                'contributo_des' => 0.08,
                'contributo_sm' => 0.12,
           		'created_at' => new DateTime(),
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
                'contributo_des' => 0.08,
                'contributo_sm' => 0.12,
           		'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 3.80,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.23,
           		'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 3.80,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.23,
           		'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 3.80,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.23,
           		'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 4.16,
                'contributo_des' => 0.08,
                'contributo_sm' => 0.16,
            	'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 3.60,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.33,
            	'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 3.60,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.33,
            	'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 3.60,
                'contributo_des' => 0.07,
                'contributo_sm' => 0.33,
            	'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 4.16,
                'contributo_des' => 0.08,
                'contributo_sm' => 0.16,
            	'created_at' => new DateTime(),
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
                'prezzo_fornitore' => 4.16,
                'contributo_des' => 0.08,
                'contributo_sm' => 0.16,
           		'created_at' => new DateTime(),
            ),
        ));
    }
}
