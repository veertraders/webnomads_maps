
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Locate a Loo</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
<?php include "../header.php"; ?>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

	<style>

#map {
    height: 100%;
    width: 100vw;
}


		html, body {height: 100%;margin: 0;}


		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 80%;
		}



	</style>



<script>


//-----------------

	$(document).ready(function(){
//			var map = L.map('map').setView([22.5,74.5], 6);



				if ("geolocation" in navigator){ //check geolocation available 
		//try to get user current location using getCurrentPosition() method
	
		navigator.geolocation.getCurrentPosition(function(position){ 
			var coord=position.coords.latitude+"%7C"+position.coords.longitude;
	

		var map = L.map('map').fitWorld();
	 L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19,attribution: '© OpenStreetMap'}).addTo(map);
		map.setView([position.coords.latitude,position.coords.longitude], 17);
	

	


		console.log(coord);

var mGreen = L.marker([position.coords.latitude,position.coords.longitude]).bindPopup('I am a green leaf.').addTo(map);
		


			});
	}

	else{
		console.log("Browser doesn't support geolocation!");
	}

		//-----------------------------



})




</script>






	
</head>
<body>
<br><br> 
<div id='map'></div>

<br>
<div class="list-group">

<a class="btn btn-danger" href="" role="button" class="btn" data-toggle="">Loocate a Loo</a>
</div>

</body>



</body>
</html>
