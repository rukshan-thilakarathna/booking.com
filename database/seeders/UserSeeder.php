<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'url' => 'super-admin',
            'role' => 'super-admin',
            'email' => 'superadmin@gmail.com',
            'permissions' => '{"role.permissions":true,"user.create.permissions":true,"user.edite.permissions":true,"user.view.permissions":true,"user.delete.permissions":true,"property.create.permissions":true,"property.edite.permissions":true,"property.status.permissions":true,"property.admin_create.permissions":true,"property.view.permissions":true,"property.delete.permissions":true,"platform.index":true,"platform.systems.attachment":true}',
            'password' => Hash::make('3066924')
        ]);
    }
}
