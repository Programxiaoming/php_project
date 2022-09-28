
<?php
include "../config.php"
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>topics Details</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="create_topics.php">Insert New topics</a> 
| <a href="logout.php">Logout</a></p>
<h2>View topics</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
          <th  scope="col" >ID</th>
          <th  scope="col">name</th>
          <th  scope="col"> Slug</th>


        </tr> 
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from topics ORDER BY id;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>

<td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["slug"]; ?></td>


<td align="center">
<a href="edit_topics.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete_topics.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>