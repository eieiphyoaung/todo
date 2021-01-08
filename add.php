<?php
  require 'config.php';
  if ($_POST) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
      $pdostatement = $pdo->prepare($sql);
      $result = $pdostatement->execute(
        array(
          ':title' => $title,
          ':description' => $description
        )
      );

      if($result){
        echo "<script>alert('new todo is added');window.location.href='index.php';</script>";
      }
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Add</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   </head>
   <body>
     <div class="card">
        <div class="card-body">
            <h2>Create New Todo</h2>
            <form class="" action="add.php" method="post">
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" value="" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
              </div>
              <div class="form-group">
                  <input type="submit" name="" value="SUBMIT" class="btn btn-primary">
                  <a href="index.php" class="btn btn-warning">BACK</a>
              </div>
            </form>
        </div>
     </div>
   </body>
 </html>
