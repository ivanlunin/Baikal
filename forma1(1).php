<?php
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['submit_form'])) 
$servername = "localhost";
$username = "root";
$password = "";
// Вводим название базы данных
$dbname = "register_forms";
//Созданиие подключения
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysql_select_db('register_forms');
//Проверка кодировки utf8
mysql_query('SET NAMES UTF8') or die ("не удалось установить кодировку");
//Проверка соединения с БД
if (!$conn) {
die("Подключение не выполнено: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8"); /* Procedural approach */ $conn->set_charset("utf8"); /* Object-oriented approach */ 
//Строка с текстом sql запроса для таблицы
$sql = "INSERT INTO register_data (fio, phone, email, section, comment, news)
VALUES ('".$_POST["fio"]."','".$_POST['phone']."',
'".$_POST['email']."','".$_POST['section']."',
'".$_POST['comment']."','".$_POST['news']."')";
if (mysqli_query($conn, $sql)) {
 echo "Запись успешно добавлена</br>";
} else {
 echo "Ошибка добавления записи: " . $sql . "<br>" .
mysqli_error($conn);
}
//Закрытие соединения
mysqli_close($conn);
?>