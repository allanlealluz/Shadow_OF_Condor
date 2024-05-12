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
<body class='bg-danger'>
    <div class="container bg-dark">
        <table class="table" id="messages">
        <?php include('chatController.php');?>
        </table>
        <form method="POST">
             <input type="text" id='name' name="name" class="form-control" required>
             <textarea name="message" id='message' class="form-control" required></textarea>
             <input type="submit" value="Enviar" class="btn btn-primary"  onclick="transmitMessage()">
        </form>

<script>
  const form = document.querySelector('form');

  form.addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const message = document.getElementById('message').value;
    fetch(`sendMessage.php?name=${name}&message=${message}`);
  });
  var socket  = new WebSocket('ws://localhost:8080');

// Define the 
var message = document.getElementById('message');
const name = document.getElementById('name').value;

function transmitMessage() {
    socket.send( message.value,name.value );
}

socket.onmessage = function(e) {
    const table = document.getElementById('messages');
    var tr = document.createElement('tr');
    var td = document.createElement('td');  // create a new paragraph element
    td.textContent = e.data; 
    tr.setAttribute('class','bg-light')
    tr.appendChild(td);// set the text content of the paragraph element to the message received from the socket
    table.appendChild(tr);
}
    // Prevent the form from submitting and refreshing the page
    $('form').submit(function(e) {
        e.preventDefault();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </div>
</body>
</html>
