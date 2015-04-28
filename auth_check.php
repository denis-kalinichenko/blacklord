<?php
if(isset($_COOKIE['hash'], $_COOKIE['uid'])) {
   $app_id = 3088407;
   $secret = "ksdpofjspodfposfpsf";
   $uid = $_COOKIE['uid'];
   $pre_hash = md5($app_id.$uid.$secret);
   if($pre_hash==$_COOKIE['hash']) {
     // Хеш вроде верный
   $ip = $_SERVER['REMOTE_ADDR'];
   include 'mysql.php'; // Подключение БД
   $check = mysql_query("SELECT * FROM users WHERE hash = '$pre_hash'");
   $row=mysql_fetch_array($check);
   if($row['uid']==$uid AND $row['hash']==$pre_hash AND $ip==$row['ip']) {
         // пользователь верный, всё чисто
         $auth = 1;
          $id = $row['id'];
          $uid = $row['uid'];
          $name = $row['name'];
          $last_name = $row['last_name'];
          $photo = $row['photo'];
          $photo_rec = $row['photo_rec'];
   } else {
        auth_fail(); // несовпадение с БД
   }
   } else {
     auth_fail(); // левый хеш
   }
} else {
  auth_fail(); // кукисы левые
}
?>