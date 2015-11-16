<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-9 shadowed-box">
            	
                <h3 class="box-title"><a href="#"><?php echo $news->news_title;?></a></h3>                           
                                        <?php echo $news->news_text;?>
             </div>            
        	<div class="col-lg-3 top-ads">
			<?php $this->load->view("ads/intl-sitebar");?>
            <div class="shadowed-box">
             		<h3 class="box-title"><a href="#">अन्य अन्तराष्ट्रिय समाचार</a></h3>
                    <ul class="list-group tabbed-news-list">
                        <?php foreach($InternationalNews as $InternationalNewsItem): ?><?php if($InternationalNewsItem->news_id!=$news->news_id):?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("intl/".$InternationalNewsItem->news_id);?>"><span class="glyphicon glyphicon-stop"></span> <?php echo word_limiter(strip_tags($InternationalNewsItem->news_title),4); ?></a>
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