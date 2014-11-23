<?php


//$date = array ('data1' => rand (0,time()),
//               'data2' => rand (0,time()),
//               'data3' => rand (0,time()),
//               'data4' => rand (0,time()),
//               'data5' => rand (0,time())
//    
//   );

//print_r($date);

echo "Создаем массив и генерируем числа";

echo '<br>';
echo '<br>';

$date = array ('data1' => 755219536,
               'data2' => 766115140,
               'data3' => 745723060,
               'data4' => 727178251,
               'data5' => 209990842
    
   );

print_r($date);

echo '<br>';
echo '<br>';

echo '1 ' . 'Unix time ' . $date['data1']. ' GMT ' . date('Y-m-d',$date['data1']) .'<br>';
echo '2 ' . 'Unix time ' . $date['data2']. ' GMT ' . date('Y-m-d',$date['data2']) .'<br>';
echo '3 ' . 'Unix time ' . $date['data3']. ' GMT ' . date('Y-m-d',$date['data3']) .'<br>';
echo '4 ' . 'Unix time ' . $date['data4']. ' GMT ' . date('Y-m-d',$date['data4']) .'<br>';
echo '5 ' . 'Unix time ' . $date['data5']. ' GMT ' . date('Y-m-d',$date['data5']) .'<br>';

//1 Unix time 755219536 GMT 1993-12-07
//2 Unix time 766115140 GMT 1994-04-12
//3 Unix time 745723060 GMT 1993-08-19
//4 Unix time 727178251 GMT 1993-01-16
//5 Unix time 209990842 GMT 1976-08-27

echo '<br>';
echo '<br>';

//echo "Преобразуем массив, чтобы найти min и max";

$date2 = array ($data1 = array('y' => '1993', 'm' => '12','d' => '07'),
               $data2 = array ('y' => '1994','m' => '04','d' => '12'),
               $data3 = array ('y' => '1993','m' => '08','d' => '19'),
               $data4 = array ('y' => '1993','m' => '01','d' => '16'),
               $data5 = array ('y' => '1976','m' => '08','d' => '27')
    
   );

//var_dump($date2);


$numbers = array_map(function($details) {
  return $details['d'];
}, $date2);

$min = min($numbers);
echo 'Наименьший день - ' . $min;

echo '<br>';
echo '<br>';

$numbers2 = array_map(function($details) {
  return $details['m'];
}, $date2);

$max = max($numbers2);
echo 'Наибольший месяц - ' . $max;

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