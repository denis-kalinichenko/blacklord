<?php mysql_connect("localhost", "root", "") or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');
?>