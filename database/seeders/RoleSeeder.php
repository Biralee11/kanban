<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles =  ['1'=>'Administrator', '2'=>'Customer', '3'=>'Developer', '4'=>'Project Manager'];
        foreach($roles as $id => $name) {
            Role::create([
                'id' => $id,
                'name' => $name,
            ]);
        }
    }
}
