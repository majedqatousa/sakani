<?php 
	require 'education.php';
	$edu = new location;
	$edu->setId($_REQUEST['id']);
	$edu->setLat($_REQUEST['lat']);
	$edu->setLng($_REQUEST['lng']);
	$status = $edu->updateMarkerWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
 ?>