<?php
  require "add.php";
  $id = 1;
  //add connection
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>To-Do List</title>
  </head>
  <body>
    <div class="container">
      <div class="todo-app">
        <h2 id="li">To-Do List</h2>
        <h4><?php echo $date?></h4>
        <form method="POST" style="display: flex;">
        <input type="text" name="box" placeholder="Add Your Text" id="input-box" />
        <input class="submit" type="submit" placeholder="Add" name="submit"  />
        </form>
        <ul id="list-container">
        <?php
            if (empty(mysqli_num_rows($querry))): ?>
            <p class="text">No tasks yet.</p>
            <?php else: ?>
                <?php foreach($res as $rep): ?>
                    <li id="list" >
                        <?php echo $rep['task'] ?> 
                        <span id="dell"><i class="fa-solid fa-xmark"></i></span>
                    </li>
                  <?php endforeach; ?>
            <?php endif; ?>

        </ul>
      </div>
    </div>
    <script>
      let click = document.querySelectorAll("#dell");
      let bell = document.querySelectorAll("list-container");

      document.addEventListener("DOMContentLoaded", function() {

        //foreach in php
        click.forEach((e)=>{
        e.onclick=()=>{
          let listText = e.parentElement.innerText
          console.log(listText)
          const xhr = new XMLHttpRequest();
          xhr.open('POST', 'delete.php', true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.onload = function() {
              if (xhr.status == 200) {
                  // console.log(xhr.responseText);
                  e.parentElement.remove(); // Remove the task item from the DOM
              }
          };
          xhr.send('list=' + encodeURIComponent(listText)); // Send the task text to delete.php
        }
      })
      })
    
    </script>
    <script src="app.js"></script>
  </body>
</html>
<?php 
mysqli_close($connect);
?>
