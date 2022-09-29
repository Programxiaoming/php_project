<!-- Footer -->
<?php  include "../config.php" ?> 

<?php

$id=$_REQUEST['id']; 
$query = "DELETE FROM topics WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: read_topics.php");  
?>
