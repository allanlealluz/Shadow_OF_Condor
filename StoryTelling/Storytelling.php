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
<body class="bg-secondary">
<div class="container-fluid d-flex justify-content-between bg-dark">
    <h1 style="text-align:center;color:red;padding-bottom:2rem;">Sombra do Condor</h1>
    <a href="../create.php" class="btn btn-outline-danger mx-2">Create</a>
        <a href="../indexChat.php" class="btn btn-outline-danger mx-2">Chat</a>
        <a href="../index.php" class="btn btn-outline-danger mx-2">Home</a>
</div>
<div class='container-fluid bg-light'>
    <?php 
    include('../DB/connect.php');
    $con = new Conect();
    $data = $con->BuscarTodosRoteiro();
    foreach($data as $v){
        ?>
        <a href="Conteudo.php?id=<?php echo $v['id']; ?>">
            <h2 class='text-primary h2 text-center'><?php echo $v['titulo']; ?></h2>
        </a>
        <?php
    }
    ?>
</div> <!-- Fechamento da div container-fluid bg-light -->
<div class="container bg-body-secondary">
    <hr>
    <form method="post">
        <input class='form-control' type="text" name="titulo" id="titulo">
        <textarea class='form-control' name="conteudo" id="conteudo"></textarea>
        <input type="submit" value="Send" class="btn btn-secondary d-flex justify-content-center">
        <?php     
        if(isset($_POST['titulo']) && isset($_POST['conteudo'])){
            $titulo = htmlentities($_POST['titulo']);
            $conteudo = htmlentities($_POST['conteudo']);
            $con->AddRoteiro($titulo, $conteudo);
        }     
        ?>
    </form>
</div>
</body>
</html>
