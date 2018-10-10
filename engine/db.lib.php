<?php
/*	Обертки функция для обращений к базе данных
	getAssocResult возвращает результат запроса 
	в виде ассоциативного массива array_result,
	где каждый элемент это строка ответа базы

	executeQuery возвращает результат запроса
	как есть, можно использовать для удаления, 
	или изменения даннных, когда не требуется
	ответа от базы

*/

function getAssocResult($sql){
    
    $array_result = [];
    try
    {
	   // соединяемся с базой данных
	   $connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
	   $db = new PDO($connect_str,DB_USER,DB_PASS);

 
	   $result = $db->query($sql);
 
	   // в случае ошибки SQL выражения выведем сообщене об ошибке
    
	   $error_array = $db->errorInfo();
 
	   if($db->errorCode() != 0000)
	       echo "SQL ошибка: " . $error_array[2] . '<br /><br />';
 
	   // теперь получаем данные из класса PDOStatement
        
        $array_result = $result->fetchAll();
	   
    }
    catch(PDOException $e)
    {
	   die("Error: ".$e->getMessage());
    }  
    
	return $array_result;
}

function executeQuery($sql){
    
    try
    {
	   // соединяемся с базой данных
	   $connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
	   $db = new PDO($connect_str,DB_USER,DB_PASS);
 
	   // вставляем несколько строк в таблицу 
	   $result = $db->exec($sql);
 
	   // в случае ошибки SQL выражения выведем сообщене об ошибке
 
	   $error_array = $db->errorInfo();
 
	   if($db->errorCode() != 0000)
 
	   echo "SQL ошибка: " . $error_array[2] . '<br />';
	}
    
    catch(PDOException $e)
    {
	   die("Error: ".$e->getMessage());
    }
    
	return $result;
}