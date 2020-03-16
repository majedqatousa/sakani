<?php  include('insertuser.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resdiance-detaels</title>
        <meta name="viewport" content="initial-scale=1,width=device-width">
        <link rel="stylesheet" href="StarRating.css">
        <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
  <link href="css/util.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/favicon.ico"/>

</head>

<body>

  <?php

  if (isset($_POST['date']) && isset($_POST['time'])) {

    $date = $_POST['date'];  //from form
    $time = $_POST['time'];  //from form
    $user = $_SESSION['user_id2'];  //from session
    $owner_id = $_GET['owner'];  //from link
    $residence_id = $_GET['residance'];//from link
    
    $sql = "INSERT INTO `meet` (`date`,`time`,`user`,`owner_id`, `residence_id`)
             VALUES ('$date','$time','$user','$owner_id','$residence_id')";


    if (mysqli_query($db, $sql)) {
        header('location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);
  
}
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">SAKANI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link active" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="callus.php">Contact</a>
          </li>
          <?php
          if ($_SESSION['username']=='m_admin'||$_SESSION['username']=='w_admin' ){
            echo"
              <li class='nav-item'>
                <a calss='nav-link' href='admin-main.php'>Admin</a>
              </li>
              ";
          }
          ?>
           <li class="nav-item ">
            <?php 
              if (empty($_SESSION)) {
                echo' <div class="dropdown">
                <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="#">Login</a>
                <ul class="dropdown-menu ">
                  <li class="nav-item"><a class ="nav-link"href="login.php">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="singup.php">Sing Up</a></li>    
                </ul>
                </div>
                 </li>';
          }else{
              echo' <div class="dropdown">
            <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="#">'.$_SESSION['username'].'</a>
            <ul class="dropdown-menu">
              <li><a href="user-acount.php">My acount </a></li>
              <li><a href="logout.php">Log Out</a></li>    
            </ul>
            </div>
          </li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">Welcom in SAKANI </h1>
      <p class="lead">From our site your as a studant in birzeat univarcity can search and book your resdiance ...</p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

    <!-- Page Features -->
    <!-- Search -->
<div class="row">
  

  <div class='col-md-3'></div>
    <div class='col-md-6'>
        <form method='post' action="<?php
                                           echo $_SERVER['PHP_SELF'].
                                            '?residance='.$_GET['residance'].
                                           '&owner='.$_GET['owner'];
                                    ?>">
        <div class="form-group">
          <small>enter the date that you prefere to meet the owner in</small>
          <br>
          <label for="exampleInputEmail1">Date</label>
          <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your date">
         
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Time</label>
          <input type="time" name="time" class="form-control" id="exampleInputPassword1" placeholder="Time">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
<div class='col-md-3'></div>
   
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; sakani 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="StarRating.js"></script>
</body>

</html>
