<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bertho',
            'email' => 'berthojoris@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$Yc2mL4kXARZrXkGB2ISfk.3gUB.E/oO7mq3iCnkT5REeELwrRBp6K',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Cas',
            'email' => 'lukicasmadi@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('10dunia'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'User Korlantas Pusat',
            'email' => 'korlantas_pusat@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Brian - Polda Jabar',
            'email' => 'polda_jabar@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Gede - Polda Bali',
            'email' => 'polda_bali@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $administrator  = Role::create(['name' => 'administrator']);
        $access_pusat   = Role::create(['name' => 'access_pusat']);
        $access_daerah  = Role::create(['name' => 'access_daerah']);

        Permission::create(['name' => 'view dashboard administrator']);
        Permission::create(['name' => 'view dashboard pusat']);
        Permission::create(['name' => 'view dashboard polda']);

        Permission::create(['name' => 'view master category']);
        Permission::create(['name' => 'view master article']);
        Permission::create(['name' => 'view master polda']);
        Permission::create(['name' => 'view master unit']);
        Permission::create(['name' => 'view master violation']);

        Permission::create(['name' => 'create master category']);
        Permission::create(['name' => 'create master article']);
        Permission::create(['name' => 'create master polda']);
        Permission::create(['name' => 'create master unit']);
        Permission::create(['name' => 'create master violation']);

        Permission::create(['name' => 'edit master category']);
        Permission::create(['name' => 'edit master article']);
        Permission::create(['name' => 'edit master polda']);
        Permission::create(['name' => 'edit master unit']);
        Permission::create(['name' => 'edit master violation']);

        Permission::create(['name' => 'delete master category']);
        Permission::create(['name' => 'delete master article']);
        Permission::create(['name' => 'delete master polda']);
        Permission::create(['name' => 'delete master unit']);
        Permission::create(['name' => 'delete master violation']);

        $allPermission = Permission::all();

        $administrator->syncPermissions($allPermission);

        $admin = User::whereEmail("berthojoris@gmail.com")->first();
        $admin->assignRole('administrator');

        $admin = User::whereEmail("lukicasmadi@gmail.com")->first();
        $admin->assignRole('administrator');

        $access_pusat = User::whereEmail("korlantas_pusat@gmail.com")->first();
        $access_pusat->assignRole('access_pusat');

        $access_daerah = User::whereEmail("polda_jabar@gmail.com")->first();
        $access_daerah->assignRole('access_daerah');

        $access_daerah = User::whereEmail("polda_bali@gmail.com")->first();
        $access_daerah->assignRole('access_daerah');
    }
}
