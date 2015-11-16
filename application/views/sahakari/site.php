<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"  dir="ltr" lang="en-US"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $Sahakari->title; ?></title>
<link href="<?php echo sahakari_url(); ?>css/reset.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo sahakari_url(); ?>css/contact.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo sahakari_url(); ?>css/styles.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo sahakari_url(); ?>css/print.css" rel="stylesheet" type="text/css" media="print" />
<link href="<?php echo sahakari_url(); ?>css/flexslider.css" rel="stylesheet" type="text/css" media="screen">
<link href="<?php echo sahakari_url(); ?>css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen" />
<style>
.alignright
{
	float:right;
}
.alignleft
{
	float:left;
}
</style>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<header id="fixed">
  <!-- start header -->
  <div class="wrapper">
    <div class="container clearfix">
    <div class="alignleft">
    <a href="<?php echo site_url($Sahakari->alias);?>" class="alignleft"><img src="<?php echo base_url(); ?><?php echo $Sahakari->logo; ?>" height="80"></a><!--div class="alignright"><h3><?php echo $Sahakari->title; ?></h3></div-->
    </div>
      <h1 id="logo" class="alignleft">  </h1>
      <nav class="alignright">
        <ul id="nav">
          <li><a href="#">गृहपृष्ठ</a></li>
          <li><a href="#section1">परिचय</a></li>
          <li><a href="#section2">संस्थापक सदस्यहरु</a></li>
          <li><a href="#section3">सेवाहरु</a></li>
          <li><a href="#section4">आर्थिक बिबरण</a></li>         
          <li><a href="#section5">सम्पर्क </a></li>
        </ul>
      </nav>
      <div class="clear"></div>
    </div>
  </div>
</header>
<!-- end header -->
<div class="ancor">
  <div class="section" id="section0"></div>
  <div class="wrapper">
    <div class="container clearfix margin-bottom">
      <h2><?php if(!empty($Sahakari->Website)): echo $Sahakari->Website->welcome_text; endif;?></h2>
      <div class="col1-1">
        <h3><?php if(!empty($Sahakari->Website)):echo strip_tags($Sahakari->Website->homepage);endif; ?></h3>
      </div>
      
      <div class="clear"></div>
    </div>
  </div>
</div>
<div class="ancor">
  <div class="section" id="section1"></div>
  <div class="wrapper">
    <div class="container clearfix margin-bottom">
      <h2>परिचय</h2>
      <div class="col1-1">
       <?php if(empty($Sahakari->Website)):echo $Sahakari->Website->about; endif;?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<div class="ancor">
  <div class="section" id="section2"></div>
  <div class="wrapper">
    <div class="container clearfix margin-bottom">
    <div class="col1-1">
      <h2>संस्थापक सदस्यहरु</h2>
    </div>
      <div class="clear"></div>
        <?php if(!empty($Sahakari->Website)):echo $Sahakari->Website->members; endif;?>
      
      <div class="clear"></div>
    </div>
  </div>
</div>
<div class="ancor">
  <div class="section" id="section3"></div>
  <div class="wrapper">
    <div class="container clearfix margin-bottom">
      <h2>सेवाहरु</h2>
      <?php if(!empty($Sahakari->Website))echo $Sahakari->Website->services; endif;?>
      <div class="clear"></div>
      
      
    </div>
  </div>
</div>
<div class="ancor">
  <div class="section" id="section4"></div>
  <div class="wrapper">
    <div class="container clearfix margin-bottom">
      <h2>आर्थिक विवरण</h2>
      <?php echo $Sahakari->Website->report; ?>
      <div class="clear"></div>
      
      
    </div>
  </div>
</div>
<div class="ancor">
  <div class="section" id="section5"></div>
  <div class="wrapper responsive">
    <div class="container clearfix">
      <h2>सम्पर्क</h2>
      <div class="break"></div>
      <div class="responsive">
        <div class="col1-3">
          <div class="headline">
            <h4>Contact Information</h4>
            
          </div>
          <?php echo $Sahakari->Website->contact; ?>
		</div>
        <div class="col3-3">
          <div class="headline">
            <h4>आफ्नो संदेश पठाउनुहोस</h4>
          </div>
          <div class="contact">
            <div id="message"></div>
            <form method="post" action="<?php echo site_url("sahakari/sendcontact"); ?>" name="contactform" id="contactform" autocomplete="off">
            	<input name="hidden" type="text" id="mailto" value="<?php echo $Sahakari->sahakari_email; ?>"  />
              <fieldset>
              <label for="name" accesskey="U"><span class="required">Name</span></label>
              <input name="name" type="text" id="name" size="30" title="Name *" />
              <label for="email" accesskey="E"><span class="required">Email</span></label>
              <input name="email" type="text" id="email" size="30" title="Email *" />
              <label for="phone" accesskey="P"><span class="required">Phone</span></label>
              <input name="phone" type="text" id="phone" size="30" title="Phone *" class="third" />
              <div class="clear"></div>
              <br />
              <label for="comments" accesskey="C"><span class="required">Comments</span></label>
              <textarea name="comments" cols="40" rows="3" id="comments" style="height: 113px;" title="Comment *"></textarea>
              <input type="submit" class="submit" id="submit" value="Submit" />
              </fieldset>
            </form>
          </div>
        </div>
        <div class="clear"></div>
      </div>
	</div>
    </div>
  </div>
<div class="wrapper">
  <footer id="footer">
    <div class="container clearfix">
      <p class="alignleft"><span class="top"><?php echo $Sahakari->title; ?></span><br />
        rendered via. <a href="http://www.sahakaridristi.com">sahakaridristi.com</a>, developed by <a href="http://www.communicate.com.np/" target="_blank">Communicate</a></p>
    </div>
  </footer>
</div>
<script src="<?php echo sahakari_url();?>js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/modernizr.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/retina.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/jquery.pagescroller.lite.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/selectnav.min.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/input.fields.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/image-cover.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/sliding.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="<?php echo sahakari_url();?>js/preloader.js" type="text/javascript"></script>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</body>
</html>