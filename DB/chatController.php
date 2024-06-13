<?php
include('config.php');
include('firebaseRDB.php');
$database = new firebaseRDB($databaseURL);
$films = $database->retrieve("film");
$films = json_decode($films, true);

if (is_array($films)) {
    foreach ($films as $film) {
        echo "<tr><td>{$film['name']}</td><td>{$film['message']}</td></tr>";
    }
}