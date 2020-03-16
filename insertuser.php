<!--singup user-->
<?php


session_start();
//$_SESSION['error'];
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="sakani";

$db = mysqli_connect($host, $dbusername, $dbpassword , $dbname);


$errors = array(); 


if(isset($_POST['singUp'])){
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($fname)) { array_push($errors, "first name is required"); }
	if (empty($lname)) { array_push($errors, "last name is required"); }
	if (empty($gender)) { array_push($errors, "gender is required"); }
	if (empty($phone)) { array_push($errors, "phone is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }

	if (count($errors) == 0) {
			$query = "INSERT INTO regester (fname,lname,username,email,phone,gender,password)VALUES ('$fname','$lname','$username','$email','$phone','$gender','$password')";
			mysqli_query($db, $query);

			$_SESSION['success'] = "You are now logged in";
			header('location: successsingup.php');
		}
	}



	// login - user

		if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			//$password = md5($password);
			$query1 = "SELECT * FROM regester WHERE username='$username' AND password='$password'";
			$query2 = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$results1 = mysqli_query($db, $query1);
			$results2 = mysqli_query($db, $query2);
		
			if (mysqli_num_rows($results1) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['id']= $row['id'];
				
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
			elseif (mysqli_num_rows($results2) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
			else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	

			// login - owner
		if (isset($_POST['login_owner'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM owners WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['owner_id'] = $row['id'];
				$_SESSION['success'] = "You are now logged in";
				header('location: owner-main.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
//login admin 
if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			//$password = md5($password);
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
	// Add residance 

		if(isset($_POST['add-residance'])){
	$description = mysqli_real_escape_string($db, $_POST['description']);
	$location = mysqli_real_escape_string($db, $_POST['location']);
	$floor = mysqli_real_escape_string($db, $_POST['floor']);
	$price = mysqli_real_escape_string($db, $_POST['price']);

	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	
	if (empty($description)) { array_push($errors, "description is required"); }
	if (empty($location)) { array_push($errors, "location  is required"); }
	if (empty($lname)) { array_push($errors, "last name is required"); }
	if (empty($floor)) { array_push($errors, "floor is required"); }
	if (empty($price)) { array_push($errors, "price is required"); }

	if (count($errors) == 0) {
			$query = "INSERT INTO residance (description,location,floor,gender,price)VALUES ('$description','$location','$floor','$gender','$price')";
			mysqli_query($db, $query);

			
			header('location: successaddresdiance.php');
		}
	}
//admin Add owners 

	if(isset($_POST['add-user'])){
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($fname)) { array_push($errors, "first name is required"); }
	if (empty($lname)) { array_push($errors, "last name is required"); }
	if (empty($phone)) { array_push($errors, "phone is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }

	if (count($errors) == 0) {
			$query = "INSERT INTO owners (fname,lname,username,phone,password)VALUES ('$fname','$lname','$username','$phone','$password')";
			mysqli_query($db, $query);

			
			header('location: successaddowner.php');
		}
	}
	// admin-add-resdiance

	if(isset($_POST['admin-add-resdiance'])){
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$description = mysqli_real_escape_string($db, $_POST['description']);
	$locationArea = mysqli_real_escape_string($db, $_POST['location_area']);
	$floor = mysqli_real_escape_string($db, $_POST['floor']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
	$owner_id = mysqli_real_escape_string($db, $_POST['owner_id']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$type = mysqli_real_escape_string($db, $_POST['type']);
    $population = mysqli_real_escape_string($db, $_POST['population']);
    $numOfRooms = mysqli_real_escape_string($db, $_POST['numOfRooms']);
    $numOfAvRooms = mysqli_real_escape_string($db, $_POST['numOfAvalableRooms']);


	if (empty($description)) { array_push($errors, "description is required"); }
	if (empty($location)) { array_push($errors, "location  is required"); }
	if (empty($lname)) { array_push($errors, "last name is required"); }
	if (empty($floor)) { array_push($errors, "floor is required"); }
	if (empty($price)) { array_push($errors, "price is required"); }

	if (count($errors) == 0) {
		$query = "INSERT INTO `residence` (`name`,`description`,`location_area`,`type`,`price`,`Floor`,`Status`,`population`,`owner_id`)VALUES ('$name','$description','$locationArea','$type','$price','$floor','$population','$owner_id')";

			mysqli_query($db, $query);

			
			header('location: index.php');
		}
	}

	//search 

	if (isset($_GET['search-btn'])) {
		$key= $db->escape_string($_GET['key']);
		$key = 'esawi';
		$query ="SELECT * FROM residence WHERE 
		name = '$key' OR 
		description = '$key' OR
		price = '$key'
		";
		$result = mysqli_query($db, $query);

		if ($result->num_rows > 0) {
    // output data of each row
   			 while($row = $result->fetch_assoc()) {	
     		 
  		 	 }
		} else {
  			  echo "0 results";
		}
	}
	//show the comments 

	

	//user add comment 

	
            if (isset($_POST['btn_casomment'])) {
            $comment_text = mysqli_real_escape_string($db, $_POST['comment_text']);
           	// $residence_id = mysqli_real_escape_int($db, $_GET['id']);
            $query="INSERT INTO comment (comment_text) VALUES = ('$comment_text')";
            mysqli_query($db, $query);

            header('location:resdiance-detaels.php');
 }

 // user - requests 

 if(isset($_POST['user-request'])){
	$type = mysqli_real_escape_string($db, $_POST['typeR']);
	$numOfRooms = mysqli_real_escape_string($db, $_POST['numOfRooms']);
	$gender = mysqli_real_escape_string($db, $_POST['gender']);
	$locationArea = mysqli_real_escape_string($db, $_POST['locationArea']);
	$floor = mysqli_real_escape_string($db, $_POST['floor']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
	$roomtype = mysqli_real_escape_string($db, $_POST['partnarroom']);
	$userId = $_SESSION['user_id'];
	if (count($errors) == 0) {
			$query = "INSERT INTO requests (type,numOfRooms ,location,floor,gender,price,roomstatus,user_id)VALUES ('$type','$numOfRooms','$locationArea','$floor','$gender','$price','$roomtype','$userId')";
			mysqli_query($db, $query);

			
			header('location: index.php');
		}
	}
	// Add commant 
	if(isset($_POST['Add_commant'])){
	$text = mysqli_real_escape_string($db, $_POST['comment_text']);
	$user_id=$_SESSION['user_id2'];
	$residence_id=$_SESSION['residence_id'];
	
	if (count($errors) == 0) {
			$query = "INSERT INTO comment (comment_text,user_id ,residence_id)VALUES ('$text','$user_id','$residence_id')";
			mysqli_query($db, $query);

			
			header('location: resdiance-detaels.php?id='.$residence_id.'');
		}
	}


?>