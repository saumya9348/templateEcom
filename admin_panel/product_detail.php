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
        
        <div class="content-body">
  
            <div class="container-fluid mt-3">
                <?php if(isset($_SESSION["pdt_dlt_msg"])){ ?>
                <h3 style="color:red;"><?php echo $_SESSION["pdt_dlt_msg"]; unset($_SESSION["pdt_dlt_msg"]); ?></h3>
                <?php } ?>
                <button class="btn btn-primary"><a style="color:white;" href="product_add.php">Add New Product</a></button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="cpl">Status</th>
                        <th scope="cpl">Description</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $cmd2="select * from product";
                            $qry2=$conn->query($cmd2);
                            $slno=1;
                            foreach($qry2 as $v3){
                        ?>       
                        <tr scope="row">
                        <td scope="col"><?php echo $slno++; ?></td>
                        <td scope="col"><img style="height: 100px; width: 100px; border-radius: 15%; " src="prdct_upload_image/<?Php echo $v3['pro_img']; ?>" alt=""></td>
                        <td scope="col"><?php echo $v3['pro_nmp'] ; ?></td>
                        <td scope="col"><?php echo $v3['pro_price']; ?></td>
                        <td scope="col"><?php echo $v3['pro_status'] ; ?></td>
                        <td scope="col"><?php echo $v3['pro_desc'] ; ?></td>
                        <td scope="col"><a href="product_edit.php?pid1=<?php echo $v3['pro_id'];$_SESSION['ab']=$v3['pro_id']; session_write_close(); ?>"><i style="color:blue; font-weight: bold; ">Edit</i> &nbsp; <a href="product_delete.php?pid2=<?php echo $v3['pro_id']; ?>" onclick = "return confirm('Are you sure you want to delete?')"><i style="color:red; font-weight: bold; ">Delete</i></a></a></td>
                        
                        </tr>
                        <?php } ?>
                    </tbody>
                </table> 
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