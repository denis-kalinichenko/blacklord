<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
 <head>
   <title>Инфасотка / Авторизация</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/auth.css" />
   <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?52"></script>
<script type="text/javascript">
  VK.init({apiId: 3088407});
</script>
<script type="text/javascript">
VK.Widgets.Auth("vk_auth", {width: "210px", authUrl: 'http://infa.t15.org/login.php'});
   function go_home() {
     document.getElementById("link").innerHTML="<b>Как хотите...</b>";
   }
</script>
 </head>
 <body>
 <div class="block">
<table border="0" width="100%">
<tr><td width="230px"><div id="auth"><div id="vk_auth"></div></div></td><td><div id="auth">
<h1>Авторизация на сайте</h1>
Авторизация не занимает Вашего лишнего времени и труда. <b>Регистрация/вход</b> на сайт осуществляется благодаря виджету социальной сети <b>ВКонтакте</b> и не требует ввода информации и прочей фигни. <b>Один клик.</b>
</div></td></tr>
</table>
<br>
<center><a href="/" onclick="go_home();" id="link">« Вернуться на главную</a></center>

</div>
</body>
<?php include 'metrika.php'; ?>
</html>