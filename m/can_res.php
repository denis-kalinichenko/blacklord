<?php

if($res==1) {$response = "Да"; }
if($res==2) {$response = "Нет"; }
if($res==3) {$response = "Возможно"; }
if($res==4) {$response = "Да, можно"; }
if($res==5) {$response = "Нет, нельзя"; }
if($res==6) {$response = "Такое нельзя никогда"; }
if($res==7) {$response = "Всегда можно"; }
if($res==8) {$response = "Позже"; }
if($res==9) {$response = "Да, со временем"; }
if($res==10) {$response = "Одобряю, можно"; }

echo $response;
?>