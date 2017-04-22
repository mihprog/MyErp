<?php

namespace frontend\controllers;


use frontend\models\ProfileModel;
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

//    public function actionCountry($userId, $countryId)
//    {
//        $profileModel = new ProfileModel();
//        $result = $profileModel->setCountry($userId, $countryId);
//        return $result;
//    }

    public function actionSet($fieldName, $fieldValue)
    {
        $userId = \Yii::$app->user->getId();
        $profileModel = new ProfileModel();
        $profileModel->setProfileField($fieldName, $fieldValue, $userId);
    }
}