
<?php
include "../config.php"
?>
<!-- improved the doc by including the header.php file -->
<?php require_once( ROOT_PATH . '/includes/header.php') ?>
<link rel="stylesheet" href="../static/css/public_styling.css"> 
<?php include( ROOT_PATH . '/admin/nav_admin.php'); ?>
<title>Users List</title>
</head>
<body>
<div class="form">

<!-- fixed these as they were not working  -->
<p>
  <!-- added href back to dashboard so that user doesn't get lost !-->
<a href="dashboard.php"> Dashboard</a>  |
<a href="../index.php">Home</a> 
| <a href="../logout.php">Logout</a></p>
<h2>Users List</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
          <!-- removed count from here and the code below because we do not need it --> 
          <th  scope="col" >ID</th>
          <th  scope="col">User Name</th>
          <th  scope="col">email</th>
          <th  scope="col"> role</th>
          <!-- removed password, we don't want to show it to all users 
          <th  scope="col">password</th> -->
          <th  scope="col">Created_at</th>
          <th  scope="col">Updated_at</th>
          <th  scope="col">Edit</th>
          <th  scope="col">Delete</th>
        </tr> 
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from users ORDER BY id;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>

<td align="center"><?php echo $row["id"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["role"]; ?></td>
<td align="center"><?php echo $row["created_at"]; ?></td>
<td align="center"><?php echo $row["updated_at"]; ?></td>


<td align="center">
<a href="edit_users.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete_users.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php include( ROOT_PATH . '/includes/footer.php') ?>