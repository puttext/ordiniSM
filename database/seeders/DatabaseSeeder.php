<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('UsersTableSeeder');
        $this->call('AttoriTableSeeder');
        $this->call('AssociazioneFornaiTableSeeder');
        $this->call('ProdottiTableSeeder');
        $this->call(AttoriTableSeeder::class);
        $this->call(AssociazioneFornaiTableSeeder::class);
        $this->call(ProdottiTableSeeder::class);
    }
}
