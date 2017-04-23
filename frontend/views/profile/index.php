<?php
use \yii\helpers\Html;
$this->registerJsFile('/js/profile.js',['depends'=>['\yii\web\JqueryAsset']]);
$this->title = "Profile";
?>
<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#profile_panel">Profile</a></li>
        <li><a data-toggle="tab" href="#wh_panel">Warehouses</a></li>
    </ul>

    <div class="tab-content">
        <div id="profile_panel" class="tab-pane fade in active">
            <h3>Profile</h3>
            <div class="row">
                <div class="col col-sm-12 col-md-6">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="first_name" type="text" value="<?= Html::encode($profileData['first_name']); ?>" class="form-control"
                               placeholder="First name">
                    </div>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="last_name" type="text" value="<?= Html::encode($profileData['last_name']); ?>" class="form-control"
                               placeholder="Last name">
                    </div>
                    <div class="form-group input-group-lg">
                        <?= Html::dropDownList('countries', $profileData['country_id'], $countries, [
                                'class' => 'form-control',
                                'id' => 'country_id',
                        ])?>
                    </div>

                </div>
            </div>
        </div>
        <div id="wh_panel" class="tab-pane fade">
            <h3>Warehouses</h3>
            <p>Склады юзера</p>
        </div>
    </div>
</div>

