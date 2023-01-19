<?php
use app\models\Anggota;
?>
<html>
	<body>
		<table class='table table-bordered'>
		<thead>
		<tr>
			<th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
		</tr>
		</thead>
        <tbody>
			<?php $no=1; foreach(Anggota::find()->all() as $Anggota): ?>
		<tr>
			<td><?= $no ?></td>
            <td><?= $Anggota->nama ?></td>
            <td><?= $Anggota->alamat ?></td>
            <td><?= $Anggota->email ?></td>
		</tr>
		<?php $no++; endforeach ?>
		</tbody>
	</table>
	</body>
</html>