<?php

namespace app\modules\api\controllers;

use app\models\Task;
use app\modules\api\interfaces\UserInterface;
use app\modules\api\models\LoginForm;
use app\modules\api\models\RegisterForm;
use app\modules\api\resources\UserResource;
use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UnauthorizedHttpException;
use app\models\User;

class UserController extends Controller implements UserInterface
{

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'cors' => Cors::class
        ]);
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser();
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->register()) {
            return $model->user;
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }

    public function actionData()
    {
        $headers = Yii::$app->request->headers;
        if (!isset($headers['Authorization'])) {
            throw new UnauthorizedHttpException();
        }
        $accessToken = explode(" ", $headers['Authorization'])[1];
        $user = UserResource::findIdentityByAccessToken($accessToken);
        if (!$user) {
            throw new UnauthorizedHttpException();
        }
        return $user;
    }

    public function actionGetUsers()
    {
        $users = User::find()->all();
        return $this->asJson($users);
    }

    public function actionChangeUserExecutor($userId, $taskId, $newExecutorId)
    {
        $user = User::findOne($userId);
        if (!$user) {
            throw new NotFoundHttpException('User not found');
        }

        $task = Task::findOne(['id' => $taskId, 'created_by' => $user->id]);
        if (!$task) {
            throw new NotFoundHttpException('Task not found');
        }

        $newExecutor = User::findOne($newExecutorId);
        if (!$newExecutor) {
            throw new NotFoundHttpException('New executor not found');
        }

        $task->created_by = $newExecutor->id;

        if ($task->save()) {
            return ['message' => 'Executor of the task has been changed successfully'];
        } else {
            Yii::$app->response->statusCode = 422;
            return ['errors' => $task->errors];
        }
    }
}