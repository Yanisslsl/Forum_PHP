<?php
  include 'connection_controller.php';
  $errors = array(); 
  session_start();


  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
      $password = md5($password);
      echo $password;
      $query = "SELECT * FROM Users WHERE Username='$username' AND Password='$password'";
  	  $results = $mysqli->query($query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
      	header('location: ../views/home_view.php');
      }else {
        $_SESSION['error'] = "No account with this credentials exists! Please Register your account !";
  	    header('location: ../views/login_view.php');

      }
  }
?>
