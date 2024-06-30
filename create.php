<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sombra do Condor</title>
    <link rel="shortcut icon" href="sombra_condor.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-dark">
<div class="container">
<h1 style="text-align:center;color:red;padding-bottom:1rem;">Sombra do Condor</h1>
<a href="index.php"><h3 style="text-align:left;color:red;">Home</h3></a>
<a href="indexChat.php"><h3 style="text-align:left;color:red;">Chat</h3></a>
</div>
<div class="container bg-light ">
<form method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <label class="form-label">Nome:</label>
    <input class="form-control" type="text" name="nome" required>
    <label class="form-label">Vitalidade:</label>
    <input class="form-control" type="number" name="vitalidade" required>
    <label class="form-label">Força:</label>
    <input class="form-control"type="number" name="forca" required>
    <label class="form-label">Agilidade:</label>
    <input class="form-control" type="number" name="agi" required>
    <label class="form-label">Inteligência:</label>
    <input class="form-control"type="number" name="int" required>
    <label class="form-label" >Presença:</label>
    <input class="form-control" type="number" name="pre" required>
    <label class="form-label">Vigor:</label>
    <input class="form-control" type="number" name="vigor" required>
    <label class="form-label">Itens:</label>
    <input class="form-control"type="text" name="itens" required>
    <label class="form-label">Perícia:</label>
    <input class="form-control"type="text" name="pericia" required>
    <label class="form-label">Habilidades:</label>
    <textarea class="form-control" name="habs" required></textarea>
    <label class="form-label">Defesa:</label>
    <input class="form-control" type="number" name="defesa" required>
    <label>Imagem:</label>
    <input class="form-control form-control-lg" type="file" name="img" id="img">
    <input type="submit" name="submit" value="Adicionar">
    <div>
</form>
<?php
require_once 'DB/connect.php';
$con = new conect();
if (isset($_POST['nome'])) {
    $name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $health = filter_input(INPUT_POST, 'vitalidade', FILTER_VALIDATE_INT);
    $strength = filter_input(INPUT_POST, 'forca', FILTER_VALIDATE_INT);
    $dexterity = filter_input(INPUT_POST, 'agi', FILTER_VALIDATE_INT);
    $intelligence = filter_input(INPUT_POST, 'int', FILTER_VALIDATE_INT);
    $precision = filter_input(INPUT_POST, 'pre', FILTER_VALIDATE_INT);
    $vigor = filter_input(INPUT_POST, 'vigor', FILTER_VALIDATE_INT);
    $items = filter_input(INPUT_POST, 'itens', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $skills = filter_input(INPUT_POST, 'pericia', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $habs = filter_input(INPUT_POST, 'habs', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $defense = filter_input(INPUT_POST, 'defesa', FILTER_VALIDATE_INT);
    if(isset($file) && !empty($file)){     
        $dir = 'images/';
        $imagePath = $dir . basename($file['name']);
        $ImageName = $file['name'];
        if(move_uploaded_file($file['tmp_name'], $imagePath)){
            echo 'ok'.$file['name'];
            $con->addFicha($name, $health, $strength, $dexterity, $intelligence, $precision, $vigor, $items, $skills,$habs, $defense,$ImageName);
        }else{
            $ImageName = "null.jpeg";
            echo 'error'; 
        }
        
    } else {
        $ImageName = "null.jpeg";
        $con->addFicha($name, $health, $strength, $dexterity, $intelligence, $precision, $vigor, $items, $skills,$habs, $defense,$ImageName);
    }
}
?>
</body>
</html>