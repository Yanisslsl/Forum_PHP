<?php
  include 'connection_controller.php';
  include '../models/User.php';
  session_start();

 
  if (isset($_POST['change_account'])) {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    // $my_password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $user_id = mysqli_real_escape_string($mysqli, $_POST['id']);
    if($_POST['password'] == $_SESSION['current_user']->get_password()){
      $pass = $_POST['password'];
    } else {
      $pass = md5($_POST['password']);
    }
    $req = "UPDATE Users SET Username='$username', Password='$pass', Email='$email' WHERE ID='$user_id'";
    if ($mysqli->query($req) === TRUE) {
      $q = "SELECT * FROM Users WHERE ID = '$user_id'";
      $results = $mysqli->query($q);
      $user = mysqli_fetch_assoc($results);
      $current_user = new User($user['Username'], $user['Password'], $user['Email'], $user_id);
  	  $_SESSION['current_user'] = $current_user ;
      $_SESSION['status'] =  "Record updated successfully";
  	  header('location: ../views/account_view.php');
    } else {
      $_SESSION['status'] =  "Error updating record: " . $mysqli->error;
  	  header('location: ../views/account_view.php');

    }
  }

  if (isset($_POST['save_user'])) {
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    // $my_password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $user_id = mysqli_real_escape_string($mysqli, $_POST['id']);
    if($_POST['password'] == $_POST['id']){
      $pass = $_POST['password'];
    } else {
      $pass = md5($_POST['password']);
    }
    $req = "UPDATE Users SET Username='$username', Password='$pass', Email='$email' WHERE ID='$user_id'";
    if ($mysqli->query($req) === TRUE) {
      // $q = "SELECT * FROM Users WHERE ID = '$user_id'";
      // $results = $mysqli->query($q);
      // $user = mysqli_fetch_assoc($results);
      // $current_user = new User($user['Username'], $user['Password'], $user['Email'], $user_id);
  	  // $_SESSION['current_user'] = $current_user ;
      $_SESSION['status'] =  "Record updated successfully";
  	  header('location: ../views/edit_view_admin.php?edit='. $user_id);
    } else {
      $_SESSION['status'] =  "Error updating record: " . $mysqli->error;
  	  header('location: ../views/account_view.php');

    }
		
	}

  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    echo $id;
    $query = "DELETE FROM Users WHERE ID=$id";
  	$mysqli->query($query);
  	header('location: ../views/admin_dashboard.php');



  }




?>