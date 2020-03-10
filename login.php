<?php
  include_once('database.php');
  $msg = '';
  if($_POST){
    $query = "SELECT id,username FROM `users` where username ='".$_POST['username']."' AND password='".$_POST['password']."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $con->close();
    if($row['id'] != ''){
      session_start();
      $_SESSION['KSUSERID'] = $row['id'];
      $_SESSION['KSUSERNAME'] = $row['username'];
      header('Location: list.php');
      exit;
    }else{
      $msg = 'Please enter valid username and password';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="VISHAL DOBARIYA <dobariyavishal91@gmail.com>">
      <title>Kids Wear Store</title>
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/sb-admin.css" rel="stylesheet">
      <link href="css/plugins/morris.css" rel="stylesheet">
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <style>
        body{
          margin: 0px;
        }
        #page-wrapper{
          min-height: 665px;
        }
      </style>
   </head>
   <body>
      <div id="page-wrapper">
        <br><br><br><br>
        <h2 style="text-align:center;">Kids Wear Store</h2>
        <br><br>
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                  <?php
                    if($msg != ''){
                      echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>'.$msg.'</div>';
                    }
                  ?>
                  <form role="form" method="post" action="">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" value="" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>
                  <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                  <p>Forgot password <a href="forgot.php">forgot password</a>.</p>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
  </body>
</html>
