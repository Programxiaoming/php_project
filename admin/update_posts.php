<?php
require('db.php');
include("auth.php");
$code=$_REQUEST['code'];
$query = "SELECT * from courses where code='".$code."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update courses</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New courses</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update courses</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$code =$_REQUEST['code'];
$title =$_REQUEST['title'];
$credit =$_REQUEST['credit'];
$teacher =$_REQUEST['teacher'];
$semester =$_REQUEST['semester'];
$years =$_REQUEST['years'];


$update="update courses set code='".$code."',
title='".$title."', credit='".$credit."', teacher='".$teacher."', semester='".$semester."',
years='".$years."' where code='".$code."'";


mysqli_query($con, $update) or die(mysqli_error());
$status = "courses Updated Successfully. </br></br>
<a href='view.php'>View Updated courses</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

<input name="code" type="hidden" value="<?php echo $row['code'];?>" />


<p><input type="text" name="title" placeholder="Enter Title" 
required value="<?php echo $row['title'];?>" /></p>

<p><input type="text" name="credit" placeholder="Enter Credit" 
required value="<?php echo $row['credit'];?>" /></p>

<p><input type="text" name="teacher" placeholder="Enter Teacher" 
required value="<?php echo $row['teacher'];?>" /></p>

<p> 
        <td><select name="semester">
          <option><?php echo $row['semester'];?></option>
          <option>Fall</option>
          <option>Winter</option>
          <option>Summer</option>
       </select>
       </td>
</p>

<p> 
        <td><select name="years">
        <option><?php echo $row['years'];?></option>
          <option>2021</option>
          <option>2022</option>
       </select>
       </td> 
</p>


<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>