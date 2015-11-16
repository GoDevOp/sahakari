<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-9 shadowed-box">
            	
                <h3 class="box-title"><a href="#"><?php echo $event->event_title;?></a></h3>                           
                                        <?php echo $event->event_details;?>
             </div>            
        	<div class="col-lg-3 top-ads">
			<?php $this->load->view("ads/intl-sitebar");?>
            <div class="shadowed-box">
             		<h3 class="box-title"><a href="#">अन्य कार्यक्रम</a></h3>
                    <ul class="list-group tabbed-news-list">
                        <?php foreach($Events as $Event): ?><?php if($Event->event_id!=$event->event_id):?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("event/".$Event->event_id);?>"><span class="glyphicon glyphicon-stop"></span> <?php echo word_limiter(strip_tags($Event->event_title),4); ?></a>
                                    </div>
                                </div>                        
                                
                          </li>
                        <?php endif;?>
						<?php endforeach; ?>
                        </ul>

            </div>
      		</div>
            
        </div>
    </div>
  </div>
  <?php $this->load->view("image-gallery");?>
  <?php $this->load->view("footer"); ?>