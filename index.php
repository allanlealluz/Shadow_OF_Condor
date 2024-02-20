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

$fichas = $con->getFichas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sombra do Condor</title>
    <link rel="shortcut icon" href="sombra_condor.png">
</head>
<body>
<h1>Sombra do Condor</h1>
<form method="post" action="">
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>Vitalidade:</label>
    <input type="number" name="vitalidade" required>
    <label>Força:</label>
    <input type="number" name="forca" required>
    <label>Agilidade:</label>
    <input type="number" name="agi" required>
    <label>Inteligência:</label>
    <input type="number" name="int" required>
    <label>Precisão:</label>
    <input type="number" name="pre" required>
    <label>Vigor:</label>
    <input type="number" name="vigor" required>
    <label>Itens:</label>
    <input type="text" name="itens" required>
    <label>Perícia:</label>
    <input type="text" name="pericia" required>
    <label>Defesa:</label>
    <input type="number" name="defesa" required>
    <input type="submit" name="submit" value="Adicionar">
</form>
<table border="1">
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
        <th>Ações</th>
    </tr>
    <?php foreach($fichas as $ficha): ?>
    <tr>
        <td><?php echo $ficha['id']; ?></td>
        <td><?php echo $ficha['nome']; ?></td>
        <td><?php echo $ficha['vitalidade']; ?></td>
        <td><?php echo $ficha['forca']; ?></td>
        <td><?php echo $ficha['agi']; ?></td>
        <td><?php echo $ficha['inte']; ?></td>
        <td><?php echo $ficha['pre']; ?></td>
        <td><?php echo $ficha['vigor']; ?></td>
        <td><?php echo $ficha['itens']; ?></td>
        <td><?php echo $ficha['pericias']; ?></td>
        <td><?php echo $ficha['defesa']; ?></td>
        <td>
            <a href="index.php?edit=<?php echo $ficha['id']; ?>">Editar</a>
            <a href="index.php?delete=<?php echo $ficha['id']; ?>">Deletar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if(isset($_GET['edit'])): ?>
<h2>Editar Ficha</h2>
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $ficha['id']; ?>">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $ficha['nome']; ?>" required>
    <label>Vitalidade:</label>
    <input type="number" name="vitalidade" value="<?php echo $ficha['vitalidade']; ?>" required>
    <label>Força:</label>
    <input type="number" name="forca" value="<?php echo $ficha['forca']; ?>" required>
    <label>Agilidade:</label>
    <input type="number" name="agi" value="<?php echo $ficha['agi']; ?>" required>
    <label>Inteligência:</label>
    <input type="number" name="int" value="<?php echo $ficha['int']; ?>" required>
    <label>Precisão:</label>
    <input type="number" name="pre" value="<?php echo $ficha['pre']; ?>" required>
    <label>Vigor:</label>
    <input type="number" name="vigor" value="<?php echo $ficha['vigor']; ?>" required>
    <label>Itens:</label>
    <input type="text" name="itens" value="<?php echo $ficha['itens']; ?>" required>
    <label>Perícia:</label>
    <input type="text" name="pericia" value="<?php echo $ficha['pericia']; ?>" required>
    <label>Defesa:</label>
    <input type="number" name="defesa" value="<?php echo $ficha['defesa']; ?>" required>
    <input type="submit" name="update" value="Atualizar">
</form>
<?php endif; ?>

</body>
</html>