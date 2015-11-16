<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-9 shadowed-box">
            	
                <h3 class="box-title"><a href="#"><?php echo $story->title;?></a></h3>                           
                                        <?php echo $story->success_story;?>
                                    	<div class="pull-right"><?php echo $story->person_name;?><br />
                                        						<?php echo $story->person_address;?>
                                        </div>                     
             </div>            
        	<div class="col-lg-3 top-ads">
			<?php $this->load->view("ads/intl-sitebar");?>
            <div class="shadowed-box">
             		<h3 class="box-title"><a href="#">अन्य सफलताको कथाहरु</a></h3>
                    <ul class="list-group tabbed-news-list">
                        <?php foreach($stories as $Stories): ?><?php if($Stories->story_id!=$story->story_id):?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("successstory/".$Stories->story_id);?>"><span class="glyphicon glyphicon-stop"></span> <?php echo word_limiter(strip_tags($Stories->title),4); ?></a>
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