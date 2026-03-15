<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@correo.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'Editor',
            'email' => 'editor@correo.com',
            'password' => Hash::make('password'),
        ]);
        $editor->assignRole('editor');

        $user = User::create([
            'name' => 'Usuario',
            'email' => 'user@correo.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');
    }
}
