<?php

if(isset($_GET['set'])) {
 $set = $_GET['set'];

 if($set=="desc") {
   SetCookie("Mobile","false");
   header("Location:http://infa.t15.org/");
   echo "<meta http-equiv=\"refresh\" content=\"0; url=http://infa.t15.org/\">\n";
   echo "<script type=\"text/javascript\">\n";
echo "<!--\n";
echo "location.replace(\"http://infa.t15.org/\");\n";
echo "//-->\n";
echo "</script>\n";
 }
 else {
   if($set=="mob") {
     SetCookie("Mobile","true");
     header("Location:http://m.infa.t15.org/");
   }
   else {
     echo "Неправильный параметр.";
   }
 }
}
else {
  echo "Ошибка. Не понятно куда направлять Вас. <a href='http://infa.t15.org'>Перейдите на обычную версию</a>.";
}

?>