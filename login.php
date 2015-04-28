<title>Авторизация...</title><?php

$vk_hash = $_GET['hash'];
$user_id = $_GET['uid'];
$app_id = 3088407;
$secret = "9lsEOx6WAjpCUhoQR1hy";
$hash = md5($app_id.$user_id.$secret);

if($vk_hash==$hash) {
  // хеш правильный
mysql_connect("mysql.freehostingnoads.net", "u586415146_admin", "123456")
or die("Произошла ошибка: " . mysql_error());
mysql_select_db("u586415146_root")
or die("Нет такой базы!");
mysql_query('SET NAMES utf8');

$ip = $_SERVER['REMOTE_ADDR'];
$uid = $_GET['uid'];
$name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$photo = $_GET['photo'];
$photo_rec = $_GET['photo_rec'];

$r=mysql_query("SELECT * FROM users WHERE uid = '$uid'");
while ($row=mysql_fetch_array($r)) {
   // Такой юзер уже есть
  setcookie ("hash", $hash, time()+259200);
  setcookie ("uid", $uid, time()+259200);
  if($row['photo']==$photo) {
    // апдейти не надо
    mysql_query("UPDATE users SET ip = '$ip', last_login = NOW(), photo = '$photo', photo_rec = '$photo_rec' WHERE uid = '$uid'"); // обновляем данные
  } else {
    $photo_150 = file_get_contents('http://picru.net/api?upload='.$photo.'&resize_width=150&format=txt');
    mysql_query("UPDATE users SET ip = '$ip', last_login = NOW(), photo = '$photo', photo_rec = '$photo_rec', photo_150 = '$photo_150' WHERE uid = '$uid'"); // обновляем данные
  }
  header("Location: /welcome.php");
}
if (mysql_num_rows($r) == 0) {
  // Новый юзер
  $photo_150 = file_get_contents('http://picru.net/api?upload='.$photo.'&resize_width=150&format=txt');
  mysql_query("INSERT INTO users (uid, name, last_name, photo, photo_rec, photo_150, ip, hash, last_login) VALUES ('$uid', '$name','$last_name', '$photo', '$photo_rec','$photo_150', '$ip', '$hash', NOW())"); // регестрация
  setcookie ("hash", $hash, time()+259200);
  setcookie ("uid", $uid, time()+259200);
  header("Location: /welcome.php");
}
}
else {
  echo "Ошибка."; // хеш неверный
}

?>