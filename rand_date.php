<?php
  $quotes[] = 'отменят экзамены';
    $quotes[] = 'ВКонтакте вернёт стену';
    $quotes[] = 'будет конец света';
    $quotes[] = 'приедет принц на белом коне';
    $quotes[] = 'мне купят iPad';
    $quotes[] = 'я стану писать без ошибок';
    $quotes[] = 'я стану папой';
    $quotes[] = 'я стану мамой';
    $quotes[] = 'я стану Бетменом';
    $quotes[] = 'убьют Джастина Бибера';
    $quotes[] = 'я успокоюсь';
    $quotes[] = 'я стану космонавтом';        
 srand ((double) microtime() * 1000000);
    $random_number = rand(0,count($quotes)-1);
 $rand_date = ($quotes[$random_number]);
?>