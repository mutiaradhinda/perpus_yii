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
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script> 
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div class="card card-primary">
    <div class="card-header with-border">
        <h3 class="card-title">Grafik Buku Berdasarkan Kategori</h3>
    </div>
        <div class="card-body">
            <?=Highcharts::widget([
                        'options' => [
                            'credits' => false,
                            'title' => ['text' => 'Kategori Buku'],
                            'exporting' => ['enabled' => true],
                            'plotOptions' => [
                                'pie' => [
                                    'cursor' => 'pointer',
                                ],
                            ],
                            'series' => [
                                [
                                    'type' => 'pie',
                                    'name' => 'Buku',
                                    'data' => Kategori::getGrafikList(),
                                ],
                            ],
                        ],
                    ]);?>
                </div>
            </div>

<div class="card card-primary">
        <div class="card-header with-border">
            <h3 class="card-title">Grafik Buku Berdasarkan Penerbit</h3>
        </div>
            <div class="card-body">
                <?=Highcharts::widget([
                        'options' => [
                            'credits' => false,
                            'title' => ['text' => 'Penerbit Buku'],
                            'exporting' => ['enabled' => true],
                            'xAxis' => [
                                'categories' => Penerbit::getNama(),
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'Jumlah Buku']
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
                                    'data' => Penerbit::getGrafikList(),
                                ],
                            ],
                        ],
                    ]);?>
                </div>
            </div>


<div class="card card-primary">
    <div class="card-header with-border">
        <h3 class="card-title">Grafik Buku Berdasarkan Penulis</h3>
    </div>
        <div class="card-body">
            <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Penulis Buku'],
                        'exporting' => ['enabled' => true],
                        'xAxis' => [
                            'categories' => Penulis::getNama(),
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
                                'type' => 'bar',
                                'name' => 'Buku',
                                'data' => Penulis::getGrafikList(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>