<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class ProfileModel extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%profile}}';
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function setProfileField(string $fieldName, string $fieldValue, int $userId):bool
    {
        if (!$this->validate()) {
            return false;
        }
        $profileRecord = self::findOne(["user_id"=>$userId]);
        if($profileRecord==null){
            $profileRecord = $this;
        }

        $profileRecord->user_id = $userId;
        $profileRecord->$fieldName = $fieldValue;
        return $profileRecord->save();
    }

    public function getProfileData(int $userId)
    {
        $profile = self::findOne(["user_id"=>$userId]);
        $profileData = self::find()->where(["user_id"=>$userId])->asArray()->one();
        $profileData['country_name'] = $profile->country->name;
        return $profileData;
    }

}