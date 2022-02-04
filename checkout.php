<?php
include 'dblink.php';
if(isset($_SESSION['usrid'])){

}else{
	$_SESSION['chkout_msg']="Please LogIn First";
	header('location:user_login.php');
}
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
				$cmd5 = "select count(pro_id) as cnt from order_data WHERE order_user_id=".$_SESSION['usrid'];
				$qry5=$conn->query($cmd5);
				foreach($qry5 as $v5){} //this loop is for count cart total item
				
				foreach($qry as $v2){} //this is for show product query
				}
		?>

		<div id="navbar-collapse-02"  class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php">Home</a></li>
				<li class="propClone"><a href="shop.php">Shop</a></li>
				<li class="propClone"><a href="checkout.php">cart &nbsp;<sup><?php echo $v5['cnt']; ?></sup></a></li>
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
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						Checkout
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
			<h1 class="text-center latestitems">MAKE PAYMENT</h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
	<?php
			if($v5['cnt'] > 0){																	//show below code if cart has item
	?>
	<?php
		$cmd3="select * from order_data ord inner join product pdct on ord.pro_id = pdct.pro_id inner join user_data udt on order_user_id = user_id where order_user_id=".$_SESSION['usrid'];
		$qry3=$conn->query($cmd3);
		// var_dump($qry3);exit;
		$total_price=0;
		
		
	?>
	<div id="edd_checkout_wrap" class="col-md-8 col-md-offset-2">
		<form id="edd_checkout_cart_form" method="post" action="order_cart_value.php">
			<div id="edd_checkout_cart_wrap">
				<table id="edd_checkout_cart" class="ajaxed">
				<thead>
				<tr class="edd_cart_header_row">
					<th class="edd_cart_item_name">
						 Item Name
					</th>
					<th class="edd_cart_item_price">
						 Item Price
					</th>
					<th class="edd_cart_actions">
						 Actions
					</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$_SESSION['prductid']=array();
					foreach($qry3 as $v3){
						$_SESSION['prductid'][]=$v3['pro_id'];
						
				?>
				<tr class="edd_cart_item" id="edd_cart_item_0_25" data-download-id="25">
					<td class="edd_cart_item_name">
						<div class="edd_cart_item_image">
							<img width="25" height="25" src="admin_panel/prdct_upload_image/<?php echo $v3['pro_img']; ?>" alt="">
						</div>
						<span class="edd_checkout_cart_item_title"><?php echo $v3['pro_nmp']; ?></span>
					</td>
					<td class="edd_cart_item_price">
					
					<?php echo $v3['pro_price']; ?>
					</td>
					<td class="edd_cart_actions">
						<a class="edd_cart_remove_item_btn" href="checkout_prdct_delete.php?pid=<?php echo $v3['pro_id']; ?>" onclick="return confirm('Are you sure want to delete this product ?')">Remove</a>
					</td>
				</tr>
				<?php }  ?>
				
				</tbody>
				<tfoot>
				<?php
			
					$cmd4="select * from order_data ord inner join product pdct on ord.pro_id = pdct.pro_id inner join user_data udt on 
					order_user_id = user_id where order_user_id=".$_SESSION['usrid'];
					$t=$conn->prepare($cmd4);
					$s= $t->execute();
					$qry4=$conn->query($cmd4);
					$storeArray = Array();
					while($row = $qry4->fetch(PDO::FETCH_ASSOC) ){
						$storeArray[]=$row['pro_price'];
					}
					$totalCartValue=array_sum($storeArray);
				?>
				<tr class="edd_cart_footer_row">
					<th colspan="5" class="edd_cart_total">
						 Total: <span class="edd_cart_amount" data-subtotal="11.99" data-total=""><?php echo $totalCartValue."&nbsp; $" ; ?></span>
					</th>
				</tr>
				</tfoot>
				</table>
			</div>
		<div id="edd_checkout_form_wrap" class="edd_clearfix">

				<fieldset id="edd_checkout_user_info">
					<legend>Delivery Address</legend>
					<p id="edd-email-wrap">
						<label class="edd-label" for="edd-email">
						Email Address <span class="edd-required-indicator">*</span></label>
						<input class="edd-input required" type="email" name="emailid" placeholder="Email address" id="edd-email" required>
					</p>
					<p id="edd-first-name-wrap">
						<label class="edd-label" for="edd-first">
						Full Name <span class="edd-required-indicator">*</span>
						</label>
						<input class="edd-input required" type="text" name="name" placeholder="Full name" id="edd-first" required>
					</p>
					<p id="edd-last-name-wrap">
						<label class="edd-label" for="edd-last">
						Mobile No <span class="edd-required-indicator">*</span></label>
						<input class="edd-input" type="text" name="mobno" id="edd-last" placeholder="Mobile No" required>
					</p>
					<p id="edd-first-name-wrap">
						<label class="edd-label" for="edd-first">
						Address <span class="edd-required-indicator">*</span>
						</label>
						<input class="edd-input required" type="text" name="addrs" placeholder="ex:plotno 354,saheednaagar" id="edd-first" required>
					</p>
					<p id="edd-first-name-wrap">
						<label class="edd-label" for="edd-first">
						Pincode <span class="edd-required-indicator">*</span>
						</label>
						<input class="edd-input required" type="text" name="pin" placeholder="Pincode" id="edd-first" required>
					</p>
					<p id="edd-first-name-wrap">
						<label class="edd-label" for="edd-first">
						Payment Mode <span class="edd-required-indicator">*</span>
						</label>
						<select name="" id="">
							<option value="">Select</option>
							<option value="">Online</option>
						</select>
					</p>

				</fieldset>
				<fieldset id="edd_purchase_submit">
					<p id="edd_final_total_wrap">
						<strong>Purchase Total:</strong>
						<input type="hidden" name="totalamount" id="" value="<?php echo $totalCartValue."$"; ?>">
						<span class="edd_cart_amount" data-subtotal="11.99" data-total="11.99"><?php echo $totalCartValue."$"; ?></span>
					</p>
					<input type="hidden" name="edd_action" value="purchase">
					<input type="hidden" name="edd-gateway" value="manual">
					<input type="submit" class="edd-submit button" id="edd-purchase-button" name="edd-purchase" value="Purchase">
				</fieldset>
			</form>
		</div>
	</div>
	<?php } else{ ?>
	<h5>No Item Yet</h5>
	<?php } ?>
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
				 &copy; 2017 Your Website Name<br/>
				Scorilo - Free template by <a href="https://www.wowthemes.net/">WowThemesNet</a>
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