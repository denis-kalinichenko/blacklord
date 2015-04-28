<?php
if(isset($_GET['act'])) {
  if($_GET['act']=="info") {
    $title = "Инфа не найдена";
    $content = "<div class=\"title2\">Инфа не найдена, мой раб</div>";
  }
  else {
    if($_GET['act']=="user") {
      $title = "Пользователь не существует";
    $content = "<div class=\"title\"><b>Ой</b></div><small><b>Пользователь не существует</b></small>";
    } else {
      $title = "Страница не найдена";
    $content = "<div class=\"title\"><b>404</b></div><small>Страница отсутствует</small>";
    }
  }
}
else {
    $title = "Страница не найдена";
    $content = "<div class=\"title\"><b>404</b></div><small>Страница отсутствует</small>";
  }
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
   <title>Инфасотка / <?php echo $title; ?></title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/404.css" />
   <link type="text/css" rel="stylesheet" href="/css/button.css" />
 </head>
 <body>

 <div class="block">
<center>
 <img src="/img/black_3.gif" class="photo"/><br>
 <?php echo $content; ?><br>
<table border="0"><tr><td align="center">
<a class="fancy_button" href="/">
  <span style="background-color: #990000;">Задать мне вопрос</span>
</a></td></tr></table>
</center>
  </div>

 <div id="bottom"> <a href="/">На главную</a> © <a href="http://vk.com/kalinichenk0" target="_blank"><b>D. K.</b></a>, 2012.</div>
 </body>
</html>