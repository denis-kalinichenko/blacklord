<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Инфасотка</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="/js/mobile.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="/css/mobile.css" />
  </head>
<body>
<center><img src="http://infa.t15.org/img/black_2.jpg" width="70%" class="photo"/><br /><br />
<big>Узнай ответ<br /><b>Властелина</b></big>

<div id="nav">
<a href="/d.php">Когда?</a> <a href="/c.php">Можно?</a> <span>Оценка инфы</span>
</div>
<form action="calc.php" name="form" method="GET">
<table border="0" class="input">
<tr><td align="center"><textarea type="text" name="info" id="txtInput" rows="1" cols="18"></textarea></td><td align="center"><a href="#" onclick="return submit_form(1);" class="send">Узнать</a></td></tr>
</table>
</form>
<table class="help">
<tr><td valign="middle" width="20%"><img src="/help.jpg" width="100%"/></td><td>Получи моментальную оценку своей инфы от ЧВ</td></tr>
</table>
</center>
<div id="bottom">
<a href="/feed">Последнее</a> <a href="http://infa.t15.org/ver.php?set=desc">Полная версия</a> <a href="http://vk.com/kalinichenk0">Автор</a>
</div>
</body>
<?php include('metrika.php'); ?>
</html>