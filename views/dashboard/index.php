<?php

use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;


$this->title = "Halaman Dashboard";

?>

<?= $this->render("_card-rekap"); ?>


<div class="row">
    <div class="col-sm-6">
        <div class="card">
			<div class="card card-primary">
   				<div class="card-header with-border">
        			<h3 class="card-title">Grafik Buku Berdasarkan Penulis</h3>
    			</div>
    		<div class="card-body">
<?= Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Penulis Buku'],
      'xAxis' => [
         'categories' => ['Ardhi Mohamad', 'Henry Manampiring', 'Alvi Syahrin']
      ],
      'yAxis' => [
         'title' => ['text' => 'Buku']
      ],
      'series' => [
         ['name' => 'Penulis', 'data' => [2, 4, 5]]
      ]
   ]
]); ?>
</div>
</div>
</div>
</div>

<div class="col-sm-6">
    <div class="card">
		<div class="card card-primary">
   			<div class="card-header with-border">
        		<h3 class="card-title">Grafik Buku Berdasarkan Penerbit</h3>
    		</div>
    	<div class="card-body">
<?= Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Penerbit Buku'],
      'xAxis' => [
         'categories' => ['Gramedia', 'Kompas', 'Baca']
      ],
      'yAxis' => [
         'title' => ['text' => 'Buku']
      ],
      'series' => [
         ['name' => 'Penerbit', 'data' => [15, 10, 5]]
      ]
   ]
]); ?>
</div>
</div>
</div>
</div>

<div class="col-sm-6">
    <div class="card">
		<div class="card card-primary">
   			<div class="card-header with-border">
        		<h3 class="card-title">Grafik Buku Berdasarkan Kategori</h3>
    		</div>
    	<div class="card-body">
<?= Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Kategori Buku'],
      'xAxis' => [
         'categories' => ['Fiksi', 'Self-Improvement', 'Sastra Klasik']
      ],
      'yAxis' => [
         'title' => ['text' => 'Buku']
      ],
      'series' => [
         ['name' => 'Kategori', 'data' => [20, 22, 17]]
      ]
   ]
]); ?>
</div>
</div>
</div>
</div>
</div>
