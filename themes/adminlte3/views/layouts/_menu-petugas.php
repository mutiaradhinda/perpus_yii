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
        ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/dashboard/index-petugas']],
        ['label' => 'Data Buku', 'icon' => 'book', 'url' => ['buku/']],
        ['label' => 'Penerbit', 'icon' => 'building', 'url' => ['penerbit/']],
        ['label' => 'Penulis', 'icon' => 'pen', 'url' => ['penulis/']],
        ['label' => 'Kategori', 'icon' => 'th', 'url' => ['kategori/']],
        ['label' => 'Anggota', 'iconStyle'=>'far', 'icon' => 'user', 'url' => ['/anggota/index']],
        ['label' => 'Ganti Password', 'icon' => 'lock', 'url' => ['/user/change-password']],
        ['label' => 'Logout', 'iconStyle' => 'fas', 'icon'=>'sign-out-alt', 'url' => ['/site/logout'],'template'=>'<a class="nav-link {active}" data-method="post" href="{url}" {target}>{icon} {label}</a>'],
    ],
]);

?>
