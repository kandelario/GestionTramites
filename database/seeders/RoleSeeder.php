<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Superadmin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Asesor']);

        Permission::create(['name' => 'admin.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.users'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.plazas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.asesors'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.clientes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.clientes.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tramites'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tramites.create'])->syncRoles([$role1, $role2, $role3]);
    }
}
