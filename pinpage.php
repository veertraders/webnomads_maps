
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
	map.setView([position.coords.latitude,position.coords.longitude], 13);
	console.log(coord);
		
link_feed="https://en.wikipedia.org/w/api.php?action=query&format=json&prop=coordinates|pageimages|info|description|extracts&generator=geosearch&colimit=500&inprop=url&exintro=1&ggscoord="+coord+"&ggsradius=10000&ggslimit=50&origin=*&piprop=thumbnail|name|original&pithumbsize=200";
	console.log(link_feed);

	// now we will obtain coord of all the pages
	

	$.getJSON(link_feed, function(obj){
   console.log(obj["query"]);//analyse json pattern
   //console.log(keys(obj));
       //obtain keys and perform on the keys we are saving a loop with that...special note is that if we choose to offer more views we may have to work with looping or atleast an array .
	   var keys1 = $.map( obj["query"]["pages"], function( value, key ) {
  console.log(key);
  
  console.log(obj["query"]["pages"][key]["coordinates"][0]['lat']);
  console.log(obj["query"]["pages"][key]["coordinates"][0]['lon']);
  
  if(obj["query"]["pages"][key].hasOwnProperty('thumbnail')){

console.log(obj["query"]["pages"][key]["thumbnail"]["source"]);
          var thumbnail_source = obj["query"]["pages"][key]["thumbnail"]["source"];


var mGreen = L.marker([position.coords.latitude,position.coords.longitude]).bindPopup('Your location').addTo(map);
//smarker_name="mark"+obj["query"]["pages"][key]["pageid"];


 L.marker([obj["query"]["pages"][key]["coordinates"][0]['lat'],obj["query"]["pages"][key]["coordinates"][0]['lon']]).bindPopup(obj["query"]["pages"][key]["title"]).addTo(map);


//if loop is used as it is thumbnail is returned as an object and many times when it does not exists the loop stops . 
}
 
 if(obj["query"]["pages"][key].hasOwnProperty('extract')){


          var page_extract = obj["query"]["pages"][key]["extract"];
//if loop is used as it is thumbnail is returned as an object and many times when it does not exists the loop stops . 
}
 
 
          var title = obj["query"]["pages"][key]["title"];
		  var page_id=obj["query"]["pages"][key]["pageid"];//wiki page id 
          var description= obj["query"]["pages"][key]["description"];
          var full_url=obj["query"]["pages"][key]["fullurl"];
		  
				
	

	

	
	
	
	});
	  

	 });



	//------------till here





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
