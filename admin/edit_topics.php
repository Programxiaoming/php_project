
 <?php  include "../config.php" ?> 
<?php
$id=$_REQUEST['id'];
$query = "SELECT * from topics where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update topics</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>
| <a href="create_topics.php">Insert New topics</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update topics</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$id =$_REQUEST['id'];
$name = $_REQUEST['name'];
$slug = $_REQUEST['slug'];

$update="update topics set id='".$id."', name='".$name."', slug='".$slug."' where id='".$id."'";


mysqli_query($conn, $update) or die(mysqli_error()); 
$status = "topics Updated Successfully. </br></br>
<a href='read_topics.php'>View Updated topics</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input name="created_at" type="hidden" value="<?php echo $row['created_at'];?>" />

<p><input type="text" name="name" placeholder="Enter name" 
required value="<?php echo $row['name'];?>" /></p>

<p><input type="text" name="slug" placeholder="Enter slug" 
required value="<?php echo $row['slug'];?>" /></p>


<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>