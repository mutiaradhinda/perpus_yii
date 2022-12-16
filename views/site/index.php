<?php

use app\components\Config;
use app\components\Session;
use yii\helpers\Html;

$this->title = 'Aplikasi SAKIP ' . Config::getNamaKabKota();

?>
<style>
    body{
        color: white;
        background-color: rgba(134, 4, 4, 0.787);
        background-image: url('images/background-home.jpg');
        background-position: top center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<div class="container mb-5">
    <div class="row my-5">
        <div class="col-md-4">
            <div style="text-align: center; margin-top: 140px">
                <img src="<?= Config::getImgLogo() ?>" alt="" style="width: 250px;">
            </div>
        </div>
        <div class="col-md-8">
            <div style="margin-top: 100px; background-color: rgba(0, 0, 0, 0.8); padding: 50px">
                <div style="font-size: 24px; margin-bottom: 20px; font-weight: bold">
                    
                </div>
                <div style="text-align: justify">
                   
                </div>
            </div>
        </div>
    </div>
</div>