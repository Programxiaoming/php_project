
 <?php  include "../config.php" ?> 
<?php
//escapes special characters in a string to prevent SQL injections and ensure values can go in the db
$id=$_REQUEST['id'];
$id = mysqli_real_escape_string($conn, $id);
if (!is_numeric($id) || $id<1) {
        echo "Something went wrong, please try again";
} else {
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
}
?>

<!-- why doesn't css work here? -->
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<title>Update users</title>
</head>
<body>
<div class="form">
<p>
<a href="read_users.php">Back</a>
| <a href="logout.php">Logout</a></p>
<h1>Update users</h1>
<?php
$status = "";
$usernameErr = $emailErr = $passwordErr = $retypedErr = $roleErr= "";
if(isset($_POST['new']) && $_POST['new']==1)
{

         //sanitize input
        $username = stripslashes($_REQUEST["username"]);                //escapes special characters in a string to prevent SQL injections
        $username = mysqli_real_escape_string($conn, $username);
        //username can be letters or numbers, dots and underscores are allowed but not spaces, length of 2 to 20
        if (!preg_match("/^[\w_.]{2,20}$/", $username)) {
                 $usernameErr = "Username must be between 2 and 20 characters with numbers, letters, dots, and underscores accepted";
        }

        $email = stripslashes($_REQUEST["email"]);
        $email = mysqli_real_escape_string($conn, $email);
        //email can be any word character, dash, or underscore with @ and . word characters
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
                    $emailErr = "Invalid email";
          }

         $password = stripslashes($_REQUEST["password"]);
        $password = mysqli_real_escape_string($conn, $password);
         //password must be at least 7 characters, with one uppercase, one lower case, and one number OR special character. 
         if (!preg_match("/(?-i)(?=^.{7,}$)((?!.*\s)(?=.*[A-Z])(?=.*[a-z]))((?=(.*\d){1,})|(?=(.*\W){1,}))^.*$/", $password)) {
                $passwordErr = "Password should be at least 7 characters, with one uppercase, one lower case, and at least one number OR special character ";
                }

        $retyped = stripslashes($_REQUEST["retyped"]);
        $retyped = mysqli_real_escape_string($conn, $retyped);
                //email can be any word character, dash, or underscore with @ and . word characters
                if (strcmp($password, $retyped) !== 0) {
                        $retypedErr = "Passwords must match";
                }
        // this is technically redundant but what if the html code is changed with an error, this prevents problems
        $role = stripslashes($_REQUEST['role']);
        $role = mysqli_real_escape_string($conn, $role);
        if ($role != "Author" || $role!="Admin") {
                $roleErr = "Please respect the HTML document provided";
        }

        $created_at = $_REQUEST['created_at'];
        $updated_at = date("Y-m-d H:i:s");

        //if no errors insert into db
        if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($retypedErr) && empty($roleErr)) {

        //do not allow to change password 
$update="update users set id='".$id."', username='".$username."', email='".$email."',
role='".$role."',
created_at='".$created_at."', updated_at='".$updated_at."' where id='".$id."'";
                        
mysqli_query($conn, $update) or die(mysqli_error($conn)); 
$status = "users Updated Successfully. </br></br>
<a href='read_users.php'>View Updated users</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
        }
}else {
?>

<div>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
<input type="hidden" name="new" value="1" />

<input name="id" type="hidden" value="<?php echo $row['id'];?>" />

<input name="created_at" type="hidden" value="<?php echo $row['created_at'];?>" />

<p><input type="text" name="username" placeholder="Enter username" 
required value="<?php echo $row['username'];?>" /></p>
<span class="error"> <?php echo $usernameErr; ?></span>

<p><input type="email" name="email" placeholder="Enter email" 
required value="<?php echo $row['email'];?>" /></p>
<span class="error"> <?php echo $emailErr; ?></span>


<select title="role" name="role">
                                <option selected>Admin</option>
                                <option>Author</option>
                        </select>
                        <span class="error"> <?php echo $roleErr; ?></span><br>

<!-- I don't think anyone should be able to update passwords, so let's not include this
<p><input type="password" name="password" placeholder="Enter password" 
required/></p>


<p> <input type="password" name="retyped" placeholder="Retype Password" required /> </p>
-->

<!-- removed updated_at because I think this shouln't be modified by admin
<p><input type="text" name="updated_at" placeholder="Enter updated_at" 
required value="</?php echo $row['updated_at'];?>" /></p> -->


<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>