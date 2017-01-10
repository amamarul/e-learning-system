<?php

namespace App\Libraries;

class Util {
    public static function index()
    {
        return 123;
    }

    public static function flash($sessionName, $message, $important)
    {
        session()->flash($sessionName, $message);
        if($important == true) {
            session()->flash('message_important', true);
        }
    }

    public static function changeABCD($givenAnswer)
    {
        if ($givenAnswer == '1') {
            $givenAnswer = 'A';
        }
        if ($givenAnswer == '2') {
            $givenAnswer = 'B';
        }
        if ($givenAnswer == '3') {
            $givenAnswer = 'C';
        }
        if ($givenAnswer == '4') {
            $givenAnswer = 'D';
            return $givenAnswer;
        }
        return $givenAnswer;
    }

    public static function getHost()
    {
        return $_SERVER['HTTP_HOST'];
    }

}