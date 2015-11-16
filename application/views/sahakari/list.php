<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-9 shadowed-box">
            	
                <h3 class="box-title"><a href="#">संस्था परिचय</a></h3>
                <ul class="pagination filter-alphabets">
                <?php
				 	$letters=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
					foreach($letters as $letter):
					?>
                    <li><a href="#"><?php echo $letter; ?></a></li>
                    
                    <?php endforeach; ?>
                
                </ul>
                 <?php foreach($Sahakaries as $Sahakari):?>
                 <div class="row boxed-list">
             	
                    <div class="col-lg-2">
                        <img src="<?php echo base_url().$Sahakari->logo; ?>" class="img-responsive">
                    </div>
                    <div class="col-lg-10">
                        <a href="<?php echo site_url($Sahakari->alias); ?>" target="_blank"><?php echo $Sahakari->title; ?></a>
                        <p>
                        <?php echo word_limiter(strip_tags($Sahakari->short_intro),70); ?>
                        </p>
                        <a class="pull-right rm" href="<?php echo site_url($Sahakari->alias);?>" target="_blank">... बिस्तृत</a>
                    </div>
                    
               
                </div>
            <?php endforeach;?>
                 
            		
             </div>            
        	<div class="col-lg-3 top-ads">
			<?php $this->load->view("ads/intl-sitebar");?>
      		</div>
            
        </div>
        <div class="row">
              
        </div>
    </div>
  </div>
  <?php $this->load->view("image-gallery");?>
  <?php $this->load->view("footer"); ?>