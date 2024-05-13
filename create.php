<?php
require_once 'DB/connect.php';
$con = new conect();
if (isset($_POST['submit'])) {
    $name = $_POST['nome'];
    $health = $_POST['vitalidade'];
    $strength = $_POST['forca'];
    $dexterity = $_POST['agi'];
    $intelligence = $_POST['int'];
    $precision = $_POST['pre'];
    $vigor = $_POST['vigor'];
    $items = $_POST['itens'];
    $skills = $_POST['pericia'];
    $defense = $_POST['defesa'];
    if(isset($_FILES["img"])){
        $file = $_FILES["img"];
        $dir = 'images/';
        $imagePath = $dir. basename($file['name']);
        move_uploaded_file($file['tmp_name'], $imagePath);
        
    } else {
        $imagePath = "not";
    }
    $con->addFicha($name, $health, $strength, $dexterity, $intelligence, $precision, $vigor, $items, $skills, $defense,$imagePath);
}
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $vitalidade = $_POST['vitalidade'];
    $força = $_POST['forca'];
    $agi = $_POST['agi'];
    $int = $_POST['int'];
    $pre = $_POST['pre'];
    $vigor = $_POST['vigor'];
    $itens = $_POST['itens'];
    $pericia = $_POST['pericia'];
    $defesa = $_POST['defesa'];

    $con->updateFicha($id,$nome,$vitalidade,$força,$agi,$int,$pre,$vigor,$itens,$pericia,$defesa);
    header('Location: index.php');
}
?>
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
</div>
<div class="container bg-light ">
<form method="post" action="" enctype="multipart/form-data">
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
    <label class="form-label">Defesa:</label>
    <input class="form-control" type="number" name="defesa" required>
    <label>Imagem:</label>
    <input class="form-control form-control-lg" type="file" name="img" id="">
    <input type="submit" name="submit" value="Adicionar">
    <div>
</form>

</body>
</html>