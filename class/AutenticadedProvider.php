<?php
require_once "UserManager.php";

class AutenticadedProvider
{
  public $userManager;

  public function __construct(){

    $this->userManager = new UserManager();
  }

  //cambio password
  public function changePassword(string $password) :bool
  {

    $this->userManager->updatePassword($this->requestUsername(), $password);

    return true;

  }

  // Eseguo il login utente
  function login(string $username, string $password): bool{

    // Mi collego al file json
    $users = $this->userManager->findUsers($username, $password);

    if($users){

      //creo una sessione
      $_SESSION['username'] = $username;

      //Creo ed inserisco un messaggio in un file log.txt
      $message = sprintf("L' utente %s ha effettuato il login", $username);

      printLog($message);

      return true;

    }
  }

  // Registrazione
  //ok
  function register(string $username, string $password) :bool
  {

    if(empty($password)){

      throw new Exception("Inserire una password valida");
    }

    $this->userManager->addUser($username, $password);

    printLog("$username si e' registrato");

    return true;
  }

  //funzione di verifica login
  //ok
  function userIsAutenticaded() :bool
  {
    return (array_key_exists('username', $_SESSION));
  }

  //ok
  public function requestUsername() :User
  {

    if($this->userIsAutenticaded() !== true){
      throw new Exception("Utente non autenticato");
    }
    $users = $this->userManager->findUserByUsername($_SESSION['username']);
    //return $_SESSION['username'];
    return $users;
  }


}
