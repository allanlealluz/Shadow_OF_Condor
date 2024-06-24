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
    <a href="index.php"><h3 style="text-align:left;color:red;padding:10px;text-decoration:none;">Home</h3></a>
</div>
<div class="container-fluid bg-light">
    <?php 
    if(isset($_GET['id'])){
        $id = htmlentities($_GET['id']);
        include('DB/connect.php');
        $con = new Conect();
        $data = $con->BuscarRoteiroPorId($id);
        foreach($data as $v){
           ?> 
           <h2 class="text-center"><?php echo $v['titulo'] ?></h2>
           <hr>
           <p class="text-center h3" id="content"><?php echo $v['conteudo'] ?></p>
           <button class="btn btn-primary" onclick="editContent()">Editar Conteúdo</button>
           <button class="btn btn-success" onclick="saveContent()" style="display: none;">Salvar</button>
           <button class="btn btn-danger" onclick="cancelEdit()" style="display: none;">Cancelar</button>
           <textarea class="form-control" id="editedContent" style="display: none;"><?php echo $v['conteudo'] ?></textarea>
           <?php
        }
    }
 
    ?>
    </div>

<script>
    function editContent() {
        document.getElementById('content').style.display = 'none';
        document.getElementById('editedContent').style.display = 'block';
        document.getElementsByClassName('btn-primary')[0].style.display = 'none';
        document.getElementsByClassName('btn-success')[0].style.display = 'block';
        document.getElementsByClassName('btn-danger')[0].style.display = 'block';
    }

    function saveContent() {
        var editedContent = document.getElementById('editedContent').value;
        document.getElementById('content').innerHTML = editedContent;
        document.getElementById('content').style.display = 'block';
        document.getElementById('editedContent').style.display = 'none';
        document.getElementsByClassName('btn-primary')[0].style.display = 'block';
        document.getElementsByClassName('btn-success')[0].style.display = 'none';
        document.getElementsByClassName('btn-danger')[0].style.display = 'none';
        fetch('sendEdit.php?content='+editedContent+'&id=<?php echo $id ?>');


        // Aqui você pode adicionar a lógica para enviar o conteúdo editado para o servidor e atualizar o banco de dados
    }

    function cancelEdit() {
        document.getElementById('content').style.display = 'block';
        document.getElementById('editedContent').style.display = 'none';
        document.getElementsByClassName('btn-primary')[0].style.display = 'block';
        document.getElementsByClassName('btn-success')[0].style.display = 'none';
        document.getElementsByClassName('btn-danger')[0].style.display = 'none';
    }
</script>
</body>
</html>
