<?php
mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');

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

if(isset($_GET['act'])) {
  if($_GET['act']=="") {$act = 1;}
  if($_GET['act']=="date") {$act = 2;}
  if($_GET['act']=="can") {$act = 3;}
} else {$act = 1;}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
   <title>Инфасотка / Лента</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/feed.css" />
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
   <script type="text/javascript" src="/js/search2.0.js"></script>
   <script type="text/javascript" src="/js/feed_ui.js"></script>
 </head>
 <body>
 <div class="block">
 <table width="100%" border="0" class="top">
<tr>
<td width="28%"><span class="name">Лента инфы</span>
<br><a href="/"><small>Перейти на главную</small></a></td>
<td class="opt1"><?php
if($act==1) {echo '<a href="/feed?act=date" class="opt_hr_top">Когда..?</a> <a href="/feed?act=can" class="opt_hr_top">Можно..?</a> <span class="opt_act_top">Оценка инфы</span>';}
if($act==2) {echo '<span class="opt_act_top">Когда..?</span> <a href="/feed?act=can" class="opt_hr_top">Можно..?</a> <a href="/feed" class="opt_hr_top">Оценка инфы</a>';}
if($act==3) {echo '<a href="/feed?act=date" class="opt_hr_top">Когда..?</a> <span class="opt_act_top">Можно..?</span> <a href="/feed" class="opt_hr_top">Оценка инфы</a>';}
?></td>
<td width="100px">
<form action="/feed" method="GET">
<input type="text" name="search" placeholder="Поиск по инфе" id="search"<?php
if($q=="") {
  // если пусто то ничего
}
else {
  echo " value=\"".$q."\"";
}
?> onkeyup="ajax_search()" onFocus="this.style.opacity='1'" onblur="this.style.opacity='0.8'"/>
</form>
</td>
</tr>
</table>
<div id="ajax_cont">
<?php
 if($q=="") {
if($act==1) {include 'al_last2.php';}
if($act==2) {include 'al_last_date.php';}
if($act==3) {include 'al_last_can.php';}
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
         <a href="/i/<?php echo $row['id']; ?>" class="post">
<table><tr><td><?php echo $row['info']; ?></td>
<td <?php
          if($row['res']==100) {
          echo "class=\"gold\">
          <small>Оценка</small><br />
          ".$row['res']."%</td>";
         }
         else {
          if($row['res']>49) {
           echo "class=\"gr\">
           <small>Оценка</small><br />
           ".$row['res']."%</td>";
         }
         else {
          echo "class=\"red\">
          <small>Оценка</small><br />
          ".$row['res']."%</td>";
         }
         }
        ?>
</tr></table>
         </a><?php
	$c++;
}
 }
 ?>
</div>
<div id="loadMore" style="display:none;" > <center><img src="/img/load_posts.gif"/></center></div>
  </div>
 </body>
<div id="topnav">
<table width="100%" height="100%" border="0">
<tr>
<td class="title2" onclick="scrolltop()">Каталог инфы</td>
<td class="opt"><?php
if($act==1) {echo '<a href="/feed?act=date" class="opt_hr">Когда..?</a> <a href="/feed?act=can" class="opt_hr">Можно..?</a> <span class="opt_act">Оценка инфы</span>';}
if($act==2) {echo '<span class="opt_act">Когда..?</span> <a href="/feed?act=can" class="opt_hr">Можно..?</a> <a href="/feed" class="opt_hr">Оценка инфы</a>';}
if($act==3) {echo '<a href="/feed?act=date" class="opt_hr">Когда..?</a> <span class="opt_act">Можно..?</span> <a href="/feed" class="opt_hr">Оценка инфы</a>';}
?></td>
<td width="300px"><span class="search">
<form action="/feed" method="GET">
<input type="text" name="search" placeholder="Поиск по инфе" id="search"<?php
if($q=="") {
  // если пусто то ничего
}
else {
  echo " value=\"".$q."\"";
}
?> onFocus="this.style.opacity='1'" onblur="this.style.opacity='0.8'"/>
</form>
</span></td>
</tr>
</table>
</div>
 <?php include 'metrika.php'; ?>
</html>