<?php
use app\models\Kategori;
?>
<html>
	<body>
		<table class='table table-bordered'>
		<thead>
		<tr>
			<th>No</th>
            <th>Kategori</th>
		</tr>
		</thead>
        <tbody>
			<?php $no=1; foreach(Kategori::find()->all() as $Kategori): ?>
		<tr>
			<td><?= $no ?></td>
            <td><?= $Kategori->kategori ?></td>
		</tr>
		<?php $no++; endforeach ?>
		</tbody>
	</table>
	</body>
</html>