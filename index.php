<?php
require_once('mobile_device_detect.php');
$mobile = mobile_device_detect();

if(isset($_COOKIE["Mobile"])) {
  if($_COOKIE["mobile"]=="false") {
   // оставим юзера на десктопной версии
  }
  else {
   if($_COOKIE["mobile"]=="true") {
  header("Location: http://m.infa.t15.org/");
  }
  else {
    mobile_device_detect(false, false, false, true, true, true, true, 'http://m.infa.t15.org/', false);
  }
  }
}
else {
  // 1.iPhone 2.iPad 3.Android 4.Opera Mini 5.Blackberry 6.Palm 7.Windows Mobile 8. Mobile Redirect URL 9.Desktop Redirect URL
mobile_device_detect(false, false, false, true, true, true, true, 'http://m.infa.t15.org/', false);
}

mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');

// моментальный текст
function encode_html($str,$type='code'){
    if($type=='code'){return htmlspecialchars($str,ENT_QUOTES);}
    if($type=='encode'){
        $trans=get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
        $trans=array_flip($trans);;
        return strtr($str, $trans);
    }
}
if(isset($_GET['text'])) {
  $text = encode_html($_GET['text']);
}
if(isset($_GET['error'])) {
 $error = $_GET['error'];
  if($error=="num1") {
    $error_text = "<div class=\"error\">Чёрный Властелин не рассматривает маленькие вопросы. Он любит большие.</div>";
 }
 if($error=="num2") {
    $error_text = "<div class=\"error\">Ваш вопрос слишком большой. Властелин восхищён, но он не может ответить всем на запросы. У него много дел.</div>";
 }
}
function declOfNum($number, $titles) {
    $cases = array (2, 0, 1, 1, 1, 2);
    return $titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
}

include('rand_date.php');
include('rand_can.php');

$r=mysql_query ("SELECT count(*) as cntName FROM `infos`");
$row=mysql_fetch_row($r);
 $num_infos = $row['0'];
$r2=mysql_query ("SELECT count(*) as cntName FROM `date`");
$row2=mysql_fetch_row($r2);
 $num_when = $row2['0'];
$r3=mysql_query ("SELECT count(*) as cntName FROM `can`");
$row3=mysql_fetch_row($r3);
 $num_can = $row3['0'];

include 'auth_check.php';
function auth_fail() {// nothing...
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
 <head>
   <title>Инфасотка</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="description" content="Узнай ответ Властелина"/>
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/main.css" />
   <link type="text/css" rel="stylesheet" href="/css/button.css" />
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script type="text/javascript" src="/js/main.js"></script>
   <script type="text/javascript" src="/js/favorite.js"></script>
 </head>
 <body>
 <div class="block">
 <table border="0" class="main" width="100%">
 <tr><td align="center">
 <img src="/img/black_2.jpg" width="200px" class="photo"/></td><td align="center">
 <div class="title"><b>Узнай ответ <span class="title2">Властелина</span></b>
<div id="num">
<span>
Рассчитано <b><?php echo "$num_infos "; echo declOfNum($num_infos, array('оценка', 'оценки', 'оценок')); ?></b>, <?php echo declOfNum($num_when, array('выдана', 'выдано', 'выдано')); echo " <b>$num_when "; echo declOfNum($num_when, array('дата', 'даты', 'дат')); ?></b> и <?php echo "<b>$num_can</b> "; echo declOfNum($num_can, array('ответ', 'ответа', 'ответов')); ?>
</span></div>
 </div></td></tr>
 </table><br><br>
 <center>
<?php echo $error_text; ?>
 <div class="section">
  <ul class="tabs">
    <li onclick="settab(1);">Когда..?</li>
    <li onclick="settab(2);">Можно..?</li>
    <li onclick="settab(3);" class="current">Оценка инфы</li>
  </ul>
  <div class="box">
<form action="calc_date.php" name="form" method="POST" onSubmit="return submit_form()">
<table class="txtarea1">
<tr><td>Когда </td><td>
<textarea name="info" class="active_no" onfocus="this.className='active_yes'" onblur="this.className='active_no'" cols="60" rows="0" onkeypress="return isNotMax(this)" id="date_input" wrap="off"><?php echo $text; ?></textarea></td><td> ?</td></tr>
</table>
 <p>Например, <a href="javascript:set_input('<?php echo $rand_date; ?>', 1)" class="ex">когда <?php echo $rand_date; ?>?</a></p>
<table border="0"><tr>
<td align="center"> <a class="fancy_button" href="javascript:submit_form(1);">
  <span style="background-color: #C66300;">Узнать</span></a>
</td>
<?php if($auth==1) { ?>
<td align="center"><a onclick="a(1);" class="privacy"><img src="http://png.findicons.com/files/icons/1579/devine/32/un_lock.png" id="privacy1" title="Приватность: выкл." width="25px"></a>
<input type="hidden" name="privacy" value="0" id="pri1"/>
</td>
<?php } ?>
</tr></table>
 </form>
  </div>
  <div class="box">
    <form action="calc_can.php" name="form2" method="POST" onSubmit="return submit_form()">
<table class="txtarea1">
<tr><td>Можно </td><td><textarea name="info" class="active_no" onfocus="this.className='active_yes'" onblur="this.className='active_no'" cols="60" rows="0" onkeypress="return isNotMax(this)" id="can_input" wrap="off"><?php echo $text; ?></textarea></td><td> ?</td></tr>
</table>
<p>Например, <a href="javascript:set_input('<?php echo $rand_can; ?>', 2)" class="ex">можно <?php echo $rand_can; ?>?</a></p>
<table border="0"><tr>
<td align="center"> <a class="fancy_button" href="javascript:submit_form(2);">
  <span style="background-color: #996666;">Узнать</span></a></td>
  <?php if($auth==1) { ?>
<td align="center"><a onclick="a(2);" class="privacy"><img src="http://png.findicons.com/files/icons/1579/devine/32/un_lock.png" id="privacy2" title="Приватность: выкл." width="25px"></a>
<input type="hidden" name="privacy" value="0" id="pri2"/>
</td>
<?php } ?>
  </tr></table>
 </form>
  </div>
  <div class="box visible">
    <form action="calc.php" name="form3" method="POST" onSubmit="return submit_form()"><br>
 <textarea name="info" placeholder="Введите инфу..." class="active_no" onfocus="this.className='active_yes'" onblur="this.className='active_no'" id="txtInput" cols="60" rows="0" onkeypress="return isNotMax(this)"><?php echo $text; ?></textarea><br>
<br>
<table border="0">
<tr>
<td align="center"> <a class="fancy_button" href="javascript:submit_form(3);">
  <span style="background-color: #070;">Узнать</span>
</a>
</td>
<?php if($auth==1) { ?>
<td align="center"><a onclick="a(3);" class="privacy"><img src="http://png.findicons.com/files/icons/1579/devine/32/un_lock.png" id="privacy3" title="Приватность: выкл." width="25px"></a>
<input type="hidden" name="privacy" value="0" id="pri3"/>
</td>
<?php } ?>
</tr>
</table>
 </form>
  </div>
</div>
<span class="copy">
«Инфасотка» © 2012<br><a href="http://lurkmore.to/Чёрный_Властелин" target="_blank" class="lurkmore">Lurkmore <img src="/img/ex_link.png"/></a>
</span>

<?php 
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if($_SERVER['REMOTE_ADDR'] == "91.246.67.25") {

?>
<div>
<br/>
<big style="color: red;">Как в Варшаве?</big>
</div>
<?php } ?>

 </center>

<div id="bottom">
   <a href="/feed">Лента</a>
 <a href="/terms">Правила</a>
 <a href="http://m.infa.t15.org">Мобильная</a>
 <a href="javascript:share();">Поделиться</a>
 <a href="javascript:author();">Автор</a>
 <a href="javascript:about();">О сайте</a>
  <div id="share">
<table width="100%">
<tr><td style="padding-left:50px;"><input type="text" value="http://infa.t15.org" readonly="readonly" class="link_share" /></td>
<td><a href="#vk" title="ВКонтакте" onclick="window.open('http://vk.com/share.php?url=http://infa.t15.org','Инфасотка','width=700,height=500')"><img src="/img/soc/vk.png"/></a>
<a href="#fb" title="Facebook" onclick="window.open('https://www.facebook.com/sharer.php?u=http%3A%2F%2Finfa.t15.org','Facebook','width=660,height=350')"><img src="/img/soc/fb.png"/></a>
<a href="#tw" title="Twitter" onclick="window.open('https://twitter.com/intent/tweet?original_referer=http://infa.t15.org&text=Узнай ответ Властелина&url=http://infa.t15.org','Facebook','width=660,height=350')"><img src="/img/soc/tw.png"/></a></td>
<td><a href="javascript:void(0)" onclick="return bookmark(this)">Добавить в избранное</a></td>
</tr>
</table>
  </div>
  <div id="author">
    <span id="vk_subscribe"></span>
    <a href="https://twitter.com/kalinichenk0" class="twitter-follow-button" data-show-count="false" data-lang="ru" data-show-screen-name="false">Читать @kalinichenk0</a>
    <br>По всем вопросам и др. <b>support@infa.t15.org</b>
  </div>
  <div id="about">
    <br>Следите за последними новостями сайта в нашем Twitter-аккаунте <a href="http://twitter.com/infasotka">@<b>infasotka</b></a>.<br>Обратная связь: <b>support@infa.t15.org</b>
  </div>
</div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $('#txtInput').jtextarea();
  });
</script>
<?php include 'metrika.php'; ?>
<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?49"></script>
<script type="text/javascript">
VK.Widgets.Subscribe("vk_subscribe", {width: 295}, 27415682);
</script>
</html>