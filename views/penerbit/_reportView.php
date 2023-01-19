<?php
use app\models\Penerbit;
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
			<?php $no=1; foreach(Penerbit::find()->all() as $Penerbit): ?>
		<tr>
			<td><?= $no ?></td>
            <td><?= $Penerbit->nama ?></td>
            <td><?= $Penerbit->alamat ?></td>
            <td><?= $Penerbit->telepon ?></td>
            <td><?= $Penerbit->email ?></td>
		</tr>
		<?php $no++; endforeach ?>
		</tbody>
	</table>
	</body>
</html>