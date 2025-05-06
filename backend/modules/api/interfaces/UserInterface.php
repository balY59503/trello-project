<?php

namespace app\modules\api\interfaces;

interface UserInterface
{
    public function actionLogin();

    public function actionRegister();

    public function actionData();

    public function actionGetUsers();
}