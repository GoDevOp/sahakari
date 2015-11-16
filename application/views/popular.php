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
					<?php $this->load->view("ads/intl-sitebar");?>
            		<div class="shadowed-box">
             		<h3 class="box-title"><a href="#">अन्य लोकप्रिय समाचार</a></h3>
                    <ul class="list-group tabbed-news-list">
                        <?php foreach($popularnews as $Popularnews): ?><?php if($Popularnews->news_id!=$NewsItem->news_id):?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("popular/".$Popularnews->news_id);?>"><span class="glyphicon glyphicon-stop"></span> <?php echo word_limiter(strip_tags($Popularnews->news_title),4); ?></a>
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