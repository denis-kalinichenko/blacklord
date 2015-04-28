<?php
$r=mysql_query ("SELECT * FROM can ORDER BY id DESC LIMIT 0,100");
while ($row=mysql_fetch_array($r)) // для каждой записи организуем вывод.
{
		?>
         <a href="/c/<?php echo $row['id']; ?>" class="post">
         <table><tr><td>Можно <?php echo $row['info']; ?>?</td></tr></table></a>
<?php
	$c++;
}
if ($c==0)
	echo "История очищена.";
?>