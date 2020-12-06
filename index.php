<?php

   require('config/db.php');
   require('config/config.php');

   // Creating query
   $query = 'SELECT * FROM posts ORDER BY created_at DESC';

   // Get result of the query
   $result = mysqli_query($conn, $query);

   // Fetch data 
   $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

   // free result
   mysqli_free_result($result);

   // Close connection
   mysqli_close($conn);

?>

   <?php include('inc/header.php'); ?>
   
   <div class="container mt-3">
      <h1>Posts</h1>
      <?php foreach($posts as $post): ?>
      <div class="jumbotron">
         <h3>
            <?php echo $post['title']; ?>
         </h3>
         <small>
            Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?>
         </small>
         <p>
            <?php echo $post['body']; ?>
         </p>
         <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary">Read More</a>
      </div>
      <?php endforeach; ?>
   </div>

   <?php include('inc/footer.php'); ?>





