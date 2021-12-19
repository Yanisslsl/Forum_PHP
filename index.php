<?php

  if($_SESSION['username']){
    header('location: views/home_view.php');
  
  }else {
    header('location: views/login_view.php');

  }

?>