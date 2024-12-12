<div class="col-md-7">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Lokasi hotel
		</div>
		<div class="panel-body">
			
		<div id="map" style="height: 400px;"></div>


		</div>
	</div>
</div>



<div class="col-md-5">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Input Data
		</div>
		<div class="panel-body">
			<?php 
			if(isset($error_upload)){
				echo ('<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$error_upload.'</div>');
			}
			echo validation_errors('<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
			
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
			echo $this->session->flashdata('pesan');
			echo '</div>';
			}

			echo form_open_multipart('hotel/input'); 
			?>
		<div class="form-group">
			<label>Nama Hotel</label>
			<input name="nama_hotel" placeholder="Nama Hotel" value="<?= set_value('nama_hotel')?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input name="alamat" placeholder="Alamat" value="<?= set_value('alamat')?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Jumlah Kamar</label>
			<input name="jumlah_kamar" placeholder="Jumlah Kamar" value="<?= set_value('jumlah_kamar')?>" class="form-control" />
		</div>
		

		<div class="form-group">
			<label>Fasilitas</label>
			<input name="fasilitas" placeholder="Fasilitas" value="<?= set_value('fasilitas')?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>tarif</label>
			<input name="tarif" placeholder="Tarif" value="<?= set_value('tarif')?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Kontak</label>
			<input name="kontak" placeholder="Kontak" value="<?= set_value('Kontak')?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Latitude</label>
			<input name="latitude" placeholder="Latitude" value="<?= set_value('latitude')?>" class="form-control" require />
		</div>

		<div class="form-group">
			<label>Longitude</label>
			<input name="longitude" placeholder="Longitude" value="<?= set_value('longitude')?>" class="form-control" require />
		</div>

		<div class="form-group">
			<label>Gambar</label>
			<input type="file" name="gambar" class="form-control" required>
		</div>

		<div class="form-group">
			<label></label>
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			<button type="reser" class="btn btn-sm btn-success">Reset</button>
		</div>
		
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[-4.3982425924789945, 119.82869144274996];	
}

var map = L.map('map').setView([-4.3982425924789945, 119.82869144274996], 12);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
}).addTo(map);

map.attributionControl.setPrefix(false);
var marker = new L.marker(curLocation, {
	draggable:'true'
});

map.addLayer(marker);
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
</script>
