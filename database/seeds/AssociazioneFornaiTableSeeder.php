<?php

use Illuminate\Database\Seeder;

class AssociazioneFornaiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('associazione_fornai')->delete();
        
        \DB::table('associazione_fornai')->insert(array (
            0 => 
            array (
                'id' => 2,
                'stagione' => '2016-2017',
                'fornaio_id' => 1,
                'gas_id' => 7,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 1,
                'stagione' => '2016-2017',
                'fornaio_id' => 3,
                'gas_id' => 6,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'stagione' => '2016-2017',
                'fornaio_id' => 2,
                'gas_id' => 8,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'stagione' => '2016-2017',
                'fornaio_id' => 3,
                'gas_id' => 9,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'stagione' => '2016-2017',
                'fornaio_id' => 3,
                'gas_id' => 10,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'stagione' => '2016-2017',
                'fornaio_id' => 3,
                'gas_id' => 11,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'stagione' => '2016-2017',
                'fornaio_id' => 3,
                'gas_id' => 12,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'stagione' => '2016-2017',
                'fornaio_id' => 2,
                'gas_id' => 13,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'stagione' => '2016-2017',
                'fornaio_id' => 2,
                'gas_id' => 14,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'stagione' => '2016-2017',
                'fornaio_id' => 1,
                'gas_id' => 15,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'stagione' => '2016-2017',
                'fornaio_id' => 4,
                'gas_id' => 16,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'stagione' => '2016-2017',
                'fornaio_id' => 1,
                'gas_id' => 17,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'stagione' => '2016-2017',
                'fornaio_id' => 2,
                'gas_id' => 18,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'stagione' => '2016-2017',
                'fornaio_id' => 4,
                'gas_id' => 19,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'stagione' => '2016-2017',
                'fornaio_id' => 3,
                'gas_id' => 20,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'stagione' => '2016-2017',
                'fornaio_id' => 1,
                'gas_id' => 21,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'stagione' => '2016-2017',
                'fornaio_id' => 3,
                'gas_id' => 22,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'stagione' => '2016-2017',
                'fornaio_id' => 4,
                'gas_id' => 23,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'stagione' => '2016-2017',
                'fornaio_id' => 2,
                'gas_id' => 24,
                'giorno' => 3,
                'valido_dal' => '2016-09-01',
                'valido_al' => '2017-07-31',
                'created_at' => '2017-03-15 11:42:18',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}