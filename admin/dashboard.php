<?php  include('../config.php'); ?>
<link rel="stylesheet" href="css/admin_styling.css">
<?php include( ROOT_PATH . '/admin/nav_admin.php'); ?> 	
<title>Admin | Dashboard</title>
</head>
<body>
	<div class="header">
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span>Welcome <?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
			</div>
		<?php endif ?>
	</div>
	<div class="dashboard">
		<h1>Dashboard</h1>
		<div class="stats">
			<a href="create_posts.php" class="first">
				 <br>
				<span>New Post</span>
			</a>
			<a href="create_topics.php">
				<br>
				<span>New Topic</span>
			</a>
			<a href="read_users.php">
				<br>
				<span>List Users</span>
			</a>
			<a href="read_posts.php">
				<br>
				<span>List Posts</span>
			</a>
		</div>
<?php include( ROOT_PATH . '/includes/footer.php') ?>