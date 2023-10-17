<?php
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'sdt';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);

$res = mysqli_query($link, 'SELECT * FROM test');

$row = mysqli_fetch_assoc($res);

var_dump($res);





