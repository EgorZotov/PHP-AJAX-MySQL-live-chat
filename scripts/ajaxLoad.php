<?
$link = mysql_connect('localhost','username','password');//соединение с базой
mysql_select_db('database');//выбор базы данных
$result = mysql_query("SELECT * FROM chatroom ORDER BY id");//получение данных из базы.
$json_data = array();//иниицализация массива.
while ($row = mysql_fetch_assoc($result))//перебор значений вернувшихся из базы в виде ассоцитивного массива.
{
 $json_data[] = $row;//заполнение массива данными из базы.
}
echo json_encode($json_data);//представление массива в виде json строки.
?>