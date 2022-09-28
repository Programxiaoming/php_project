<!-- Header -->
 <?php  include "../config.php" ?> 
 <?php include( ROOT_PATH . '/includes/navbar.php') ?>
		<!-- // navbar -->

<?php 
  if(isset($_POST['user_id'])) 
    {
        $user_id = $_POST['user_id'];
        $title = $_POST['title'];
        $slug = $_POST['slug'];
        $views = $_POST['views'];
        $image = $_POST['image'];
        $body = $_POST['body'];
        $published = $_POST['published'];
        $created_at = date("Y-m-d H:i:s"); 
        $updated_at = date("Y-m-d H:i:s");echo 4;
      

       
        // SQL query to insert user data into the posts table
        $query= "INSERT INTO posts (user_id, title, slug, views, image, body, published, created_at, updated_at)
        VALUES('$user_id','$title','$slug','$views','$image','$body','$published','$created_at','$updated_at')";echo 5;
        $add_post = mysqli_query($conn,$query);echo 6; 
     
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_post) {
              echo "something went wrong ". mysqli_error($conn);
          }
 
          else { echo "<script type='text/javascript'>alert('Post added successfully!')</script>";
            header("Location: read_posts.php"); 
              } 
                    
    }
?>
 
<h1 class="text-center">Add Post details </h1>
  <div class="container">
    <form action="" method="post">
    
    <p><input type="int" name="user_id" placeholder="User ID" required /></p>

    <p><input type="text" name="title" placeholder="Title" required /></p>

    <p><input type="text" name="slug" placeholder="Slug" required /></p>

    <p><input type="int" name="views" placeholder="Views" required /></p>

    <p><input type="text" name="image" placeholder="Image" required /></p>

    <p><input type="text" name="body" placeholder="Body" required /></p>

    <p><input type="tinyint" name="published" placeholder="Published" required /></p>

    <p><input name="submit" type="submit" value="Submit" /></p>

    </form> 
  </div>
 
   <!-- a BACK button to go to the home page -->
  <div class="container text-center mt-5">
    <a href="../index.php" class="btn btn-warning mt-5"> Back to homepage </a>
  <div>
 
