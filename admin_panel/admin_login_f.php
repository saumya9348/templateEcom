<?php
include 'dblink.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login of ESAM</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    

<div class="login">
  <h1>Login to Admin Panel</h1>
  <form method="post" action="admin_login_code.php">
    <?php if(isset($_SESSION['lin_fail'])){ ?>
		<h4 style="color:red;"><?php echo $_SESSION['lin_fail'];  unset($_SESSION['lin_fail']); ?></h4><br>
    <?php } ?>
    <p><input type="text" name="login" value="" placeholder="UserId"></p>
    <p><input type="password" name="password" value="" placeholder="Password"></p>
    <p class="remember_me">
      <label>
        <input type="checkbox" name="remember_me" id="remember_me">
        Remember me on this computer
      </label>
    </p><br>
    <p class="submit"><input type="submit" name="commit" value="Login"></p>
  </form>
</div>

</body>
</html>