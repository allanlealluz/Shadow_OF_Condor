<?php
require_once 'connect.php';
$con = new conect;
if(isset($_POST['submit'])){
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

    $con->addFicha($nome,$vitalidade,$força,$agi,$int,$pre,$vigor,$itens,$pericia,$defesa);
    header('Location: index.php');
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $con->deleteFicha($id);
    header('Location: index.php');
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
<form method="post" action="">
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
    <input type="submit" name="submit" value="Adicionar">
    <div>
</form>
<?php if(isset($_GET['edit'])): ?>
<h2>Editar Ficha</h2>
<form method="post" action="">
<div class="mb-3">
    <input class="form-control" type="hidden" name="id" value="<?php echo $ficha['id']; ?>">
    <label class="form-label">Nome:</label>
    <input class="form-control" type="text" name="nome" value="<?php echo $ficha['nome']; ?>" required>
    <label class="form-label">Vitalidade:</label>
</div>
    <input class="form-control" type="number" name="vitalidade" value="<?php echo $ficha['vitalidade']; ?>" required>
    <label class="form-label">Força:</label>
    <input class="form-control" type="number" name="forca" value="<?php echo $ficha['forca']; ?>" required>
    <label class="form-label">Agilidade:</label>
<div class="mb-3">
    <input class="form-control" type="number" name="agi" value="<?php echo $ficha['agi']; ?>" required>
    <label class="form-label" >Inteligência:</label>
    <input class="form-control" type="number" name="int" value="<?php echo $ficha['inte']; ?>" required>
    <label class="form-label">Presença:</label>
</div>
<div class="mb-3">
    <input class="form-control"type="number" name="pre" value="<?php echo $ficha['pre']; ?>" required>
    <label>Vigor:</label>
    <input class="form-control"type="number" name="vigor" value="<?php echo $ficha['vigor']; ?>" required>
    <label>Itens:</label>
</div>
<div class="mb-3">
    <input class="form-control"type="text" name="itens" value="<?php echo $ficha['itens']; ?>" required>
    <label>Perícia:</label>
    <input class="form-control"type="text" name="pericia" value="<?php echo $ficha['pericias']; ?>" required>
    <label>Defesa:</label>
    <input class="form-control"type="number" name="defesa" value="<?php echo $ficha['defesa']; ?>" required>
</div>
    <input class="form-control"type="submit" name="update" value="Atualizar">
</form>
</div>
<?php endif; ?>
</body>
</html>