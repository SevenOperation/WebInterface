<script>var connection = new WebSocket("wss://www.wearethegamers.de:8765");
connection.onopen = function(){
 connection.send('{"room":"roomId","username":"usernameId","message":""}');
};
connection.onerror = function(error){
console.log('WebSocket Error' + error);
};
connection.onmessage = function (e){
console.log('Server:' + e.data);
var div = document.getElementById('chatBox');
if(div.scrollTop == div.scrollHeight - div.clientHeight){
div.innerHTML += e.data;
div.scrollTop = div.scrollHeight;
}else{
div.innerHTML += e.data;
}
}
var lastMessage = "";
function sendChatMessage(message){
	if(event.key === 'Enter'){
		connection.send('{"message":"'+message.value+'"}');
		lastMessage = message.value;
		message.value = "";
	}else if(event.key === 'ArrowUp'){
		message.value = lastMessage;	
	}
}
function whisper(recipient){
	var input = document.getElementById('messageInput');
	input.value = "w\\\\"+recipient.innerText;
}
</script>
