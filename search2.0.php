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
if(isset($_POST['text'])) {
  $q = $_POST['text'];
  $q = preg_replace("/  +/", " ", trim($q));
  $q = substr($q, 0, 160);
  $q = encode_html($q);
}

?>
<?php
 if($q=="") {
 include 'al_last2.php';
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
         </a>
		<?php
	$c++;
}
 }
 ?>