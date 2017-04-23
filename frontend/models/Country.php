<?php

namespace frontend\models;


use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%country}}';
    }

    public function getProfile()
    {
        return $this->hasMany(ProfileModel::className(), ['country_id' => 'id']);
    }
}