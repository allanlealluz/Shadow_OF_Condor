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
<body class="bg-dark text-light">
<div class="container-fluid d-flex justify-content-between align-items-center py-3">
    <h1 class="text-center text-danger">Sombra do Condor</h1>
    <div>
        <a href="../create.php" class="btn btn-outline-danger mx-2">Create</a>
        <a href="../indexChat.php" class="btn btn-outline-danger mx-2">Chat</a>
        <a href="../index.php" class="btn btn-outline-danger mx-2">Home</a>
    </div>
</div>
<div class="container bg-light text-dark p-5 rounded">
    <?php 
    if(isset($_GET['id'])){
        $id = htmlentities($_GET['id']);
        include('../DB/connect.php');
        $con = new Conect();
        $data = $con->BuscarRoteiroPorId($id);
        foreach($data as $v){
           ?> 
           <h2 class="text-center mb-4"><?php echo $v['titulo'] ?></h2>
           <hr>
           <div class="text-center h3 mb-4" id="content"><?php echo nl2br($v['conteudo']) ?></div>
           <div class="text-center mb-4">
               <button class="btn btn-primary mx-2" onclick="editContent()">Editar Conteúdo</button>
               <button class="btn btn-success mx-2" onclick="saveContent()" style="display: none;">Salvar</button>
               <button class="btn btn-danger mx-2" onclick="cancelEdit()" style="display: none;">Cancelar</button>
           </div>
           <textarea class="form-control mb-4" id="editedContent" style="display: none;"><?php echo $v['conteudo'] ?></textarea>
           <div class="text-center mb-4">
               <label for="imageUpload" class="form-label">Upload Image:</label>
               <input type="file" class="form-control" id="imageUpload" accept="image/*">
           </div>
           <?php
        }
    }
    ?>
</div>

<script>
    function editContent() {
        document.getElementById('content').style.display = 'none';
        document.getElementById('editedContent').style.display = 'block';
        document.querySelector('.btn-primary').style.display = 'none';
        document.querySelector('.btn-success').style.display = 'inline-block';
        document.querySelector('.btn-danger').style.display = 'inline-block';
    }

    function saveContent() {
        var editedContent = document.getElementById('editedContent').value;
        document.getElementById('content').innerHTML = editedContent.replace(/\n/g, '<br>');
        document.getElementById('content').style.display = 'block';
        document.getElementById('editedContent').style.display = 'none';
        document.querySelector('.btn-primary').style.display = 'inline-block';
        document.querySelector('.btn-success').style.display = 'none';
        document.querySelector('.btn-danger').style.display = 'none';
        fetch('sendEdit.php?content='+encodeURIComponent(editedContent)+'&id=<?php echo $id ?>');
    }

    function cancelEdit() {
        document.getElementById('content').style.display = 'block';
        document.getElementById('editedContent').style.display = 'none';
        document.querySelector('.btn-primary').style.display = 'inline-block';
        document.querySelector('.btn-success').style.display = 'none';
        document.querySelector('.btn-danger').style.display = 'none';
    }
</script>
</body>
</html>
