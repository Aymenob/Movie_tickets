<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon"  href=<?php echo base_url('images/favicon.png');?>>
    <!-- Page Title  -->
    <title>Registration | DashLite Admin Template</title>
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

<body class="nk-body npc-crypto ui-clean pg-auth" >
    <!-- app body @s -->
    <div class="nk-app-root" style="margin-left:12cm" >
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-5">
                        <a href="html/general/index.html" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src=<?php echo base_url('images/logo.png');?>  srcset=<?php echo base_url('images/logo2x.png 2x');?> alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src=<?php echo base_url('images/logo-dark.png');?> srcset=<?php echo base_url('images/logo-dark2x.png 2x');?>    alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Register</h5>
                            <div class="nk-block-des">
                                <p>Créer un nouveau compte Dashlite</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <form method="POST"   id="submit_register">
                        <div class="form-group">
                            <label class="form-label" for="name">Utilisateur</label>
                            <input name="identifiant" type="text" class="form-control form-control-lg" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email </label>
                            <input name="email" type="text" class="form-control form-control-lg" id="email" placeholder="Enter your email address or username">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Mot de passe</label>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="number" name="mot_de_passe" type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Répéter le Mot de passe</label>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password2">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="number" name="mot_de_passe2" type="password" class="form-control form-control-lg" id="password2" placeholder="Enter your passcode">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-control-xs custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox">
                                <label class="custom-control-label" for="checkbox">I agree to Dashlite <a tabindex="-1" href="#">Privacy Policy</a> &amp; <a tabindex="-1" href="#"> Terms.</a></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button  type='Submit' value="Submit"  class="btn btn-lg btn-primary btn-block">Register</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-4"> Already have an account ? <a href="html/general/pages/auths/auth-login.html"><strong>Sign in instead</strong></a>
                    </div>
                    <div class="text-center pt-4 pb-3">
                        <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                    </div>
                    <ul class="nav justify-center gx-8">
                        <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                    </ul>
                </div><!-- .nk-block -->
                <div class="nk-block nk-auth-footer">
                    <div class="nk-block-between">
                        <ul class="nav nav-sm">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Terms & Condition</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Privacy Policy</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Help</a>
                            </li>
                            <li class="nav-item dropup">
                                <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><small>English</small></a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="language-list">
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src=<?php echo base_url('images/flags/english.png"');?>  alt="" class="language-flag">
                                                <span class="language-name">English</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src=<?php echo base_url("images/flags/spanish.png");?>   alt="" class="language-flag">
                                                <span class="language-name">Español</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img  src=<?php echo base_url("images/flags/french.png");?>  alt="" class="language-flag">
                                                <span class="language-name">Français</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="language-item">
                                                <img src=<?php echo base_url("images/flags/turkey.png");?>   alt="" class="language-flag">
                                                <span class="language-name">Türkçe</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul><!-- nav -->
                    </div>
                    <div class="mt-3">
                        <p>&copy; 2019 DashLite. All Rights Reserved.</p>
                    </div>
              
        
    </div><!-- app body @e -->
    <!-- JavaScript -->
    <script src="<?php echo base_url();?>assets/js/Client.js"></script> 
   
</body>

</html>