<?php

$date = array ('data1' => rand (0,time()),
               'data2' => rand (0,time()),
               'data3' => rand (0,time()),
               'data4' => rand (0,time()),
               'data5' => rand (0,time())
    
   );

print_r($date);

echo '<br>';
echo '<br>';

$low_day = array ('data1' => rand (0,time()),
               'data2' => rand (0,time()),
               'data3' => rand (0,time()),
               'data4' => rand (0,time()),
               'data5' => rand (0,time())
    
   );

echo 'Наименьший день '. min(date('d',$low_day ['data1']),
                             date('d',$low_day ['data2']),
                             date('d',$low_day ['data3']),
                             date('d',$low_day ['data4']),
                             date('d',$low_day ['data5']));

echo '<br>';
echo '<br>';

$high_month = array ('data1' => rand (0,time()),
               'data2' => rand (0,time()),
               'data3' => rand (0,time()),
               'data4' => rand (0,time()),
               'data5' => rand (0,time())
    
   );

echo 'Наибольший месяц '. max(date('m',$high_month ['data1']),
                             date('m',$high_month ['data2']),
                             date('m',$high_month ['data3']),
                             date('m',$high_month ['data4']),
                             date('m',$high_month ['data5']));

echo '<br>';
echo '<br>';

echo 'Сортировка массива по возрастанию дат';

asort($date);
foreach ($date as $key => $val) {
    var_dump ("$key = $val\n");
}

echo '<br>';
echo '<br>';

echo "Извлекаем последний элемент массива в новую переменную";

echo '<br>';
echo '<br>';

$selected = array_pop($date);
print_r($selected);

echo '<br>';
echo '<br>';

echo "Проверяем массив";

echo '<br>';
echo '<br>';

print_r($date);

echo '<br>';
echo '<br>';

echo "Выводим переменную на экран в формате 'дд.мм.ГГ ЧЧ:ММ:СС'";

echo '<br>';
echo '<br>';

echo date('d-m-Y H:i:s', $selected);

echo '<br>';
echo '<br>';

echo 'Текущий часовой пояс'.'<br>';
echo date_default_timezone_get().'<br>';
echo 'Текущее время '. date('d-m-Y H:i:s'); 

echo '<br>';
echo '<br>';

echo 'Смена часового пояса для Нью-Йорка';

date_default_timezone_set('America/New_York').'<br>';
echo 'Измененный часовой пояс'.'<br>';
echo date_default_timezone_get().'<br>';
echo 'Текущее время '. date('d-m-Y H:i:s');

