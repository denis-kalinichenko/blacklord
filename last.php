<?php

mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');


?><?php
require_once('mobile_device_detect.php');
$mobile = mobile_device_detect();

// 1.iPhone 2.iPad 3.Android 4.Opera Mini 5.Blackberry 6.Palm 7.Windows Mobile 8. Mobile Redirect URL 9.Desktop Redirect URL
mobile_device_detect(false, false, false, true, true, true, true, 'http://m.infa.t15.org/feed.php', false);
function encode_html($str,$type='code'){
    if($type=='code'){return htmlspecialchars($str,ENT_QUOTES);}
    if($type=='encode'){
        $trans=get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
        $trans=array_flip($trans);;
        return strtr($str, $trans);
    }
}
if(isset($_GET['search'])) {
  $q = $_GET['search'];
  $q = preg_replace("/  +/", " ", trim($q));
  $q = substr($q, 0, 160);
  $q = encode_html($q);
}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
   <title>Инфасотка / Последнее</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/last.css" />
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script type="text/javascript" src="/js/search.js"></script>
 </head>
 <body>

 <div class="block">
 <div class="title"><b>Последняя инфа</b><span class="search">
<form action="/last" method="GET">
<input type="text" name="search" placeholder="Поиск" id="search"<?php
if($q=="") {
  // если пусто то ничего
}
else {
  echo " value=\"".$q."\"";
}
?> onkeyup="ajax_search()" onFocus="this.style.opacity='1'" onblur="this.style.opacity='0.8'"/>
</form>
</span></div><hr/>
<div id="ajax_cont">
<table border="0" class="main">
<?php
 if($q=="") {
 include 'al_last.php';
 }
 else {
   $query= mysql_query("SELECT * FROM infos WHERE info LIKE '%$q%' ORDER BY id DESC");
   $result= mysql_num_rows($query);

if ($result == 0) {
echo "<div class=\"notice\">Властелин не нашёл в базе инфу с <b>\"$q\"</b>. <a href=\"/?text=$q\">Задать вопрос</a>.</div>";
exit;
}
else {
$r2=mysql_query ("SELECT count(*) as cntName FROM `infos`");
$row2=mysql_fetch_row($r2);
$all_infos = $row2['0'];
function declOfNum($number, $titles) {
    $cases = array (2, 0, 1, 1, 1, 2);
    return $titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
}
$word = declOfNum($result, array('Найден', 'Найдено', 'Найдено'));
$word2 = declOfNum($result, array('результат', 'результата', 'результатов'));
$word3 = declOfNum($result, array('записи', 'записей', 'записей'));
echo "<div class=\"notice2\">$word <b>$result</b> $word2 по запросу \"$q\" среди <b>$all_infos $word3</b> в базе Чёрного Властелина</div>";
}

while ($row= mysql_fetch_array($query))
{
		?>
         <tr><td><b><?php
         if($row['res']>49) {
           echo "<span class=\"gr\">".$row['res']."%</span>";
         }
         else {
          echo "<span class=\"red\">".$row['res']."%</span>";
         }
        ?></b></td><td style="color:#CCCCCC">—</td><td><a href="/i/<?php echo $row['id']; ?>" class="href"><?php echo $row['info']; ?></a></td></tr>
		<?php
	$c++;
}
 }
 ?>
</table>
</div>
  </div>
 </body>
 <?php include 'metrika.php'; ?>
</html>