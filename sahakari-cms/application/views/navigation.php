<?php $current=$this->uri->segment(1);?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    	<div class="container-fluid">
        	<div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url();?>"><?php echo $this->config->item("cms_title"); ?></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if($current==""):?> class="active"<?php endif; ?>><a href="<?php echo base_url(); ?>">Dashboard</a></li>
        <li class="dropdown <?php if($current=="news" || $current=="internationalnews" || $current=="interviews" || $current=="events"):?> active <?php endif; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">समाचार सम्बन्धी बिषयबस्तुहरु <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li <?php if($current=="news"):?> class="active"<?php endif; ?>><a href="<?php echo site_url("news"); ?>">समाचार</a></li>
            <li><a href="<?php echo site_url("internationalnews"); ?>">अन्तराष्ट्रिय समाचारहरु</a></li>
            <li><a href="<?php echo site_url("interviews"); ?>">अन्तर्वार्ताहरु</a></li>
            <li><a href="<?php echo site_url("photofeature"); ?>">फोटो फिचर</a></li>
            <li><a href="<?php echo site_url("events"); ?>">कार्यक्रम तथा आयोजनाहरु </a></li>
          </ul>
        </li>
        <li class="dropdown <?php if($current=="companyinfo" || $current=="successstories"):?> active <?php endif; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">अन्य बिषयबस्तुहरु<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("companyinfo"); ?>">सहकारी परिचय</a></li>
            <li><a href="<?php echo site_url("successstories"); ?>">सफलताका कथाहरु</a></li>
             <li <?php if($current=="events"):?> class="active"<?php endif; ?>><a href="<?php echo site_url("publicarticles"); ?>">लेख तथा रचनाहरु</a></li>  
             <li><a href="<?php echo site_url("gallery"); ?>">Gallery</a></li>
          	 <li><a href="<?php echo site_url("photos"); ?>">photo</a></li>
          </ul>
        </li>
        
        
        
        
        <li <?php if($current=="events"):?> class="active"<?php endif; ?>><a href="<?php echo site_url("advertisement"); ?>">बिज्ञापनहरु</a></li>  
        <li <?php if($current=="events"):?> class="active"<?php endif; ?>><a href="<?php echo site_url("sahakari"); ?>">सहकारी </a></li>      
        
        
        <li class="dropdown <?php if($current=="unicode" || $current=="defaults"):?> active <?php endif; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">उपयोगीताहरु<b class="caret"></b></a>
          <ul class="dropdown-menu">
           <li><a href="<?php echo site_url("unicode"); ?>">Preeti to Unicode</a></li>
           <li><a href="<?php echo site_url("defaults"); ?>">Site Defaults</a></li>
          </ul>
        </li>
      </ul>
      </div>
        </div>
    </nav>