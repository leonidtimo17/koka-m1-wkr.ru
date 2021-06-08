<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Request[] $requests
 */
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password', 'passwordConfirm', 'agree'], 'required', 'message' => 'Нужно заполнить поле'],
            ['fio', 'match', 'pattern' => '/.[А-Яа-я\s\-]{5,}./u', 'message' => 'Только кириллические буквы, дефис и пробелы'],
            ['login', 'match', 'pattern' => '/.[a-zA-Z\.]{1,}./u', 'message' => 'Только латиница, точки; уникальный'],
            ['login', 'unique', 'message' => 'Такой логин уже существует'],
            ['email', 'email', 'message' => 'Неккоректные данные'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'Нужно дать согласие на обработку данных'],
            [['admin'], 'integer'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'admin' => 'Admin',
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Дать согласие на обработку данных',
        ];
    }
}
