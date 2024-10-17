<?php
session_start();
ini_set('display_errors', 'on');

require_once "class/AutenticadedProvider.php";
require_once "class/PostManager.php";
require_once "utils.php";

ini_set('display_errors', '1');

$autenticadedProvider = new AutenticadedProvider();
$postManager = new PostManager();

?>
