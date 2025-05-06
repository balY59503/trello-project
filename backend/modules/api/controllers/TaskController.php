<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\TaskResource;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;


class TaskController extends ActiveController
{
    public $modelClass = TaskResource::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];
        $behaviors['authenticator']['except'] = ['options'];
        $behaviors['cors'] = [
            'class' => Cors::class,
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->byUser(\Yii::$app->user->id)
        ]);
    }

    public
    function actionIndex()
    {
        echo "Test controller works";
    }
}