<?php $this->load->view("header"); ?>
  <div class="row">
  	<div class="container part1">
    	<div class="row">
    		<div class="col-lg-9 shadowed-box">
            	
                <h3 class="box-title"><a href="#"><?php echo $interview->interview_title;?></a>-&nbsp;<?php echo $interview->interview_with;?></h3>                           
                                        <?php echo $interview->interview_text;?>
                                    	<div class="pull-right"><?php echo $interview->interview_by;?><br />
                                        						<?php echo $interview->interview_date;?>
                                        </div>                     
             </div>            
        	<div class="col-lg-3 top-ads">
			<?php $this->load->view("ads/intl-sitebar");?>
            <div class="shadowed-box">
             		<h3 class="box-title"><a href="#">अन्य अन्तरबार्ताहरु</a></h3>
                    <ul class="list-group tabbed-news-list">
                        <?php foreach($interviews as $Interviews): ?><?php if($Interviews->interview_id!=$interview->interview_id):?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("interviews/".$Interviews->interview_id);?>"><span class="glyphicon glyphicon-stop"></span> <?php echo word_limiter(strip_tags($Interviews->interview_title),4); ?></a>
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