<?php
$this->title = "Warehouses";
?>
<h1>Warehouses</h1>
<div class="row">
    <?php foreach ($warehouses as $wh) { ?>
        <div class="thumbnail">
            <div class="caption">
                <h3><?= $wh['address'] ?></h3>
                <p><?= $wh['description'] ?></p>
                <p class="thumbnailButtons"><a href="<?=$wh['id']?>" class="btn btn-primary" role="button">Manage</a></p>
            </div>
        </div>
    <?php } ?>
</div>