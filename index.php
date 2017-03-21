<?
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Authorization</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="styles/fonts.css">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
<script>
function redirect(name)//функция перенаправления на другую страницу.
    {
      alert("Добро пожаловать,"+name+"!");//вывод приветствия.
      document.location = 'chat.php';//переход к другому файлу.
    } 
</script>    
<div id="logo">
 <img src="images/logo.png">
 <h1> Chat </h1>
 </div>
<div id="form-wrapping">
	<div id="input-wrapping">
	<form action="" method="POST">
		<span>USERNAME</span>
		<input type="text" name="username">
		<hr width="100%" align="left">
	</div>	
		<input type="submit" name="sub" value="Start Chat                                     &#10148">
	</form>
</div>
<?
 if($_POST['sub'])//если форма была подтверждена
 {
 	if (!empty($_POST['username'])){//проверка на то,заполнено ли поле с данными.
 	$_SESSION['username']=$_POST['username'];//помещаем данные из поля в сессию.
 	echo '<script>redirect(\''.$_POST['username'].'\')</script>';//выполняем функцию перенаправления на другую страницу.
 }
 else
 	echo '<script>alert("Write your username!")</script>';//пишем сообщение об ошибке ввода.
 }
 
?>
</body>
</html>
