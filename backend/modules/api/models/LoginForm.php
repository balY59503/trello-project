<?php

namespace app\modules\api\models;


use app\modules\api\resources\UserResource;
use Yii;
use yii\base\Model;

class LoginForm extends \app\models\LoginForm
{
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserResource::findByUsername($this->username);
        }

        return $this->_user;
    }
}