<?php

namespace app\models;

use Yii;

class RegForm extends User
{
    public $confirm_password;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                ['username', 'email', 'full_name', 'phone', 'password', 'confirm_password'],
                'required'
            ],
            [
                ['full_name'], 
                'match', 
                'pattern' => '/^[А-Яа-яЁё\s\-]+$/u', 
                'message' => 'Допустимы только кириллические символы, пробелы и тире.',
            ],
            [
                ['username'],
                'match',
                'pattern' => '/^[A-Za-z0-9]{5,}$/',
                'message' => 'Используйте минимум 5 латинских букв или цифр'
            ],
            [
                ['phone'],
                'match',
                'pattern' => '/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/',
                'message' => 'Телефонный номер должен быть в формате +7(XXX)-XXX-XX-XX',
            ],
            [
                ['password'],
                'match',
                'pattern' => '/^[A-Za-z0-9]{6,}$/',
                'message' => 'Используйте минимум 6 латинских букв или цифр'
            ],
            [['email'], 'email'],
            [
                ['confirm_password'],
                'compare',
                'compareAttribute' => 'password'
            ],
            [['username', 'email'], 'unique'],
        ];
    }
}
