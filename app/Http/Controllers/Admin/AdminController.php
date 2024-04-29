<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\FormValidation;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function logout()
    {
        Session::forget('isAdmin');
        return redirect('/admin/login');
    }


    public function get_login_form()
    {
        return view('admin/admin_login');
    }

    public function store(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('pass');

        $validator = new FormValidation();

        // Установка правил валидации
        $validator->setRule('login', 'isNotEmpty');
        $validator->setRule('pass', 'isNotEmpty');

        // Выполнение валидации
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if (!empty($validator->getErrors())) {
            return view('admin/admin_login', ['error_list' => $validator->showErrors(), 'errors_data' => $validator->getErrors()]);
        }

        $adminLogin = 'vladislav';
        $adminPasswordHash = md5('6666');

        if ($login == $adminLogin && $adminPasswordHash == md5($password)) {
            session(['isAdmin' => 1]);
            return redirect()->route('panel.get_panel');
        }

        session(['isAdmin' => 0]);
        return view('admin/admin_login', ['incorrect_msg' => 'Неверный логин или пароль']);
    }


    public function get_panel()
    {
        return view('admin/admin_panel');
    }
}