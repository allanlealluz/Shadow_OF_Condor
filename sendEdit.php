<?php
if(isset($_GET['content'])){
    include('DB/connect.php');
    $con = new Conect();
    $content = htmlentities($_GET['content']);
    $id = htmlentities($_GET['id']);
    $con->AlterRoteiro($content,$id);
}