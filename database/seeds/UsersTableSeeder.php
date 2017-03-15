<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 7,
                'name' => 'Nicola ',
                'email' => 'favuzzi.nicola@alice.it',
                'password' => '57c76383e2ce358028047c1bbe749ea0',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 11,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'Metella ',
                'email' => 'metella@email.it',
                'password' => 'd02e66aac0647aef290e981938df3be6',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 12,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Monica ',
                'email' => 'm.bonalumi@tiscali.it',
                'password' => 'e680885fe67c4dcdc35668fc58fa7c2a',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 10,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Angelo ',
                'email' => 'angelo.mornata@hotmail.it',
                'password' => '4b83ff3a53ac6839abf48c771e520114',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 9,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            4 => 
            array (
                'id' => 3,
                'name' => 'Emanuele Bertipaglia',
                'email' => 'lele.bertipaglia@gmail.com',
                'password' => '8357b8793a9f5fb76f6b9b76ea83e686',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 7,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            5 => 
            array (
                'id' => 4,
                'name' => 'Stefania Pirovano',
                'email' => 'glicine@livecom.it',
                'password' => '9285bac42f5ff987e7aa7099e5baa616',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 8,
                'remember_token' => 'I0UWnvwiqQgfKLguoXrwTKZfRol2cCtw7WVdOFGkbEE1AQ6GhuQ5hvkKqGun',
                'created_at' => new DateTime(),
                'updated_at' => '2017-02-25 01:59:32',
            ),
            6 => 
            array (
                'id' => 1,
                'name' => 'Rosella ',
                'email' => 'marco.vismara@fastwebnet.it',
                'password' => '460e594ce968b556fce09cd313eeffb1',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 6,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            7 => 
            array (
                'id' => 2,
                'name' => 'Giovanna ',
                'email' => 'vgiuseppe@libero.it',
                'password' => '6896c3fd7eb4ca88240e2c5ba8a2f334',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 6,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Rosanna Busa',
                'email' => 'rossanabusa@gmail.com',
                'password' => '9d8b80e83e8c793d0c193efb34f591d1',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 13,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Sandra Gabriele',
                'email' => 'giuliano88@gmail.com',
                'password' => 'dfcfd378a2b48dd62c1a3212cbffa4f2',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 13,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Rossella Chiarella',
                'email' => 'rossella.chiarella@gmail.com',
                'password' => '98ae5a74496ca60c2fe18db243640676',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 13,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Giulia  Canavero',
                'email' => 'g.canavero@inwind.it',
                'password' => 'af6caf9dd2ff813a3a8373e6a326d90a',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 13,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Maria Elena Scalzi',
                'email' => 'Mariaelenascalzi@yahoo.it',
                'password' => '87b81fbdbaea14f0e3b0cbec7f484cfe',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 14,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Stefano Radaelli',
                'email' => 'stradael@livecom.it',
                'password' => '33b06df4f9713211f17157761c254672',
                'ruolo' => 'coordinatore',
                'attore_id' => 0,
                'gas_id' => 15,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Maurizio Martin',
                'email' => 'mapaella@gmail.com',
                'password' => 'fb96619a0bf8b8c8155fe78f9205efa0',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 16,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Valter Salmaso',
                'email' => 'valter.salmaso@fastwebnet.it',
                'password' => '0556a597c61cd30bc9071e63d9cc9d2c',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 17,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Mario Cerbone',
                'email' => 'cerbo.m@libero.it',
                'password' => '490eb03d394fd69c1eb0a116983cf3f4',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 17,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Enza Abramonte',
                'email' => 'enza.abramonte@gmail.com',
                'password' => 'bf44acd9e23bf224996d4a75c8945dd1',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 18,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'paolo corno',
                'email' => 'paoloementa@hotmail.com',
                'password' => 'b6a9d98b7640ea32e1066f951a2bf318',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 18,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Paolo Zucchi',
                'email' => 'paolo.zucchi999@gmail.com',
                'password' => 'b6a9d98b7640ea32e1066f951a2bf318',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 18,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Antonia De Giuli',
                'email' => 'angelo_casiraghi@libero.it',
                'password' => '5001f609ed5fa3bf1808edce6ff19e6b',
                'ruolo' => 'coordinatore',
                'attore_id' => 0,
                'gas_id' => 19,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Roberto ',
                'email' => 'rmontrasio60@gmail.com',
                'password' => '14aa7fb7dfe078c442945cc1c4127925',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 20,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Paolo Formenti',
                'email' => 'paoloformenti3@gmail.com',
                'password' => 'b6a9d98b7640ea32e1066f951a2bf318',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 21,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Chiara ',
                'email' => 'chimontiara@gmail.com',
                'password' => 'c44740942fa8db47fc3af1604ab899d1',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 22,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Laura ',
                'email' => 'laurabrambilla@alice.it',
                'password' => '9a871a2a1b44ce36da856605dd3c446c',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 22,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'GAS ',
                'email' => 'gasvedano@gmail.com',
                'password' => 'b5a3413c6e8a1dda5849a1d678faad03',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 22,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Lucia ',
                'email' => 'sgarbi@fastwebnet.it',
                'password' => '2512b4d07158008317d1b5330f75d945',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 23,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Pippo Drago',
                'email' => 'pippodrago53@yahoo.it',
                'password' => '21ba0622f1ad1a8997a9350d0d776ac2',
                'ruolo' => 'coordinatore',
                'attore_id' => 0,
                'gas_id' => 24,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => null,
            ),
        ));
        
        
    }
}
