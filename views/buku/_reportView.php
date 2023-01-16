<?php
use app\models\Buku;
?>
<html>
	<body>
		<table class='table table-bordered'>
		<thead>
		<tr>
			<th>No</th>
            <th>Judul Buku</th>
            <th>Tahun Terbit</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            <th width="100px">Sinopsis</th>
            <th>Sampul</th>
		</tr>
		</thead>
        <tbody>
			<?php $no=1; foreach(Buku::find()->all() as $buku): ?>
		<tr>
			<td><?= $no ?></td>
            <td><?= $buku->nama ?></td>
            <td><?= $buku->tahun_terbit ?></td>
            <td><?= $buku->penulis->nama ?></td>
            <td><?= $buku->penerbit->nama ?></td>
            <td><?= $buku->kategori->kategori ?></td>
            <td><?= $buku->sinopsis ?></td>
            <td><img src="./image/{{ $buku->image }}" width="150px"></td>
		</tr>
		<?php $no++; endforeach ?>
		</tbody>
	</table>
	</body>
</html>