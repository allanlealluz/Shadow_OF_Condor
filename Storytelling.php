<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sombra do Condor</title>
    <link rel="shortcut icon" href="sombra_condor.png">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
<div class="container-fluid d-flex justify-content-between">
    <h1 style="text-align:center;color:red;padding-bottom:2rem;">Sombra do Condor</h1>
    <a href="create.php"><h3 style="text-align:left;color:red;">Create</h3></a>
    <a href="indexChat.php"><h3 style="text-align:left;color:red;">Chat</h3></a>
</div>
<div class='container-fluid bg-light'>
    <?php 
    include('DB/connect.php');
    $con = new Conect();
    $data = $con->BuscarTodosRoteiro();
    foreach($data as $v){
        ?><a href="Conteudo.php?id=<?php $v['id'] ?>"><h2><?php echo $v['titulo']; ?></h2></div></a> <?php
    }
    ?>
<div class="container bg-idea">
    <h1>Sombra do Condor</h1>
    <hr>
    <form method="post">
        <input class='form-control' type="text" name="titulo" id="titulo">
        <textarea class='form-control' name="conteudo" id="conteudo"></textarea>
        <input type="submit" value="Send">
        <?php     
        if(isset($_POST['titulo']) && isset($_POST['conteudo'])){
            $titulo = htmlentities($_POST['titulo']);
            $conteudo = htmlentities($_POST['conteudo']);
            $con->AddRoteiro($titulo, $conteudo);
        }     
        ?>
    </form>
</div>
<<<<<<< HEAD
=======

<div class="container bg-light ">
<form method="post">
    <hr>
    <input type="text" name="titulo" id="titulo">
    <textarea name="conteudo" id="conteudo"></textarea>
    <input type="submit" value="Enviar">
</form>
<?php 
include('DB/connect.php');
$con = new Conect();
if(isset($_POST['titulo'])){
    $titulo = htmlentities($_POST['titulo']);
    $conteudo = htmlentities($_POST['conteudo']);
    $con->AddRoteiro($titulo,$conteudo);
    header('location:index.php');
}

?>

>>>>>>> 165d696a5e92b7b4b92fb446951f854e7516c93f
</div>
</body>
</html>
