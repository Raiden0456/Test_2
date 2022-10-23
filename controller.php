<?php
include 'DB.php';
if (isset($_POST['submit'])) 
{
    switch($_POST['submit'])
    {
        case "Upload_Csv":
            $filename=$_FILES["fileToUpload"]["tmp_name"];    
            if($_FILES["fileToUpload"]["size"] > 0)
                $result = upload_csv($filename);
            break;
    }
    header("Location: index.html");
}
?>