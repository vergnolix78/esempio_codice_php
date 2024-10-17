<?php
require_once "Post.php";
require_once "UserManager.php";

class PostManager{

  private $user;

  function __construct() {
    
    $this->user = new UserManager();
  }

  // Connessione al database
  // TODO fare un  unica funzione con la connessione ad UserManager()  
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

  // Inserisco il nuovo post nell database
  public function addPost(string $titolo, string $post)
  {

    $connect = $this->connect();
    
    $autore = $this->user->findIdByUsername($_SESSION['username']);

    try{
      $sql = "insert into post(titolo, post, autore)values('$titolo', '$post', '$autore')";

      $query = $connect->query($sql);

    }catch(Exception $e){
      echo $e->getMessage();
      die;
    }

  }

  // // Recuper tutti i post dal file
  // public function requestAllPost():array
  // {

  //   if(file_exists($this->getAbsolutePath()) !== true){
  //     return [];
  //   }

  //   $content = file_get_contents($this->getAbsolutePath(), true);

  //   if($content != ""){
  //     $posts = json_decode($content,true);
  //   }else{
  //     return [];
  //   }


  //   $postsObject = [];

  //   foreach ($posts as $value) {

  //     $createDate = DateTime::createFromFormat('Y-m-d H:i:s', $value['data']);
  //     $postsObject[] = new Post($value['titolo'], $value['post'], $createDate);
  //   }


  //   return $postsObject;
  // }

  // Recuper i post dell' utente
  public function requestOnlyPost(): array
  {

    $connect = $this->connect();
    $autore = 1;  // TODO Da rivedere

    try{
      $sql = "select * from post where autore = $autore";

      $query = $connect->query($sql);

    }catch(Exception $e){
      echo $e->getMessage();
      die;
    }

    
    $postsObject = [];
 
    foreach ($query as $value) {
 
      $createDate = DateTime::createFromFormat('Y-m-d H:i:s', $value['data']);
      $postsObject[] = new Post($value['titolo'], $value['post'], $createDate);
    }
 
 
    return $postsObject;
    
   
  }

  // Recuper tutti i post dal file
  public function requestAllPost(): array
  {

    $connect = $this->connect();
  
    try{
      $sql = "select titolo, post, data, users.username from post join users on post.autore = users.id";

      $query = $connect->query($sql);
      
    }catch(Exception $e){
      echo $e->getMessage();
      
      die;
    }

    
    $postsObject = [];
 
    foreach ($query as $value) {
      $createDate = DateTime::createFromFormat('Y-m-d H:i:s', $value['data']);
      $postsObject[] = new Post($value['titolo'], $value['post'], $createDate, $value['username']);
    }
 
 
    return $postsObject;
    
   
  }


  // Inserisco i dati nell array

  // public function addPost(string $titolo, string $post)
  // {

  //   $posts = $this->requestAllPost();

  //   $posts[] = new Post($titolo, $post, new DateTime('now'));

  //   $this->insertElementFile($posts);

  // }

  public function insertElementFile(array $posts)
  {
    $array = [];
    foreach ($posts as $value) {
      $array[] = ["titolo" => $value->getTitolo(), "post" => $value->getPost(), "data" => $value->getData()->format('Y-m-d H:i:s')];
    }

    file_put_contents($this->getAbsolutePath(), json_encode($array));
  }

  // Percorso assoluto del file
  public function getAbsolutePath() :string
  {
    return $_SERVER["DOCUMENT_ROOT"]. "/esempioMusaFormazione/post.json";;

  }
}
