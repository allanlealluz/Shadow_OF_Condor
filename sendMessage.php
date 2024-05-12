<?php 
include('config.php');
include('firebaseRDB.php');
$database = new firebaseRDB($databaseURL);
if (isset($_GET['message']) && !empty($_GET['message'])) {
   $name = $_GET['name']; // default name
   $message = $_GET['message'];
   $database->insert('film', [
       'name' => $name,
       'message' => $message,
   ]);
   echo $name;
   echo $message;
}