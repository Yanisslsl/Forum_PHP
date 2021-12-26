<?php
  include 'connection_controller.php';
  include '../models/User.php';
  session_start();

 
  if (isset($_POST['create_article'])) {
    $title = mysqli_real_escape_string($mysqli, $_POST['title']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $user_id = $_SESSION['current_user']->get_id();
    $query = "INSERT INTO Articles (`Title`, `Description`, `Date`, `User_ID`) VALUES ('$title', '$description' ,now(), '$user_id')";
  	$mysqli->query($query);
  	header('location: ../views/home_view.php');

  }

  if (isset($_POST['save_article'])) {
    $id = $_POST['id'];
    $desc = $_POST['description'];
    $title = $_POST['title'];
  
    $req = "UPDATE Articles SET Title='$title', Description='$desc' WHERE ID='$id' ";
  	$mysqli->query($req);
    $_SESSION['message'] = "Address updated!"; 
  	header('location: ../views/home_view.php');
  }

  if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $query = "DELETE FROM Articles WHERE ID=$id";
  	$mysqli->query($query);
  	header('location: ../views/home_view.php');



  }



  if (isset($_GET['add_to_fav'])){
    $article_id = mysqli_real_escape_string($mysqli, $_GET['add_to_fav']);
    $user_id = $_SESSION['current_user']->get_id();
    $q ="SELECT * FROM Articles_Users WHERE Article_ID='$article_id' AND User_ID='$user_id'";
    $res = $mysqli->query($q);
    if (mysqli_num_rows($res) == 1) {
      $query = "DELETE FROM Articles_Users WHERE Article_ID='$article_id' AND User_ID='$user_id'";
      $mysqli->query($query);
  	  header('location: ../views/home_view.php');


    } else {
      $query = "INSERT INTO Articles_Users (`User_ID`, `Article_ID`) VALUES ('$user_id', '$article_id')";
      $mysqli->query($query);
  	  header('location: ../views/home_view.php');

    }


  }



?>