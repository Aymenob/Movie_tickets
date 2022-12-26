<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Default Dashboard | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href=<?php echo base_url('assets/css/dashlite.css?ver=1.4.0');?> >
    <link id="skin-default" rel="stylesheet" href=<?php echo base_url('assets/css/theme.css?ver=1.4.0');?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>   
    <script>var base_url = '<?php echo base_url() ?>';</script> 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href=<?php echo base_url()?> class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src=<?php echo base_url("images/logo.png")?> srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src=<?php echo base_url("images/logo-dark.png")?> srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <span class="nio-version">General</span>
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href=<?php echo base_url()?> class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                               
                                <!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-signin"></em></span>
                                        <span class="nk-menu-text">Mon compte</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href=<?php echo base_url('Client_controller/login_page');?> href="html/general/pages/auths/auth-login.html" class="nk-menu-link" target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href=<?php echo base_url('Client_controller/register_page');?>  class="nk-menu-link" target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href=<?php echo base_url('Client_controller/forgotP_page');?>  class="nk-menu-link" target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href=<?php echo base_url('Client_controller/success_page');?>  class="nk-menu-link" target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        <span class="nk-menu-text">Projection</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <?php foreach ($sales as $sale) {;?>
                                        <li class="nk-menu-item">
                                            <a href=<?php echo base_url('Cinema_controller/cinema_page/'.$sale['cinema_id']);?> target="_blank" class="nk-menu-link"><span class="nk-menu-text"><?php echo $sale['nom_cinema'];?> </span></a>
                                        </li>
                                        <?php };?>
                                    </ul><!-- .nk-menu-sub -->
                                
                                <li class="nk-menu-item">
                                    <a href="html/general/email-templates.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-text-rich"></em></span>
                                        <span class="nk-menu-text">Email Template</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/crypto/index.html" class="logo-link">
s                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                    <span class="nio-version">General</span>
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <a class="nk-news-item" href="#">
                                        <div class="nk-news-icon">
                                            <em class="icon ni ni-card-view"></em>
                                        </div>
                                        <div class="nk-news">
                                            <p>bienvenue dans votre site de référence préféré</p>
                                            
                                        </div>
                                    </a>
                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Account </div>
                                                    <div class="user-name dropdown-indicator"><?php if ($this->session->userdata('login') === 'true') {echo $session['identifiant']; }?></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"><?php if ($this->session->userdata('login') === 'true') {echo $session['identifiant']; }?></span>
                                                        <span class="sub-text"><?php if ($this->session->userdata('login') === 'true') {echo $session['email']; }?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/general/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/general/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="html/general/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a type="button" id="sign-out"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown mr-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            
                                        </div><!-- .nk-block-head-content -->
                                      <!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        
                                        
                                        <div class="col-xxl-8">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title"><span class="mr-2">les films de la semaine</span> </h6>
                                                        </div>
                                                     
                                                    </div>
                                                </div>
                                                <div class="card-inner p-0 border-top">
                                                    <div class="nk-tb-list nk-tb-orders">
                                                        <div class="nk-tb-item nk-tb-head">
                                                            <div class="nk-tb-col" ><span>Nom du film</span></div>
                                                            <div class="nk-tb-col tb-col-sm" style="text-align:center"><span>Affiche</span></div>
                                                            <div class="nk-tb-col tb-col-md" style="text-align:center"><span>Année</span></div>
                                                            <div class="nk-tb-col" style="text-align:center"><span>Description</span></div>
                                                            <div class="nk-tb-col"><span>&nbsp;</span></div>
                                                        </div>
                                                        <?php foreach ($list as $Movie) { ?>
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                            <span class="tb-lead"><?php echo $Movie['titre'] ?></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <div class="user-card">
                                                                    <div class="rounded-circle" style="width: 90px" >
                                                                       <img style='height:5cm,width:5cm' src="<?php echo $Movie['image'];?>">
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span class="tb-sub"><?php echo $Movie['année'] ?></span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span class="tb-sub text-primary"><?php echo $Movie['description'] ?></span>
                                                            </div>
                                                           
                                                          
                                                            <div class="nk-tb-col nk-tb-col-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu">
                                                                        <ul class="link-list-plain">
                                                                            <li><a href=<?php echo base_url("Cinema_controller/cinema_availability/".$Movie['film_id'] )?>>réserver</a></li>
                                                                            <li><a href="#">ajouter aux favoris</a></li>
                                                                            <li><a href="#">bande annonce</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                </div>
                                              
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                     
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="#">Softnio</a>
                            </div>
                            <div class="nk-footer-links">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?php echo base_url();?>assets/js/Client.js"></script>
    <script src="./assets/js/charts/gd-general.js?ver=1.4.0"></script>
    <script src=<?php echo base_url('assets/js/bundle.js?ver=1.4.0');?> ></script>
    <script src=<?php echo base_url('assets/js/scripts.js?ver=1.4.0');?> ></script>
    <script src=<?php echo base_url('assets/js/charts/gd-general.js?ver=1.4.0');?> ></script>
</body>

</html>