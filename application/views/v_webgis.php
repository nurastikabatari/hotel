<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class="panel-heading"> Pemetaaan Hotel</div>
				<div class="panel-body">

				<div id="map" style="height: 500px;"></div>

				</div>
			</div>
		</div>
	</div>
	
	<script>
		navigator.geolocation.getCurrentPosition(function(location) {
		var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

		//map view
		console.log(location.coords.latitude, location.coords.longitude);

		const map = L.map('map').setView([-4.3982425924789945, 119.82869144274996], 12);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	var icon_hotel = L.icon({
		iconUrl: '<?= base_url('icon/hotel.png')?>',
		iconSize: [35, 45]
	})
	
	<?php foreach ($hotel as $key => $value) {?>
		L.marker([<?= $value->latitude?>, <?= $value->longitude?>],{icon:icon_hotel}).addTo(map)
		.bindPopup("<img src='<?= base_url('gambar/' . $value->gambar)?>' width='100%'>" +
		"<b>Nama Hotel : <?= $value->nama_hotel?></b><br/>"+
		"Alamat :<?= $value->alamat?> </br>"+
		"kontak:<?= $value->kontak?> </br>"+
		"<a href ='<?= base_url('webgis/detail/' .$value->id_hotel)?>' class='btn btn-sm btn-default'>Detail</a>"+
		"<a href='https://www.google.com/maps/dir/?api=1&origin=" +
				location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value->latitude ?>,<?= $value->longitude ?>' class='btn btn-sm btn-default' target='_blank'>Rute</a>");
	<?php }?>

		});

	
	</script>
</div>