var map;
var geocoder;

function loadMap() {
	 var bzu = {lat: 31.959398, lng: 35.181972};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: bzu
    });

    var marker = new google.maps.Marker({
      position: bzu,
      map: map,
      title: 'Birzeit University'
    });
	

    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();  
    codeAddress(cdata);

    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllMarkers(allData)
}

function showAllMarkers(allData) {
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		var h3 = document.createElement('h3');
		var p = document.createElement('p');
		var span = document.createElement('p');
		var text = document.createElement('span');
		var link = document.createElement('a');
		if(data.status=='0')
		{
			link.textContent='Avalabel now';
		}
		else{
			text.textContent="Not Avalabel ";
		}
		
		link.href = 'resdiance-detaels.php?id='+data.id;
		p.textContent = 'Price : '+data.price;
		strong.textContent = 'Floor : '+data.floor;
		h3.textContent=data.name;
		span.textContent='Gender = '+data.Gender;
		//text.textContent="This ";
		content.appendChild(h3);
		content.appendChild(strong);
		content.appendChild(p);
		content.appendChild(span);
		content.appendChild(text);
		content.appendChild(link);
		
		
		
		var img = document.createElement('img');
		img.src = 'img/home1.jpg';
		img.style.width = '100px';
		content.appendChild(img);
		if (data.status=='0') {
			var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map,
	      icon: {
     			 url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
    	  }
	    });
		}
		else{
			var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map,
	      icon: {
	      	url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
	      }
	    });
		}
		

	    marker.addListener('click', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}
function showAvMarkers(allData) {
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		var h3 = document.createElement('h3');
		var p = document.createElement('p');
		var span = document.createElement('span');

		p.textContent = 'Price : '+data.price;
		strong.textContent = 'Floor : '+data.floor;
		h3.textContent=data.name;
		span.textContent='Gender = '+data.Gender;

		content.appendChild(h3);
		content.appendChild(strong);
		content.appendChild(p);
		content.appendChild(span);
		
		
		
		var img = document.createElement('img');
		img.src = 'img/home1.jpg';
		img.style.width = '100px';
		content.appendChild(img);

		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map,
	      icon: {
     			 url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
    	  }
	    });

	    marker.addListener('click', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}
function codeAddress(cdata) {
   Array.prototype.forEach.call(cdata, function(data){
    	var latlng = data.lat + ' ' + data.lng;
	    geocoder.geocode( { 'latlng': latlng}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var points = {};
	        points.id = data.id;
	        points.lat = map.getCenter().lat();
	        points.lng = map.getCenter().lng();
	        updateMarkerWithLatLng(points);
	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
	});
}

function updateMarkerWithLatLng(points) {
	$.ajax({
		url:"action.php",
		method:"post",
		data: points,
		success: function(res) {
			console.log(res)
		}
	})
	
}