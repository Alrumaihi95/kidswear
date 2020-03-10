<?php
    include_once('database.php');
    if($_REQUEST['id']){
      $query = "SELECT image FROM `clothes` where id = ".$_REQUEST['id'];
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);
      if($row['image'] != 'default.png' && $row['image'] != '' ){
        unlink('images/'.$row['image']);
      }
      $sql = "DELETE FROM clothes where id = ".$_REQUEST['id'];
      $con->query($sql);
      header('Location: list.php?msg=success');
      exit;
    }else{
      header('Location: list.php');
      exit;
    }
?>
