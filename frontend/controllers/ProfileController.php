<?php

namespace frontend\controllers;


use frontend\models\ProfileModel;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionIndex($userId)
    {
        $USER = \Yii::$app->user;
        if ($USER->can('updateOwnProfile', ['profileOwner' => $userId])||$USER->can('admin')) {
            echo "yes";
        } else {
            echo "no";
        }
    }

    public function actionSet($fieldName, $fieldValue)
    {
        $userId = \Yii::$app->user->getId();
        $profileModel = new ProfileModel();
        $profileModel->setProfileField($fieldName, $fieldValue, $userId);
    }
}