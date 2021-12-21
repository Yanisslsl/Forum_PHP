<?php
class User {
  public $username;
  public $email;
  public $password;
  public $id;



  function __construct($username, $password, $email, $id) {
    $this->username = $username; 
    $this->password = $password; 
    $this->email = $email; 
    $this->id = $id; 


  }
  function get_username() {
    return $this->username;
  }
  function get_email() {
    return $this->email;
  }
  function get_password() {
    return $this->password;
  }

  function get_id() {
    return $this->id;
  }
  
}

// echo $apple->get_username();
// echo "<br>";
// echo $apple->get_email();
?>