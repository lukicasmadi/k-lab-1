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
            'name' => 'korlantas',
            'email' => 'free@korlantas.com',
            'email_verified_at' => now(),
            'password' => bcrypt('korlantas2012'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldaaceh',
            'email' => 'free@poldaaceh.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldaaceh148'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldasumut',
            'email' => 'free@poldasumut.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldasumut605'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldasumbar',
            'email' => 'free@poldasumbar.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldasumbar302'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldariau',
            'email' => 'free@poldariau.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldariau151'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldakepri',
            'email' => 'free@poldakepri.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldakepri250'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldajambi',
            'email' => 'free@poldajambi.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldajambi159'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldababel',
            'email' => 'free@poldababel.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldababel264'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldabengkulu',
            'email' => 'free@poldabengkulu.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldabengkulu875'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldasumsel',
            'email' => 'free@poldasumsel.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldasumsel335'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldalampung',
            'email' => 'free@poldalampung.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldalampung578'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldabanten',
            'email' => 'free@poldabanten.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldabanten413'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldametrojaya',
            'email' => 'free@poldametrojaya.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldametrojaya772'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldajabar',
            'email' => 'free@poldajabar.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldajabar396'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldajateng',
            'email' => 'free@poldajateng.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldajateng379'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldadiy',
            'email' => 'free@poldadiy.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldadiy987'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldajatim',
            'email' => 'free@poldajatim.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldajatim623'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldabali',
            'email' => 'free@poldabali.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldabali492'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldakaltim',
            'email' => 'free@poldakaltim.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldakaltim466'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldakalsel',
            'email' => 'free@poldakalsel.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldakalsel598'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldakalteng',
            'email' => 'free@poldakalteng.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldakalteng434'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldakalbar',
            'email' => 'free@poldakalbar.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldakalbar677'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldantb',
            'email' => 'free@poldantb.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldantb179'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldantt',
            'email' => 'free@poldantt.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldantt569'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldasulut',
            'email' => 'free@poldasulut.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldasulut887'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldasulteng',
            'email' => 'free@poldasulteng.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldasulteng252'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldasulsel',
            'email' => 'free@poldasulsel.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldasulsel222'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldasultra',
            'email' => 'free@poldasultra.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldasultra581'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldagorontalo',
            'email' => 'free@poldagorontalo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldagorontalo985'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldamaluku',
            'email' => 'free@poldamaluku.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldamaluku790'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldamalut',
            'email' => 'free@poldamalut.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldamalut791'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldapapua',
            'email' => 'free@poldapapua.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldapapua160'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldapabar',
            'email' => 'free@poldapabar.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldapabar839'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldasulbar',
            'email' => 'free@poldasulbar.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldasulbar397'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'poldakaltara',
            'email' => 'free@poldakaltara.com',
            'email_verified_at' => now(),
            'password' => bcrypt('poldakaltara363'),
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

        $access_pusat = User::whereName("korlantas")->first();
        $access_pusat->assignRole('access_pusat');
    }
}
