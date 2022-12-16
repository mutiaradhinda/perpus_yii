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
                        <p>Daftar Penerbit</p>

                        <h3><?= Yii::$app->formatter->asInteger(Penerbit::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <a href="<?=Url::to(['penerbit/index']);?>"class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Daftar Penulis</p>

                        <h3><?= Yii::$app->formatter->asInteger(Penulis::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-pencil-alt"></i>
                    </div>
                    <a href="<?=Url::to(['penulis/index']);?>"class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Daftar Kategori Buku</p>

                        <h3><?= Yii::$app->formatter->asInteger(Kategori::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list"></i>
                    </div>
                    <a href="<?=Url::to(['kategori/index']);?>"class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

