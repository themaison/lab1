<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\FormValidation;
use App\Models\UserModel;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class UserController extends Controller
{
    
    public function logout()
    {
        // Session::forget('user');
        // Session::forget('isAdmin');
        Auth::logout();
        return redirect('/login');
    }

    public function get_login_form()
    {
        return view('user_login');
    }

    public function login_confirm(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('pass');

        validate

        $validator = new FormValidation();
        $validator->setRule('login', 'isNotEmpty');
        $validator->setRule('pass', 'isNotEmpty');
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if (!empty($validator->getErrors())) {
            return view('user_login', ['error_list' => $validator->showErrors(), 'errors_data' => $validator->getErrors()]);
        }

        // Поиск пользователя в базе данных
        $user = UserModel::where('login', $login)->first();

        if ($user && $user->pass == md5($password)) {

            // dd(auth()->user()->id);

            Auth::login($user, true);
            if ($user->hasRole('admin')) {
                // die('ok');
                // session(['isAdmin' => 1]);
                return redirect()->route('panel.get_panel');
            }

            if ($user->hasRole('user')) {
                // session(['user' => $user]);
                // session(['isAdmin' => 0]);
                return redirect()->route('home.index');
            }
        }

        // dd($user->hasRole('user'));

        return view('user_login', ['incorrect_msg' => 'Неверный логин или пароль']);
    }

    public function get_register_form()
    {
        return view('user_register');
    }

    public function register_confirm(Request $request)
    {
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $login = $request->input('login');
        $password = $request->input('pass');

        $validator = new FormValidation();

        // Установка правил валидации
        $validator->setRule('fullname', 'isFullName');
        $validator->setRule('email', 'isEmail');
        $validator->setRule('login', 'isNotEmpty');
        $validator->setRule('pass', 'isNotEmpty');

        // Выполнение валидации
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if (!empty($validator->getErrors())) {
            return view('user_register', ['error_list' => $validator->showErrors(), 'errors_data' => $validator->getErrors()]);
        }
        
        // Проверка наличия пользователя с таким же логином
        $existingUser = UserModel::where('login', $login)->first();
        if ($existingUser) {
            return view('user_register', ['incorrect_msg' => 'Пользователь с таким логином уже существует']);
        }

        // Создание нового пользователя
        // $user = new UserModel;
        // $user->fullname = $fullname;
        // $user->email = $email;
        // $user->login = $login;
        // $user->pass = md5($password);
        // $user->save();

        $user = UserModel::create([
            'fullname' => $fullname,
            'email' => $email,
            'login' => $login,
            'pass' => md5($password)
        ]);

        $user->assignRole('user');
        Auth::login($user, true);


        // session(['user' => $user]);

        return redirect()->route('home.index');
    }

    public function checkLogin(Request $request)
    {
        $login = $request->get('login');

        // Поиск пользователя в базе данных
        $user = UserModel::where('login', $login)->first();
        
        if ($user) {
            return response()->json('1');
        } else {
            return response()->json('0');
        }
    }

}
