<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $updateOwnProfile = $auth->getPermission('updateOwnProfile');

        $user = $auth->getRole('user');

        $auth->addChild($user, $updateOwnProfile);
    }
}