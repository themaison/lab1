<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\CustomFormValidation;
use App\ResultsVerification;
use App\Models\TestTOP;

class TestController extends Controller
{
    public function index(){
        return view('test');
    }

    public function validate_form(Request $request){
        //dd($request->all());

        $valid_ver = new ResultsVerification();

        // Установка правил валидации
        $valid_ver->setRule('q1', 'isCorrectQ1');
        $valid_ver->setRule('q2', 'isNotEmpty');
        $valid_ver->setRule('q3', 'isNotEmpty');
        $valid_ver->setRule('fullname', 'isFullName');
        $valid_ver->setRule('group', 'isNotEmpty');


        // Выполнение валидации
        $valid_ver->validate($request->all());

        // Проверка наличия ошибок
        if (!empty($valid_ver->getErrors())) {
            //return view('test', ['error_list' => $valid_ver->showErrors()]);
            return view('test', ['errors_data' => $valid_ver->getErrors()]);
        }
        else {
            $valid_ver->setAnswer('q1', 'Вероятность того, что в n независимых испытаниях, в каждом из которых вероятность появления события равна р(0 < р < 1), событие наступит ровно k раз (безразлично, в какой последовательности), приближенно равна (тем точнее, чем больше n)');
            $valid_ver->setAnswer('q2', '0.25');
            $valid_ver->setAnswer('q3', 'Невозможным');

            $test_data = $request->all();

            // Проверка ответов пользователя
            $user_answers = ['q1' => $test_data['q1'], 
                            'q2' => $test_data['q2'], 
                            'q3' => $test_data['q3']];
            $answers = $valid_ver->getAnswers();
            $results = $valid_ver->checkAnswers($user_answers);

            // Создание нового объекта TestTOPModel
            $test_tpo_model = new TestTOP();
            $test_tpo_model->datetime = date('Y-m-d H:i:s');
            $test_tpo_model->fullname = $test_data['fullname'];
            $test_tpo_model->answers = json_encode($user_answers, JSON_UNESCAPED_UNICODE); // ответы пользователя
            $test_tpo_model->results = json_encode($results, JSON_UNESCAPED_UNICODE); // результаты проверки ответов
            $test_tpo_model->save();

            if (!Session::get('user')) {
                return view('test',['msg' => 'Просмотр результатов тестирование доступен только авторизированным пользователям!']);
                //return redirect('/admin/login');
            }
            return view('test',['answers' => $answers, 'user_answers' => $user_answers, 'results'=> $results]);
        }
    }
}
