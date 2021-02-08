<?php
    
    function db_connect()
    {
        $hostName = "localhost";
        $username = "root";
        $password =  NULL;
        $dbName   = "finalproject";
        
        $connection_link = @mysqli_connect($hostName,$username,$password,$dbName) or die("Database Connection Error!");
        
        return $connection_link;
    }
    
    $con = db_connect();

?>