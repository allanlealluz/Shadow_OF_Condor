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
    include('../DB/connect.php');
    $con = new Conect();
    $data = $con->BuscarTodosRoteiro();
    foreach($data as $v){
        ?>
        <a href="Conteudo.php?id=<?php echo $v['id']; ?>" class="text-decoration-none">
            <h2 class="text-primary h2 text-center mb-4"><?php echo $v['titulo']; ?></h2>
        </a>
        <?php
    }
    ?>
</div>
<div class="container bg-body-secondary mt-2 p-2 rounded">
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label text-dark">Título</label>
            <input class="form-control" type="text" name="titulo" id="titulo" required>
        </div>
        <div class="mb-3">
            <label for="conteudo" class="form-label text-dark">Conteúdo</label>
            <textarea class="form-control" name="conteudo" id="conteudo" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="imageUpload" class="form-label text-dark">Upload Image</label>
            <input type="file" class="form-control" id="imageUpload" name="image" accept="image/*">
        </div>
        <div class="text-center">
            <input type="submit" value="Send" class="btn btn-secondary">
        </div>
        <?php     
        if(isset($_POST['titulo']) && isset($_POST['conteudo'])){
            $titulo = htmlentities($_POST['titulo']);
            $conteudo = htmlentities($_POST['conteudo']);
            if(isset($_FILES['image'])){
                $image = $_FILES['image'];
                $imagePath = 'path_to_save_image/' . basename($image['name']);
                if(move_uploaded_file($image['tmp_name'], $imagePath)){
                    $con->AddRoteiro($titulo, $conteudo, $imagePath);
                } else {
                    echo "<div class='alert alert-danger mt-3'>Failed to upload image.</div>";
                }
            } else {
                $con->AddRoteiro($titulo, $conteudo);
            }
        }     
        ?>
    </form>
</div>
</body>
</html>
