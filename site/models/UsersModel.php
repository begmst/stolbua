<?php

namespace app\models;

use Yii;

class UsersModel extends Users
{
    public $password2 = '';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['password2'], 'required'],
            [['password2'], 'compare', 'compareAttribute' => 'password'],
        ]);
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);
        if ($this->isNewRecord) {
            $this->password = self::cryptPassword($this->password);
        }
    }

    public static function cryptPassword($password) {
        $res = md5($password.'lanimret');
        return $res;
    }
}
