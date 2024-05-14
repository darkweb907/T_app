<?php

require "connect.php";
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['list'])){ 
       $list = $_POST['list'];
       $sql= "DELETE FROM lists WHERE task = '$list'";
       if(mysqli_query($connect , $sql)){
        echo "deleted successful";
       }else{
        echo "try again";
       }
    }else{
        echo "bad";
    }
 }
?>