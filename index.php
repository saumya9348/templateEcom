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
		<?php
			if(isset($_SESSION['usrid'])){
				$cmd2="select * from user_data where user_id =".$_SESSION['usrid'];
				$qry=$conn->query($cmd2);
				foreach($qry as $v2){}
				$_SESSION['usr_profile_pic']=$v2['user_pic'];
				}
		?>
		<div id="navbar-collapse-02" class="collapse navbar-collapse" id="navbardiv">
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
									<?php if(isset($_SESSION['usrid'])){ ?>
									<li style="padding-left: 20px;">
										<a href="ordr_status_for_usr.php"><i class="icon-user"></i> <span>Order Detail</span></a>
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
				<div class="text-homeimage">
					<div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">
						 Increase Digital Sales
					</div>
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">
						 Boost revenue with ESAM
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>


<!-- STEPS =============================-->
<div class="item content">
	<div class="container toparea">
		<div class="row text-center">
			<div class="col-md-4">
				<div class="col editContent">
					<span class="numberstep"><i class="fa fa-shopping-cart"></i></span>
					<h3 class="numbertext">Choose our Products</h3>
					<p>
						 Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Cras justo odio, dapibus ac facilisis in, egestas eget quam.
					</p>
				</div>
				<!-- /.col-md-4 -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="fa fa-gift"></i></span>
					<h3 class="numbertext">Pay with PayPal or Card</h3>
					<p>
						 Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Cras justo odio, dapibus ac facilisis in, egestas eget quam.
					</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="fa fa-download"></i></span>
					<h3 class="numbertext">Get Instand Download</h3>
					<p>
						 Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam quis risus eget urna mollis ornare vel eu leo. Cras justo odio, dapibus ac facilisis in, egestas eget quam.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
	
	
	<!-- LATEST ITEMS =============================-->
<section class="item content">
	<div class="container">
		<div class="underlined-title">
			<div class="editContent">
				<h1 class="text-center latestitems">LATEST ITEMS <br><br><span style="color:red;" >Below Product are only for show of please visit shop page</span>  </h1>
			</div>
			<div class="wow-hr type_short">
				<span class="wow-hr-h">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>Item Name</h3>
							<p>
								 This is a short excerpt to generally describe what the item is about.
							</p>
							<p>
								<a href="#" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Purchase</a>
								<a href="#" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product1-1.jpg" alt=""></span>
					</div>
					<div class="product-details">
						<a href="#">
						<h1>Calypso Theme</h1>
						</a>
						<span class="price">
						<span class="edd_price">$49.00</span>
						</span>
					</div>
				</div>
			</div>
			<!-- /.productbox -->
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>Item Name</h3>
							<p>
								 This is a short excerpt to generally describe what the item is about.
							</p>
							<p>
								<a href="#" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Purchase</a>
								<a href="#" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product2.jpg" alt=""></span>
					</div>
					<div class="product-details">
						<a href="#">
						<h1>FastSell Theme</h1>
						</a>
						<span class="price">
						<span class="edd_price">$49.00</span>
						</span>
					</div>
				</div>
			</div>
			<!-- /.productbox -->
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>Item Name</h3>
							<p>
								 This is a short excerpt to generally describe what the item is about.
							</p>
							<p>
								<a href="#" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Purchase</a>
								<a href="#" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product2-3.jpg" alt=""></span>
					</div>
					<div class="product-details">
						<a href="#">
						<h1>Biscaya Theme</h1>
						</a>
						<span class="price">
						<span class="edd_price">$49.00</span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>


<!-- BUTTON =============================-->
<div class="item content">
	<div class="container text-center">
		<a href="shop.php" class="homebrowseitems">Browse All Products
		<div class="homebrowseitemsicon">
			<i class="fa fa-star fa-spin"></i>
		</div>
		</a>
	</div>
</div>
<br/>


<!-- AREA =============================-->
<div class="item content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<i class="fa fa-microphone infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle">General Questions</h1>
					<p>
						 Want to buy a theme but not sure if it's got all the features you need? Trouble completing the payment? Or just want to say hi? Send us your message and we will answer as soon as possible!
					</p>
					<p class="text-center">
						<a href="#">- Get in Touch -</a>
					</p>
				</div>
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4">
				<i class="fa fa-comments infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle">Theme Support</h1>
					<p>
						 Theme support issues prevent the theme from working as advertised in the demo. This is a free and guaranteed service offered through our support forum which is found in each theme.
					</p>
					<p class="text-center">
						<a href="#">- Select Theme -</a>
					</p>
				</div>
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4">
				<i class="fa fa-bullhorn infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle">Hire Us</h1>
					<p>
						 If you wish to change an element to look or function differently than shown in the demo, we will be glad to assist you. This is a paid service due to theme support requests solved with priority.
					</p>
					<p class="text-center">
						<a href="#">- Get in Touch -</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- TESTIMONIAL =============================-->
<div class="item content">
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<div class="slide-text">
				<div>
					<h2><span class="uppercase">Awesome Support</span></h2>
					<img src="http://wowthemes.net/demo/salique/salique-boxed/images/temp/avatar2.png" alt="Awesome Support">
					<p>
						 The support... I can only say it's awesome. You make a product and you help people out any way you can even if it means that you have to log in on their dashboard to sort out any problems that customer might have. Simply Outstanding!
					</p>
					<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
				</div>
			</div>
		</div>
	</div>
</div>


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
<script>
//----HOVER CAPTION---//	  
jQuery(document).ready(function ($) {
	$('.fadeshop').hover(
		function(){
			$(this).find('.captionshop').fadeIn(150);
		},
		function(){
			$(this).find('.captionshop').fadeOut(150);
		}
	);
});
</script>
	
</body>
</html>