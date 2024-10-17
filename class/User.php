<?php

class User{

  private $username;
  private $password;


  public function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;

  }

  // Metodi getter
  public function getUsername()
  {

    return $this->username;

  }

  public function getPassword()
  {

    return $this->password;
  }

  // Metodi setter
  public function setPassword(string $newPassword)
  {
      $this->password = $newPassword;
  }



}
