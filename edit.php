<?php
  require 'config.php';
  if($_POST){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "UPDATE todo SET title ='$title',description = '$description' WHERE id = '$id'";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute();
    if($result){
      echo "<script>alert('updated');window.location.href='index.php';</script>";
    }
  }else{
      $sql = "SELECT * FROM todo WHERE id = " .$_GET['id'];
      $pdostatement = $pdo->prepare($sql);
      $pdostatement->execute();
      $result = $pdostatement->fetchAll();
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Edit</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   </head>
   <body>
     <div class="card">
        <div class="card-body">
            <h2>Edit New Todo</h2>
            <form class="" action="" method="post">
              <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>">
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" value="<?php echo $result[0]['title']?>" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" rows="8" cols="80" class="form-control"><?php echo $result[0]['description']?></textarea>
              </div>
              <div class="form-group">
                  <input type="submit" name="" value="UPDATE" class="btn btn-primary">
                  <a href="index.php" class="btn btn-warning">BACK</a>
              </div>
            </form>
        </div>
     </div>
   </body>
 </html>
