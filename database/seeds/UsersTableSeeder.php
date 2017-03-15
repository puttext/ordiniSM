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
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 11,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 8,
                'name' => 'Metella ',
                'email' => 'metella@email.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 12,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Monica ',
                'email' => 'm.bonalumi@tiscali.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 10,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Angelo ',
                'email' => 'angelo.mornata@hotmail.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 9,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 3,
                'name' => 'Emanuele Bertipaglia',
                'email' => 'lele.bertipaglia@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 7,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 4,
                'name' => 'Stefania Pirovano',
                'email' => 'glicine@livecom.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 8,
                'remember_token' => 'I0UWnvwiqQgfKLguoXrwTKZfRol2cCtw7WVdOFGkbEE1AQ6GhuQ5hvkKqGun',
                'created_at' => new DateTime(),
                'updated_at' => '2017-02-25 01:59:32',
            ),
            6 => 
            array (
                'id' => 29,
                'name' => 'Rosella ',
                'email' => 'marco.vismara@fastwebnet.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 6,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 2,
                'name' => 'Giovanna ',
                'email' => 'vgiuseppe@libero.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 6,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Rosanna Busa',
                'email' => 'rossanabusa@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 13,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Sandra Gabriele',
                'email' => 'giuliano88@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 13,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Rossella Chiarella',
                'email' => 'rossella.chiarella@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 13,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Giulia  Canavero',
                'email' => 'g.canavero@inwind.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 13,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Maria Elena Scalzi',
                'email' => 'mariaelenascalzi@yahoo.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 14,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Stefano Radaelli',
                'email' => 'stradael@livecom.it',
                'password' => '$2y$10$f2W8O/DDgssq9Nhbi.DsZeAB24myMYIaRle7Im8/ANRu1qen/fzJu',
                'ruolo' => 'coordinatore',
                'attore_id' => 1,
                'gas_id' => 15,
                'remember_token' => 'mEgzNHAacfO5y1xDREUki0uyIiH13rp35BElmITM0RwiPtoGWHAmemcd9S0B',
                'created_at' => new DateTime(),
                'updated_at' => '2017-03-15 17:52:00',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Maurizio Martin',
                'email' => 'mapaella@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 16,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Valter Salmaso',
                'email' => 'valter.salmaso@fastwebnet.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 17,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Mario Cerbone',
                'email' => 'cerbo.m@libero.it',
                'password' => '490eb03d3$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK94fd69c1eb0a116983cf3f4',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 17,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Enza Abramonte',
                'email' => 'enza.abramonte@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 18,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'paolo corno',
                'email' => 'paoloementa@hotmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 18,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Paolo Zucchi',
                'email' => 'paolo.zucchi999@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 4,
                'gas_id' => 18,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Antonia De Giuli',
                'email' => 'angelo_casiraghi@libero.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'coordinatore',
                'attore_id' => 0,
                'gas_id' => 19,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Roberto ',
                'email' => 'rmontrasio60@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 20,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Paolo Formenti',
                'email' => 'paoloformenti3@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 21,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Chiara ',
                'email' => 'chimontiara@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 22,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Laura ',
                'email' => 'laurabrambilla@alice.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 22,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'GAS ',
                'email' => 'gasvedano@gmail.com',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 22,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Lucia ',
                'email' => 'sgarbi@fastwebnet.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'referente',
                'attore_id' => 0,
                'gas_id' => 23,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Pippo Drago',
                'email' => 'pippodrago53@yahoo.it',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'coordinatore',
                'attore_id' => 2,
                'gas_id' => 24,
                'remember_token' => '',
                'created_at' => new DateTime(),
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@ordinism.ddns.net',
                'password' => '$2y$10$pdOVYVjnEY/xQs4wqCQhCuDWLh.SJt6EIwmF7QPMKkQFRCx/HJyNG',
                'ruolo' => 'admin',
                'attore_id' => 0,
                'gas_id' => NULL,
                'remember_token' => 'R4I2PF4s3SNLmqTKx6ti8zBMOLKL94zsI3T33OgP2DtvSqCKtELpCUV6U0gt',
                'created_at' => NULL,
                'updated_at' => '2017-03-15 18:18:31',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Margherita Motta',
                'email' => 'segreteria@desbri.org',
                'password' => '$2y$10$u1SnU0Eig41MjTrPy50DGOKHjqBYFvR5JJ5Sw/yUpCvadGUxq/leK',
                'ruolo' => 'gestore',
                'attore_id' => 3,
                'gas_id' => 0,
                'remember_token' => 'c9WxpM5AC5CHWlwKYFt0S7xRAeqSdFTykFbtiiXYny1rc5GEIghfVssaW6eL',
                'created_at' => NULL,
                'updated_at' => '2017-03-15 18:20:04',
            ),
        ));
        
        
    }
}