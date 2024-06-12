<?php
require_once 'DB/connect.php';
$con = new conect;
$fichas = $con->getFichas();
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
</head>
<body class="bg-dark">
<div class="container-fluid d-flex justify-content-between">
<h1 style="text-align:center;color:red;padding-bottom:2rem;">Sombra do Condor</h1>
<a href="create.php"><h3 style="text-align:left;color:red;">Create</h3></a>
<a href="indexChat.php"><h3 style="text-align:left;color:red;">Chat</h3></a>
<a href="Register.php"><h3 style="text-align:left;color:red;">Cadastrar</h3></a>
<a href="Login.php"><h3 style="text-align:left;color:red;">Login</h3></a>
</div>
<div class="table-responsive">
<table class="table">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Vitalidade</th>
        <th>Força</th>
        <th>Agilidade</th>
        <th>Inteligência</th>
        <th>Presença</th>
        <th>Vigor</th>
        <th>Itens</th>
        <th>Perícia</th>
        <th>Defesa</th>
    </tr>
    <?php foreach($fichas as $ficha): ?>
    <tr>
        <td><?php echo htmlspecialchars($ficha['id']); ?></td>
        <td><?php echo htmlspecialchars($ficha['nome']); ?></td>
        <td><?php echo htmlspecialchars($ficha['vitalidade']); ?></td>
        <td><?php echo htmlspecialchars($ficha['forca']); ?></td>
        <td><?php echo htmlspecialchars($ficha['agi']); ?></td>
        <td><?php echo htmlspecialchars($ficha['inte']); ?></td>
        <td><?php echo htmlspecialchars($ficha['pre']); ?></td>
        <td><?php echo htmlspecialchars($ficha['vigor']); ?></td>
        <td><?php echo htmlspecialchars($ficha['itens']); ?></td>
        <td><?php echo htmlspecialchars($ficha['pericias']); ?></td>
        <td><?php echo htmlspecialchars($ficha['defesa']); ?></td>
        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1): ?>
        <td>
            <a href="index.php?edit=<?php echo $ficha['id']; ?>">Editar</a>
            <a href="index.php?delete=<?php echo $ficha['id']; ?>">Deletar</a>
        </td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
    <?php if(isset($_GET['edit'])): ?>
<h2>Editar Ficha</h2>
<form method="post" action="">
<div class="mb-3 bg-light">
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
    <label>Imagem:</label>
    <input class="form-contrl" type="file" name="img" id="">
</div>
    <input class="form-control"type="submit" name="update" value="Atualizar">
</form>
</div>
<?php endif;
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $con->deleteFicha($id);
    header('Location: index.php');
}
?>
</table>
</div>
</body>
</html>