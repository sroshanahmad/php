<?php

   require('config/db.php');
   require('config/config.php');

    // Check for submit
    if(isset($_POST['delete'])) {
      // get form data
      $delete_id = mysqli_real_escape_string($conn,$_POST['delete_id']);

      $query = "DELETE FROM posts WHERE id= {$delete_id}";

      if(mysqli_query($conn, $query)) {
         header('Location: '.ROOT_URL.'');
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
      <a href="<?php echo ROOT_URL; ?>" class="btn btn-primary">Back</a>
      <h1><?php echo $post['title']; ?></h1>
         <small>
            Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?>
         </small>
         <p>
            <?php echo $post['body']; ?>
         </p>

         <hr>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="float-right">
            <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
            <input type="submit" value="Delete" name="delete" class="btn btn-danger">
         </form>
         <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Edit</a>
   </div>
   <?php include('inc/footer.php'); ?>
