<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\FormValidation;
use App\Models\TestTOP;

class TestStatisticsController extends Controller
{
    public function index(){
        $fullnames = TestTOP::select('fullname')->distinct()->get();
        return view('admin/teststat', ['fullnames' => $fullnames]);
    }

    public function store(Request $request){
        $validator = new FormValidation();
        $validator->setRule('fullname', 'isFullName');
        $validator->validate($request->all());

        $fullnames = TestTOP::select('fullname')->distinct()->get();

        // Проверка наличия ошибок
        if (!empty($validator->getErrors())) {
            return view('admin/teststat', ['error_list' => $validator->showErrors(), 'errors_data' => $validator->getErrors(), 'fullnames' => $fullnames]);
        }

        $fullname = $request->input('fullname');

        $latestTestResult = TestTOP::where('fullname', $fullname)->orderBy('datetime', 'desc')->first();
        $answers = json_decode($latestTestResult->answers, true);
        $results = json_decode($latestTestResult->results, true);

        $combined = [];
        foreach ($answers as $question => $answer) {
            $combined[$question] = ['answer' => $answer, 'result' => $results[$question]];
        }

        $correct_answers = array_filter($combined, function($value) {
            return $value['result'] === true;
        });

        $incorrect_answers = array_filter($combined, function($value) {
            return $value['result'] === false;
        });

        return view('admin/teststat', ['latestTestResult' => $latestTestResult, 'correct_answers' => $correct_answers, 'incorrect_answers' => $incorrect_answers, 'fullnames' => $fullnames]);
    }
}
