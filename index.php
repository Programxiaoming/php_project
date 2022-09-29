<?php require_once('config.php') ?>

<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>

<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>

<?php $posts = getPublishedPosts(); ?>


<?php require_once('includes/header.php') ?>
		<title>Random Team Blog| Home </title>
	</head>
	<body>

		<div class="container">

			<?php include( ROOT_PATH . '/includes/navbar.php') ?>
			<?php if (isset($_SESSION['user']['username'])) { ?>
		<div class="logged_in_info">
			<span>welcome <?php echo $_SESSION['user']['username'] ?></span>
			|
			<span><a href="logout.php">logout</a></span>
		</div>
	<?php }else{ ?>



	<div class="login_div">
		<form action="index.php" method="post" >
			<h2>Login</h2>
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password"  placeholder="Password"> 
			<button class="btn" type="submit" name="login_btn">Sign in</button>
			<a href="register.php" class="btn">register here!</a>

		</form>
	</div>

<?php } ?>
		<div class="content">
			<h2 class="content-title">Recent Posts</h2>
			<hr>
			
		<?php foreach ($posts as $post): ?>
			<div class="post" style="margin-left: 0px;">
			<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
        	<!-- Added this if statement... -->
			<?php if (isset($post['topic']['name'])): ?>
			<a 
				href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
				class="btn category">
				<?php echo $post['topic']['name'] ?>
			</a>
			<?php endif ?>

			<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
			<div class="post_info">
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<span class="read_more">Read more...</span>
				</div>
			</div>
			</a>
		</div>
		<?php endforeach ?>
	</div>
		<?php include( ROOT_PATH . '/includes/footer.php') ?>