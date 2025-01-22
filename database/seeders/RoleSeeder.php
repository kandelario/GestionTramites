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
        $role3 = Role::create(['name' => 'Supervisor de Plaza']);
        $role4 = Role::create(['name' => 'Asesor']);

        Permission::create(['name' => 'admin.asesors.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.asesors.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.asesors.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.asesors.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.clientes.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.clientes.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.clientes.update'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.clientes.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.plazas.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.plazas.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.plazas.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.plazas.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.tramites.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tramites.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tramites.update'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.tramites.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1, $role2]);
    }
}
