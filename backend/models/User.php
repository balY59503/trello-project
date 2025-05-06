<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Class User
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $access_token
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    // У меня название таблицы, отличное от названия модели и, чтобы не переименовывать и избежать ошибок, задаю имя таблицы подобным образом
    public static function tableName()
    {
        return '{{%users}}';
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->andWhere(['access_token' => $token])->one();
    }

    public static function findByUsername($username)
    {
        return self::find()->andWhere(['username' => $username])->one();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }

    // Здесь воспользовался security, поскольку пароль будет передаваться через хеш и вообще, так правильно
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}