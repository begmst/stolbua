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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'password2' => 'Password Repeat',
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

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UsersModel::findOne([
                'email' => $this->email,
            ]);
        }

        return $this->_user;
    }
}
