<?php
  session_start();


  if(isset($_SESSION['current_user'])){
    header('location: views/home_view.php');
  
  }else {
    header('location: views/login_view.php');

  }

?>