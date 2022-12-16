<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19/12/2019
 * Time: 02.59
 */

use miloschuman\highcharts\Highcharts;
use app\models\Kategori;
use app\models\Penerbit;
use app\models\Penulis;
use app\models\Peminjaman;
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script> 
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div class="card card-primary">
    <div class="card-header with-border">
        <h3 class="card-title">Grafik Peminjaman Per Bulan</h3>
    </div>
        <div class="card-body">
            <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Jumlah Buku Yang Dipinjam Per Bulan'],
                        'exporting' => ['enabled' => true],
                        'xAxis' => [
                            'categories' => Peminjaman::getNama(),
                        ],
                        'yAxis' => [
                                'title' => ['text' => 'Jumlah Buku'],
                        ],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'column',
                                'name' => 'Buku',
                                'data' => Peminjaman::getGrafikList(),

                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>