<?php
  session_start();
  // if(!isset($_SESSION['KSUSERID'])){
  //   header('Location: logout.php');
  //   exit;
  // }
  include_once('database.php');
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
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.dataTables.js"></script>
   </head>
   <body>
      <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="list.php">Kids Wear Store</a>
         </div>
         <!-- Top Menu Items -->
         <ul class="nav navbar-right top-nav">
            <li class="dropdown">
               <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                 <?php
                  if (isset($_SESSION['KSUSERNAME'])){
                   echo $_SESSION['KSUSERNAME'];
                  } else {
                    echo "test";
                  }
                  ?>
                 <b class="caret"></b></a>
               <ul class="dropdown-menu">
                  <li>
                     <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                  </li>
               </ul>
            </li>
         </ul>
         <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
         <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
               <li class="active>">
                  <a href="list.php"><i class="fa fa-fw fa-dashboard"></i> Cloth List</a>
               </li>
               <li class="">
                  <a href="cart.php"><i class="fa fa-fw fa-dashboard"></i> Basket</a>
               </li>
            </ul>
         </div>
         <!-- /.navbar-collapse -->
      </nav>
