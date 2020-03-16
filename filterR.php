<?php  include('insertuser.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
  <link href="css/util.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/favicon.ico"/>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
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
            <a class="nav-link" href="map.php">Map</a>
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
           <li class="nav-item ">
            <?php 
               if (empty($_SESSION)) {
                echo' <div class="dropdown">
                <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="login.php">Login</a>
                <ul class="dropdown-menu">
                  <li><a href="login.php">Login</a></li>
                  <li><a href="singup.php">Sing Up</a></li>    
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
              if ($_SESSION['username']=='m_admin'||$_SESSION['username']=='w_admin') {
                echo'  <li class="nav-item">
                          <a class="nav-link" href="admin-main.php">Admin</a>
                       </li>';
              }
              $username = $_SESSION['username'];
              $query = "SELECT * FROM owners WHERE username='$username'";
             $results = mysqli_query($db, $query);

              if (mysqli_num_rows($results) == 1) {
                echo  '<li class="nav-item">
                          <a class="nav-link" href="owner-main.php">My Resdiance</a>
                       </li>';
              }
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
    <form class="sarch-form" action="search-result.php" method="GET">
<div class="row">
  <div class="col-sm-4 mx-auto p-b-10">
      <div class="input-group">
    <input type="text" name = "key"class="form-control" placeholder="Search this blog" required=""></input>
    <div class="input-group-append">
      <input class="btn btn-secondary" value="Search" name ="search-btn"type="submit">
        <span class="glyphicon glyphicon-search"></span>
      
    </div>
  </div> 
  </div>
  </div>
  </form>

    <!-- Page Features -->
   
    <div class="row">
  <?php
   
    //$key= $db->escape_string($_GET['key']);
    //$key = 'esawi';
    $query ="SELECT * FROM residence WHERE 
    Status = '0' AND 
    Gender = 'mail'
    ";
    $result = mysqli_query($db, $query);

    if ($result->num_rows > 0) {
    // output data of each row

        
     $size = mysqli_num_rows($result)/4;
      for ($i=0; $i < $size; $i++) { 
         echo "<div class='row text-center'>";
         for ($i2=0; $i2 < 4; $i2++) { 
          if($row = mysqli_fetch_assoc($result)){
            //array_push($resdiances,$row['description']);
     
            echo("<div class='col-sm-3 m-t-15 '>
            <div class='card h-100 residenceBox'>
            <img class='card-img-top' src='img/home2.jpg'>
              <div class='card-body'>
                <h3 class='card-title'>".$row["name"]."</h3>
                <p class='card-text'>".$row["description"]."</p>
                <p class='card-text'>".$row["price"]." NIC</p>
                
              </div>
              <div class='card-footer'>");
            if (empty($_SESSION)) {
              echo "<a href='login.php' onclick='loginalret()'class='btn btn-primary'>see detales </a>
               </div>
              </div>
              </div>
              ";
            }else {
              echo("  <a href='resdiance-detaels.php?id=".$row["id"]."'' class='btn btn-success'>see detales </a>
              </div>
              </div>
              </div>");
            }
          }
         }
         echo("</div>");
      }
}

   ?>
    </div>
  <!-- /.container -->
</div>
  <!-- Footer -->
  <footer class="py-5 bg-success m-t-20">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; sakani 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
