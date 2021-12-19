<?php
  include 'connection_controller.php';
  session_start();
  $errors = array(); 

// si vous avez une erreur ici, remplacez le deuxième "root" par une string vide
  $result = $mysqli->query("SELECT * FROM Users"); 
	if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($mysqli, $_POST['username']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $my_password = mysqli_real_escape_string($mysqli, $_POST['password']);
 
  
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($mysqli, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Username'] === $username) {
      $_SESSION['error'] = "Username is already taken";
  	  header('location: ../views/register_view.php');
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) {
      $_SESSION['error'] = "Email is already taken";
  	  header('location: ../views/register_view.php');
      array_push($errors, "Email is already taken");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($my_password);//encrypt the password before saving in the database
  	$query = "INSERT INTO Users (`Username`, `Password`, `Email`, `Is_admin`) 
  			  VALUES('$username', '$password','$email', '0')";
  	$mysqli->query($query);
    unset($_SESSION['error']);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../views/home_view.php');
  } 
 

  }

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

  if (isset($_GET['logout'])) {
  	// session_destroy();
  	// unset($_SESSION['username']);
  	// header('location: ../views/login_view.php');
    echo $_GET['logout'];
    echo "hhhh";
  }

?>