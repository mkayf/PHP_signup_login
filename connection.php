<?php
    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'usersdb';


    $connection = mysqli_connect($server_name,$username,$password,$database);

    if(!$connection){
        echo 'Connection unsuccessful!';
    }


?>
