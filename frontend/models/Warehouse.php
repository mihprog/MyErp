<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Warehouse extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%warehouse}}';
    }

    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['warehouse_id' => 'id']);
    }

    public function getWarehouses(int $userId)
    {
        $warehouses = $this::find()->asArray()->where(['owner_id' => $userId])->all();
        return $warehouses;
    }

    public function getById(int $warehouseId)
    {
        $warehouse = $this::find()->asArray()->where(['id' => $warehouseId])->one();
        return $warehouse;
    }

    public function getItems(int $warehouseId)
    {
        $items = \Yii::$app->db->createCommand("
                SELECT it.name, pos.id, pos.count FROM `item` it
                    INNER JOIN `position` pos ON it.id = pos.item_id
                    INNER JOIN `warehouse` wh ON pos.warehouse_id = wh.id
                WHERE wh.id = :wh_id
        ")
            ->bindValues([":wh_id" => $warehouseId])
            ->queryAll();
        return $items;
    }

    public function addPosition(int $warehouseId, int $itemId, int $count): bool
    {
        $command = \Yii::$app->db->createCommand("
                INSERT INTO `position` 
                VALUES(
                :wh_id,
                :item_id,
                :count
                )
        ")
            ->bindValues([
                ":wh_id" => $warehouseId,
                ":item_id" => $itemId,
                ":count" => $count
            ])
            ->execute();
        return $command == 1;
    }

    public function removePosition(int $positionId): bool
    {
        $command = \Yii::$app->db->createCommand("
                DELETE FROM `position` 
                WHERE id = :pos_id
        ")
            ->bindValues([":pos_id"=>$positionId])
            ->execute();
        return $command == 1;
    }
}