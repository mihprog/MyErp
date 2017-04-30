<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Position extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%position}}';
    }

    public function getWarehouse()
    {
        return $this->hasOne(Country::className(), ['id' => 'warehouse_id']);
    }

    public function getItem()
    {
        return $this->hasOne(Country::className(), ['id' => 'item_id']);
    }
}