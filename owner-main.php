<?php  include('insertuser.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Owner-main</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <link rel="icon" type="image/png" href="img/favicon.ico"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
 <link rel="icon" type="image/png" href="img/favicon.ico"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
 
  <!-- Navigation -->

    <nav class="navbar navbar-expand-xl navbar-dark bg-success fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">SAKANI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link " href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
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
          $sql ="SELECT * FROM meet WHERE status = '0' "; 
          $result = mysqli_query($db, $sql);
          $requests=mysqli_num_rows($result);

          if ($requests==0) {
            echo "<li class='nav-item'>
            <a class='nav-link active'href='owner-main.php'> My Resdiances(<?php echo $requests; ?>)</a>
          </li>";}
          else{
            echo"<li class='nav-item'>
            <a class='nav-link active'href='owner-main.php'><strong>
             My Resdiances (<span style='color:red;'> ".$requests." </span>) </strong></a>
          </li>";
          }
          ?>
      
           
            <?php 
              if (empty($_SESSION)) {
                echo' <li class="nav-item ">
                <div class="dropdown">
                <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="#">Login</a>
                <ul class="dropdown-menu">
                  <li><a href="login.php">Login</a></li>
                  <li><a href="singup.php">Sing Up</a></li>    
                </ul>
                </div>
                 </li>';
          }else{
              echo' <li class="nav-item ">
              <div class="dropdown">
            <a class="nav-link dropdown-toggle"data-toggle="dropdown" href="#">'.$_SESSION['username'].'</a>
            <ul class="dropdown-menu">
              <li><a href="owner-main.php">My acount </a></li>
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
      <p class="lead">The admin can inseat a new owners , delete owners , insaert resdiance , delete resdiance , edit resdiane information </p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

    <!-- Page Features -->
    <div class="row">
  

    </div>
  <div class="row text-center">
    <div class='col-sm-8'>
      <h3 class="h3-responsiv">You , as a owner can do this things :</h3>
          <table class="table table-striped table-responsive-md btn-table ownerTable">
          
        <tbody>
   

            <tr>
            <td>Add a new resdiance</td>
            <td>
            --
            </td>
            <td><form action="owner-add-resdiance.php">
              <button class="btn btn-primary form-btn">Add</button>
            </form></td>
          </tr>
           </tr>
            <tr>
            <td>Delete resdiance</td>
            <td>
              <div class="form-group">
                    <select class="form-control" name="gender">
                       <option value="0">--SELECT RESDIANCE --</option>
                    <option value="mail">
                       1
                    </option>
                     <option value="femail"> 
                      2
                      </option>
                  </select>
            </div>    
            </td>
            <td><form action="owner-delete-resdiance.php">
              <button class="btn btn-primary form-btn">Delete</button>
            </form></td>
          </tr>
          </tr>
           </tr>
            <tr>
            <td>Edit resdiance informations</td>
            <td>
              <div class="form-group">
                    <select class="form-control" name="gender">
                       <option value="0">--SELECT RESDIANCE --</option>
                    <option value="mail">
                       1
                    </option>
                     <option value="femail"> 
                      2
                      </option>
                  </select>
            </div>           
             </td>
            <td><form action="owner-edit-resdiance.php">
              <button class="btn btn-primary form-btn">Edit</button>
            </form></td>
          </tr>
          <tr>
            <td>---</td>
            <td>---</td>
            <td>---</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-sm-4">
      <h3>Laws And Rules</h3>
      <div class="alert alert-warning" role="alert">
       Please be aware that you are fully responsible for any information you enter into the system. The system does not belong to you in full form, but there are officials who are entitled to modify and delete your information in the event of any defect in the information entered
      </div>
    </div>
  </div>
      <div class="row">
      <div class="col-sm-8">
      <h3>Your Meetings</h3>
      <table>
        <table class='table table-striped table-responsive-md btn-table ownerTable'>
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

        $ownnm = $_SESSION['owner_id'];

        $sql = "SELECT * FROM `meet` WHERE `owner_id` = '$ownnm'";
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
             if($row['status'] != 4){
              echo "<td>".
                        "<form method='post' action='changemeetstatus.php'>
                          <input name='meetid' type='hidden' value='$meetidswap'>
                          <input name='meetstatus' type='hidden' value='1'>
                          <button class = 'btn btn-success' name='submit' type='submit' ><span><img src = 'img/icons/ok.png' class = 'icon'></span> </button>
                        </form>".
                        "<form method='post' action='changemeetstatus.php'>
                          <input name='meetid' type='hidden' value='$meetidswap'>
                          <input name='meetstatus' type='hidden' value='2'>
                          <button class = 'btn btn-danger'name='submit' type='submit' > <span><span><img src = 'img/icons/x.png' class = 'icon'></span></button>
                        </form>".
             "</td>";
             }else{
              echo "<td>no options</td>";
             }
             echo "</tr>";
           }

       //echo $_SESSION['owner_id'];

       
      ?>

      </tbody>
      </table>
    </table>
  </div>
</div>

    <!-- /.row -->
  <p>Owner Resdiance list ...</p>
  <?php
  $id=21;
     $query = "SELECT * FROM residence WHERE id='$id'";
             $results = mysqli_query($db, $query);
         
                 $size = mysqli_num_rows($results)/4;
      for ($i=0; $i < $size; $i++) { 
         echo "<div class='row text-center'>";
         for ($i2=0; $i2 < 4; $i2++) { 
          if($row = mysqli_fetch_assoc($results)){
            
     
            echo("<div class='col-sm-3'>
            <div class='card h-100'>
            <img class='card-img-top' src='http://placehold.it/500x325' alt=''>
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
              echo("  <a href='resdiance-detaels.php?id=".$row["id"]."'' class='btn btn-primary'>see detales </a>
              </div>
              </div>
              </div>");
            }
          }
         }
         echo("</div>");
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

</body>

</html>
