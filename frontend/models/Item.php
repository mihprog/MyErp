<?php
/**
 * Created by PhpStorm.
 * User: mihprog
 * Date: 23.04.17
 * Time: 17:55
 */

namespace frontend\models;

use yii\db\ActiveRecord;

class Item extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%item}}';
    }

    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['item_id' => 'id']);
    }

    public function getByUser($userId)
    {
        return $this::find()->asArray()->where(["user_id"=>$userId])->all();
    }
}