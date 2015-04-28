<?php

mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');


$ip = $_SERVER['REMOTE_ADDR'];


  $sql="INSERT INTO sterva(IP, date) VALUES ('$ip', NOW())";
  $res=mysql_query ($sql);
  include 'metrika.php';
header("Location:http://vk.com/klimenkoalina");
?>