<?php

use Illuminate\Database\Seeder;

class AttoriTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attori')->delete();
        
        \DB::table('attori')->insert(array (
            0 => 
            array (
                'id' => 1,
                'referente_id' => NULL,
                'tipo' => 'fornaio',
                'nome' => 'Massimo',
                'comune' => 'Cesano Maderno',
                'ragione_sociale' => 'Il Piccolo Forno',
                'indirizzo' => 'via Monte Rosa',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'referente_id' => NULL,
                'tipo' => 'fornaio',
                'nome' => 'Colombo',
                'comune' => 'Bellinzago Lombardo',
                'ragione_sociale' => 'F.lli Colombo',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'referente_id' => NULL,
                'tipo' => 'fornaio',
                'nome' => 'Franca',
                'comune' => 'Seregno',
                'ragione_sociale' => 'Il Pane di Franca',
                'indirizzo' => 'via Tenca',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'referente_id' => NULL,
                'tipo' => 'fornaio',
                'nome' => 'Emilio',
                'comune' => '',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'referente_id' => NULL,
                'tipo' => 'fornaio',
                'nome' => 'Giona',
                'comune' => 'Rovagnate',
                'ragione_sociale' => 'C.na Bagaggera',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 14,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Cernusco',
                'comune' => 'Cernusco Sul Naviglio',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            6 => 
            array (
                'id' => 13,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Cassina',
                'comune' => 'Cassina De’ Pecchi',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            7 => 
            array (
                'id' => 12,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Carate Basso',
                'comune' => 'Carate Brianza',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            8 => 
            array (
                'id' => 11,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Carate Alto',
                'comune' => 'Carate Brianza',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            9 => 
            array (
                'id' => 10,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Cent coo cent cr',
                'comune' => 'Brugherio',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            10 => 
            array (
                'id' => 9,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Biassono',
                'comune' => 'Biassono',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            11 => 
            array (
                'id' => 8,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Basiano',
                'comune' => 'Basiano',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            12 => 
            array (
                'id' => 7,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Bargassina',
                'comune' => 'Barlassina',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            13 => 
            array (
                'id' => 6,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Agrate',
                'comune' => 'Agrate Brianza',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            14 => 
            array (
                'id' => 15,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS ConSenso',
                'comune' => 'Cesano Maderno',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            15 => 
            array (
                'id' => 16,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Concorezzo-Vimer',
                'comune' => 'Concorezzo-Vimercate',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            16 => 
            array (
                'id' => 17,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS La Lumachina',
                'comune' => 'Desio',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            17 => 
            array (
                'id' => 18,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Gorgonzola',
                'comune' => 'Gorgonzola',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            18 => 
            array (
                'id' => 19,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Mezzago',
                'comune' => 'Mezzago',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            19 => 
            array (
                'id' => 20,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS S.Fruttuoso',
                'comune' => 'Monza',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            20 => 
            array (
                'id' => 21,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Seveso',
                'comune' => 'Seveso',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            21 => 
            array (
                'id' => 22,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS Pachamama',
                'comune' => 'Vedano',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            22 => 
            array (
                'id' => 23,
                'referente_id' => 0,
                'tipo' => 'gas',
                'nome' => 'GAS F.Motta',
                'comune' => 'Villasanta',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            23 => 
            array (
                'id' => 24,
                'referente_id' => NULL,
                'tipo' => 'gas',
                'nome' => 'GAS Cornate',
                'comune' => 'Cornate D\'Adda',
                'ragione_sociale' => '',
                'indirizzo' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
