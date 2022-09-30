<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();
?>
<?php require_once('includes/header.php') ?>
<title> <?php echo $post['title'] ?> | LifeBlog</title>

<script defer>
        
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '3a7d8e9504msh2a768cbd016e773p1cb514jsn7169f596af56',
		'X-RapidAPI-Host': 'quotes15.p.rapidapi.com'
	}
};

fetch('https://quotes15.p.rapidapi.com/quotes/random/', options)
	.then(response => response.json())
	.then(response => document.getElementById("quote").innerHTML = response.content)
	.catch(err => console.error(err));

</script>
</head>
<body>
<div class="container">
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>
	
	<div class="content" >

		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
			<?php if ($post['published'] == false): ?>
				<h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>

		</div>

		<div class="post-sidebar">
			<div class="card">
				<div class="card-header">
					<h2>Topics</h2>
				</div>
				<div class="card-content">
					<?php foreach ($topics as $topic): ?>
						<a 
							href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> 
					<?php endforeach ?>
				</div>
			</div>
		</div>

	</div>
	<div class="content" id="quote">Quote Will Appear Shortly</div>
</div>
<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>