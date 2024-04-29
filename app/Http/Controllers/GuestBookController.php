<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormValidation;

class GuestBookController extends Controller
{
    public function index(){
        $messages = $this->getMessages();
        return view('gb', ['messages' => $messages]);
    }

    public function store(Request $request){
        $validator = new FormValidation();

        // Установка правил валидации
        $validator->setRule('fullname', 'isFullName');
        $validator->setRule('email', 'isEmail');
        $validator->setRule('message', 'isNotEmpty');

        // Выполнение валидации
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if (!empty($validator->getErrors())) {
            $messages = $this->getMessages();
            return view('gb', ['errors_data' => $validator->getErrors(), 'messages' => $messages]);
        }
        else {
            $datetime = date('Y-m-d H:i:s');
            $fullname = $request->input('fullname');
            $email = $request->input('email');
            $message = $request->input('message');

            $data = "{$datetime};{$fullname};{$email};{$message}\n";

            file_put_contents(storage_path('app/public/uploads/messages.inc'), $data, FILE_APPEND);
        }
        return redirect('/gb');
    }

    private function getMessages() {
        $messages = [];
        $messages_file = file(storage_path('app/public/uploads/messages.inc'));
        foreach ($messages_file as $message) {
            $data = explode(';', $message);
            $messages[] = [
                'datetime' => $data[0],
                'fullname' => $data[1],
                'email' => $data[2],
                'message' => $data[3]
            ];
        }
        return array_reverse($messages);
    }
}

