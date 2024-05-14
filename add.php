<?php
  $day = date("d");
  $date = date("Y-m-$day");
  require "connect.php";
  if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])){
    $name = $_POST['box'];
    if(!empty($name)){
      $sql = "INSERT INTO lists (special_id, Date, task) VALUES (1, '$date', '$name')";
      $result= mysqli_query($connect , $sql);
      if($result){
        //echo "<script>alert('Task Added Success to database')</script>";
      }
      
    }

  } 


  if($day !== date("d")){
    $sql= "DELETE FROM lists";
    if(mysqli_query($connect , $sql)){
      //echo "all deleted";
    }
  }else{
    //echo "not correct";
  }


?>

<?php
//display on the screen using select all
$sql= "SELECT * FROM LISTS";
$querry= mysqli_query($connect , $sql);
$res = mysqli_fetch_all($querry , MYSQLI_ASSOC);
if($res){
  //echo "thanks for this";
}
?>






