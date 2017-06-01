<?php

namespace frontend\controllers;

use frontend\models\Country;
use frontend\models\ProfileModel;
use yii\web\Controller;

class ProfileController extends Controller
{
    private function countriesAsIdToName($countries)
    {
        $result = [];
        foreach ($countries as $key => $item) {
            $result[$item['id']] = $item['name'];
        }
        return $result;
    }

    public function actionIndex($userId)
    {
        $USER = \Yii::$app->user;
        if ($USER->can('updateOwnProfile', ['profileOwner' => $userId]) || $USER->can('admin')) {
            $profileModel = new ProfileModel();
            $profileData = $profileModel->getProfileData($userId);
            $countries = $this->countriesAsIdToName(Country::find()->asArray()->all());
            return $this->render('index', [
                'profileData' => $profileData,
                'countries' => $countries,
                'model' => $profileModel
            ]);
        } else {
            return $this->goHome();
        }
    }

    public function actionSet(int $userId, string $fieldName, string $fieldValue): bool
    {
        $USER = \Yii::$app->user;
        if ($USER->can('updateOwnProfile', ['profileOwner' => $userId]) || $USER->can('admin')) {
            $profileModel = new ProfileModel();
            return $profileModel->setProfileField($fieldName, $fieldValue, $userId);
        }
        return false;
    }
}