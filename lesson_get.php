<?php

header("Content-Type: text/html; charset=utf-8"); 
ini_set('display_errors', 'On');
error_reporting( E_ALL | E_STRICT ); 


if(!isset($_GET['id']) || empty($_GET['id'])) {    
    header("HTTP/1.0 404 Not Found");
    
}


$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news=  explode("\n", $news);

//print_r($_GET);


// Функция вывода всего списка новостей
function show_list($news) {
     for ($i = 1; $i < count($news) + 1; $i++) {
       echo $i . '<a href ="?id='. ($i) . '">' . $news[$i-1] . ' <a><br>';
       
     }
}
//show_list($news);


// 404 ошибка     
function error(){
   header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
  echo '<p><b>Такой статьи не существует</b></p>'; 
} 


 // Функция вывода конкретной новости.
function show_item(array$news, $id=null)
{
     if (!is_null($id) && !empty($news[$id-1])) {
         echo 'Статья: № ' . $id . '<br><br>';
         echo $news[$id-1];
     }else{
         error(); 
         foreach ($news as $newsId => $newsItem){
             $newsId +=1;
             echo $newsId . sprintf('<a href="?id=%s"> %s </a><br>', $newsId, $newsItem);
            }                 
         }
     }
//     show_item($news, $_GET['id']);

     

// Точка входа
// Был ли передан id новости в качестве параметра?

if (isset($_GET['id'])) {   
     show_item($news, $_GET['id']);   
} else {
     error();
     echo show_list($news);
}


?>