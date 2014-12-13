<?php

header("Content-Type: text/html; charset=utf-8");

ini_set('display_errors', 'On');
error_reporting( E_ALL | E_STRICT );


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

//print_r($_POST);

?>

<html>
	<head>
	</head>
	<body>

	<h3>Введите номер статьи</h3>

	<form method="POST">
	<input type="text" name="id" value="">
	<input type="submit">
	</form>

	</body>
</html>

<?
function show_list($news)
{
     for ($i = 0; $i < count($news); $i++)
{
       echo '<li>';
       echo '<a href="lesson_post.php?id=' . ($i + 1) . '">';
       echo $news[$i];
       

}
}
//echo show_list($news);


 // Функция вывода конкретной новости.
function show_item($news, $id)
{
     echo $news[$id - 1].'</p>';
     echo '</p>';
}


// Точка входа
// Был ли передан id новости в качестве параметра?

if (isset($_POST['id']))
{
     show_item($news, $_POST['id']);
}
  else
{
     echo show_list($news);

}

