<?php  include('../config.php'); ?>

	<title>Admin | Dashboard</title>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="<?php echo BASE_URL .'admin/dashboard.php' ?>">
				<h1>PHP blog</h1>
			</a>
		</div>
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
				<a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a>
			</div>
		<?php endif ?>
	</div>
	<div class="container dashboard">
		<h1>Welcome</h1>
		<div class="stats">
			<a href="create_posts.php" class="first">
				<span>10</span> <br>
				<span>New Posts</span>
			</a>
			<a href="create_topics.php">
				<span>10</span> <br>
				<span>New Topics</span>
			</a>
			<a>
				<span>10</span> <br>
				<span>Published comments</span>
			</a>
		</div>
		<br><br><br>
		<div class="buttons">
			<a href="edit_users.php">Edit Users</a>
			<a href="edit_posts.php">Edit Posts</a>
			<br>
			<a href="delete_users.php">Delete Users</a>
			<a href="delete_posts.php">Delete Posts</a>
			<br>
			<a href="read_users.php">List Users</a>
			<a href="read_posts.php">List Posts</a>
		</div>
	</div>
</body>
</html>