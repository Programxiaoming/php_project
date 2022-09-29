
<?php
include "../config.php"
?>
<!-- improved the doc by including the header.php file -->
<?php require_once( ROOT_PATH . '/includes/header.php') ?>
<title>View Posts</title>
<link rel="stylesheet" href="css/admin_styling.css">
<?php include( ROOT_PATH . '/admin/nav_admin.php'); ?>
</head>
<body>
<div class="form">

<h2>View Posts</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
          <th  scope="col" >ID</th>
          <th  scope="col">User ID</th>
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
$sel_query="Select * from posts ORDER BY id;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>

<td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><?php echo $row["user_id"]; ?></td>
<td align="center"><?php echo $row["title"]; ?></td>
<td align="center"><?php echo $row["slug"]; ?></td>
<td align="center"><?php echo $row["views"]; ?></td>
<td align="center"><?php echo $row["image"]; ?></td>
<td align="center"><?php echo $row["body"]; ?></td>
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
<?php  } ?>
<?php include( ROOT_PATH . '/includes/footer.php') ?>