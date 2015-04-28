<?php
ob_start();
if(isset($_GET['id'])) {
   $id = $_GET['id']; // айди юзера
   include 'mysql.php'; // БД подключаем
   $sqlQuery = mysql_query('SELECT * FROM users WHERE id = "'.mysql_real_escape_string($id).'"');
   while ($row=mysql_fetch_array($sqlQuery)) {
     // есть такое тело
     $uid = $row['uid'];
          $name = $row['name'];
          $last_name = $row['last_name'];
          $photo = $row['photo'];
          $photo_rec = $row['photo_rec'];
          $photo_150 = $row['photo_150'];
          ob_end_clean();
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
   <title><?php echo $name; ?> на Инфасотке</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="shortcut icon" href="/favicon.ico" />
   <link type="text/css" rel="stylesheet" href="/css/user.css"/>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 </head>
<body>
 <center>
 <div id="block">
 <table border="0" width="100%" class="user_info">
 <tr><td class="names"><h1><?php echo $name."<br>".$last_name; ?></h1><br><h2>Анальный раб №<b><?php echo $id; ?></b></h2></td><td width="25%"><img src="<?php echo $photo_150;?>" class="user_photo"/></td></tr>
 </table>
 <table width="100%" class="top_m">
 <tr>
 <td width="30px" align="center"><a href="/" class="back_l" title="Вернуться на главную"> &#9668;</a></td>
 <td align="center"><span class="top_act">Инфа пользователя</span></td>
 <td align="center"><a href="/fave/<?php echo $id; ?>" class="top_bt">Избранное пользователя</a></td>
 <td align="center"><a href="/likes/<?php echo $id; ?>" class="top_bt">Понравилось</a></td>
 </tr>
 </table>
<table width="100%" class="user_infos">
<tr><td width="33%" align="center"><h3>Когда?</h3></td><td width="33%" align="center"><h3>Можно?</h3></td><td align="center"><h3>Инфа</h3></td></tr>
<tr><td valign="top">
<?php
 $r=mysql_query("SELECT * FROM date WHERE user = ".$id." ORDER BY id DESC");
 while ($info=mysql_fetch_array($r)) {
   if($info['privacy']==0) {
?>
 <a href="/d/<?php echo $info['id']; ?>" class="info date_l"><b>Когда</b> <?php echo $info['info']; ?>?</a>
<?php
} else {
  // приватность, хуле
}
$c++;
}
if ($c==0)
	echo "Пользователь ещё не оставил инфы...";
?>
</td><td valign="top">
<?php
 $r=mysql_query("SELECT * FROM can WHERE user = ".$id." ORDER BY id DESC");
 while ($info=mysql_fetch_array($r)) {
 if($info['privacy']==0) {
?>
 <a href="/c/<?php echo $info['id']; ?>" class="info date_c">Можно <?php echo $info['info']; ?>?</a>
<?php
} else {
  // приватность, хуле
}
$c++;
}
if ($c==0)
	echo "Пользователь ещё не оставил инфы...";
?>
</td><td valign="top">
<?php
 $r=mysql_query("SELECT * FROM infos WHERE user = ".$id." ORDER BY id DESC");
 while ($info=mysql_fetch_array($r)) {
  if($info['privacy']==0) {
?>
 <a href="/i/<?php echo $info['id']; ?>" class="info date_i"><?php echo $info['info']; ?></a>
<?php
} else {
  // приватность, хуле
}
$c++;
}
if ($c==0)
	echo "Пользователь ещё не оставил инфы...";
?>
</td></tr>
</table>
</div>
</center>
</body>
</html><?php
   }
   if (mysql_num_rows($sqlQuery) == 0) {
     // нет такого тела
     include("http://infa.t15.org/404.php?act=user");
     }
} else {
  header("Location:/");
}
?>