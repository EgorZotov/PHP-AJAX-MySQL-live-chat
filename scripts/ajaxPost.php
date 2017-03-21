<?
$link = mysql_connect('localhost','username','password');//соединение с базой
mysql_select_db('database');//выбор базы данных
$text = $_POST['text'];//перенос данных из post в переменные
$author = $_POST['author'];
mysql_query("INSERT INTO chatroom (username,message) VALUES ('".$author."','".$text."')");//запрос на отправку данных в базу
?>