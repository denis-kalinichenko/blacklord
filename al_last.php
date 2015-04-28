 <?php
$r=mysql_query ("SELECT * FROM infos ORDER BY id DESC LIMIT 0,25");
while ($row=mysql_fetch_array($r)) // для каждой записи организуем вывод.
{
		?><tr><td><b><?php
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
if ($c==0)
	echo "История очищена.";
?>