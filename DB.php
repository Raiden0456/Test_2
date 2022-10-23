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
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 5000, ",")) !== FALSE)
        {
            $sql = "INSERT into users (id,phone,email) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."')";
            $result = $connect->query($sql);
        }
        if(!isset($result))
            return error_log("Invalid File:Please Upload CSV File.");
        else {
            return error_log("CSV File has been successfully Imported.");
        }
        fclose($file);    
    }

?>