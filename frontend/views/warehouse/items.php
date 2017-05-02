<?php
use \yii\helpers\Html;

$this->title = "Positions";
$this->registerJsFile('/js/items.js', ['depends' => ['\yii\web\JqueryAsset']]);
?>

<div class="panel panel-default">
    <div class="panel-heading"><?= Html::encode($warehouse['address']) ?></div>
    <ul class="list-group wh_positions">
        <?php foreach ($items as $item) { ?>
            <li id="position_<?= Html::encode($item['id']) ?>" data-user="<?= Html::encode($userId) ?>" class="list-group-item">
                <?= Html::encode($item['name'] . " ( " . $item['count'] . " ) " )?>
                <a class="btn btn-danger rm_pos" onclick="removePosition(<?= Html::encode($item['id']) ?>)">Remove position</a>
            </li>
        <?php } ?>
    </ul>
</div>

<a class="btn btn-success add_position">Add position</a>
