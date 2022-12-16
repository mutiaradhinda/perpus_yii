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
        ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/dashboard/index']],
        ['label' => 'Data Buku', 'icon' => 'book', 'url' => ['buku/']],
        ['label' => 'Penerbit', 'icon' => 'building', 'url' => ['penerbit/']],
        ['label' => 'Penulis', 'icon' => 'pen', 'url' => ['penulis/']],
        ['label' => 'Kategori', 'icon' => 'th', 'url' => ['kategori/']],
        ['label' => 'Peminjaman', 'icon' => 'exchange-alt', 'url' => ['peminjaman/']],
        ['label' => 'Petugas', 'iconStyle'=>'far', 'icon' => 'address-card', 'url' => ['/petugas/index']],
        ['label' => 'Anggota', 'iconStyle'=>'far', 'icon' => 'user', 'url' => ['/anggota/index']],
        ['label' => 'Admin', 'iconStyle'=>'far', 'icon' => 'keyboard', 'url' => ['admin/']],
        ['label' => 'SISTEM', 'header' => true],
        ['label' => 'User', 'icon' => 'user', 'items' => [
            ['label' => 'Semua', 'iconStyle'=>'far', 'icon' => 'star', 'url' => ['/user/index']],
            ['label' => 'Admin', 'iconStyle'=>'far', 'icon' => 'star', 'url' => ['/user/index-admin']],
            ['label' => 'Petugas', 'iconStyle'=>'far', 'icon' => 'star', 'url' => ['/user/index-petugas']],
            ['label' => 'Anggota', 'iconStyle'=>'far', 'icon' => 'star', 'url' => ['/user/index-anggota']],
            ['label' => 'User Role', 'icon' => 'users', 'url' => ['/user-role']],
        ]],
        ['label' => 'User Baru', 'icon' => 'user', 'items' => [
            ['label' => 'Semua', 'iconStyle'=>'far', 'icon' => 'star', 'url' => ['/user/index']],
            ['label' => 'Admin', 'iconStyle'=>'far', 'icon' => 'star', 'url' => ['/user/index','id_user_role'=>UserRole::ADMIN]],
            ['label' => 'Petugas', 'iconStyle'=>'far', 'icon' => 'star', 'url' => ['/user/index','id_user_role'=>UserRole::PETUGAS]],
            ['label' => 'Anggota', 'iconStyle'=>'far', 'icon' => 'star', 'url' => ['/user/index','id_user_role'=>UserRole::ANGGOTA]],
            ['label' => 'User Role', 'icon' => 'users', 'url' => ['/user-role']],
        ]],
        ['label' => 'Ganti Password', 'icon' => 'lock', 'url' => ['/user/change-password']],
        ['label' => 'Logout', 'iconStyle' => 'fas', 'icon'=>'sign-out-alt', 'url' => ['/site/logout'],'template'=>'<a class="nav-link {active}" data-method="post" href="{url}" {target}>{icon} {label}</a>'],
    ],
]);

?>
