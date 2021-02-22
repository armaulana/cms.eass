<?php 
header('X-Frame-Options: DENY'); 
if($_SERVER['HTTPS']!="on") {
        $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header("Location:$redirect"); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Meranda &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="<?php echo base_url('assets/front/fonts/icomoon/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/jquery-ui.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/owl.carousel.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/owl.theme.default.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/owl.theme.default.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/jquery.fancybox.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/bootstrap-datepicker.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/fonts/flaticon/font/flaticon.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/aos.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/font-awesome/css/font-awesome.min.css')?>">
  <link href="<?php echo base_url('assets/front/css/jquery.mb.YTPlayer.min.css');?>" media="all" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url('assets/front/css/style.css');?>">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 d-flex">
            <a href="index.html" class="site-logo">
              Meranda Template
            </a>
            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
          </div>
          <div class="col-6 d-block d-lg-none text-right">
          </div>
        </div>
      </div>
      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
      <div class="container">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                <li class="active">
                  <a href="index.html" class="nav-link text-left">Home</a>
                </li>
                <?php echo $menu;?>
              </ul>               
            </nav>
          </div>
        </div>
      </div>
    </div>
    </div>
    <br/>
    <br/>
  </div>