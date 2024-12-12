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
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>.','</div>');
			
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
			echo $this->session->flashdata('pesan');
			echo '</div>';
			}

			echo form_open_multipart('hotel/edit/'. $hotel->id_hotel); 
			?>
		<div class="form-group">
			<label>Nama Hotel</label>
			<input name="nama_hotel" placeholder="Nama Hotel" value="<?=$hotel->nama_hotel?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input name="alamat" placeholder="Alamat" value="<?= $hotel->alamat?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Jumlah Kamar</label>
			<input name="jumlah_kamar" placeholder="Jumlah Kamar" value="<?= $hotel->jumlah_kamar?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Fasilitas</label>
			<input name="fasilitas" placeholder="Fasilitas" value="<?= $hotel->fasilitas?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Tarif</label>
			<input name="tarif" placeholder="Tarif" value="<?= $hotel->tarif?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Kontak</label>
			<input name="kontak" placeholder="Kontak" value="<?= $hotel->kontak?>" class="form-control" />
		</div>

		<div class="form-group">
			<label>Latitude</label>
			<input id="Latitude" name="latitude" placeholder="Latitude" value="<?= $hotel->latitude?>" class="form-control" readonly />
		</div>

		<div class="form-group">
			<label>Longitude</label>
			<input id="Longitude" name="longitude" placeholder="Longitude" value="<?= $hotel->longitude?>" class="form-control" readonly />
		</div>

			<img src="<?= base_url('gambar/'.$hotel->gambar)?>" width="120px">

			<div class="form-group">
			<label>Ganti Gambar</label>
			<input type="file" name="gambar" class="form-control">
		</div>
		<div class="form-group">
			<label></label>
			<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			<button type="reset" class="btn btn-sm btn-success">Reset</button>
		</div>
		
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script>
	var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[<?= $hotel->latitude?>, <?= $hotel->longitude?>];	
}

var map = L.map('map').setView([<?= $hotel->latitude?>, <?= $hotel->longitude?>], 14);
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

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	mymap.panTo(position);
});
map.addLayer(marker);
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
</script>
