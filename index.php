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
    <style>
        .container-fluid {
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .header-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .header-actions .btn {
            font-size: 1.2rem;
        }
        .table-responsive {
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .table th, .table td {
            font-size: 1.2rem;
            border-top: none;
        }
        .table th {
            border-bottom: 2px solid #e74c3c;
        }
        .table img {
            width: 200px;
            height: 220px;
            object-fit: cover;
        }
        .not-connected {
            background-color: #34495e;
            padding: 40px;
            border-radius: 8px;
            text-align: center;
            margin-top: 20px;
        }
        .not-connected h2 {
            margin-bottom: 20px;
        }
        .table a.btn {
            font-size: 1rem;
        }
    </style>
</head>
<body class="bg-dark">
<div class="container-fluid">
    <h1 class="header text-danger">Sombra do Condor</h1>
    <div class="header-actions">
        <?php 
        if(isset($_SESSION['admin'])){
            ?> 
            <span class="text-light">Admin connected</span>
            <a href="create.php" class="btn btn-outline-danger">Create</a>
            <a href="StoryTelling/Storytelling.php" class="btn btn-outline-danger">Roteiro</a>
            <a href="indexChat.php" class="btn btn-outline-danger">Chat</a>
            <a href="User/Sair.php" class="btn btn-outline-danger">Sair</a>
            </div>
            <div class="table-responsive text-dark">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Imagem</th>
                        <th>Vitalidade</th>
                        <th>Força</th>
                        <th>Agilidade</th>
                        <th>Inteligência</th>
                        <th>Presença</th>
                        <th>Vigor</th>
                        <th>Defesa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($fichas as $ficha): ?>
                <tr>
                    <td><?php echo htmlspecialchars($ficha['id']); ?></td>
                    <td><?php echo htmlspecialchars($ficha['nome']); ?></td>
                    <td>
                        <?php if ($ficha['img'] !== 'not' && !empty($ficha['img'])): ?>
                            <img class='img-thumbnail' src="images/<?php echo htmlspecialchars($ficha['img']); ?>" alt="<?php echo htmlspecialchars($ficha['nome']); ?>">
                        <?php else: ?>
                            <img src="images/null.jpeg" class='img-thumbnail' alt="Imagem padrão">
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($ficha['vitalidade']); ?></td>
                    <td><?php echo htmlspecialchars($ficha['forca']); ?></td>
                    <td><?php echo htmlspecialchars($ficha['agi']); ?></td>
                    <td><?php echo htmlspecialchars($ficha['inte']); ?></td>
                    <td><?php echo htmlspecialchars($ficha['pre']); ?></td>
                    <td><?php echo htmlspecialchars($ficha['vigor']); ?></td>
                    <td><?php echo htmlspecialchars($ficha['defesa']); ?></td>
                    <td><a href="Character.php?id=<?php echo $ficha['id']; ?>" class="btn btn-outline-primary">Ver</a></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php
        } elseif(isset($_SESSION['id_user'])){
            ?> 
            <span>User connected</span>
            <a href="indexChat.php" class="btn btn-outline-danger">Chat</a>
            <a href="User/Sair.php" class="btn btn-outline-danger">Sair</a>
            </div>
            <?php
        } else {
            ?>
            <span>Not connected</span>
            <a href="User/Register.php" class="btn btn-outline-danger">Cadastrar</a>
            <a href="User/Login.php" class="btn btn-outline-danger">Login</a> 
            </div>
            <div class="not-connected">
                <h2>Bem-vindo ao RPG Sombra do Condor</h2>
                <p>Cadastre-se ou faça login para acessar o conteúdo.</p>
            </div>
            <?php
        }
        ?>
</div>
</body>
</html>
