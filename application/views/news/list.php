<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-3 shadowed-box">
            	<h3 class="box-title"><a href="#">राष्ट्रिय समाचार</a></h3>
                <ul class="list-group tabbed-news-list">
                        <?php foreach($InternationalNewsItems as $InternationalNewsItem): ?>
                          <li class="list-group-item">                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="#"><span class="glyphicon glyphicon-stop"></span> <?php echo word_limiter(strip_tags($InternationalNewsItem->news_title),4); ?></a>
                                    </div>
                                </div>
                          </li>
                        <?php endforeach; ?>
                  </ul>
             </div>            
        </div>
    </div>
  </div>
  <?php $this->load->view("footer"); ?>