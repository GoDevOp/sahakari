<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-9 shadowed-box">
            	
                <h3 class="box-title"><a href="#"><?php echo $article->article_title;?></a>-&nbsp;<?php echo $article->article_writer;?></h3>                           
                                        <?php echo $article->article_description;?>
                                    	<div class="pull-right"><?php echo $article->article_date;?>
                                        </div>                     
             </div>            
        	<div class="col-lg-3 top-ads">
			<?php $this->load->view("ads/intl-sitebar");?>
            <div class="shadowed-box">
             		<h3 class="box-title"><a href="#">अन्य लेख तथा रचनाहरु</a></h3>
                    <ul class="list-group tabbed-news-list">
                        <?php foreach($articles as $Articles): ?><?php if($Articles->article_id!=$article->article_id):?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("publicarticles/".$Articles->article_id);?>"><span class="glyphicon glyphicon-stop"></span> <?php echo word_limiter(strip_tags($Articles->article_title),4); ?></a>
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