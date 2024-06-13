<?php 
include('DB/config.php');
include('DB/firebaseRDB.php');
include('DB/connect.php');
session_start();
$con = new Conect();
$database = new firebaseRDB($databaseURL);
if (isset($_GET['message']) && !empty($_GET['message'])) {
   $data = $con->buscarUserById($_SESSION['id_user']);
   $name = $data['nome']; // default name
   $message = $_GET['message'];
   $database->insert('film', [
       'name' => $name,
       'message' => $message,
   ]);
   echo $name;
   echo $message;
}