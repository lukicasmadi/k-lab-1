<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(4)->create();

        $administrator = Role::create(['name' => 'administrator']);
        Role::create(['name' => 'access_pusat']);
        Role::create(['name' => 'access_polda']);
        Role::create(['name' => 'only_entry']);
        Role::create(['name' => 'only_view']);

        $view_admin = Permission::create(['name' => 'view dashboard admin']);
        $view_pusat = Permission::create(['name' => 'view dashboard pusat']);
        $view_polda = Permission::create(['name' => 'view dashboard polda']);

        $allPermission = Permission::all();

        $administrator->syncPermissions($allPermission);

        $admin = User::first();
        $admin->assignRole('administrator');
    }
}
