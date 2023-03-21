<?php 


    $mysql = new mysqli('localhost','root','','first_work');
    $mysql->set_charset('utf8');
    
    
    
    if ($mysql == TRUE){
        echo "conectado";
    } else {
            echo "desconetado";
    }

    