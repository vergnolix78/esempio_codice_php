<?php

class Post{

  private $titolo;
  private $post;
  private $data;
  private $autore;

  public function __construct(string $titolo,string $post, DateTime $data, string $autore)
  {
    $this->titolo = $titolo;
    $this->post = $post;
    $this->data = $data;
    $this->autore = $autore;
  }

  public function getTitolo() :string
  {
    return $this->titolo;
  }

  public function getPost() :string
  {
    return $this->post;
  }

  public function getData()
  {
    return $this->data;
  }

  public function getAutore()
  {
    return $this->autore;
  }

}
