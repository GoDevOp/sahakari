<?php
$current=$this->uri->segment(1);
$TickerNewsItems=getNewsTickerItems();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Sahakari Dristi</title>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>js/jquery.marquee.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>js/jquery.cycle2.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>js/jquery.cycle2.carousel.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url(); ?>js/jquery.cycle2.swipe.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>js/jquery.hoverizr.min.js'></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="<?php echo base_url(); ?>prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
  </head>
  <body>
  <div class="row header">
  	<div class="container">
        
            <div class="row">
            	<div class="col-lg-12">
              <div class="col-lg-3"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" class="img-responsive"></a></div>
              <div class="col-lg-5 col-lg-offset-1 text-right">
              <img src="<?php echo base_url(); ?>images/adv1.png" class="img-responsive adv"></div>
              <div class="col-lg-3 text-right"><img src="<?php echo base_url(); ?>images/ime.png" class="img-responsive adv" /></div>
            </div>
          </div>
    </div>
  </div>
  <div class="row">
  	<nav class="navbar navbar-sahakari" role="navigation">
  <div class="container">
  	<div class="row">
    <div class="col-lg-12">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmneu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="mainmneu">
      <ul class="nav navbar-nav">
        <li <?php if($current==""):?>class="active"<?php endif; ?>><a href="<?php echo base_url(); ?>">गृहपृष्ठ </a></li>
        <li><a href="#">समाचार</a></li>
        <li <?php if($current=="sahakari"):?>class="active"<?php endif; ?>><a href="<?php echo site_url("sahakari"); ?>">संस्था परिचय</a></li>
        <li><a href="#">विचार</a></li>
        <li><a href="#">अन्तर्वार्ता</a></li>
        <li><a href="#">सफलताको कथा </a></li>
        <li><a href="#">उपयोगी लिंकहरु</a></li>
        <li><a href="#">हाम्रो बारेमा</a></li>
        <li><a href="#">सम्पर्क</a></li>

      </ul>
      </div>
    </div></div>
  </div>
</nav>
  </div>
  