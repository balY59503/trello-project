<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\web\Response;
use yii\web\Controller;

class UsersController extends Controller
{
    public function actionIndex(){
        echo "HI";
    }
}