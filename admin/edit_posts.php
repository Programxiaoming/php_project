
 <?php  include "../config.php" ?> 
<?php
$id=$_REQUEST['id'];
$query = "SELECT * from posts where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Posts</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>
| <a href="create_posts.php">Insert New posts</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update posts</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$id =$_REQUEST['id'];
$user_id = $_REQUEST['user_id'];
$title = $_REQUEST['title'];
$slug = $_REQUEST['slug'];
$views = $_REQUEST['views'];
$image = $_REQUEST['image'];
$body = $_REQUEST['body'];
$published = $_REQUEST['published'];
$created_at = $_REQUEST['created_at'];
$updated_at = date("Y-m-d H:i:s");


$update="update posts set id='".$id."', user_id='".$user_id."', title='".$title."',
slug='".$slug."', views='".$views."', image='".$image."', body='".$body."', published='".$published."', 
created_at='".$created_at."', updated_at='".$updated_at."' where id='".$id."'";


mysqli_query($conn, $update) or die(mysqli_error()); 
$status = "posts Updated Successfully. </br></br>
<a href='read_posts.php'>View Updated posts</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input name="created_at" type="hidden" value="<?php echo $row['created_at'];?>" />

<p><input type="text" name="user_id" placeholder="Enter user_id" 
required value="<?php echo $row['user_id'];?>" /></p>

<p><input type="text" name="title" placeholder="Enter title" 
required value="<?php echo $row['title'];?>" /></p>

<p><input type="text" name="slug" placeholder="Enter slug" 
required value="<?php echo $row['slug'];?>" /></p>

<p><input type="text" name="views" placeholder="Enter views" 
required value="<?php echo $row['views'];?>" /></p>

<p><input type="text" name="image" placeholder="Enter image" 
required value="<?php echo $row['image'];?>" /></p>

<p><input type="text" name="body" placeholder="Enter body" 
required value="<?php echo $row['body'];?>" /></p>

<p><input type="text" name="published" placeholder="Enter published" 
required value="<?php echo $row['published'];?>" /></p>

<p><input type="text" name="updated_at" placeholder="Enter updated_at" 
required value="<?php echo $row['updated_at'];?>" /></p>



<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>