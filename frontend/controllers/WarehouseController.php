<?php
/**
 * Created by PhpStorm.
 * User: mihprog
 * Date: 23.04.17
 * Time: 17:22
 */

namespace frontend\controllers;

use frontend\models\Warehouse;
use yii\web\Controller;

class WarehouseController extends Controller
{
    public function actionIndex($userId)
    {
        $user = \Yii::$app->user;
        if ($user->can('admin') || $user->getId() == $userId) {
            $warehouseModel = new Warehouse();
            $warehouses = $warehouseModel->getWarehouses($userId);
            return $this->render('index', ["userId" => $userId, "warehouses" => $warehouses]);
        } else {
            return $this->goHome();
        }
    }

    public function actionItems($userId, $warehouseId)
    {
        $user = \Yii::$app->user;
        if ($user->can('admin') || $user->getId() == $userId) {
            $warehouseModel = new Warehouse();
            $warehouse = $warehouseModel->getById($warehouseId);
            $position = $warehouseModel->getItems($warehouseId);
            return $this->render('items', ["userId" => $userId, "warehouse" => $warehouse, "items" => $position]);
        } else {
            return $this->goHome();
        }
    }

    public function actionAdd($userId, $warehouseId, $itemId, $count)
    {
        $user = \Yii::$app->user;
        if ($user->can('admin') || $user->getId() == $userId) {
            $warehouseModel = new Warehouse();
            $command = $warehouseModel->addPosition((int)$warehouseId, (int)$itemId, (int)$count);
            return $command;
        }
        return false;
    }

    public function actionRemove($userId, $positionId)
    {
        $user = \Yii::$app->user;
        if ($user->can('admin') || $user->getId() == $userId) {
            $warehouseModel = new Warehouse();
            $command = $warehouseModel->removePosition((int)$positionId);
            return $command;
        }
        return false;
    }
}