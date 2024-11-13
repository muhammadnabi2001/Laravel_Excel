<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $user=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=>Hash::make('123456789')
        ]);
       $user1=User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password'=>Hash::make('123456789')
        ]);
       $user2=User::create([
            'name' => 'moderator',
            'email' => 'moderator@gmail.com',
            'password'=>Hash::make('123456789')
        ]);

        $role1=Role::create(['name'=>'admin']);
        $role2=Role::create(['name'=>'post']);
        $role3=Role::create(['name'=>'kitob']);
        $routes=Route::getRoutes();
        foreach ($routes as $route) {
            $key=$route->getName();
            if($key && !str_starts_with($key,'generated:') && !str_starts_with($key,'storage.local'))
            {
                $permission=Permission::create(['name'=>$key]);
                $role1->givePermissionTo($permission);
                if(str_starts_with($key,'post')){

                    $role2->givePermissionTo($permission);
                }
                if(str_starts_with($key,'kitob'))
                {
                    $role3->givePermissionTo($permission);
                }
                if( strpos($key,'create') ==false )
                {
                    $user2->givePermissionTo($permission);
                }
            }
        }
        $user->assignRole($role1);
        $user1->assignRole($role3);

    }
}
