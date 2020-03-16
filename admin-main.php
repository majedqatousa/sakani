<?php  include('insertuser.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin-main</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

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
            <a class="nav-link " href="index.php">Home
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
             <li class="nav-item">
            <a class="nav-link active" href="admin-main.php">Admin</a>
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
      <p class="lead">The admin can inseat a new owners , delete owners , insaert resdiance , delete resdiance , edit resdiane information </p>
      <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

    <!-- Page Features -->

   <div class="row text-center">
    <div class='col-sm-9'>
          <table class="table table-striped table-responsive-md btn-table">
          
        <tbody>
           <tr >
           
            <td>Admin map</td>
            <td>---</td>
            <td><form action="map/admin-map.php">
              <button class="btn btn-primary">Open</button>
            </form></td>
          </tr>
          <tr >
            <td>Add a new land owner </td>
            <td>---</td>
            <td><form action="admin-add-user.php">
              <button class="btn btn-primary">Add</button>
            </form></td>
          </tr>
          <tr>
          
            <td>Delete a land owner </td>
            <td>
              <div class="">
              <input type="text" name="deleteLandOwner" class="form-control" placeholder="Enter the name of the land owner you want to delete it ">
              </div>
            </td>
            <td><form action="admin-delete-user.php">
              <button class="btn btn-primary">Delete</button>
            </form></td>
          </tr>
            <tr>
            <td>Add a new resdiance</td>
            <td>
            --
            </td>
            <td><form action="admin-add-resdiance.php">
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
                       Mail
                    </option>
                     <option value="femail"> 
                      Femail
                      </option>
                  </select>
            </div>            </td>
            <td><form action="admin-delete-user.php">
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
                       Mail
                    </option>
                     <option value="femail"> 
                      Femail
                      </option>
                  </select>
            </div>            </td>
            <td><form action="admin-delete-user.php">
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
    <div class="col-sm-3">
      <h3>some inforamtions</h3>
      <p>info ......  </p>
    </div>
   </div>
    <!-- /.row -->

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
