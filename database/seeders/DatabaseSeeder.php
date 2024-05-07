<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    private static string $password;

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        Post::factory(5)->create();
        // Create the first user with role 'admin'
        $adminRole=Role::create(['name' => 'admin']);
        $writerRole=Role::create(['name' => 'writer']);
        $publisherRole=Role::create(['name' => 'publisher']);
        $editorRole=Role::create(['name' => 'editor']);

        // Create permissions
        Permission::create(['name' => 'write post']);
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'publish post']);

        $publisherRole->givePermissionTo('publish post');
        $editorRole->givePermissionTo('edit post');
        $writerRole->givePermissionTo(['write post','publish post']);
        $adminRole->givePermissionTo(['write post','publish post','edit post']);


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => static::$password ?? Hash::make('password'),
        ]);

        // Assign 'admin' role to the first user
        $admin->assignRole('admin');

        // Create other users
        $writer=User::create([
            'name' => 'Writer',
            'email' => 'writer@example.com',
            'password' => static::$password ?? Hash::make('password'),
        ]);
        $writer->assignRole('writer');

        $editor=User::create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'password' => static::$password ?? Hash::make('password'),
        ]);
        $editor->assignRole('editor');


        $user=User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => static::$password ?? Hash::make('password'),
        ]);
        $user->assignRole('publisher');


    }


//        php artisan permission:create - role writer
//        php artisan permission:create - role admin
//        php artisan permission:create - role editor
//        php artisan permission:create - role publisher
//        php artisan permission:create - permission "edit post"
//        php artisan permission:create - permission "write post"
//        php artisan permission:create - permission "publish post"

}
