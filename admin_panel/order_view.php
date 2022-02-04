<?php
include 'dblink.php';
if(isset($_SESSION['admid'])){}else{
    header('location:admin_login_f.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard of ESAM</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <!-- <img src="images/logo-text1.png" alt=""> -->
                        <h1 style="color:white;padding-top:-9px;padding-bottom:3px;padding-left:5px;text-spacing:1px;">ESAM</h1>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="profile_edit.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="change_pw.php"><i class="icon-lock"></i> <span>Change Password</span></a>
                                        </li>
                                        <li><a href="logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="index.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">DashBoard</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_detail.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="order_view.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Order</span>
                        </a>
                    </li>
                    <li>
                        <a href="feedback_user.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Feedback</span>
                        </a>
                    </li>
                    <li>
                        <a href="change_pw.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <?php
        
            
        ?>

        <div class="content-body">

            <div class="container-fluid mt-3">
                
                <div class="row">
                       
                <table class="table table-striped">
                    <thead class="thead-dark">
                        
                        <tr>
                            <th scope="col">Order No #</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Coustmber Name</th>
                            <th scope="col">Coustmber Mob</th>
                            <th scope="col">Payment Mode</th>
                            <th scope="col">Address</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                            <?php
                            $cmd1="select * from order_to_admin ota inner join user_data ud on ota.odr_usr_id = ud.user_id 
                            inner join product pr on ota.pro_id1 = pr.pro_id";
                               $qry1= $conn->query($cmd1);
                            //    var_dump($qry1);
                            $ordno=1;
                            foreach($qry1 as $v1){
                        ?>
                        <?php if($v1['order_status']== "In Progres" ){ ?>
                        <tr scope="row"  class="table-warning">
                        <td scope="col"><?php echo $ordno++ ; ?></td>
                        <td scope="col"><?php echo $v1['user_login_id']; ?></td>
                        <td scope="col"><img style="height:80px;width:80px;" src="prdct_upload_image/<?php echo $v1['pro_img']; ?>" alt="image"></td>
                        <td scope="col"><?php echo $v1['pro_nmp']; ?></td>
                        <td scope="col"><?php echo $v1['pro_price']; ?></td>
                        <td scope="col"><?php echo $v1['buyer_name']; ?></td>
                        <td scope="col"><?php echo $v1['buyer_mob']; ?></td>
                        <td scope="col"><?php echo $v1['payment_mode']; ?></td>
                        <td scope="col"><?php echo $v1['address']; ?></td>
                        <td scope="col"><?php echo $v1['order_status']; ?></td>
                        <?php if($v1['order_status']== "In Progres" ){ ?>
                        <td scope="col"><button  class="btn btn-primary"><i class="fa fa-check" aria-hidden="true">&nbsp;<a style="color:white;" href="order_status_update_code.php?id=<?php echo urlencode($v1['odr_usr_id']); ?>&id1=<?php echo urlencode($v1['pro_id1']); ?>">Placed</a></i></button></td>
                        <?php }else{ ?>
                            <td scope="col"></td>
                            <?php } ?>
                        </tr>
                        <?php }else{ ?>
                            <tr scope="row" class="table-primary" >
                        <td scope="col"><?php echo $ordno++ ; ?></td>
                        <td scope="col"><?php echo $v1['user_login_id']; ?></td>
                        <td scope="col"><img style="height:80px;width:80px;" src="prdct_upload_image/<?php echo $v1['pro_img']; ?>" alt="image"></td>
                        <td scope="col"><?php echo $v1['pro_nmp']; ?></td>
                        <td scope="col"><?php echo $v1['pro_price']; ?></td>

                        <td scope="col"><?php echo $v1['buyer_name']; ?></td>
                        <td scope="col"><?php echo $v1['buyer_mob']; ?></td>
                        <td scope="col"><?php echo $v1['payment_mode']; ?></td>
                        <td scope="col"><?php echo $v1['address']; ?></td>
                        <td scope="col"><?php echo $v1['order_status']; ?></td>
                        <?php if($v1['order_status']== "In Progres" ){ ?>
                        <td scope="col"><button  class="btn btn-primary"><i class="fa fa-check" aria-hidden="true">&nbsp;<a style="color:white;" href="order_status_update_code.php?id=<?php echo urlencode($v1['odr_usr_id']); ?>&id1=<?php echo urlencode($v1['pro_id1']); ?>">Placed</a></i></button></td>
                        <?php }else{ ?>
                            <td scope="col"></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>

                        <?php } ?>
                    </tbody>
                </table>
                        
                </div>
                
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://esamtech.odiamantra.com/">SAUMYA</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>