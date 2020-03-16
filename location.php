<?php 
	//session_start();
//$Rid =  $_SESSION['residence_id'];
	class location	{
		private $Rid;
		private $id;
		private $name;
		private $address;
		private $type;
		private $lat;
		private $price;
		private $description; 
		private $lng;
		private $conn;
		private $tableName = "location";
		private $tableName2 = "residence";
		//private $residenceId = $_SESSION['residence_id'];

		function setId($id) { $this->id = $id; }
		function getId() { return $this->id; }

		function setName($name) { $this->name = $name; }
		function getName() { return $this->name; }

		function setAddress($address) { $this->address = $address; }
		function getAddress() { return $this->address; }
		
		function setPrice($address) { $this->price = $price; }
		function getPrice() { return $this->price; }
		
		function setType($type) { $this->type = $type; }
		function getType() { return $this->type; }

		function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }
		  
		public function __construct() {
			require_once('db/DbConnect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();
		}

		public function getMarkersBlankLatLng() {
			$sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAllMarkers() {
			$sql = "SELECT location.lat, location.lng ,residence.description, residence.name ,residence.status,residence.id ,residence.price,residence.location_id ,residence.Gender, residence.floor FROM $this->tableName 
			INNER JOIN   residence ON residence.location_id = location.id
			WHERE location.location_status = '1'";
			$sql2 = "SELECT * from $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		public function getResidanceMarkers() {

			$sql = "SELECT location.lat, location.lng ,residence.description,residence.status, residence.name ,residence.price,residence.Gender, residence.location_id ,
					residence.floor FROM $this->tableName 
					INNER JOIN   residence ON residence.location_id = location.id
					WHERE location.location_status = '1' AND location.id='6	'";
			$sql2 = "SELECT * from $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
			public function getAvMarkers() {
			$sql = "SELECT location.lat, location.lng ,residence.description, residence.name ,residence.price,residence.location_id ,residence.floor FROM $this->tableName 
			INNER JOIN   residence ON residence.location_id = location.id
			WHERE location.location_status = '1' AND residence.status='0'";
			$sql2 = "SELECT * from $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		public function updateMarkerWithLatLng() {
			$sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':lat', $this->lat);
			$stmt->bindParam(':lng', $this->lng);
			$stmt->bindParam(':id', $this->id);

			if($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		}
	}

?>