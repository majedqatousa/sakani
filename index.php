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

<body id="body">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-xl navbar-dark bg-success fixed-top">
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
          <?php
 
        
          ?>
           <li class="nav-item ">
            <?php 
          //  $username= $_SESSION['username'];

           
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
             $ss = $_SESSION['username'];
             $sql = "SELECT * FROM `regester` WHERE `username` = '$ss'";
             $result = mysqli_query($db, $sql);
              echo' <div class="dropdown">
            <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="#">'.$_SESSION['username'].'</a>
            <ul class="dropdown-menu">';
              if($row = mysqli_fetch_assoc($result)){
             echo" <li><a href='user-acount.php?id=".$row['id']."'>My acount </a></li>";
             }
             else{
              echo" <li><a href='index.php'>My acount </a></li>";
             }
               echo '<li><a href="logout.php">Log Out</a></li>   
             
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
              
          $sql ="SELECT * FROM meet WHERE status = '0' "; 
          $result = mysqli_query($db, $sql);
          $requests=mysqli_num_rows($result);

          if ($requests==0) {
            echo "<li class='nav-item'>
            <a class='nav-link 'href='owner-main.php'> My Resdiances(<?php echo $requests; ?>)</a>
          </li>";}
          else{
            
            echo"<li class='nav-item'>
            <a class='nav-link 'href='owner-main.php'><strong>
             My Resdiances (<span style='color:red;'> ".$requests." </span>) </strong></a>
          </li>";
          }
         
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
    
<!--Carousel Wrapper-->
<div class="row">
  <div class="col-sm-12 mx-auto">
<div id="carousel-example-2" class="carousel slide carousel-fade m-t-50" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="img/bzu2.jpg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive"></h3>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="img/bzu4.jpg"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive"></h3>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="img/bzu3.jpg"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive"></h3>
        <p></p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
</div>
</div>
<!--/.Carousel Wrapper-->
    <!-- Page Features -->
   
    <!-- Search -->
<div class="container-2">
<form class="search-form m-t-20" action="search-result.php" method="GET">
<div class="row">
  <div class="col-sm-4 mx-auto p-b-10">
      <div class="input-group">
    <input type="text" name = "key"class="form-control" placeholder="Search this blog" required=""></input>
    <div class="input-group-append">
      <?php
        if (empty($_SESSION)) {
          echo "<a class='btn btn-success'onclick='loginalret()' style ='color:black;'value='Search' name ='search-btn'type='submit' href='login.php'>search</a>
          ";
        }else{
          echo "<input class='btn btn-success'value='Search' name ='search-btn'type='submit'>";  
        }
      ?>
        <span class="glyphicon glyphicon-search"></span>

    </div>
  </div> 
  </div>
  </div>

  </form>
  <div class="col-sm-12 mx-auto">
    <span class="filter-text" > If there are many results and it is difficult to find your request, filter the results </span>
    <button id = "filterBtn"class="btn btn-success m-r-12 m-l-12"">Filter</button>
    <span class="filter-text"> Or sort the results </span>
    <button id = "sort"class="btn btn-success m-r-12"">Sort</button>

  </div>
  <div class="row filters-box" id="filter_box">
    <div class="col-sm-2 mx-auto">
    <div class="form-group" name = "filters-box"id="filters-box">
      <label>
        <span class="filters-titel">Gender</span>
      </label>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Mail</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Femail</span>
      </label>
      </div>    

    </div>
    </div>
     <div class="col-sm-2 mx-auto">
    <div class="form-group"name = "filters-box" id="filters-box">
      <label>
        <span class="filters-titel">Type</span>
      </label>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Full-Residance </span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Room-Based</span>
      </label>
      </div>
    </div>
    </div>
     <div class="col-sm-2 mx-auto">
    <div class="form-group" name = "filters-box"id="filters-box">
      <label>
        <span class="filters-titel">Loaction Area</span>
      </label>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Al-marj</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>abu-jasar</span>
      </label>
     </div>
     <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Al - mafraq</span>
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Al - baladia</span>
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Al - tota</span>
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Abu-Qash</span>
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Al-Ameer hasan</span>
      </label>
    </div>

      </div>
    </div>
     <div class="col-sm-2 mx-auto">
    <div class="form-group"name = "filters-box" id="filters-box">
      <label>
        <span class="filters-titel">Availability</span>
      </label>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Available</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>Not Available</span>
      </label>
      </div>
    </div>
    </div>
         <div class="col-sm-2 mx-auto">
    <div class="form-group" name = "filters-box"id="filters-box">
      <label>
        <span class="filters-titel">Price</span>
      </label>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>100-200 NIC</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>200-500 NIC</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>200-500 NIC</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>500-700 NIC</span>
      </label>
      </div>      
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>700-1000 NIC</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>1000-1500 NIC</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>1500-3000 NIC</span>
      </label>
      </div>
    </div>
    
    </div>
    <div class="form-group" name = "filters-box"id="filters-box">
      <label>
        <span class="filters-titel">Review</span>
      </label>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>1 </span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>2</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>3</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>4</span>
      </label>
      </div>
      <div class="checkbox">
      <label>
        <input type="checkbox" name="">
        <span>5</span>
      </label>
      </div>
      <a class='btn btn-success' style = "color: black;"value='Applay' name ='Filter-btn'type='submit' href='filterR.php'>Apply</a>
    <button class="btn btn-success" ">Cancel</button>
    </div>
    </div>

  
   


  <?php 
      $resdiances = array(); 
     $sql = "SELECT id , description ,ownerName, price , systemReviwe,name,Floor FROM residence ";
     $result = mysqli_query($db, $sql);
     $size = mysqli_num_rows($result)/4;
      for ($i=0; $i < $size; $i++) { 
         echo "<div class='row text-center'>";
         for ($i2=0; $i2 < 4; $i2++) { 
          if($row = mysqli_fetch_assoc($result)){
            array_push($resdiances,$row['description']);
     
            echo("<div class='col-sm-3 m-t-15 '>
            <div class='card h-100 residenceBox'>
            <img class='card-img-top' src='img/bzu1.jpg'>
              <div class='card-body'>
                <h3 class='card-title'>".$row["name"]."</h3>
                <p class='card-text'>".$row["description"]."</p>
                <p class='card-text'style='font-weight:bold;'>".$row["price"]." NIC</p>
                
              </div>
              <div class='card-footer'>");
            if (empty($_SESSION)) {
              echo "<a href='login.php' onclick='loginalret()'class='btn btn-success'>see detales </a>
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

  ?>
   
    <!-- /.row -->
    <hr>

    <div class="row ">
      <?php
              $query = "SELECT requests.id,requests.type, requests.gender, requests.price, requests.roomstatus, regester.username ,regester.id
              from requests 
              INNER JOIN  regester ON requests.user_id = regester.id

              "; 
               $result = mysqli_query($db, $query);
              if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {

                echo '
                <div class="col-sm-7 userRequests">
                <img src="https://image.flaticon.com/icons/png/512/64/64572.png" id="user-logo">
                <span class="user-request-text"><span class="input m-r-18 m-l-15">' .$row["username"].'</span> need <span class="input m-l-15 m-r-18">
                '.$row["type"].'</span>  just <span class="input m-r-15 m-l-15">'.$row["gender"].'</span>  with price <span class="input m-l-15 m-r-18"> '.$row["price"].' NIC  '.$row["id"].'</span> </span>
                
                </div>
                <div calss="col-sm-2">
                <a href="intrested.php?id='.$row["id"].'" class="btn btn-success m-t-15"style=" box-shadow: 8px 8px 8px grey;">Intrested </a>
                </div>
                ';
              }
            }
              ?>


    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#filter_box").hide();
  $("#filterBtn").click(function(){
    $("#filter_box").toggle();
  });
});
</script>
<script>
function loginalret() {
  alert("You must login to continue");
}
function showfilterbox(){
var x = document.getElementBy("filters-box");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

}
</script>
</div>
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

</body>

</html>
