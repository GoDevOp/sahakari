<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-8">
                <div class="col-lg-12 part-2">
                        <h3 class="box-title" style="margin-left:-4px;"><a href="#"><?php echo $NewsItem->news_title; ?></a></h3>
                        <p><?php echo $NewsItem->news_text; ?></p>
                        
                        </div>
                    
            </div>
            <div class="col-lg-3 top-ads">
            	<div class="row">
            	<div class="col-lg-12">
                    <img src="<?php echo base_url(); ?>resources/advertisements/cmpl.jpg" class="img-responsive" />
                    <img src="<?php echo base_url(); ?>resources/advertisements/yrti.jpg" class="img-responsive" />
                    <img src="<?php echo base_url(); ?>resources/advertisements/citi.jpg" class="img-responsive" />
                </div>
                </div>
             </div>
        </div>
    </div>
  </div>
<?php $this->load->view("image-gallery"); ?>
<?php $this->load->view("footer"); ?>