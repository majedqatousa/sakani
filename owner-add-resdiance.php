<?php  include('insertuser.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Owner-add-resdiance</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

  <link href="css/util.css" rel="stylesheet">
  
  <link rel="icon" type="image/png" href="img/favicon.ico"/>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">SAKANI</a>
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
           <li class="nav-item ">
            <?php 
              if (empty($_SESSION)) {
                echo' <div class="dropdown">
                <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="#">Login</a>
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
              <li><a href="myacount.php">My acount </a></li>
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
<div class="container-login">
    <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form login-form">
              <span class="form-title p-b-20"> Add a new resdiance </span>
               <form  action="" method="post" name="">
                  <div class="form-group">
                     <input type="text" name="name"  class="form-control my-input"  placeholder="Resdiance name" required>
                  </div>
                  <div class="form-group">
                     <input type="text" name="description"  class="form-control my-input"  placeholder="Resdiance description"required>
                  </div>
               
                  <div class="form-group">
                     <input type="text" name="price"  class="form-control my-input" placeholder="price">
                  </div>
                  <div class="form-group "style="border-bottom: 1px solid gray"> 
                  <label >Type Of Resdiance</label>
                  </div>
                   <div class="form-check p-b-10 ">
                      
                            <label class="form-check-label m-l-10"> <input type="radio" class="form-check-input" id="type1" value="type1" name="type" onclick="chkType();"> Type 1</label>
                        
                            <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="roomType" value="roomType" name="type" onclick="chkType();"> Room Based Type</label>
                  </script>
         
              </div>
              <div class="form-check" id="numOfRooms" style="display:none;" >
                <div class="form-group "style="border-bottom: 1px solid gray"> 
                  <label >Number Of Rooms :</label>
                  </div>
                     <label class="form-check-label m-l-10"> <input type="radio" class="form-check-input" id="1" value="1" name="numOfRooms" onclick="chkRoom();"> 1</label>
                        
                      <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="2" value="2" name="numOfRooms" onclick="chkRoom();"> 2</label>
                       <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="3" value="3" name="numOfRooms" onclick="chkRoom();"> 3</label>
                       <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="4" value="4" name="numOfRooms" onclick="chkRoom();"> 4</label>
                      <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="5" value="5" name="numOfRooms" onclick="chkRoom();">5</label>
              </div>
               <div class="form-check m-b-10" id="avalableRooms"  style="display:none;">
               <div class="form-group "style="border-bottom: 1px solid gray"> 
                  <label >Number Of avalabel Rooms :</label>
                  </div>
                  <div id="div1"style="display:none;" >
                     <label class="form-check-label m-l-10"> <input type="radio" class="form-check-input" id="1" value="1" name="numOfAvalableRooms" onclick="chkRoom();"> 1</label>
                  </div>
                  <div id="div2"style="display:none;">
                      <label class="form-check-label m-l-10 "> <input type="radio" class="form-check-input" id="2" value="2" name="numOfAvalableRooms" onclick="chkRoom();"> 2</label>
                  </div>
                  <div id="div3"style="display:none;">
                       <label class="form-check-label m-l-10 "> <input type="radio" class="form-check-input" id="3" value="3" name="numOfAvalableRooms" onclick="chkRoom();"> 3</label>
                  </div>
                  <div id="div4"style="display:none;">
                       <label class="form-check-label m-l-10 "> <input type="radio" class="form-check-input" id="4" value="4" name="numOfAvalableRooms" onclick="chkRoom();"> 4</label>
                  </div>
                  <div id="div5"style="display:none;">
                      <label class="form-check-label m-l-10 "> <input type="radio" class="form-check-input" id="5" value="5" name="numOfAvalableRooms" onclick="chkRoom();">5</label>
                  </div>
              </div>
                <script type="text/javascript">
                     document.getElementById('numOfRooms').style.display ="none"; 
                    function chkType(){
                       if (document.getElementById("type1").checked == true) {
                         document.getElementById('numOfRooms').style.display ="none"; 
                         document.getElementById('avalableRooms').style.display ="none"; 
                       }
                        if (document.getElementById("roomType").checked == true) {
                         document.getElementById('numOfRooms').style.display ="block"; 
                       }
                    }

                    function chkRoom(){
                        if (document.getElementById("1").checked == true) {
                          document.getElementById('avalableRooms').style.display ="block"; 
                          document.getElementById('div1').style.display ="block";
                          document.getElementById('div2').style.display ="none";
                          document.getElementById('div3').style.display ="none";
                          document.getElementById('div4').style.display ="none";
                          document.getElementById('div5').style.display ="none";
                            
                        }
                        if (document.getElementById("2").checked == true) {
                          document.getElementById('avalableRooms').style.display ="block"; 
                          document.getElementById('div1').style.display ="block"; 
                          document.getElementById('div2').style.display ="block"; 
                          document.getElementById('div3').style.display ="none";
                          document.getElementById('div4').style.display ="none";
                          document.getElementById('div5').style.display ="none";
                          
                           
                        }
                        if (document.getElementById("3").checked == true) {
                          document.getElementById('avalableRooms').style.display ="block"; 
                          document.getElementById('div1').style.display ="block"; 
                          document.getElementById('div2').style.display ="block"; 
                          document.getElementById('div3').style.display ="block"; 
                          document.getElementById('div4').style.display ="none";
                          document.getElementById('div5').style.display ="none";
                            
                        }
                        if (document.getElementById("4").checked == true) {
                          document.getElementById('avalableRooms').style.display ="block"; 
                          document.getElementById('div1').style.display ="block"; 
                          document.getElementById('div2').style.display ="block"; 
                          document.getElementById('div3').style.display ="block"; 
                          document.getElementById('div4').style.display ="block";
                          document.getElementById('div5').style.display ="none";
                           
                        }
                        if (document.getElementById("5").checked == true) {
                          document.getElementById('avalableRooms').style.display ="block"; 
                          document.getElementById('div1').style.display ="block"; 
                          document.getElementById('div2').style.display ="block"; 
                          document.getElementById('div3').style.display ="block"; 
                          document.getElementById('div4').style.display ="block"; 
                          document.getElementById('div5').style.display ="block";     
                        }
                    }
                  </script>
               ow
                    <select class="form-control" name="gender">
                       <option value="0">--SELECT GENDER --</option>
                    <option value="mail">
                       Mail
                    </option>
                     <option value="femail"> 
                      Femail
                      </option>
                      <option value="whatever"> 
                      Whatever
                      </option>
                  </select>
              </div>
              <div class="form-group">
                    <select class="form-control" name="floor">
                       <option value="0">--SELECT FLOOR --</option>
                    <option value="-1">
                       -1
                    </option>
                     <option value="0"> 
                      0
                      </option>
                      <option value="1"> 
                      1
                      </option>
                      <option value="2">
                      2
                    </option>
                     <option value="3"> 
                      3
                      </option>
                      <option value="4"> 
                      4
                      </option>
                    <option value="5">
                      5
                    </option>
                     <option value="6"> 
                      6
                      </option>
                      <option value="7"> 
                      7
                      </option>
                  </select>
              </div>
                      <?php 
                     
                       ?>
                  <div class="text-center ">
                     <button type="submit"name ="owner-add-resdiance" class=" btn btn-block send-button tx-tfm">Add</button>
                  </div>
                  <p class="m-t-18">You can add your residanc in our map from <a href="map/user-map.php">here</a></p>
               </form>
            </div>
         </div>
      </div>

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

</body>

</html>
