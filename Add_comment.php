<?php 
	$residence_id=$_GET['resdiance_id'];
	$username = $_GET['username'];
if(isset($_POST['Add-commant'])){
	$text = mysqli_real_escape_string($db, $_POST['comment_text']);
	

	$ss = $_SESSION['username'];
    $sql = "SELECT * FROM `regester` WHERE `username` = '$ss'";
     $result = mysqli_query($db, $sql);
     $row = mysqli_fetch_assoc($result);
	$user_id=$row['id'];
	
	
	if (count($errors) == 0) {
			$query = "INSERT INTO `comment` (comment_text,user_id ,residence_id)VALUES ('$text','$user_id','$residence_id')";
			mysqli_query($db, $query);

			
			header('location: residence_detaels.php');
		}
	}
	echo $ss;
	?>