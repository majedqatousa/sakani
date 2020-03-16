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
<style type="text/css">
  #map{
    height: 100%;
  }
  
  #data, #allData {
      display: none;
  }
  
</style>
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
<style type="text/css">
    
  </style>
    <!-- Jumbotron Header -->
   <div class="jumbotron my-4 jumbotron-detaels">
      <h1 class="display-3 jumbotron-h">SAKANI  </h1>
      <p class="lead jumbotron-p">From our site your as a studant in birzeat univarcity can search and book your resdiance ...</p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </div>

    <!-- Page Features -->
    <!-- Search -->
<div class="row">
  
  
  
  <?php 

    $id =$_GET['id'];
    $query = "SELECT * FROM residence WHERE id ='$id'";
    $ownerid = '';
    $result = mysqli_query($db, $query);

  if( $row = mysqli_fetch_assoc($result)){
    $ownerid = $row['owner_id'];
     $_SESSION['residence_id']=$row['id'];
      echo"
      <div class='col-sm-8 mx-auto'>
        <table class='table table-striped table-responsive-md btn-table residenceTable'>
         <tbody>
         <tr>
          <td>Resdiance id</td>
          <td>".$row['id']."</td>
          </tr>
          <tr>
          <tr>
          <td>Resdiance name</td>
          <td>".$row['name']."</td>
          </tr>
          <tr>
          <td>Resdiance description</td>
          <td>".$row['description']."</td>
          </tr>
          <tr>
          <td>Resdiance Price</td>
          <td>".$row['price']." NIC </td>
          </tr>
          <tr>
          <td>Resdiance Status</td>
          <td>".$row['Status']."</td>
          </tr>
          <tr>
          <td>Permitted population</td>
          <td>".$row['population']."</td>
          </tr>
          
          <tr>
          <td>Resdiance Type</td>
          <td>".$row['type']."</td>
          </tr>
          ";
          if ($row['type']=='roomType') {
            echo"
          <tr>
          <td>Number Of Rooms </td>
          <td># 4</td>
          </tr>

          <tr>
          <td>Rooms avalabel </td>
          <td># 3</td>
          </tr>

          ";
          }else{
           
          }
          echo "
          <tr>
          <td>Resdiance gender</td>
          <td>".$row['Gender']."</td>
          </tr>
           <tr>
          <td>Resdiance Floor</td>
          <td>".$row['Floor']."</td>
          </tr>
           <tr>
          <td>Resdiance Owner Name</td>
          <td>".$row['ownerName']."</td>
          </tr>
           <tr>
          <td>Resdiance Loacation</td>
          <td>".$row['location_area']."</td>
          </tr>";
           $username = $_SESSION['username'];
              $query = "SELECT * FROM owners WHERE username='$username'";
             $results = mysqli_query($db, $query);

              if (mysqli_num_rows($results) == 1) {
                $_SESSION['ownerid']=$row['id'];
                $ownerID = $row['id'];
                  echo "

              <tr>
                 <td>Put your residence in the map </td>
                 <td>
                  
                   <a class = 'btn btn-primary m-l-10' href='map/user-map.php'>put now </a>
                 </td>
              </tr>
            ";
       if ($row['Status']==0) {
            $shokid=$_GET['id'];

            
            echo "
              <tr>
                 <td>This Resdiance is avalabel now </td>
                 <td>
                  
                 
                 </td>
              </tr>
            ";
          }elseif ($row['Status']==1) {
             echo "
              <tr>
                 <td>This Resdiance is <strong>NOT </strong>avalabel now </td>
                 
              </tr>
            ";
          }
        }
          else {
             if ($row['Status']==0) {
            $shokid=$_GET['id'];

            
            echo "
              <tr>
                 <td>This Resdiance is avalabel now </td>
                 <td>
                  
                   <a class = 'btn btn-primary m-l-10' href='book.php?residance=$shokid&owner=$ownerID'>Book now</a>
                 </td>
              </tr>
            ";
          }elseif ($row['Status']==1) {
             echo "
              <tr>
                 <td>This Resdiance is <strong>NOT </strong>avalabel now </td>
                 <td><button class = 'btn btn-primary'disabled>Book now </button></td>
              </tr>
            ";
          }
          }
              
         
          echo"
          </tbody>
          </table>  
        
           </div>
           <div class='col-sm-4 mx-auto'>
          <img class='card-img-top' src='img/home3.jpg' alt='home3'>
      
           ";
    
          include('star-test1.php');


         // echo "</div>";
     
          }

          ?>
          <?php 
          require 'location.php';
          $location = new location;
          $coll = $location->getMarkersBlankLatLng();
          $coll = json_encode($coll, true);
          echo '<div id="data">' . $coll . '</div>';

          $allData = $location->getResidanceMarkers();
          $allData = json_encode($allData, true);
          echo '<div id="allData">' . $allData . '</div>';      
         ?>
          <div id="map" style="border: 1px solid black; height: 250px;">
            

          </div>
    </div>
    
   </div>
    <!-- /.row -->
    <div class="row">
      <?//php echo $_GET['id'] ?>
      <div class="col-sm-8 mx-auto" >
          <form class="clearfix"  method="post" id="comment_form">
            <h4>Post a comment:</h4>
            <textarea placeholder="Enter comment here " name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
            <button type='submit' class='btn btn-success' name="Add_commant">Comment</button>
            <?php
              $username = $_SESSION['username'];
              $sql1 = "SELECT * FROM `regester` WHERE `username` = '$username'";
              $result = mysqli_query($db, $sql1);
              $row = mysqli_fetch_assoc($result);
             
              $user_id=$row['id'];
              $_SESSION['user_id2']=$user_id;
              $residence_id=$_SESSION['residence_id'];
              echo $user_id ;
              echo $residence_id;
            ?>
          </form>
      </div>
      <div class="col-sm-4 mx-auto">
        <p><strong> some info ... </strong></p>
        
      </div>

 
    </div>
  
      <?php
       $id =$_GET['id'];
      //echo $id;
       $sql = "SELECT * FROM comment WHERE resdiance_id = '$id'";
     $result = mysqli_query($db, $sql);
     $size = mysqli_num_rows($result);
     for ($i=0; $i < $size ; $i++) { 
       if($row = mysqli_fetch_assoc($result)){
          echo "<div class='row commentDiv'>";
          echo "
              <div class = 'col-sm-2 commentUser'> 
               ".$row['user_id']."
               </div>
               <div class = 'col-sm-10 commentText'>
               ".$row['comment_text']."
               </div>

                ";
       }
       echo"</div>";
     }
      

  ?>

   
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-success">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; sakani 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="StarRating.js"></script>

 <!-- Google map js --> 
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD4oNR07Xxkyq51br8r5zI_1poBi5BBOM&callback=loadMap">
</script>
<script type="text/javascript" src="js/googlemap.js"></script>
</body>

</html>
