<?php
require_once('mobile_device_detect.php');
$mobile = mobile_device_detect();

if(isset($_GET['from'])) {
  if($_GET['from']=="mobile") {
    setcookie ("mobile", 1);
  }
}
if(isset($_COOKIE["mobile"])) {
  if($_COOKIE["mobile"]==1) {
   $mobile = 1;
  }
  else {
// 1.iPhone 2.iPad 3.Android 4.Opera Mini 5.Blackberry 6.Palm 7.Windows Mobile 8. Mobile Redirect URL 9.Desktop Redirect URL
mobile_device_detect(false, false, false, true, true, true, true, 'http://m.infa.t15.org/', false);
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

$r=mysql_query ("SELECT count(*) as cntName FROM `infos`");
$row=mysql_fetch_row($r);
$num = $row['0'];


// ловушка
if($_GET['auth']=="ok") {
  // auth
}
else {
if($_SERVER['REMOTE_ADDR']=="93.78.151.7") {
  header("Location:/auth.php");
}
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
 <head>
   <title>Инфасотка 0.8</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="description" content="Узнай оценку Властелина"/>
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/style.css" />
   <link type="text/css" rel="stylesheet" href="/css/button.css" />
   <link type="text/css" rel="stylesheet" href="/css/tooltip.css" />
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script type="text/javascript" src="/js/main.js"></script>
   <script type="text/javascript" src="/js/tooltip.js"></script>
   <script type="text/javascript" src="/js/md.js"></script>
 </head>
 <body>
 <div class="block">
 <table border="0" class="main" width="100%">
 <tr><td align="center">
 <img src="/img/black_2.jpg" width="200px" class="photo"/></td><td align="center"> <div class="title"><b>Узнай оценку <span class="title2">Властелина</span></b><div id="num">Рассчитано <b><?php echo $num; ?></b> оценок</div>
 <?php echo $error_text; ?>
 </div></td></tr>
 </table><br><br>
 <center>
 <form action="calc.php" name="form3" method="POST" onSubmit="return submit_form()">
 <textarea name="info" placeholder="Введите вопрос..." class="active_no" onfocus="this.className='active_yes'" onblur="this.className='active_no'" id="txtInput" cols="60" rows="0" onkeypress="return isNotMax(this)"><?php echo $text; ?></textarea><br>
<br>
<table border="0">
<tr>
<td align="center"> <a class="fancy_button" href="javascript:submit_form(3);">
  <span style="background-color: #070;">Узнать</span>
</a>
</td>
</tr>
</table>
 </form>
 </center>
  </div>

 <div id="bottom"><a href="http://lurkmore.to/Чёрный_Властелин" target="_blank" class="lurkmore">Lurkmore <img src="/img/ex_link.png"/></a><?php if($mobile==1) {echo " / <a href=\"http://m.infa.t15.org/\">Мобильная версия</a>";} ?><a href="#" class="menu_hr" rel='tipsy' onclick='open_menu();'>Меню</a></div>
 <div id="menu">
 <span class="head_menu">Выберите раздел <img src="/img/close_tooltip.png" onclick="close_menu();" class="tipsy_close"/></span><hr/>
 <a href="/feed" class="item">Каталог <sup style="color:#FF0000;"><b>NEW</b></sup></a>
 <a href="/terms" class="item">Правила</a>
 <a href="http://m.infa.t15.org" class="item">Мобильная</a>
  <a href="/share" class="item" onclick="share();return false;">Поделиться</a>
 <a href="/developer" class="item">Автор</a>
 <br>
 </div>
 <div id="box_overlay"></div>
 <div id="box">
 <span id="box_title"></span><a href="javascript:hide_box();" class="box_close">Закрыть</a><br><br>
<div id="box_content">
<span style="display:none;padding:10px;" id="loader"><center>Загрузка...</center></span>
</div>
</div>
 </body>
<script type="text/javascript">
  $(document).ready(function(){
    $('#txtInput').jtextarea();
  $('#bottom a[rel=tipsy]').tipsy({trigger: 'focus', gravity: 'se'});
  });
</script>
<?php include 'metrika.php'; ?>
</html>