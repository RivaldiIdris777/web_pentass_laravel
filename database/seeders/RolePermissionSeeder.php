<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        permission::create(['name' => 'tambah-data']);
        permission::create(['name' => 'edit-data']);
        permission::create(['name' => 'hapus-data']);
        permission::create(['name' => 'lihat-data']);

        permission::create(['name' => 'tambah-peserta']);
        permission::create(['name' => 'edit-peserta']);
        permission::create(['name' => 'hapus-peserta']);
        permission::create(['name' => 'lihat-peserta']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'user']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-data');
        $roleAdmin->givePermissionTo('edit-data');
        $roleAdmin->givePermissionTo('hapus-data');
        $roleAdmin->givePermissionTo('lihat-data');

        $roleStaff = Role::findByName('staff');
        $roleStaff->givePermissionTo('tambah-peserta');
        $roleStaff->givePermissionTo('edit-peserta');
        $roleStaff->givePermissionTo('hapus-peserta');
        $roleStaff->givePermissionTo('lihat-peserta');

        $roleUser = Role::findByName('user');        
        $roleUser->givePermissionTo('edit-peserta');        
        $roleUser->givePermissionTo('lihat-peserta');        
    }
}
