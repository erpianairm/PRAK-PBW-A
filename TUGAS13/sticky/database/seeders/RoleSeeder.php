<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;

class RoleSeeder extends Seeder
{
    
    public function run()
    {
        $user = Models\User::create([
            'name' => 'Irma Erpiana',
            'email' => 'irmaerpianaaa@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        Models\User::factory(10)->create();

        collect([
                ['name' => 'admin'],
                ['name' => 'partner'],
            ])->each(fn ($role) => Models\Role::create($role));


            $user2 = Models\User::find(2);

            $user->assignRole(Models\Role::find(1));
            $user2->assignRole(Models\Role::find(2));
    }
}
