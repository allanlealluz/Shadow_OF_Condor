<?php 
require __DIR__ . '/vendor/autoload.php';
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
<body>
    <div class="container">
        <table class="table">
            <?php
                include('config.php');
                include('firebaseRDB.php');
                $database = new firebaseRDB($databaseURL);
                $films = $database->retrieve("film");
                $films = json_decode($films, true);
                if (is_array($films)) {
                    foreach ($films as $film) {
                        echo "<tr><td>{$film['name']}</td><td>{$film['message']}</td></tr>";
                    }
                }
            ?>
        </table>
        <form method="POST">
             <input type="text" name="name" class="form-control" required>
             <textarea name="message" id='message' class="form-control" required></textarea>
             <input type="submit" value="Enviar" class="btn btn-primary">
        </form>

<script>
  const form = document.querySelector('form');

  form.addEventListener('submit', function(event) {
    event.preventDefault();
    const message = document.getElementById('message').value;
    fetch(`sendMessage.php?name=admin&message=${message}`);
  });
</script>
    </div>
</body>
</html>
