<?php 
    $server="localhost";
    $database="blog";
    $username="root";
    $password="";

    try{
        $conn = new PDO("mysql:host=".$server.";dbname=".$database.";charset=utf8",$username,$password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $ex->getMessage();
    }

?>