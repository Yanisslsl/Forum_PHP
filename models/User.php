<?php
class User {
  public $username;
  public $email;
  public $password;
  public $id;
  public $is_admin;




  function __construct($username, $password, $email, $id, $is_admin) {
    $this->username = $username; 
    $this->password = $password; 
    $this->email = $email; 
    $this->id = $id; 
    $this->is_admin = $is_admin; 



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

  function get_is_admin() {
    return $this->is_admin;
  }
  
}

?>