<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormValidation;

class ContactsController extends Controller
{
    public function index(){
        return view('contacts');
    }

    public function validate_form(Request $request){
        //dd($request->all());

        $validator = new FormValidation();

        // Установка правил валидации
        $validator->setRule('fullname', 'isFullName');
        $validator->setRule('birthday', 'isNotEmpty');
        $validator->setRule('phone', 'isPhoneNumber');
        $validator->setRule('gender', 'isNotEmpty');
        $validator->setRule('age', 'isNotEmpty');
        $validator->setRule('email', 'isEmail');
        $validator->setRule('message', 'isMessage');

        // Выполнение валидации
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if (!empty($validator->getErrors())) {
            return view('contacts', ['error_list' => $validator->showErrors(), 'errors_data' => $validator->getErrors()]);
        }
        else {
            $email = $request->input('email');
            $mailtoLink = "mailto:$email";
    
            return view('contacts', ['mailtoLink' => $mailtoLink]);
        }
    }
}
