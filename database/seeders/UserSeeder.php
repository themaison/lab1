<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = UserModel::create([
            'fullname' => 'Иваненко Владислав Игоревич',
            'email' => 'itpelag@mail.ru',
            'login' => 'itpelag',
            'pass' => md5('itpelag')
        ]);

        Role::create([
            'name' => 'user'
        ]);

        $user->assignRole('user');
    }
}
