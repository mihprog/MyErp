<?php

namespace frontend\controllers;


use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionIndex($userId)
    {
        if (\Yii::$app->user->can('updateOwnProfile', ['profileOwner' => $userId])) {
            echo "yes";
        } else {
            echo "no";
        }
    }
}