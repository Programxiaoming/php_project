
<?php
include "../config.php"
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Posts Details</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="create_posts.php">Insert New Posts</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Posts</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
          <th><strong>No</strong></th>
          <th  scope="col" >ID</th>
          <th  scope="col">Use ID</th>
          <th  scope="col">Title</th>
          <th  scope="col"> Slug</th>
          <th  scope="col">Views</th>
          <th  scope="col">Image</th>
          <th  scope="col">Body</th>
          <th  scope="col">Published</th>
          <th  scope="col">Created_at</th>
          <th  scope="col">Updated_at</th>
        </tr> 
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from posts ORDER BY id;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>

<td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><?php echo $row["user_id"]; ?></td>
<td align="center"><?php echo $row["title"]; ?></td>
<td align="center"><?php echo $row["slug"]; ?></td>
<td align="center"><?php echo $row["views"]; ?></td>
<td align="center"><?php echo $row["image"]; ?></td>
<td align="center"><?php echo $row["published"]; ?></td>
<td align="center"><?php echo $row["created_at"]; ?></td>
<td align="center"><?php echo $row["updated_at"]; ?></td>


<td align="center">
<a href="edit_posts.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete_posts.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>