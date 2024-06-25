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
<body>
<div class="container-fluid d-flex justify-content-between bg-dark">
<h1 style="text-align:center;color:red;padding-bottom:2rem;">Sombra do Condor</h1> 
    <div class="container-sm bg-light">
    <?php
    if(isset($_GET['id'])){
        $id = htmlentities($_GET['id']);
        require_once 'DB/connect.php';
        $con = new Conect();
        $fichas = $con->GetFichaPorId($id);
        session_start();
        foreach($fichas as $ficha): ?>
                <h1><?php echo htmlspecialchars($ficha['nome']); ?></h1>
                
                <?php if ($ficha['img'] !== 'not' && !empty($ficha['img'])): ?>
                <img class='img-thumbnail' style='width:150px;height:170px;' src="images/<?php echo htmlspecialchars($ficha['img']); ?>" alt="<?php echo htmlspecialchars($ficha['nome']); ?>">
            <?php else: ?>
                <img src="images/null.jpeg" style='width:150px;height:170px;' alt="Imagem padrão">
            <?php endif; ?>
                <h3>Vitalidade:<?php echo htmlspecialchars($ficha['vitalidade']); ?></h3>
                <h3>Força:<?php echo htmlspecialchars($ficha['forca']); ?></h3>
                <h3>Agilidade:<?php echo htmlspecialchars($ficha['agi']); ?></h3>
                <h3>Intecto:<?php echo htmlspecialchars($ficha['inte']); ?></h3>
                <h3>Presença:<?php echo htmlspecialchars($ficha['pre']); ?></h3>
                <h3>Vigor:<?php echo htmlspecialchars($ficha['vigor']); ?></h3>
                <h3>Defesa:<?php echo htmlspecialchars($ficha['defesa']); ?></h3>
                <h3>Pericias:<?php echo htmlspecialchars($ficha['pericias']); ?></h3>
                <h3>Itens:<?php echo htmlspecialchars($ficha['itens']); ?></h3>
                <h3>Habs:<?php echo htmlspecialchars($ficha['Habs']); ?></h3>
            <?php endforeach; } ?>
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js"></script>
            </div>
</body>
</html>