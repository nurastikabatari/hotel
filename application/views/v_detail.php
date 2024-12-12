<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading"> Lokasi Hotel</div>
				<div class="panel-body">
				<div id="map" style="height: 700px;"></div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading"> Gambar Hotel</div>
				<div class="panel-body">
					<img src="<?= base_url('gambar/'. $hotel->gambar)?>" width="600px" height="300px">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-primary">
				<div class="panel-heading"> Data Hotel</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th width="200px">Nama Hotel</th>
								<th width="50px">: </th>
								<td><?= $hotel->nama_hotel?></td>
							</tr>
							<tr>
								<th width="200px">Alamat/th>
								<th width="50px">: </th>
								<td><?= $hotel->alamat?></td>
							</tr>
							<tr>
								<th width="200px">Jumlah Kamar</th>
								<th width="50px">: </th>
								<td><?= $hotel->jumlah_kamar?></td>
							</tr>
							<tr>
								<th width="200px">Fasilitas</th>
								<th width="50px">: </th>
								<td><?= $hotel->fasilitas?></td>
							</tr>
							<tr>
								<th width="200px">Tarif</th>
								<th width="50px">: </th>
								<td><?= $hotel->tarif?></td>
							</tr>
							<tr>
								<th width="200px">Kontak</th>
								<th width="50px">: </th>
								<td><?= $hotel->kontak?></td>
							</tr>
							<tr>
								<th width="200px">Latitude</th>
								<th width="50px">: </th>
								<td><?= $hotel->latitude?></td> 
							</tr>
							<tr>
								<th width="200px">Longitude</th>
								<th width="50px">: </th>
								<td><?= $hotel->longitude?></td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		</div>

	<script>
		const map = L.map('map').setView([<?= $hotel->latitude?>, <?= $hotel->longitude?>], 12);
	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	var icon_hotel = L.icon({
		iconUrl: '<?= base_url('icon/sekolah.png')?>',
		iconSize: [38, 50]
	})

	L.marker([<?= $hotel->latitude?>, <?= $hotel->longitude?>],{icon:icon_hotel}).addTo(map)
		.bindPopup("<b>Nama Hotel : <?= $hotel->nama_hotel?></b><br/>"+
		"Alamat :<?= $hotel->alamat?> </br>"+
		"Kontak :<?= $hotel->kontak?> </br>").openPopup();
	</script>


