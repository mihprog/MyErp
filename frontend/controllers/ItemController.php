<?php
/**
 * Created by PhpStorm.
 * User: mihprog
 * Date: 30.04.17
 * Time: 21:45
 */

namespace frontend\controllers;

use frontend\models\Item;
use yii\web\Controller;

class ItemController extends Controller
{
    public function actionIndex($userId)
    {
        $user = \Yii::$app->user;
        if ($user->can('admin') || $user->getId() == $userId) {
            $itemModel = new Item();
            $items = $itemModel->getByUser($userId);
            return $this->render('index',["items"=>$items]);
        } else {
            return $this->goHome();
        }
    }
}