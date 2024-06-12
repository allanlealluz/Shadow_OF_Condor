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
<div class="container-fluid d-flex justify-content-center bg-light">
        <form method="post">
            <h1 class="text-center">Sombra do Condor</h1>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <label for="nome">Nome:</label>
                    <input type="text" class="text" name="nome">
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="">
                </div>
                <div class="col-md-6">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="">
                </div>
                <input class='btn btn-danger' type="submit" value="Cadastrar">
            </div>
            
            
           
            
        </form>
    </div>
    <?php 
    include('DB/connect.php');
    $db = new conect;
    if(isset($_POST['nome'])){
        $nome = htmlentities($_POST['nome']);
        $email = htmlentities($_POST['email']);
        $senha = htmlentities($_POST['senha']);
        $db->Cadastrar($nome,$email,$senha);
    };
        ?>
</body>
</html>
