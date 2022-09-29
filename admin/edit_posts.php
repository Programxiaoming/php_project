<?php include "../config.php" ?>
<?php
$id = $_REQUEST['id'];
$id = mysqli_real_escape_string($conn, $id);
if (!is_numeric($id) || $id < 1) {
    echo "Something went wrong, please try again";
} else {
    $query = "SELECT * from posts where id='" . $id . "'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Posts</title>
<link rel="stylesheet" href="css/admin_styling.css">
<?php include( ROOT_PATH . '/admin/nav_admin.php'); ?>
</head>

<body>
<h1 class="post_header">Update posts</h1>
<?php
$userErr = $titleErr = $viewsErr = $slugErr  = $bodyErr = $publishedErr =  "";
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

            $user_id = stripslashes($_REQUEST["user_id"]);
            $user_id = mysqli_real_escape_string($conn, $user_id);

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

            // we don't need to change created_at
            // $created_at = $_REQUEST['created_at'];
            $updated_at = date("Y-m-d H:i:s");

            if (empty($titleErr) && empty($viewsErr) && empty($slugErr) && empty($bodyErr) && empty($publishedErr)) {
                $update = "update posts set id='" . $id . "', user_id='" . $user_id . "', title='" . $title . "',
slug='" . $slug . "', views='" . $views . "', image='" . $image . "', body='" . $body . "', published='" . $published . "', updated_at='" . $updated_at . "' where id='" . $id . "'";


                mysqli_query($conn, $update) or die(mysqli_error($conn));
                $status = "Post Updated Successfully. </br></br>
<a href='read_posts.php'>View Updated posts</a>";
                echo '<p style="color:#FF0000;">' . $status . '</p>';
            } else {
                echo "<p>Error when editing post<p>";
            }
        } else {
            echo " ";
        }

        ?>


        <div class="post">
            <form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="new" value="1" />

                <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
                <input name="created_at" type="hidden" value="<?php echo $row['created_at']; ?>" />

                <!-- the user_id should be hidden -->
                <p><input type="hidden" name="user_id" placeholder="Enter user_id" required value="<?php echo $row['user_id']; ?>" /></p>

                <p>Post Title: </Title><input type="text" name="title" placeholder="Enter title" required value="<?php echo $row['title']; ?>" /></p>
                <span class="error"> <?php echo $titleErr; ?></span><br>

                <p>Post Slug: <input type="text" name="slug" placeholder="Enter slug" required value="<?php echo $row['slug']; ?>" /></p>
                <span class="error"> <?php echo $slugErr; ?></span><br>

                <p>Views Number: <input type="number" name="views" placeholder="Enter views" required value="<?php echo $row['views']; ?>" /></p>
                <span class="error"> <?php echo $viewsErr; ?></span><br>

                <input type="hidden" name="MAX_FILE_SIZE" value="2048000" />
                <p><input type="file" name="image" placeholder="Enter image" accept="image/x-png,image/gif,image/jpeg" required value="<?php echo $row['image']; ?>" /></p>

                <div class="post_body">
                <p><input type="text" name="body" placeholder="Enter body" style="border-style:none" required value="<?php echo $row['body']; ?>" /></p>
                <span class="error"> <?php echo $bodyErr; ?></span><br>
                </div>
                <p><input type="number" name="published" placeholder="Enter published" required value="<?php echo $row['published']; ?>" /></p>
                <span class="error"> <?php echo $publishedErr; ?></span><br>

                <!-- <p><input type="text" name="updated_at" placeholder="Enter updated_at" 
required value="</?php echo $row['updated_at'];?>" /></p> -->

                <div class="btn_sub">
                <p><input name="submit" type="submit" value="Update" /></p>
                </div>
            </form>
            <?php  ?>
        </div>
        <?php include(ROOT_PATH . '/includes/footer.php') ?>