<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading"> List Hotel</div>
				<div class="panel-body">
					<table class="table table-responsive table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Hotel</th>
								<th>Alamat</th>
								<th>Jumlah Kamar</th>
								<th>Fasilitas</th>
								<th>Tarif</th>
								<th>kontak</th>
								<th>Action</th>
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
									<td><a href="<?=  base_url('webgis/detail/'.$value->id_hotel)?>" class="btn btn-sm btn-success">Detail</a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
