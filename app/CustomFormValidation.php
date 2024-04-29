<?php

namespace App;

class CustomFormValidation extends FormValidation {

    public function isCorrectQ1($data) {
        $error = $this->isNotEmpty($data);

        if ($error) {
            return $error;
        }
        
        $words = explode(' ', $data);
        if (count($words) < 10) {
            return "Теорема должна содержать не менее 10 слов.";
        }
        return null;
    }
}