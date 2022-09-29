<!-- Header -->
<?php include "../config.php" ?>
<!-- improved the doc by including the header.php file -->
<?php require_once(ROOT_PATH . '/includes/header.php') ?>
<link rel="stylesheet" href="css/admin_styling.css">
<?php include(ROOT_PATH . '/admin/nav_admin.php'); ?>
<?php

$userErr =$titleErr = $viewsErr = $slugErr  = $bodyErr = $publishedErr =  "";
if (isset($_POST['user_id'])) {
  $user_id = stripslashes($_REQUEST["user_id"]);
  $user_id = mysqli_real_escape_string($conn, $user_id);
  //user_id must be a number
  if (!preg_match("/^[\d]*$/", $user_id)) {
    $userErr = "User must be numeric";
  }

  $title = stripslashes($_REQUEST["title"]);
  $title = mysqli_real_escape_string($conn, $title);
  // title should start with a capital letter, and be greater than 2 characters
  if (!preg_match("/[A-Z][a-z]*(\s[A-Z][a-z]*)*/", $title) && strlen($title) > 1) {
    $titleErr = "Title must start with a capital letter and be greater than 1 character";
  }

  $slug = stripslashes($_REQUEST["slug"]);
  $slug = mysqli_real_escape_string($conn, $slug);
  if (!preg_match("/^[a-zA-Z ._-]{2,200}$/", $slug)) {
    $slugErr = "slug must be between 2 and 200 characters with letters, dots, spaces, underscores and dashes accepted";
  }

  $views = stripslashes($_REQUEST["views"]);
  $views = mysqli_real_escape_string($conn, $views);
  //views must be a number
  if (!preg_match("/^[\d]*$/", $views)) {
    $viewsErr = "views must be numeric";
  }
  //image validated through form
  $image = $_REQUEST['image'];

  $body = stripslashes($_REQUEST["body"]);
  $body = mysqli_real_escape_string($conn, $body);
  // body should start with a capital letter, and be greater than 30 characters
  if ((!preg_match("/[A-Z][a-z]*(\s[A-Z][a-z]*)*/", $body)) || (strlen($body) < 30)) {
    $bodyErr = "Body must start with a capital letter and be greater than 30 characters, don't be lazy!";
  }

  $published = stripslashes($_REQUEST["published"]);
  $published = mysqli_real_escape_string($conn, $published);
  // published should be equal to 1 or 0
  if ($published != 1 && $published != 0) {
    $publishedErr = "published must be 1 or 0";
  }

  $created_at = date("Y-m-d H:i:s");
  $updated_at = date("Y-m-d H:i:s");

  if (empty($userErr) && empty($titleErr) && empty($viewsErr) && empty($slugErr) && empty($bodyErr) && empty($publishedErr)) {
  // SQL query to insert user data into the posts table
  $query = "INSERT INTO posts (user_id, title, slug, views, image, body, published, created_at, updated_at)
        VALUES('$user_id','$title','$slug','$views','$image','$body','$published','$created_at','$updated_at')";
  $add_post = mysqli_query($conn, $query);

  // displaying proper message for the user to see whether the query executed perfectly or not 
  if (!$add_post) {
    echo "something went wrong " . mysqli_error($conn);
  } else {
    echo "<script type='text/javascript'>alert('Post added successfully!')</script>";
    header("Location: read_posts.php");
  }
}
}
?>

<h1 class="text-center">Add Post details </h1>
<div class="container">

  <form action="" method="post">

    <p><input type="number" name="user_id" placeholder="User ID" required /></p>
    <span class="error"> <?php echo $userErr; ?></span><br>

    <p><input type="text" name="title" placeholder="Title" required /></p>
    <span class="error"> <?php echo $titleErr; ?></span><br>

    <p><input type="text" name="slug" placeholder="Slug" required /></p>
    <span class="error"> <?php echo $slugErr; ?></span><br>

    <p><input type="number" name="views" placeholder="Views" required /></p>
    <span class="error"> <?php echo $viewsErr; ?></span><br>

    <input type="hidden" name="MAX_FILE_SIZE" value="2048000" />
    <p><input type="file" name="image" placeholder="Enter image" accept="image/x-png,image/gif,image/jpeg" required/></p>

    <p><input type="text" name="body" placeholder="Body" required /></p>
    <span class="error"> <?php echo $bodyErr; ?></span><br>

    <p><input type="number" name="published" placeholder="Published" maxlength="1" required /></p>
    <span class="error"> <?php echo $publishedErr; ?></span><br>

    <p><input name="submit" type="submit" value="Submit" /></p>

  </form>
</div>

<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
  <a href="../index.php" class="btn btn-warning mt-5"> Back to homepage </a>
  <div>

    <?php include(ROOT_PATH . '/includes/footer.php') ?>