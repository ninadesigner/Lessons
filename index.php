<?php

    $name = '';
    $age = '' ;
    $text = "Меня зовут $name Мне $age лет";
    
    echo $text;
    
    
  
    
    
    define('CITY','Rostov');
    
    if(defined ('CITY')) {
        echo true;
    }
    
    echo CITY;
//    define('CITY','Moscow'); константу изменить нельзя
    
    
    
    
    
    
    $book = array(
                  'title' => 'Триумфальная арка', 
                 'author' => 'Эрих Мария Ремарк', 
                  'pages' => '523'
        );    
    
   echo "Недавно я прочитала книгу $book[title], написанную автором $book[author], я осилила все $book[pages] страниц, мне она очень понравилась";
    
            
    
   
   
   
   
   
   
     $books = array(
         
         $book1 = array (
             1=> 'Как разбогатеть с нуля', 
             2=> 'Брайан Трейси', 
             3=> '432'
             ),
         $book2 = array ( 
             1=> 'Моделирование будущего', 
             2=> 'Виталий Гиберт', 
             3=> '320'
             ) 
 
         );
             
             
  echo 'Недавно я прочитал книги $book1[1] и $book2[1], написанные соответственно авторами $book1[2] и $book2[2], я осилил в сумме '.($book1[3] + $book2[3]).' страниц, не ожидал от себя подобного'
    


?>