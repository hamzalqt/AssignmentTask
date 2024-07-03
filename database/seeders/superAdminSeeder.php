<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class superAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'super-admin')->first();

        $superAdminUser = User::create([
            'name' => 'super-admin',
            'email' => 'super-admin@example.com',
            'password' => bcrypt('password'),
        ]);


        if ($superAdminUser && $superAdminRole) {
            $superAdminUser->assignRole($superAdminRole);
        }

    }
}
