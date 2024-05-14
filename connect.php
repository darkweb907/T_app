<?php
     $connect= mysqli_connect("localhost" ,"barryopeyemi" , "barryfrosh123@" ,"book");
     if($connect){
         //echo "thanks for connecting";
     }else{
        echo "failed to connect" . mysqli_connect_error() ;
     }
?>