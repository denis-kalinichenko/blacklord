<?php
function auth_fail() {
  header("Location: /auth.php");
}
include 'auth_check.php';
if($auth==1) { // если юзер авторизован, то выводим всё содержимое
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
 <head>
   <title>Инфасотка / Добро пожаловать!</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/main.css" />
   <link type="text/css" rel="stylesheet" href="/css/welcome.css" />
 </head>
 <body>
 <div class="block">
<center><img src="<?php echo $photo; ?>" class="user_pic"/><br><br>
<span class="user_name"><?php echo $name." ".$last_name; ?></span>
</center>
<br>
<div class="greeting">
Добро пожаловать, <span class="user_id">Анальный раб №<?php echo $id; ?></span>! Чёрный Властелин приветствует тебя,  <b><?php echo $name; ?></b>.<br>
Авторизовавшись, Вы имеете возможность <b>комментировать</b> инфу, добавлять её в <b>избранное</b>, <b>лайкать</b> и публиковать от <b>своего</b> имени. Спасибо.<br>
Что бы начать веселье перейдите на <a href="/user/<?php echo $id; ?>" class="fave">Свою страницу</a> или <a href="/"><b>задайте новый вопросик</b></a> Чёрному Властелину.<br><br>
<small>О проблемах, связаных с авторизацией, инфой и другим функционалом, пишите на <b>support@infa.t15.org</b></small>
</div>

<div id="bottom">
 <a href="/">Задать вопрос</a>
 <a href="/user/<?php echo $id; ?>" class="fave">Моя страница</a>
 <a href="/feed">Лента</a>
 <a href="/posts/<?php echo $id; ?>">Моя инфа</a>
 <a href="/fave/<?php echo $id; ?>">Моё избранное</a>
</div>
</div>
</body>
<?php include 'metrika.php'; ?>
</html>
<?php
} else {
  header("Location:/auth.php");
}
?>