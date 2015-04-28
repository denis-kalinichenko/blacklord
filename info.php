<?php

mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');

$id = $_GET['id'];
$result = mysql_query("SELECT info,res FROM infos WHERE id = '$id'");
if (!$result) {
    echo 'Ошибка запроса';
    exit;
}
$row = mysql_fetch_row($result);

$text = $row[0];
$res = $row[1];
if($res=="") {
  header("Location:/404.php?act=info");
}
?><?php
require_once('mobile_device_detect.php');
$mobile = mobile_device_detect();

// 1.iPhone 2.iPad 3.Android 4.Opera Mini 5.Blackberry 6.Palm 7.Windows Mobile 8. Mobile Redirect URL 9.Desktop Redirect URL
mobile_device_detect(false, false, false, true, true, true, true, 'http://m.infa.t15.org/i/'.$id.'', false);
include 'auth_check.php';
function auth_fail() {// nothing...
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
 <head>
   <title>Инфасотка / <?php echo $text; ?> — <?php echo $res; ?>%</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="title" content="Инфасотка" />
   <meta name="description" content="<?php
   echo "[ $text ]";
   if($res > 49) {
      echo "\n Оценка инфы: $res%\nОдобрено Чёрным Властелином";
   }
   else {
    echo "\n Оценка инфы: $res%\nНе одобрено Чёрным Властелином";
   }
   ?>" />
   <link rel="image_src" href="/img/black_1.jpg" />
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/date.css" />
   <link type="text/css" rel="stylesheet" href="/css/main.css" />
   <script type="text/javascript" src="/js/main.js"></script>
   <script type="text/javascript" src="/js/favorite.js"></script>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 </head>
 <body>
<div class="block">
 <center>
 <img src="/img/black_1.jpg" width="400px" class="photo"/><br><br>
 <div class="question"><?php echo $text; ?></div>
 <div class="answer"><?php
 if($res > 99) {
  echo "<span class=\"gold\"><b>$res%</b></span>";
}
else {
  if($res < 49) {
  echo "<span class=\"red\">$res%</span>";
}
else {
  echo "<span class=\"gr\">$res%</span>";
}
}
?></div><?php if($auth==1) { ?>
<a href="#" class="like" onclick="like(3);">Лооооооооол</a> / <a href="#" class="faves" onclick="fave(3);"> В избранное</a>
<h1>Последний коментарий из .</h1>
<?php } ?></center>

<div id="bottom">
 <a href="/#tab3">Задать вопрос</a>
 <a href="/feed">Лента <sup>NEW</sup></a>
 <a href="/terms">Правила</a>
 <a href="javascript:share();" class="share">Поделиться</a>
 <a href="javascript:author();">Автор</a>
  <div id="share">
<table width="100%">
<tr><td style="padding-left:50px;"><input type="text" value="http://infa.t15.org/i/<?php echo $id; ?>" readonly="readonly" class="link_share" /></td>
<td><a href="#vk" title="ВКонтакте" onclick="window.open('http://vk.com/share.php?url=http://infa.t15.org/i/<?php echo $id; ?>','Инфасотка','width=700,height=500')"><img src="/img/soc/vk.png"/></a>
<a href="#fb" title="Facebook" onclick="window.open('https://www.facebook.com/sharer.php?u=http%3A%2F%2Finfa.t15.org/i/<?php echo $id; ?>','Facebook','width=660,height=350')"><img src="/img/soc/fb.png"/></a>
<a href="#tw" title="Twitter" onclick="window.open('https://twitter.com/intent/tweet?original_referer=http://infa.t15.org/i/<?php echo $id; ?>&text=Когда <?php echo $text; ?>?&url=http://infa.t15.org/i/<?php echo $id; ?>','Twitter','width=660,height=350')"><img src="/img/soc/tw.png"/></a></td>
<td><a href="javascript:void(0)" onclick="return bookmark(this)">Добавить в избранное</a></td>
</tr>
</table>
  </div>
  <div id="author">
    <span id="vk_subscribe"></span>
    <a href="https://twitter.com/kalinichenk0" class="twitter-follow-button" data-show-count="false" data-lang="ru" data-show-screen-name="false">Читать @kalinichenk0</a>
    <br>По всем вопросам и др. <b>support@infa.t15.org</b>
  </div>
</div>
</div>

 </body>
 <?php include 'metrika.php'; ?>
 <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?49"></script>
<script type="text/javascript">
VK.Widgets.Subscribe("vk_subscribe", {width: 295}, 27415682);
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</html>
