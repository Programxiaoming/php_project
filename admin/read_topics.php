
<?php
include "../config.php"
?>
<!-- improved the doc by including the header.php file -->
<?php require_once( ROOT_PATH . '/includes/header.php') ?>
<link rel="stylesheet" href="../static/css/public_styling.css"> 
<?php include( ROOT_PATH . '/admin/nav_admin.php'); ?>
<title>View Topics</title>
</head>
<body>
<div class="form">
<p>
<a href="dashboard.php"> Dashboard</a> | 
<a href="../index.php">Home</a> |   
<a href="create_topics.php">Insert New Topics</a> 
| <a href="../logout.php">Logout</a></p>

<h2>View Topics</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
          <th><strong>No</strong></th>
          <th  scope="col" >ID</th>
          <th  scope="col">name</th>
          <th  scope="col"> Slug</th>
          <th  scope="col">Edit</th>
          <th  scope="col">Delete</th>


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
<?php include( ROOT_PATH . '/includes/footer.php') ?>