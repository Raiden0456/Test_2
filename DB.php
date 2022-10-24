<?php 
    $connect = new mysqli("127.0.0.1", "root", "Nani1995", "Test_2");
    
    function dbq($sql){
        global $connect;
        $result = $connect->query($sql);
        return $result;
    }

    function getObjectsSql($sql)
    {
        global $connect;
        $result = $connect->query($sql);
        $objects = [];
        while ($obj = mysqli_fetch_object($result)) {
            $objects[] = $obj;
        }
        $result->free_result();
        return $objects;
    }
    function upload_csv($filename)
    {
        global $connect;
        //открываем файл для чтения//
        $file = fopen($filename, "r");
        //рекурсивно перебиравем каждую строку файла и вносим в бд только новые записи с уникальным id//
        while (($getData = fgetcsv($file, 5000, ",")) !== FALSE)
        {
            $sql = "
            INSERT  `users` (`id`, `phone`, `email`) 
                SELECT  '".$getData[0]."','".$getData[1]."', '".$getData[2]."'
            WHERE   NOT EXISTS 
                    (   SELECT  `id`
                        FROM    `users` 
                        WHERE   `id` = '".$getData[0]."'
                    );
            ";
            $result = $connect->query($sql);
        }
        //обработчик ошибок//
        if(!isset($result))
            return error_log("Invalid File:Please Upload CSV File.");
        else {
            return error_log("CSV File has been successfully Imported.");
        }
        //закрываем файл//
        fclose($file);    
    }

?>