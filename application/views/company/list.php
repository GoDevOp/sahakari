<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-9 shadowed-box">
            	
                <h3 class="box-title"><a href="#"><?php echo $company->title;?></a></h3>                           
                                        <?php echo $company->full_information;?>
            		<ul class="pagination">
                      <li class="disabled"><a href="#">&laquo;</a></li>
                      <li class="active"><a href="#">0<span class="sr-only">(current)</span></a></li>
                      <?php foreach($companies as $Companies):?>
                      <li class=""><?php if($Companies->company_id!=$company->company_id):?><a href="<?php echo site_url("company/".$Companies->company_alias);?>"><?php $string=$Companies->company_name;echo substr($string,0,1);?><span class="sr-only"><?php echo $Companies->company_title;?></span></a></li><?php endif;?>
                      <?php endforeach;?>
                    </ul>
             </div>            
        	<div class="col-lg-3 top-ads">
			<?php $this->load->view("ads/intl-sitebar");?>
      		</div>
            
        </div>
        <div class="row">
              <?php foreach($companies as $Companies):?>
             		<?php if($Companies->company_id!=$company->company_id):?>
                    <div class="col-lg-4">
                        <img src="<?php echo base_url().$Companies->image; ?>" class="img-responsive">
                    </div>
                    <div class="col-lg-5">
                        <a href="<?php echo site_url("company/".$Companies->company_alias); ?>"><?php echo $Companies->title; ?></a>
                        <p>
                        <?php echo word_limiter(strip_tags($Companies->full_information),70); ?>
                        </p>
                        <a class="pull-right rm" href="<?php echo site_url("company/".$Companies->company_alias);?>">... बिस्तृत</a>
                    </div>
                    <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
  </div>
  <?php $this->load->view("image-gallery");?>
  <?php $this->load->view("footer"); ?>