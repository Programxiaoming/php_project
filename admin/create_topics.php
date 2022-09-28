<!-- Header -->
 <?php  include "../config.php" ?> 

<?php 
  if(isset($_POST['name'])) 
    {
        $name = $_POST['name'];
        $slug = $_POST['slug'];
    
       
        // SQL query to insert user data into the topics table
        $query= "INSERT INTO topics (name, slug)
        VALUES('$name','$slug')";echo 5;
        $add_post = mysqli_query($conn,$query);echo 6; 
     
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_post) {
              echo "something went wrong ". mysqli_error($conn);
          }
 
          else { echo "<script type='text/javascript'>alert('Post added successfully!')</script>";
            header("Location: read_topics.php");
              } 
                    
    }
?>
 
<h1 class="text-center">Add topics details </h1>
  <div class="container">
    <form action="" method="post">
    
    <p><input type="int" name="name" placeholder="Name" required /></p>

    <p><input type="text" name="slug" placeholder="Slug" required /></p>

    <p><input name="submit" type="submit" value="Submit" /></p>

    </form> 
  </div>
 
   <!-- a BACK button to go to the home page -->
  <div class="container text-center mt-5">
    <a href="index_login.php" class="btn btn-warning mt-5"> Back to homepage </a>
  <div>
 
