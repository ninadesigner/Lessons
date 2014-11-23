<?php

$date = array ('data1' => rand (0,time()),
               'data2' => rand (0,time()),
               'data3' => rand (0,time()),
               'data4' => rand (0,time()),
               'data5' => rand (0,time())
    
   );

print_r($date);

echo "Создаем массив и генерируем числа";

echo '<br>';
echo '<br>';


echo "Сортировка массива по возрастанию дат";

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

