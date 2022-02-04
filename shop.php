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
		<?php if(isset($_SESSION['usrid'])){
			$cmd2="select * from user_data where user_id =".$_SESSION['usrid'];
			$qry=$conn->query($cmd2);
			foreach($qry as $v2){}
			}
		?>
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
								<?php if(isset($_SESSION['usrid'])){ ?>
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
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.1s">
						 Shop
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
			<h1 class="text-center latestitems">OUR PRODUCTS</h1>
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

		<!-- <div class="col-md-4">
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
		</div> -->
		<!-- /.productbox -->
		<div class="row">	
				<?php
					$cmd3="select * from product";
					$qry3=$conn->query($cmd3);
					// $total = "SELECT * FROM order_data where order_user_id = '".$_SESSION['usrid']."' ";
					// $conn->beginTransaction();
					// $qr=$conn->prepare($total);
					// $s=$qr-execute();
					// foreach($qr as $v){}
					// $t=$conn->rowCount();
					// mysql_fetch_row($v['pro_id']);
					
					// var_dump($t);exit;

					foreach($qry3 as $v3){
				?>
						<div class="col-md-4">
							<div class="productbox">
								<div class="fadeshop">
									<div class="captionshop text-center" style="display: none;">
										<h3><?php echo "Item Description"; ?></h3>
										<p>
											<?php echo $v3['pro_desc']; ?>
										</p>
										<p>
											<a href="item_add_to_cart_from_shop.php?prdctid=<?php echo $v3['pro_id']; ?> " class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> <?php echo "Cart" ; ?></a>
											<!-- <a href="#" class="learn-more detailslearn"><i class="fa fa-link"></i></a> -->
										</p>
									</div>
									<span class="maxproduct"><img src="admin_panel/prdct_upload_image/<?php echo $v3['pro_img']; ?>" alt=""></span>
								</div>
								<div class="product-details">
									<a href="#">
									<h1><?php echo $v3['pro_nmp']; ?></h1>
									<h1><?php echo $v3['pro_price']; ?></h1>
									</a>
									<span class="price">
									<!-- <span class="edd_price"><?php echo $v3['pro_price']; ?></span> -->
									<button class="btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"> <a style="color:white;" href="item_add_to_cart_from_shop.php?prdctid=<?php echo $v3['pro_id']; ?> "> Add Cart</a></i></button>
									
									</span>
								</div>
							</div>
						</div>
					<?php } ?>
				
				

		</div>
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
			
			<p>
				 &copy; 2021 Saumya ETemplate<br/>
				ESAM - Free template by <a href="">SAUMYA</a>
			</p>
		</div>
	</div>
</div>

<!-- Load JS here for greater good =============================-->
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