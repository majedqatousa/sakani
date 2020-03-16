<?php  include('insertuser.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My acount</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  
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
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home
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
      <h1 class="display-3">My Acount </h1>
      <p class="lead">From our site your as a studant in birzeat univarcity can search and book your resdiance ...</p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

<div class="container-login">
    <div class="row">

    <div class='col-sm-6'>
               <table class="table">
          <thead>
            <tr>
              <th scope="col">date</th>
              <th scope="col">time</th>
              <th scope="col">user</th>
              <th>residence</th>
              <th>status</th>
              <th>options</th>
            </tr>
          </thead>
          <tbody>
              <?php

                $userid = $_GET['id'];

                $sql = "SELECT * FROM `meet` WHERE `user` = '$userid'";
                $results1 = mysqli_query($db, $sql);
                  while($row = mysqli_fetch_assoc($results1)) {
                     echo "<tr>";
                    
                     echo "<td>".$row['date']."</td>";
                     echo "<td>".$row['time']."</td>";
                     echo "<td>".$row['user']."</td>";
                     echo "<td>".$row['residence_id']."</td>";

                     $statusswap = '';
                     if($row['status'] == 0){
                      $statusswap = 'wait';
                     }elseif ($row['status'] == 1) {
                       $statusswap = 'accept';
                     }elseif ($row['status'] == 2) {
                       $statusswap = 'reject';
                     }elseif ($row['status'] == 4) {
                       $statusswap = 'canceled';
                     }
                     

                     echo "<td>".$statusswap."</td>";

                     $meetidswap = $row['id'];
                     echo "<td>".
                                "<form method='post' action='changemeetstatususer.php'>
                                  <input name='meetid' type='hidden' value='$meetidswap'>
                                  <input name='meetstatus' type='hidden' value='4'>
                                  <input class='btn btn-success'name='submit' type='submit' value='cancel meeting'>
                                </form>".
                                
                     "</td>";
                     echo "</tr>";
                   }

               

              ?>

              </tbody>
        </table>
    </div>
         <div class="col-md-4 mx-auto">
            <div class="myform form login-form">
              <span class="form-title">My acount informations</span>
              <?php
              $userid = $_GET['id'];
             
               $query = "SELECT * FROM `regester` WHERE `id`='$userid'";

               $result = mysqli_query($db, $query);
            
               $row = mysqli_fetch_assoc($result);
       
                  $fname=$row['fname'];
                  $lname=$row['lname'];
                  $username=$row['username'];
                  $email= $row['email'];
                  $phone=$row['phone'];
                  $gender=$row['gender'];
                
 
              ?>
               <form action="" method="post" name="singUp">
                  <div class="form-group">
                     <input type="text" name="fname" value=<?php echo"".$fname."" ?> class="form-control my-input" id="name" placeholder="First name " required>
                  </div>
                  <div class="form-group">
                     <input type="text" name="lname" value=<?php echo"".$lname."" ?>  class="form-control my-input" id="email" placeholder="last name"required>
                  </div>
                  <div class="form-group">
                     <input type="text" name="username" value=<?php echo"".$username."" ?> class="form-control my-input" id="email" placeholder="Username">
                  </div>
                        <div class="form-group">
                     <input type="email" name="email" value=<?php echo"".$email."" ?>  class="form-control my-input" id="email" placeholder=" Email">
                  </div>

                  <div class="form-group">
                     <input type="text" name="phone" value=<?php echo"".$phone."" ?>  class="form-control my-input" id="email" placeholder="phone">
                  </div>

                  <div class="form-group">
                     <input type="text" name="gender"  disabled value=<?php echo"".$gender."" ?>  class="form-control my-input" id="gender" placeholder="phone">
                  </div>
            
                  <div class="text-center ">
                     <button type="submit"name ="singUp" class=" btn btn-block send-button tx-tfm">Save</button>
                  </div>
                  <div class="col-md-12 ">
              
                 
                  <p class="small mt-3">By signing up, you are indicating that you have read and agree to the <a href="#" class="ps-hero__content__link">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                  </p>
               </form>
            </div>
         </div>
      </div>

  </div>
       <div class="row">
    <
  </div>
  <!-- /.container -->
</form>
</div></div>
  <!-- Footer -->
  <footer class="py-5 bg-sucess">
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
