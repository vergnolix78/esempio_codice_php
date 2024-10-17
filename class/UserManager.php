<?php
require_once "User.php";

class UserManager{

  public function connect()
  {
    try {
      $user = "root";
      $pass= "root";
      $conn = new PDO('mysql:host=localhost:8889;dbname=es_codice_php', $user, $pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
    return $conn;
  }

  // Inserisco il nuovo utente nel databse
  public function addUser($username, $password)
  {

    $password = $this->cryptPassword($password);

    $connect = $this->connect();
    try{
      $sql = "insert into users(username, password)values('$username', '$password')";

      $query = $connect->query($sql);

    }catch(Exception $e){
      echo $e->getMessage();
      die;
    }

  }

  // Recupero i dati da un file json
  public function loadUsers() :array{

    $usersFileAbsolutePath= $this->getUsersFileAbsolutePath();

    if(!file_exists($usersFileAbsolutePath)){
      return [];
    }

    $content = file_get_contents($usersFileAbsolutePath);

    $users = json_decode($content, true);

    if($users === null){
      throw new Exception("Impossibile leggere i dati");
    }


    $output = [];

    foreach ($users as $user) {
      $output[] = new User(
                  $user["username"],
                  $user["password"],
                  $user["crypt"]
                  );

    }

    return $output;

  }

  //aggiorna password
  public function updatePassword(User $users, string $password)
  {

    $users->setPassword($this->cryptPassword($password));

    $this->updateUser($users);

    printLog("$username ha cambiato la password");

  }

  // path assoluto
  public function getUsersFileAbsolutePath()
  {

    return $documentRoot = $_SERVER['DOCUMENT_ROOT'] . "/esercizioMusaFormazione/user.json";

  }

  //aggiorna oggetto user
  private function updateUser(User $user)
  {
    $newPassword = $user->getPassword();
    $username = $user->getUsername();
    $connect = $this->connect();
    try{
      $sql = "update users set password = '$newPassword' where username = '$username'";

      $res = $connect->query($sql);
    }catch(Exception $e){
      echo $e->getMessage();
      die;
    }
  }


  // verifica username e password
  public function findUsers(string $username, string $password) :User
  {
  
    $users = $this->findUserByUsername($username);
    
    if($users!=0){
    if(password_verify($password,$users->getPassword())){
      return $users;
    }
    }
    throw new Exception("Username o password non corretti!");

  }

  // Recupero username senza password
  public function findUserByUsername(string $username)
  {

    //$users = $this->loadUsers();
    $connect = $this->connect();

    $sql = "select username, password from users where username = '$username'";

    $res = $connect->query($sql);

    $result = $res->fetchAll();

    try{

      $user = new User($result[0]['username'], $result[0]['password']);
      return $user;

    }catch(Exception $e){
      echo $e->getMessage();
      return 0;
      //throw new Exception("Username o password non corretti!");
      die;
    }
    
  }

   // Recupero id
   public function findIdByUsername(string $username)
   {
 
     
     $connect = $this->connect();
 
     $sql = "select id from users where username = '$username'";
 
     $res = $connect->query($sql);
 
     $result = $res->fetchAll();
 
     $id = $result[0]['id'];
 
     return $id;
   }

  public function cryptPassword(string $password) :string
  {

    return password_hash($password, PASSWORD_DEFAULT);
  }


}
