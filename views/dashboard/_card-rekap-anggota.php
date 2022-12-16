<?php

use yii\helpers\Html;
use app\models\Buku;    
use app\models\Kategori;
use app\models\Penerbit;
use app\models\Penulis;
use app\models\User;
use app\models\Peminjaman;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Rekap</h3>
    </div>
    <div class="card-body">
        <div class="row">

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <p>Jumlah Buku</p>

                        <h3><?= Yii::$app->formatter->asInteger(Buku::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="<?=Url::to(['buku/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <p>Buku Yang Dipinjam</p>

                        <h3><?= Yii::$app->formatter->asInteger(Peminjaman::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-exchange-alt"></i>
                    </div>
                    <a href="<?=Url::to(['peminjaman/index']);?>"class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>