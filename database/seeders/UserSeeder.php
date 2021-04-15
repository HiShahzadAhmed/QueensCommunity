<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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


        if (User::where('role','admin')->count() == 0) {
        $user = User::create([
                'name' => 'Admin',
                'phone' => '+923001234567',
                'email' => 'admin@forum.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ]);


            $role = Role::create(['name' => 'admin']);
            $permission = Permission::create(['name' => 'browse_admin']);
            $permission = Permission::create(['name' => 'browse_roles']);
            $permission = Permission::create(['name' => 'browse_teams']);
            $permission = Permission::create(['name' => 'browse_videos']);
            $permission = Permission::create(['name' => 'browse_blogs']);
            $permission = Permission::create(['name' => 'browse_questions']);



            $role->givePermissionTo(Permission::all());

            $user->assignRole($role);

        }
    }
}
