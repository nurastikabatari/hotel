<div class="col-sm-12">
	<?php
	if ($this->session->flashdata('pesan')) {
		echo '<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	echo $this->session->flashdata('pesan');
	echo '</div>';
	}?>
	<table class="table table-responsive table-bordered">
		<thead>
		<a href="<?= base_url('hotel/input/')?>" class="btn btn-sm btn-primary">Tambah</a>
		<br></br>
			<tr>
				<th>No</th>
				<th>Nama Hotel</th>
				<th>Alamat</th>
				<th>Jumlah Kamar</th>
				<th>Fasilitas</th>
				<th>Tarif</th>
				<th>kontak</th>
				<th>Gambar</th>
				<?php if ($this->session->userdata('username')<>"") { ?>
				<th>Action</th>
				<?php }?>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($hotel as $key => $value) { ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $value->nama_hotel?></td>
				<td><?= $value->alamat?></td>
				<td><?= $value->jumlah_kamar?></td>
				<td><?= $value->fasilitas?></td>
				<td><?= $value->tarif?></td>
				<td><?= $value->kontak?></td>
				<td><img src="<?= base_url('gambar/'. $value->gambar)?>" width="150px"></td>
				<?php if ($this->session->userdata('username')<>"") { ?>
					<td>
						<a href="<?= base_url('hotel/edit/'.$value->id_hotel)?>" class="btn btn-sm btn-warning">Edit</a>
						<a href="<?= base_url('hotel/hapus/'.$value->id_hotel)?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah data ingin dihapus?')">Hapus</a>
					</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>
