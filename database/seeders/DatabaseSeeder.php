<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
    DB::table('users')->insert([
        // Nome será 'admin'
        'name' => 'admin',
        // ==
        'email' => 'admin@sys.com',
        
        // senha123 encriptada
        'password' => bcrypt('senha123')
    ]);
    }
}
