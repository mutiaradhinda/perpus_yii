<?php
use app\models\Penulis;
?>
<html>
	<body>
		<table class='table table-bordered'>
		<thead>
		<tr>
			<th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
		</tr>
		</thead>
        <tbody>
			<?php $no=1; foreach(Penulis::find()->all() as $Penulis): ?>
		<tr>
			<td><?= $no ?></td>
            <td><?= $Penulis->nama ?></td>
            <td><?= $Penulis->alamat ?></td>
            <td><?= $Penulis->telepon ?></td>
            <td><?= $Penulis->email ?></td>
		</tr>
		<?php $no++; endforeach ?>
		</tbody>
	</table>
	</body>
</html>