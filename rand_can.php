<?php
  $quotes2[] = 'я скачаю песню Джастина Бибера';
    $quotes2[] = 'я уеду в Африку';
    $quotes2[] = 'удалить папку Windows';
    $quotes2[] = 'мне стать звездой';
    $quotes2[] = 'научиться танцевать под Дабстеп';
    $quotes2[] = 'я брошу свою девушку';
    $quotes2[] = 'я выкину с окна компьютер';
    $quotes2[] = 'стать президентом';
    $quotes2[] = 'взломать Google';
 srand ((double) microtime() * 1000000);
    $random_number2 = rand(0,count($quotes2)-1);
 $rand_can = ($quotes2[$random_number2]);
?>