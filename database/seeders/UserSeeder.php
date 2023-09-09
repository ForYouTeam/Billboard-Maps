<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'read-data'  ]);
        Permission::create(['name' => 'create-data']);
        Permission::create(['name' => 'update-data']);
        Permission::create(['name' => 'delete-data']);

        $roleSuAdmin = Role::create(['name' => 'super-admin']);
        $roleSuAdmin->givePermissionTo('read-data'  );
        $roleSuAdmin->givePermissionTo('create-data');
        $roleSuAdmin->givePermissionTo('update-data');
        $roleSuAdmin->givePermissionTo('delete-data');

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('read-data'  );
        $roleAdmin->givePermissionTo('create-data');
        $roleAdmin->givePermissionTo('update-data');
        
        $uuid = Uuid::uuid4()->toString();

        $user = User::create([
            'id'         => crc32($uuid)        ,
            'name'       => 'Super Admin'       ,
            'username'   => 'superadmin'        ,
            'password'   => Hash::make('123123'),
            'scope'      => 'super-admin'       ,
            'created_at' => Carbon::now()       ,
            'updated_at' => Carbon::now()       ,
            ]);

        $user->assignRole('super-admin');

        $user2 = User::create([
            'name'       => 'Admin'             ,
            'username'   => 'admin'             ,
            'password'   => Hash::make('123123'),
            'scope'      => 'admin'             ,
            'created_at' => Carbon::now()       ,
            'updated_at' => Carbon::now()       ,
            ]);

        $user2->assignRole('admin');
    }
}
