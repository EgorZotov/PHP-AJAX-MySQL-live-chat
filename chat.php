<?
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="styles/fonts.css">
	<link rel="stylesheet" type="text/css" href="styles/chat.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src = "scripts/chat.js"></script>
	<script>var session_user = '<?echo $_SESSION['username']?>';</script>
</head>

<body>
<div class='background'>
	<header id ="top">
		<a href = "/"><img id ='back' src ="images/IconBack.png"></a>
		<img id ='more' src ="images/IconMore.png">
		<p>Тестовое задание</p>
	</header>
	<div id = "messages-wrapping">
	
	</div>
	<div id="message-form">
	 <form id='post'>
	 	<input type="text" name="message" placeholder="Type your message...">
	 	<input type="button" value="&#10148" onclick = "sendPost()">
	 </form>
	</div>
</div>
</body>
</html>
