<?php
// функция преобразования даты на русский язык
function russianDate($date){
    $date=explode(".", $date);
    switch ($date[1]){
        case 1: $m='января'; break;
        case 2: $m='февраля'; break;
        case 3: $m='марта'; break;
        case 4: $m='апреля'; break;
        case 5: $m='мая'; break;
        case 6: $m='июня'; break;
        case 7: $m='июля'; break;
        case 8: $m='августа'; break;
        case 9: $m='сентября'; break;
        case 10: $m='октября'; break;
        case 11: $m='ноября'; break;
        case 12: $m='декабря'; break;
    }
    return $date[0].'&nbsp;'.$m.'&nbsp;'.$date[2].'&nbsp;года';
}
// здесь уже результаты и их вывод
if($res==1) {$response = "Никогда"; }
if($res==2) {$response = "Сегодня"; }
if($res==3) {$response = "Завтра"; }
if($res==4) {$response = "Послезавтра"; }
if($res==5) {$response = "Через год"; }
if($res==6) {$response = "Через 2 года"; }
if($res==7) {$response = "Через 3 года"; }
if($res==8) {$response = "Через 5 лет"; }
if($res==9) {$response = "Через неделю"; }
if($res==10) {$response = "В понедельник"; }
if($res==11) {$response = "Во вторник"; }
if($res==12) {$response = "В среду"; }
if($res==13) {$response = "В четверг"; }
if($res==14) {$response = "В пятницу"; }
if($res==15) {$response = "На выходных"; }
if($res==16) {$response = "Сейчас"; }
if($res==17) {$response = "Через 10 лет"; }
if($res==18) {$response = "Никогда"; }
if($res==19) {$response = "Через 20 лет"; }

if($res==0) {  $response = russianDate($date_res); }

echo $response;
?>