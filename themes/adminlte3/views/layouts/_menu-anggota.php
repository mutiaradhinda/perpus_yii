<?php

use app\components\Config;
use app\models\UserRole;
use app\modules\absensi\models\Pengaduan;
use hail812\adminlte\widgets\Menu;

/* @var $this \yii\web\View */

?>

<?= Menu::widget([
    'items' => [
        ['label' => 'MENU UTAMA', 'header' => true],

        ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/dashboard/index-anggota']],
        ['label' => 'Daftar Buku', 'icon' => 'book', 'url' => ['buku/']],
        ['label' => 'Buku Yang Dipinjam', 'icon' => 'exchange-alt', 'url' => ['peminjaman/']],
        ['label' => 'Logout', 'iconStyle' => 'fas', 'icon'=>'sign-out-alt', 'url' => ['/site/logout'],'template'=>'<a class="nav-link {active}" data-method="post" href="{url}" {target}>{icon} {label}</a>'],
    ],
]);

?>
