<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');


session_start();

$_SESSION['db'][] = $_POST;

// print_r($_SESSION['db']);


//рисуем таблицу
function show_table() {
    
   echo '<table border = "1"> 
   <tr>
   <td>Название объявления </td>
   <td>Цена</td>
   <td>Имя</td>
   <td>Удалить</td>
   </tr>';


    foreach ($_SESSION['db'] as $id => $value) {
        if (!empty($value['title']) & !empty($value['price']) & !empty($value['seller_name'])) {
            echo '<tr>
                <td><a href=?action=show&id=' . $id . '>' . $value['title'] . '</td>
                <td>' . $value['price'] . '</td>
                <td>' . $value['seller_name'] . '</td>
                <td><a href=?action=delete&id=' . $id . '>Удалить</td>                
        </tr>';
        } else {
            continue;
        }
    }
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete':
            $id = $_GET['id'];
            if (isset($_SESSION['db'][$id])) {
                unset($_SESSION['db'][$id]);
            }
            break;
        case 'show':
            $id = $_GET['id'];
            if (isset($_SESSION['db'][$id])) {
//                echo $id;
            }
            break;
    }
}

// обработчик формы

function show_item() {
    
    $private = $_SESSION['db'][$_GET['id']]['private'];
    $seller_name = $_SESSION['db'][$_GET['id']]['seller_name'];
    $email = $_SESSION['db'][$_GET['id']]['email'];
    $allow_mails = $_SESSION['db'][$_GET['id']]['allow_mails'];
    $phone = $_SESSION['db'][$_GET['id']]['phone'];
    $location_id = $_SESSION['db'][$_GET['id']]['location_id'];
    $category_id = $_SESSION['db'][$_GET['id']]['category_id'];
    $title = $_SESSION['db'][$_GET['id']]['title'];
    $description = $_SESSION['db'][$_GET['id']]['description'];
    $price = $_SESSION['db'][$_GET['id']]['price'];
    
        echo $private . '<br>
            Ваше имя: ' . $seller_name . '<br>
            Электронная почта: '.$email.'<br>'.$allow_mails.'<br>'.'
            Номер телефона:'.$phone. '<br>
            Город: '.$location_id. '<br>
            Категория: '.$category_id.'<br>
            Название объявления: '.$title.'<br>
            Описание объявления: '.$description.'<br>
            Цена: '.$price.'руб.';                         
               
              
}


    
//print_r($_SESSION);  
//show_item();
//show_table();
?>



<form  method="POST">

    <div class="form-row-indented"> 
        <label class="form-label-radio">
            <input type="radio" checked="" value="1" name="private">Частное лицо</label> 
        <label class="form-label-radio">
            <input type="radio" value="0" name="private">Компания</label> </div>
    <div class="form-row"> 
        <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя</b></label>
        <input type="text" maxlength="40" class="form-input-text" value="" name="seller_name" id="fld_seller_name">

    </div>
    <div class="form-row"> 
        <label for="fld_email" class="form-label">Электронная почта</label>
        <input type="text" class="form-input-text" value="" name="email" id="fld_email">
    </div>
    <div class="form-row-indented"> 
        <label class="form-label-checkbox" for="allow_mails"> 
            <input type="checkbox" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox">
            <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> 
        </label> </div>
    <div class="form-row"> 
        <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label> 
        <input type="text" class="form-input-text" value="" name="phone" id="fld_phone">


    </div>
    <div id="f_location_id" class="form-row form-row-required"> 
        <label for="region" class="form-label">Город</label> 
        <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select"> 
            <option value="">-- Выберите город --</option>
            <option class="opt-group" disabled="disabled">-- Города --</option>
            <option selected="" data-coords=",," value="641780">Новосибирск</option>   
            <option data-coords=",," value="641490">Барабинск</option>   
            <option data-coords=",," value="641510">Бердск</option>   
            <option data-coords=",," value="641600">Искитим</option>   
            <option data-coords=",," value="641630">Колывань</option>   
            <option data-coords=",," value="641680">Краснообск</option>   
            <option data-coords=",," value="641710">Куйбышев</option>   
            <option data-coords=",," value="641760">Мошково</option>   
            <option data-coords=",," value="641790">Обь</option>   
            <option data-coords=",," value="641800">Ордынское</option>   
            <option data-coords=",," value="641970">Черепаново</option>   
            <option id="select-region" value="0">Выбрать другой...</option> 
        </select> 

        <div class="form-row"> 
            <label for="fld_category_id" class="form-label">Категория</label> 
            <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select"> 
                <option value="">-- Выберите категорию --</option>
                <optgroup label="Транспорт">
                    <option value="9">Автомобили с пробегом</option>
                    <option value="109">Новые автомобили</option>
                    <option value="14">Мотоциклы и мототехника</option>
                    <option value="81">Грузовики и спецтехника</option>
                    <option value="11">Водный транспорт</option>
                    <option value="10">Запчасти и аксессуары</option>
                </optgroup>
                <optgroup label="Недвижимость">
                    <option value="24">Квартиры</option>
                    <option value="23">Комнаты</option>
                    <option value="25">Дома, дачи, коттеджи</option>
                    <option value="26">Земельные участки</option>
                    <option value="85">Гаражи и машиноместа</option>
                    <option value="42">Коммерческая недвижимость</option>
                    <option value="86">Недвижимость за рубежом</option>
                </optgroup>
                <optgroup label="Работа">
                    <option value="111">Вакансии (поиск сотрудников)</option>
                    <option value="112">Резюме (поиск работы)</option>
                </optgroup>
                <optgroup label="Услуги">
                    <option value="114">Предложения услуг</option>
                    <option value="115">Запросы на услуги</option>
                </optgroup>
                <optgroup label="Личные вещи">
                    <option value="27">Одежда, обувь, аксессуары</option>
                    <option value="29">Детская одежда и обувь</option>
                    <option value="30">Товары для детей и игрушки</option>
                    <option value="28">Часы и украшения</option>
                    <option value="88">Красота и здоровье</option>
                </optgroup>
                <optgroup label="Для дома и дачи">
                    <option value="21">Бытовая техника</option>
                    <option value="20">Мебель и интерьер</option>
                    <option value="87">Посуда и товары для кухни</option>
                    <option value="82">Продукты питания</option>
                    <option value="19">Ремонт и строительство</option>
                    <option value="106">Растения</option>
                </optgroup>
                <optgroup label="Бытовая электроника">
                    <option value="32">Аудио и видео</option>
                    <option value="97">Игры, приставки и программы</option>
                    <option value="31">Настольные компьютеры</option>
                    <option value="98">Ноутбуки</option>
                    <option value="99">Оргтехника и расходники</option>
                    <option value="96">Планшеты и электронные книги</option>
                    <option value="84">Телефоны</option>
                    <option value="101">Товары для компьютера</option>
                    <option value="105">Фототехника</option>
                </optgroup>
                <optgroup label="Хобби и отдых">
                    <option value="33">Билеты и путешествия</option>
                    <option value="34">Велосипеды</option>
                    <option value="83">Книги и журналы</option>
                    <option value="36">Коллекционирование</option>
                    <option value="38">Музыкальные инструменты</option>
                    <option value="102">Охота и рыбалка</option>
                    <option value="39">Спорт и отдых</option>
                    <option value="103">Знакомства</option>
                </optgroup>
                <optgroup label="Животные">
                    <option value="89">Собаки</option>
                    <option value="90">Кошки</option>
                    <option value="91">Птицы</option>
                    <option value="92">Аквариум</option>
                    <option value="93">Другие животные</option>
                    <option value="94">Товары для животных</option>
                </optgroup>
                <optgroup label="Для бизнеса">
                    <option value="116">Готовый бизнес</option>
                    <option value="40">Оборудование для бизнеса</option>
                </optgroup>
            </select> 
        </div>

        <div style="display: none;" id="params" class="form-row form-row-required"> 
            <label class="form-label ">
                Выберите параметры
            </label> <div class="form-params params" id="filters">
            </div> 
        </div>

        <div id="f_title" class="form-row f_title"> <label for="fld_title" class="form-label">Название объявления</label> <input type="text" maxlength="50" class="form-input-text-long" value="" name="title" id="fld_title"> 
        </div>
        <div class="form-row"> 
            <label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label> 
            <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea"></textarea> 
        </div>
        <div id="price_rw" class="form-row rl"> 
            <label id="price_lbl" for="fld_price" class="form-label">Цена</label> 
            <input type="text" maxlength="9" class="form-input-text-short" value="0" name="price" id="fld_price">&nbsp;
            <span id="fld_price_title">руб.</span> 

            <div class="form-row-indented form-row-submit b-vas-submit" id="js_additem_form_submit">
                <div class="vas-submit-button pull-left"> 
                    <span class="vas-submit-border"></span> 
                    <span class="vas-submit-triangle"></span> 
                    <input type="submit" value="Отправить" id="form_submit" name="main_form_submit" class="vas-submit-input"> 
                </div>
            </div>
            </form>



<?php

show_table();
show_item();


?>
