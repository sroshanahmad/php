<?php

   require('config/db.php');
   require('config/config.php');

   // Check for submit
   if(isset($_POST['submit'])) {
      // get form data
      $title = mysqli_real_escape_string($conn,$_POST['title']);
      $author = mysqli_real_escape_string($conn,$_POST['author']);
      $body= mysqli_real_escape_string($conn,$_POST['body']);

      $query = "INSERT INTO posts(title,author,body) VALUES('$title','$author','$body')";

      if(mysqli_query($conn, $query)) {
         header('Location: '.ROOT_URL);
      }
   }

   

?>

   <?php include('inc/header.php'); ?>
   
   <div class="container mt-3">
      <h1>Add Post</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
         <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
         </div>
         <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control">
         </div>
         <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"></textarea>
         </div>
         <input type="submit" value="Submit" name="submit" class="btn btn-success">
      </form>
      
   </div>

   <?php include('inc/footer.php'); ?>





