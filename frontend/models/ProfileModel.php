<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class ProfileModel extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return '{{%profile}}';
    }

    public function setProfileField($fieldName, $fieldValue, $userId)
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

}