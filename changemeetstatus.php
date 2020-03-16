
<?php  include('insertuser.php'); ?>

<?php

  if (isset($_POST['meetid']) && isset($_POST['meetstatus'])) {

    $meetid = $_POST['meetid'];
    $status= $_POST['meetstatus'];


    $sql = "UPDATE `meet` SET status='$status' WHERE id='$meetid'";

    if (mysqli_query($db, $sql)) {
        header('location: owner-main.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);
  
}
  ?>