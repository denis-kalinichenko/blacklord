<?php

mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');


?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Инфасотка / Последнее</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link type="text/css" rel="stylesheet" href="/css/feed.css" />
 </head>
 <body>

 <div class="block">
 <div class="title"><b>Последняя инфа</b></div><hr/>
 <table border="0" class="main">
 <?php

$r=mysql_query ("SELECT * FROM infos ORDER BY id DESC LIMIT 0,25");
while ($row=mysql_fetch_array($r)) // для каждой записи организуем вывод.
{
		?>
         <tr><td><b><?php
         if($row['res']>49) {
           echo "<span class=\"gr\">".$row['res']."%</span>";
         }
         else {
          echo "<span class=\"red\">".$row['res']."%</span>";
         }
        ?></b></td><td style="color:#CCCCCC">—</td><td><a href="/<?php echo $row['id']; ?>" class="href"><?php echo $row['info']; ?></a></td></tr>
		<?php
	$c++;
}
if ($c==0)
	echo "История очищена.";
   ?>
</table>

  </div>

 <div id="bottom">gfh</div>
 </body>
</html>