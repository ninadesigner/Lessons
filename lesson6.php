<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=utf-8');


session_start();


function show_table($show_id=false) {
    
    if (empty($_SESSION['bd'])) {
        return;
    }
        if( $show_id!==false && !isset($_POST['main_form_submit'])){       
             if (isset($_SESSION['bd'][$show_id])){
                  show_item($show_id);
            if (isset($_POST['main_form_submit'])) {
                  header("Location: index.php");
}
   }
        
    } else {
        
    } 
    
    echo '<table border = "1"> 
   <tr>
   <td>Название объявления </td>
   <td>Цена</td>
   <td>Имя</td>
   <td>Удалить</td>
   </tr>';
   
   
     foreach ($_SESSION['bd'] as $id => $value) {
        if (empty($value['title']) & empty($value['price']) & empty($value['seller_name'])) {
            continue;
        }else {
            echo '<tr>
                <td><a href=?action=show&id=' . $id . '>' . $value['title'] . '</td>
                <td>' . $value['price'] . '</td>
                <td>' . $value['seller_name'] . '</td>
                <td><a href=?action=delete&id=' . $id . '>Удалить</td>                
                </tr>';
     }        
}          
        echo '</table>';
     }


     
// обработчик формы

function show_item($id=FALSE) {
  
?>


<form  method="POST">
    <head>
        <style>
.my_button {
  display: inline-block;
  width: 10em;
  font-size: 80%;
  color: rgba(255,255,255,.9);
  text-shadow: #2e7ebd 0 1px 2px;
  text-decoration: none;
  text-align: center;
  line-height: 1.1;
  white-space: pre-line;
  padding: .6em 0;
  border: 1px solid;
  border-color: #60a3d8 #2970a9 #2970a9 #60a3d8;
  border-radius: 6px;
  outline: none;
  background: #60a3d8 linear-gradient(#89bbe2, #60a3d8 50%, #378bce);
  box-shadow: inset rgba(255,255,255,.5) 1px 1px;

}
</style>
    </head>
    <div class="form-row-indented"> 
    
       <?php 
                $checkbox = 'checked=""';
                 
                $company = "";
                $private = "";
                
                if(isset($_SESSION['bd'][$id]['private']) )
                {
                    if($_SESSION['bd'][$id]['private']==1) {
                        $private = $checkbox;                      
                    }else{
                        $company = $checkbox;
                    }       
                    
                }else{
                    
                    $private = $checkbox;
                }
                
       ?>
   
        <label class="form-label-radio">
            <input type="radio" <?=$private?> value="1" name="private">Частное лицо</label> 
            
        <label class="form-label-radio">
            <input type="radio" <?=$company?> value="0" name="private">Компания</label> </div>
            
            
            
    <div class="form-row"> 
        <label for="fld_seller_name" class="form-label"><b id="your-name">Ваше имя</b></label>
        <input type="text" maxlength="40" class="form-input-text" value="<?php  if(isset($_SESSION['bd'][$id]['seller_name']))echo $_SESSION['bd'][$id]['seller_name'] ?>" name="seller_name" id="fld_seller_name">
    </div>
    
    
    <div class="form-row"> 
        <label for="fld_email" class="form-label">Электронная почта</label>
        <input type="text" class="form-input-text" value="<?php  if(isset($_SESSION['bd'][$id]['email']))echo $_SESSION['bd'][$id]['email'] ?>" name="email" id="fld_email">
    </div>
    
    
    <div class="form-row-indented"> 
        <label class="form-label-checkbox" for="allow_mails"> 
        
        <?php
            $checkbox = '';
                if(!empty($_SESSION['bd'][$id]['allow_mails'])){
                        $checkbox = 'checked=""';
                }               
            ?> 
        
            <input type="checkbox" <?php echo $checkbox ?> value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox">
            <span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> 
        </label> </div>
        
        
    <div class="form-row"> 
        <label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label> 
        <input type="text" class="form-input-text" value="<?php  if(isset($_SESSION['bd'][$id]['phone']))echo $_SESSION['bd'][$id]['phone'] ?>" name="phone" id="fld_phone">


    </div>
    <div id="f_location_id" class="form-row form-row-required"> 
        <label for="region" class="form-label">Город</label> 
        
        
        
        <?php 
            
            $citys = array('641780'=>'Новосибирск','641490'=>'Барабинск','641510'=>'Бердск');
            if(isset($_SESSION['bd'][$id]['location_id'])){
            $gorod = $_SESSION['bd'][$id]['location_id'];
                }
        ?>
        
        
        
        <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select"> 
            <option value="">-- Выберите город --</option>
        
        <?php
            foreach($citys as $number=>$city){
                $selected = ($number==$gorod) ? 'selected=""' : '';
                echo '<option data-coords=",," '.$selected.' value="'.$number.'">'.$city.'</option>'; 
            }
        ?>  
        </select> 
        
        
        
        
        <div class="form-row"> 
            <label for="fld_category_id" class="form-label">Категория</label> 
            
            <?php 
            $categoryes = array('09'=>'Новые автомобили', '05'=>'Квартиры', '26'=>'Земельные участки', '86'=>'Недвижимость за рубежом', '19'=>'Ремонт и строительство', '21'=>'Бытовая техника');
                if(isset($_SESSION['bd'][$id]['category_id'])){
            $name = $_SESSION['bd'][$id]['category_id'];
            }
        ?>
        
        
            <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select"> 
                <option value="">-- Выберите категорию --</option>
           
        
        <?php
                
                    foreach($categoryes as $number=>$category){
                        $selected = ($number==$name) ? 'selected=""' : '';
                        echo '<option data-coords=",," '.$selected.' value="'.$number.'">'.$category.'</option>';
                    }
                    
                ?>
         </select> 
        </div>

        <div id="f_title" class="form-row f_title"> <label for="fld_title" class="form-label">Название объявления</label> <input type="text" maxlength="50" class="form-input-text-long" value="<?php  if(isset($_SESSION['bd'][$id]['title']))echo $_SESSION['bd'][$id]['title'] ?>" name="title" id="fld_title"> 
        </div>
        
        
        <div class="form-row"> 
            <label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label> 
            <textarea maxlength="3000" name="description" id="fld_description" class="form-input-textarea"><?php  if(isset($_SESSION['bd'][$id]['description'])) echo $_SESSION['bd'][$id]['description'] ?></textarea> 
        </div>
        
        
        <div id="price_rw" class="form-row rl"> 
            <label id="price_lbl" for="fld_price" class="form-label">Цена</label> 
            <input type="text" maxlength="9" class="form-input-text-short" value="<?php  if(isset($_SESSION['bd'][$id]['fld_price']))echo $_SESSION['bd'][$id]['fld_price'] ?>" name="price" id="fld_price">&nbsp;
            <span id="fld_price_title">руб.</span> 

            <div class="form-row-indented form-row-submit b-vas-submit" id="js_additem_form_submit">
                <div class="vas-submit-button pull-left"> 
                    <span class="vas-submit-border"></span> 
                    <span class="vas-submit-triangle"></span> 
                    <input type="submit" value="Отправить" id="form_submit" name="main_form_submit" class="my_button"</input> 
                </div>
            </div>
            </form>



<?php
}



if (isset($_POST['main_form_submit'])) {
    if (!empty($_POST['title']) || (!empty($_POST['price']) || !empty($_POST['seller_name']))) {
        if (isset($_GET['id'])) {
            $_SESSION['bd'][$_GET['id']] = $_POST;
        } else {
            $_SESSION['bd'][] = $_POST;
        }
        // header("Location:index.php");
        
    }
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete':
            $id = $_GET['id'];
            if (isset($_SESSION['bd'][$id])) {
                unset($_SESSION['bd'][$id]);
                // header("Location:index.php");
            }
            break;
        case 'show':
            $id = $_GET['id'];
            if (isset($_SESSION['bd'][$id])) {
                  show_table($id);
                  exit;

            }
            break;
    }
}

show_table();
echo '<br>';
show_item();

// session_destroy();
?>
