<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\UserModel;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = UserModel::create([
            'fullname' => 'Мельничук Владислав Викторович',
            'email' => 'admin@mail.ru',
            'login' => 'admin',
            'pass' => md5('root')
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        $admin->assignRole('admin');
    }
}
