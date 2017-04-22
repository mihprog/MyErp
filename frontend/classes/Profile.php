<?php

namespace frontend\classes;

use yii\db\ActiveRecord;

class Profile extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%profile}}';
    }
}