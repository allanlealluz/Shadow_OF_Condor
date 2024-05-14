const form = document.querySelector('form');
var names = document.getElementById('names')
form.addEventListener("keypress",function(e){
if(e.key === 'Enter'){
    e.preventDefault();
    document.getElementById('btn').click();
}
});
form.addEventListener('submit', function(event) {
  event.preventDefault();
  const name = names.value;
  const message = document.getElementById('message').value;
  fetch(`sendMessage.php?name=${name}&message=${message}`);
  const table = document.getElementById('messages');
  var tr = document.createElement('tr');
  var td = document.createElement('td'); 
  var td2 = document.createElement('td');
  var corpoTabela = table.getElementsByTagName("tbody")[0];
  td.innerHTML = name;
  td2.innerHTML = message;
  tr.appendChild(td);
  tr.appendChild(td2);
  tr.setAttribute('class','bg-light');
  corpoTabela.appendChild(tr);
  name.innerHTML = '';
  message.innerHTML = '';
});
var socket  = new WebSocket('ws://localhost:8080');
var message = document.getElementById('message');

function transmitMessage(){
  socket.send([names.value,'[',message.value]);
}

socket.onmessage = function(e) {
  const table = document.querySelector('table');
  var tr = document.createElement('tr');
  var td = document.createElement('td'); 
  var td2 = document.createElement('td'); // create a new paragraph element
  var corpoTabela = table.getElementsByTagName("tbody")[0];
  data = e.data.split("[");
  td.textContent = data[0]; 
  td2.textContent = data[1]; 
  console.log(data);
  tr.setAttribute('class','bg-light');
  tr.appendChild(td);
  tr.appendChild(td2);// set the text content of the paragraph element to the message received from the socket
  corpoTabela.appendChild(tr);
}
  // Prevent the form from submitting and refreshing the page