<?php
require_once 'DB/connect.php';
$con = new Conect();
$fichas = $con->getFichas();
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    

    <?php 
    if(isset($_SESSION['admin'])){
        ?> 
        <h3 class="text-light">Admin connected</h3>
        <a href="create.php"><h3 style="text-align:left;color:red;">Create</h3></a>
        <a href="Storytelling.php"><h3 style="text-align:left;color:red;">Roteiro</h3></a>
        <a href="indexChat.php"><h3 style="text-align:left;color:red;">Chat</h3></a>
        <a href="Sair.php"><h3 style="text-align:left;color:red;">Sair</h3></a>
        </div>
        <div class="table-responsive">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Vitalidade</th>
                <th>Força</th>
                <th>Agilidade</th>
                <th>Inteligência</th>
                <th>Presença</th>
                <th>Vigor</th>
                <th>Itens</th>
                <th>Perícia</th>
                <th>Defesa</th>
            </tr>
            <?php foreach($fichas as $ficha): ?>
            <tr>
                <td><?php echo htmlspecialchars($ficha['id']); ?></td>
                <td><?php echo htmlspecialchars($ficha['nome']); ?></td>
                <td><?php echo htmlspecialchars($ficha['vitalidade']); ?></td>
                <td><?php echo htmlspecialchars($ficha['forca']); ?></td>
                <td><?php echo htmlspecialchars($ficha['agi']); ?></td>
                <td><?php echo htmlspecialchars($ficha['inte']); ?></td>
                <td><?php echo htmlspecialchars($ficha['pre']); ?></td>
                <td><?php echo htmlspecialchars($ficha['vigor']); ?></td>
                <td><?php echo htmlspecialchars($ficha['itens']); ?></td>
                <td><?php echo htmlspecialchars($ficha['pericias']); ?></td>
                <td><?php echo htmlspecialchars($ficha['defesa']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <?php
    } elseif(isset($_SESSION['id_user'])){
        ?> 
         <h3 class="text-light">User connected</h3>
        <a href="indexChat.php"><h3 style="text-align:left;color:red;">Chat</h3></a>
        <a href="Sair.php"><h3 style="text-align:left;color:red;">Sair</h3></a>
        </div>
        <?php
    } else {
        ?>
        <h3 class="text-light">Not connected</h3>
        <a href="Register.php"><h3 style="text-align:left;color:red;">Cadastrar</h3></a>
        <a href="Login.php"><h3 style="text-align:left;color:red;">Login</h3></a> 
        </div>
        <div class="container bg-light">
            <h2 class='text-center'>Bem-vindo ao RPG Shadow of Condor</h2>
        </div>
        <?php
    }
    ?>
</body>
</html>
