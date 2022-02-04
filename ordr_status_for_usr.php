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
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 Order Status
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
			<h1 class="text-center latestitems">Orderd Items</h1>
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
            <?php
                $cmd2="select * from order_to_admin ota inner join product pd on ota.pro_id1 = pd.pro_id where odr_usr_id =".$_SESSION['usrid'] ;
                $qry2=$conn->query($cmd2);
                $ss=1;
                $sv=array();
                while($row = $qry2->fetch(PDO::FETCH_ASSOC)){
                    $sv[]=$row['pro_id1'];
                    $ss++;
                }
                if($ss > 1){

            ?>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">Item No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Payment</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $slno=1;
                $cmd3="select * from order_to_admin ota inner join product pd on ota.pro_id1 = pd.pro_id where odr_usr_id =".$_SESSION['usrid'] ;
                $qry3=$conn->query($cmd2);
                // var_dump($qry2);
                foreach($qry3 as $v2){
            ?>
                <tr scope="row">
                <td scope="col"><?php echo $slno++ ; ?></td>
                <td scope="col"><?php echo $v2['pro_nmp']; ?></td>
                <td scope="col"><?php echo $v2['pro_price']; ?></td>
                <td scope="col"><?php echo $v2['payment_mode']; ?></td>
                <td scope="col"><?php echo $v2['order_status']; ?></td>
                <td scope="col"><button class="btn btn-primary" onclick="return confirm('Are you sure to cancel this product ?')"><a href="dl_prdct_from_ord_status.php?id=<?php echo $v2['pro_id1']; ?>"  style="color:white;" >Cancel</a></button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <h5>No orders yet</h5>
        <?php } ?>
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