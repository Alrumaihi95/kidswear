<?php
//error_reporting(E_ALL);
require_once('database.php');

if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($link, $_POST['username']);
	$sql = "SELECT * FROM `users` WHERE username = '$username'";
	$res = mysqli_query($link, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		echo "Send email to user with password <br>";
	}else{
		echo "User name does not exist in database <br>";
	}


$r = mysqli_fetch_assoc($res);
$password = $r['password'];

$randomstr = generateRandomString();
$param_password = password_hash($randomstr, PASSWORD_DEFAULT);
$sql = "Update users SET password = '$param_password' WHERE users.username = '$username'";
$res = mysqli_query($link, $sql);




$to = $r['email'];

$subject = "Your Recovered Password";
$message = "Please use this password to login " . $randomstr;

// email send 


$subject = "Forgot password";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

mail($to,$subject,$message);
if(mail){
   	echo "Your Password has been sent to your email id <br>";
}else{
    echo "Failed to Recover your password, try again <br>";
}

//

}
//genereate random string function
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot password</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

<body>
<form class="form-signin" method="POST">
    <h2 class="form-signin-heading">Forgot Password</h2>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">@</span>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
    </div>
    <br />
    <button class="btn btn-lg btn-primary btn-block" type="submit">Forgot Password</button>
    <!-- <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a> -->
</form>
</body>
</html>