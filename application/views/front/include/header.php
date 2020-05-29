<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$info['title'];?></title>
<link rel="shortcut icon" href="<?=base_url('assets/front/');?>favicon.ico">
<link href="<?=base_url('assets/front/');?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url('assets/front/');?>css/owl.carousel.css" rel="stylesheet">
<link href="<?=base_url('assets/front/');?>css/font-awesome.css" rel="stylesheet">
<link href="<?=base_url('assets/front/');?>css/style.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
</head>
<body>
<!--header start-->
<div class="header-wrap">
  <div class="container"> 
    <!--row start-->
    <div class="row"> 
      <!--col-md-3 start-->
      <div class="col-md-3 col-sm-3 col-lg-3">
        <div class="logo"><a href="<?=base_url();?>"><img src="<?php echo base_url(); echo $info['tmb'];?>"></a></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <!--col-md-3 end--> 
      <!--col-md-7 end-->
      <div class="col-md-9 col-sm-9 col-lg-9"> 
        <!--Navegation start-->
        <div class="navigationwrape">
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header"> </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="<?=base_url();?>">ANA SƏHİFƏ</a></li>
                <li> <a href="<?=base_url('home/about');?>">HAQQIMIZDA</a></li>
                <li> <a href="<?=base_url('home/job_list');?>">İŞ ELANLARI</a></li>
                <li> <a href="<?=base_url('home/resume_list');?>">İŞ AXTARANLAR</a></li>
                <li> <a href="<?=base_url('home/post_job');?>">ELAN YERLƏŞDİR</a></li>
                <li> <a href="<?=base_url('home/resume');?>">CV YERLƏŞDİR</a></li>
                <li> <a href="<?=base_url('home/contact');?>">ƏLAQƏ</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!--Navegation start--> 
      </div>
      <!--col-md-3 end--> 
    </div>
    <!--row end--> 
  </div>
</div>
<!--header start end-->