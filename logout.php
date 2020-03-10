<?php
  session_start();
  $_SESSION['KSUSERID'] = '';
  unset($_SESSION['KSUSERID']);
  header('Location: login.php');
  exit;
?>
