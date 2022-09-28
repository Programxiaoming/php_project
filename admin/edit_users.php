
 <?php  include "../config.php" ?> 
<?php
$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update users</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>
| <a href="logout.php">Logout</a></p>
<h1>Update users</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$id =$_REQUEST['id'];
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$role = $_REQUEST['role'];
$password = $_REQUEST['password'];
$created_at = $_REQUEST['created_at'];
$updated_at = date("Y-m-d H:i:s");


$update="update users set id='".$id."', username='".$username."', email='".$email."',
role='".$role."', password='".md5($password)."', 
created_at='".$created_at."', updated_at='".$updated_at."' where id='".$id."'";


mysqli_query($conn, $update) or die(mysqli_error()); 
$status = "users Updated Successfully. </br></br>
<a href='read_users.php'>View Updated users</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<input name="created_at" type="hidden" value="<?php echo $row['created_at'];?>" />

<p><input type="text" name="username" placeholder="Enter username" 
required value="<?php echo $row['username'];?>" /></p>

<p><input type="email" name="email" placeholder="Enter email" 
required value="<?php echo $row['email'];?>" /></p>


<select title="role" name="role">
                                <option>Admin</option>
                                <option selected>Author</option>
                        </select>

<p><input type="password" name="password" placeholder="Enter password" 
required/></p>

<p> <input type="password" name="retyped" placeholder="Retype Password" required /> </p>


<p><input type="text" name="updated_at" placeholder="Enter updated_at" 
required value="<?php echo $row['updated_at'];?>" /></p>



<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>