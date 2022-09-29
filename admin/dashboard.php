<?php  include('../config.php'); ?>

	<title>Admin | Dashboard</title>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="../index.php">
				<h1>Random Team Blog - Home</h1>
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
				 <br>
				<span>New Post</span>
			</a>
			<a href="create_topics.php">
				<br>
				<span>New Topic</span>
			</a>

		</div>
		<br><br><br>
		<div class="buttons">
			<a href="read_users.php">List Users</a>
			<a href="read_posts.php">List Posts</a>
		</div>
	</div>
</body>
</html>