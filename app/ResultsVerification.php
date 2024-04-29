<?php

namespace App;

class ResultsVerification extends CustomFormValidation {
    private $answers = [];
    public function getAnswers() {
        return $this->answers;
    }

    public function setAnswer($question, $answer) {
        $this->answers[$question] = $answer;
    }

    public function checkAnswer($question, $userAnswer) {
        if ($this->answers[$question] == $userAnswer) {
            return true;
            // return "<div class='good'>Ответ верный.</div>";
        } else {
            // return "<div class='bad'>Ответ неверный. Правильный ответ:<br><br>" . $this->answers[$question] . "</div>";
            return false;
        }
    }

    public function checkAnswers($userAnswers) {
        $results = [];
        foreach ($userAnswers as $question => $userAnswer) {
            $results[$question] = $this->checkAnswer($question, $userAnswer);
        }
        return $results;
    }
}