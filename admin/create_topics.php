<!-- Header -->
 <?php  include "../config.php" ?> 

<?php 
$nameErr = $slugErr = "";

  if(isset($_POST['name'])) {
//sanitize input
$name = test_input($_REQUEST["name"]);
//escapes special characters in a string to prevent SQL injections
$name = mysqli_real_escape_string($conn, $name);

if (!preg_match("/^[a-zA-Z_-]{2,200}$/", $name)) {
        $nameErr = "Name must be between 2 and 200 characters with letters, underscores and dashes accepted";
}

$slug = test_input($_REQUEST["slug"]);
$slug = mysqli_real_escape_string($conn, $slug);
if (!preg_match("/^[a-zA-Z._-]{2,200}$/", $slug)) {
  $slugErr = "slug must be between 2 and 200 characters with letters, dots, underscores and dashes accepted";
}
       
        if (empty($nameErr) && empty($slugErr)) {
          
        // SQL query to insert user data into the topics table
        $query= "INSERT INTO topics (name, slug)
        VALUES('$name','$slug')";
        $add_topic = mysqli_query($conn,$query);
     
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_topic) {
              echo "something went wrong ". mysqli_error($conn);
          }
 
          else { echo "<script type='text/javascript'>alert('Post added successfully!')</script>";
            header("Location: read_topics.php");
              } 
            }
}
    function test_input($data)
        {
                $data = trim($data); //strips whitespaces from beginning and end of string
                $data = htmlspecialchars($data); //converts to html entities
                return $data;
        }

?>
<!-- added html tag and title -->
 <?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<title>Add Topic </title>
</head>
<body>
<div class="form">
<p>
<a href="dashboard.php"> Dashboard</a> | 
<a href="../index.php">Home</a> |   
<a href="read_topics.php">View Topics</a> 
| <a href="../logout.php">Logout</a></p>
</div>
<h1 class="text-center">Add Topic </h1>
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    
    <p><input type="text" name="name" placeholder="Name" required /></p>
    <span class="error"> <?php echo $nameErr; ?></span><br>

    <p><input type="text" name="slug" placeholder="Slug" required /></p>
    <span class="error"> <?php echo $slugErr; ?></span><br>

    <p><input name="submit" type="submit" value="Submit" /></p>

    </form> 
  </div>
 
  <!-- Sorry this is inconsistent with the other pages so I put at the top instead --> 
   <!-- a BACK button to go to the home page -->
  <!-- <div class="container text-center mt-5">
    <a href="../index.php" class="btn btn-warning mt-5"> Back to homepage </a>
  <div> -->
</body>
</html>
 
