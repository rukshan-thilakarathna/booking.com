<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::create([
            'slug' => 'super-admin',
            'name' => 'Super Admin',
            'permissions' => '{"role.permissions":"1","user.create.permissions":"1","user.delete.permissions":"1","user.edite.permissions":"1","user.update_password.permissions":"1","user.verification.permissions":"1","user.view.permissions":"1","property.admin_create.permissions":"1","property.approve.permissions":"1","property.create.permissions":"1","property.delete.permissions":"1","property.edite.permissions":"1","property.suspend.permissions":"1","property.view.permissions":"1","property.status.permissions":"1","platform.index":"1","platform.systems.attachment":"1"}'
        ]);
    }
}
