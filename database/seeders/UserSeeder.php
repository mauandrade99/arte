<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        User::create([
            'name'=>'Mauricio Andrade'
            ,'email'=>'Mauricio.andrade46@gmail.com'
            ,'password'=>bcrypt('123456')
            ,'admin'=>'1'
        ]);

        User::create([
            'name'=>'Arte'
            ,'email'=>'arte@gmail.com'
            ,'password'=>bcrypt('123456')
            ,'admin'=>'1'
        ]);
        

        User::factory(5)->create();
    }
}
