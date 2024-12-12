<div id="map" style="height: 500px;"></div>
<script>

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
		.bindPopup("<b>Nama Hotel : <?= $value->nama_hotel?></b><br/>"+
		"Alamat :<?= $value->alamat?> </br>"+
		"kontak:<?= $value->kontak?> </br>");
	<?php }?>
	
	</script>
