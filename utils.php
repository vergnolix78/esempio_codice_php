<?php

// Scrivo messaggi in un file di log
function printLog(string $message){

  $message = $message . "\n";
  $path = $_SERVER['DOCUMENT_ROOT'] . "/esempioMusaFormazione/log.txt";
  $handle = fopen($path, "a");
  fwrite($handle, $message);
  fclose($handle);
}
