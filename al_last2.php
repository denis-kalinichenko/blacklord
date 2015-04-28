<?php
$r=mysql_query ("SELECT * FROM infos ORDER BY id DESC LIMIT 0,50");
while ($row=mysql_fetch_array($r)) // для каждой записи организуем вывод.
{
		?>
         <a href="/i/<?php echo $row['id']; ?>" class="post" id="<?php echo $row['id']; ?>">
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
if ($c==0)
	echo "История очищена.";
?>