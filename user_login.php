<?php
include 'dblink.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
<style>
ul li{
	list-style: none;
}
#imgicon{
	padding-top: 10px;
}
#navbardiv ul li:last-child #k #l ul li{
	padding-left: 10px;
}
</style>
</head>
<body>

<!-- HEADER =============================-->
<header class="item header margin-top-0">
<div class="wrapper">
	<nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle navigation</span>
			</button>
			<a href="index.php" class="navbar-brand brand"> ESAM </a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php">Home</a></li>
				<li class="propClone"><a href="shop.php">Shop</a></li>
				<li class="propClone"><a href="checkout.php">cart</a></li>
				<li class="propClone"><a href="contact.php">Contact</a></li>
                <li class="icons dropdown" >
						<div class="user-img c-pointer position-relative"   data-toggle="dropdown">
							<span class="activity active"></span>
							<?php if(isset($_SESSION['usrid']) and $_SESSION['store'] > 0 ) { ?>
							<a href=""><img src="uploadimage/<?php echo $v2['user_pic']?>" style="height: 40px; width: 40px; border-radius: 50%; margin-top:15px"></a>
							<?php } else{ ?>
							<a href=""><img src="images/default_icon.png"  style="height: 40px; width: 40px; border-radius: 50%; margin-top:15px"></a>
							<?php } ?>
						</div>
						<div class="drop-down dropdown-profile animated fadeIn dropdown-menu" id="k">
							<div class="dropdown-content-body" id="l">
								<ul >
									<?php
										if(isset($_SESSION['usrid'])){
									?>
									<li style="padding-left: 20px;">
										<a href="edit_usr_profile.php"><i class="icon-user"></i> <span>Edit Profile</span></a>
									</li>
									<?php } ?>
									<!-- <li style="padding-left: 20px;">
										<a href="">
											<i class="icon-envelope-open"></i> <span>Inbox</span>
										</a>
									</li> -->
									<?php if(! isset($_SESSION['usrid'])) { ?>
										<li style="padding-left: 20px;"><a href="user_login.php"><i class="icon-key"></i> <span>Login</span></a></li>
									<?php } else { ?>
									<li style="padding-left: 20px;"><a href="user_logout_code.php"><i class="icon-key"></i> <span>Logout</span></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
                </li>
			</ul>
		</div>
	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 Log In
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>

<!-- CONTENT =============================-->
<section class="item content">
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems">Sign In</h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
	
    <div class="sign_in">
		<?php if(isset($_SESSION['shop_msg'])){ ?>
		<h4 style="color:red;"><?php echo $_SESSION['shop_msg'];  unset($_SESSION['shop_msg']); ?></h4><br>
		<?php } ?>
		<?php if(isset($_SESSION['contact_msg'])){ ?>
		<h4 style="color:red;"><?php echo $_SESSION['contact_msg'];  unset($_SESSION['contact_msg']); ?></h4><br>
		<?php } ?>
		<?php if(isset($_SESSION['chkout_msg'])){ ?>
		<h4 style="color:red;"><?php echo $_SESSION['chkout_msg'];  unset($_SESSION['chkout_msg']); ?></h4><br>
		<?php } ?>
		<?php
			if(isset($_SESSION['sgnup_msg'])){
		?>
		<h4 style="color:red;"><?php echo $_SESSION['sgnup_msg'];  unset($_SESSION['sgnup_msg']); ?></h4><br>
		
		<?php
			}
		?>
		<?php  
			if(isset($_SESSION['usr_login_fail_msg'])){
		?>
			<h4 style="color:red;"><?php echo $_SESSION['usr_login_fail_msg']; unset($_SESSION['usr_login_fail_msg']); ?></h4><br>
		<?php } ?>
            <form action="user_login_code.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Id</label>
                    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="" name="usrid" placeholder="ex:saumya9348" required>
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="usrpwd" required>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Acept T & C</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button> &nbsp; <button type="reset" class="btn btn-info">Reset</button><br><br>
                
            </form>
            New user <a href="user_signup.php" style="color:blue">Creat One?</a>
    </div>
</div>
</section>

<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
				<h1 class="callactiontitle"> Promote Items Area Give Discount to Buyers <span class="callactionbutton"><i class="fa fa-gift"></i> WOW24TH</span>
				</h1>
			</div>
		</div>
	</div>
</div>
</section>

<!-- FOOTER =============================-->
<div class="footer text-center">
	<div class="container">
		<div class="row">
			<p class="footernote">
				 Connect with ESAM
			</p>
			<ul class="social-iconsfooter">
				<li><a href="tel:+91-9348977704"><i class="fa fa-phone"></i></a></li>
				<li><a href="https://www.facebook.com/saumya.saumya.sipun"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://www.instagram.com/oh_here_saumya_"><i class="fa fa-instagram"></i></a></li>
				<li><a href="mailto:panisaumyaranjan@gmail.com"><i class="fa fa-envelope"></i></a></li>
			</ul>
			<p>
				 &copy; 2021 Saumya ETemplate<br/>
				ESAM - Free template by <a href="">SAUMYA</a>
			</p>
		</div>
	</div>
</div>
<!-- SCRIPTS =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>

</body>
</html>