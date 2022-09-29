
 <?php  include "../config.php" ?> 
<?php
$id=$_REQUEST['id'];
$id = mysqli_real_escape_string($conn, $id);
if (!is_numeric($id) || $id<1) {
        echo "Something went wrong, please try again";
} else {
$query = "SELECT * from topics where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
}
?>
<?php require_once( ROOT_PATH . '/includes/header.php') ?>
<link rel="stylesheet" href="css/admin_styling.css">
<?php include( ROOT_PATH . '/admin/nav_admin.php'); ?> 
<title>Update Topic</title>
</head>
<body>
<div class="form">
<p>
<a href="read_topics.php">View Topics</a> 
| <a href="create_topics.php">Insert New Topics</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Topic</h1>
<?php
$status = $nameErr = $slugErr = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

  //sanitize input
  $name = stripslashes($_REQUEST["name"]);
  //escapes special characters in a string to prevent SQL injections
  $name = mysqli_real_escape_string($conn, $name);
  
  if (!preg_match("/^[a-zA-Z_-]{2,200}$/", $name)) {
          $nameErr = "Name must be between 2 and 200 characters with letters, underscores and dashes accepted";
  }
  
  $slug = stripslashes($_REQUEST["slug"]);
  $slug = mysqli_real_escape_string($conn, $slug);
  if (!preg_match("/^[a-zA-Z._-]{2,200}$/", $slug)) {
    $slugErr = "slug must be between 2 and 200 characters with letters, dots, underscores and dashes accepted";
  }
         
          if (empty($nameErr) && empty($slugErr)) {

            //changed statement to not set id since it isn't changing
$update="update topics set name='".$name."', slug='".$slug."' where id='".$id."'";


mysqli_query($conn, $update) or die(mysqli_error($conn)); 
$status = "Topics Updated Successfully. </br></br>
<a href='read_topics.php'>View Updated topics</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}
}
?>

<div>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
<input type="hidden" name="new" value="1" />

<p><input name="id" type="hidden" value="<?php echo $row['id'];?>" />

<p><input type="text" name="name" placeholder="Enter name" 
required value="<?php echo $row['name'];?>" /></p>
<span class="error"> <?php echo $nameErr; ?></span><br>

<p><input type="text" name="slug" placeholder="Enter slug" 
required value="<?php echo $row['slug'];?>" /></p>
<span class="error"> <?php echo $slugErr; ?></span><br>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php  ?>
</div>
<?php include( ROOT_PATH . '/includes/footer.php') ?>