<?php

session_start(); // Iniciar a sessão

ob_start(); // Limpar o buffer de saida para evitar erro de redirecionamento
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - Chat</title>
</head>

<body>
    <h1>Acessar o Chat</h1>

    <?php
    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Acessa o IF quando o usuário clicar no botão acessar do formulário
    if(!empty($dados['acessar'])){
        //var_dump($dados);

        // Criar a sessão e atribuir o nome do usuário
        $_SESSION['usuario'] = $dados['usuario'];

        // Redirecionar para o chat
        header("Location: test.php");
    }
    ?>
    
    <!-- Inicio do formulário para o usuário acessar o chat -->
    <form method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="usuario" placeholder="Digite o nome"><br><br>

        <input type="submit" name="acessar" value="Acessar"><br><br>
    </form>
    <!-- Fim do formulário para o usuário acessar o chat -->
    
</body>

</html>