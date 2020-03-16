<?php  include('insertuser.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Services</title>

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
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">SAKANI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item active">
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
      <h1 class="display-3">Welcom in SAKANI  </h1>
      <p class="lead">From our site your as a studant in birzeat univarcity can search and book your resdiance ...</p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>
   <div class="container-login">

    <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form login-form">
              <span class="form-title p-b-20"> Add you  request </span>
               <form  action="" method="post" name="">
                <div class="alert alert-warning">
                  <strong>Warning!</strong> Your information will be avalabil (phone and eamil ) after added your request . 
                </div>
                <label>What You Need ? </label>
                   <div class="form-check p-b-10 ">
                      
                            <label class="form-check-label m-l-10"> <input type="radio" class="form-check-input" id="type1" value="Room" name="typeR" onclick="chkType();">Room</label>
                        
                            <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="roomType" value="Resdance" name="typeR" onclick="chkType();">Resdance</label>
                             <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="partnar" value="partnar" name="typeR" onclick="chkType();">Partnar </label>
         
              </div>
              <div class="form-check" id="numOfRooms" style="display:none;" >
                <label class="m-t-5">Number Of Rooms :</label><br>
                     <label class="form-check-label m-l-10"> <input type="radio" class="form-check-input" id="1" value="1" name="numOfRooms" onclick="chkRoom();" > 1</label>
                        
                      <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="2" value="2" name="numOfRooms" onclick="chkRoom();"> 2</label>
                       <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="3" value="3" name="numOfRooms" onclick="chkRoom();"> 3</label>
                       <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="4" value="4" name="numOfRooms" onclick="chkRoom();"> 4</label>
                      <label class="form-check-label m-l-35 "> <input type="radio" class="form-check-input" id="5" value="5" name="numOfRooms" onclick="chkRoom();">5</label>
              </div>
              <div class="form-group m-t-15" id="gender" style="display:none;" >   
                    <select class="form-control" name="gender" required>
                       <option value="null">--SELECT GENDER --</option>
                    <option value="mail">
                       Mail
                    </option>
                     <option value="femail"> 
                      Femail
                      </option>
          
                  </select>
              </div>
               <div class="form-group m-t-15" id="partnarroom" style="display:none;" >   
                    <select class="form-control" name="partnarroom" required>
                       <option value="null">--Room Type --</option>
                    <option value="singel">
                       Singel Room
                    </option>
                     <option value="shared"> 
                      Shared With Partnar
                      </option>
                  </select>
              </div>
               <div class="form-group" id="location" style="display:none;">
                    <select class="form-control" name="locationAera">
                       <option>--SELECT LOCATION AREA --</option>
                        <option value="albaldeai">
                        Al - baladeia 
                        </option>
                        <option value="altota"> 
                        Al - tota
                        </option>
                        <option value="abujasar"> 
                        Abu - jasar
                        </option>
                        <option value="almarj"> 
                        Al - marj
                        </option>
                        <option value="almfraq"> 
                        Al - mafraq
                        </option>
                        <option value="abuqash"> 
                        Abu - qash
                        </option>
                        <option value="alameeerhasan"> 
                        Al - ameer hasan
                        </option>
                  </select>
              </div>
              <div class="form-group">
               <div class="form-group" id="floor" style="display:none;">
                    <select class="form-control" name="floor">
                       <option>--SELECT FLOOR --</option>
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
                      <div class="form-group" id="price" style="display:none;">
                    <select class="form-control" name="price">
                       <option>--SELECT PRICE --</option>
                    <option value="200">
                       200 NIC 
                    </option>
                     <option value="300"> 
                     300 NIC 
                      </option>
                      <option value="400"> 
                      400 NIC 
                      </option>
                      <option value="500">
                     500 NIC 
                    </option>
                     <option value="600"> 
                      600 NIC
                      </option>
                      <option value="700"> 
                      700 NIC 
                      </option>
                    <option value="1000">
                     1000 NIC 
                    </option>
                     <option value="1500"> 
                      1500 NIC 
                      </option>
                      <option value="2000"> 
                      2000 NIC 
                      </option>
                  </select>
              </div>
                     
                  <div class="text-center ">
                     <button type="submit"name ="user-request" class=" btn btn-block send-button tx-tfm">Request</button>
                      <?php 
                      $q = "SELECT id from regester where username = ".$_SESSION['username'].""; 
                     $results = mysqli_query($db, $q);
                 

                      ?>
                  </div>
                <script type="text/javascript">
                     document.getElementById('numOfRooms').style.display ="none"; 
                    function chkType(){
                       if (document.getElementById("type1").checked == true) {
                         document.getElementById('numOfRooms').style.display ="block"; 
                         document.getElementById('gender').style.display ="block";
                         document.getElementById('location').style.display ="block";
                         document.getElementById('floor').style.display ="block";
                         document.getElementById('price').style.display ="block";
                         
                         
                         
                           
                       }
                        if (document.getElementById("roomType").checked == true) {
                         document.getElementById('numOfRooms').style.display ="block"; 
                          document.getElementById('gender').style.display ="block";
                         document.getElementById('location').style.display ="block";
                         document.getElementById('floor').style.display ="block";
                         document.getElementById('price').style.display ="block";
                       }
                       if (document.getElementById("partnar").checked == true) {
                        document.getElementById('numOfRooms').style.display ="none"; 
                        document.getElementById('gender').style.display ="block";
                        document.getElementById('location').style.display ="none";
                        document.getElementById('floor').style.display ="none";
                        document.getElementById('price').style.display ="block";
                        document.getElementById('partnarroom').style.display ="block";
                         
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
             
               </form>
            </div>
         </div>

      </div>

    <!-- Page Features -->

 
   
    <!-- /.row -->

  </div>
  <!-- /.container -->
</form>
</div>
</div>

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
