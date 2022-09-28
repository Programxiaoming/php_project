<!-- Footer -->
<?php  include "../config.php" ?> 

<?php

$id=$_REQUEST['id']; echo 4;
$query = "DELETE FROM topics WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: read_topics.php");  echo 7;
?>
