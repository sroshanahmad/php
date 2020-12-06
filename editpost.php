<?php

   require('config/db.php');
   require('config/config.php');

   // Check for submit
   if(isset($_POST['submit'])) {
      // get form data
      $update_id = mysqli_real_escape_string($conn,$_POST['update_id']);
      $title = mysqli_real_escape_string($conn,$_POST['title']);
      $author = mysqli_real_escape_string($conn,$_POST['author']);
      $body= mysqli_real_escape_string($conn,$_POST['body']);

      $query = "UPDATE posts SET
         title='$title',
         author='$author',
         body='$body'
         WHERE id = {$update_id}";

      if(mysqli_query($conn, $query)) {
         header('Location: '.ROOT_URL);
      }
   }

   // Get id
   $id = mysqli_real_escape_string($conn,$_GET['id']);

   // Creating query
   $query = 'SELECT * FROM posts WHERE id='.$id;

   // Get result of the query
   $result = mysqli_query($conn, $query);

   // Fetch data 
   $post = mysqli_fetch_assoc($result);

   // free result
   mysqli_free_result($result);

   // Close connection
   mysqli_close($conn);

   

?>

   <?php include('inc/header.php'); ?>
   
   <div class="container mt-3">
      <h1>Add Post</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
         <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>">
         </div>
         <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control" value="<?php echo $post['author']; ?>">
         </div>
         <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
         </div>
         <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
         <input type="submit" value="Submit" name="submit" class="btn btn-success">
      </form>
      
   </div>

   <?php include('inc/footer.php'); ?>





