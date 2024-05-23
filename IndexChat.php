<?php 
require __DIR__ . '/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sombra do Condor</title>
    <link rel="shortcut icon" href="sombra_condor.png">
    <link rel="stylesheet" href="indexChat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class='bg-danger'>
    <div class="container-fluid bg-dark">
        <div class="container d-flex justify-content-left">
        <h2 class="text-light text-center" style="padding:10px;">Sombra da Condor</h2>
        <a href="index.php"><h3 style="text-align:left;color:red;padding:10px;text-decoration:none;">Home</h3></a>
        <a href="create.php"><h3 style="text-align:left;color:red;padding:10px;text-decoration:none;">Create</h3></a>
        </div>
        <table class="table text-center" id="messages">
            <thead>
                <tr>
                     <th scope="col"></th>
                     <th scope="col"></th>
                </tr>
            </thead>       
        <tbody>
             <?php include('DB/chatController.php');?>
        </tbody>
        </table>
        <form method="POST">
             <input type="text" id='names' name="name" class="form-control" required>
             <textarea name="message" id='message' class="form-control" required></textarea>
             <input type="submit" value="Enviar" class="btn btn-primary" id="btn" onclick="transmitMessage()">
        </form>
    </div>
<script src="indexChat.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   
</body>
</html>
