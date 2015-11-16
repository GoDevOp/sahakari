<?php $this->load->view("header"); ?>
	<div class="row">
  	<div class="container scroller">
    	<div class="row">
        <div class="col-lg-12">
    	<div class="col-lg-2 scroll_title text-center">
        	<h3>शिर्ष समाचार</h3>
        </div>
        <div class="col-lg-10 scroll">
        	<div class="col-lg-12">
            	<div class="col-lg-12 marquee">
                <?php foreach($TickerNewsItems as $TickerNewsItem): ?>
                	<a href="<?php echo site_url("scroll/".$TickerNewsItem->news_id); ?>">
                    	<?php echo $TickerNewsItem->news_title; ?>
                    </a> 
                <?php endforeach; ?>
                </div>
				<script>
						$('.marquee').marquee({
						  pauseOnHover: true,
						  duration: 10500,
						  duplicated: true						  
						});
					</script>
            </div>
        </div>
        </div>
        </div>
    </div>
    <div class="container part1">
    	<div class="row">
            <div class="col-lg-5 photofeature">
            	<div class="row">
            	<div class="col-lg-12">
                <div class="cycle-slideshow" 
                    data-cycle-fx=fadeout
                    data-cycle-timeout=3000
                    data-cycle-pager="#custom-pager"
                    <?php /* data-cycle-pager-template="<span class='btn'><a href=#> {{slideNum}} </a></span>" */ ?>
                    data-cycle-slides="> div"
                    data-cycle-loader="wait"
                    >
                    <?php foreach($PhotoFeatures as $PhotoFeature): ?>
                    <div class="slide">
                    <img src="<?php echo base_url().$PhotoFeature->photo;?>" class="img-responsive">
                    <div class="slide-captions">
                    <h3><?php echo $PhotoFeature->title; ?></h3>
                    <p><?php echo $PhotoFeature->caption; ?></p>
                    </div>                
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="slide-pager">
                <button class="btn btn-xs pull-right" id="slide-control" data-state="play"><span class="glyphicon glyphicon-pause"></span></button>
                <div id="custom-pager" class="pull-right"></div>
                
                </div>
                <script>
                    $("#slide-control").on("click",function(e){
                        var state=$(this).data("state");
                        if(state=="play")
                        {
                            $("#slide-control span").removeClass("glyphicon-pause").addClass("glyphicon-play");
                            $("#slide-control").data("state","pause");
                            $('.cycle-slideshow').cycle('pause');
                        }
                        else
                        {
                            $("#slide-control span").removeClass("glyphicon-play").addClass("glyphicon-pause");	
                            $("#slide-control").data("state","play");
                            $('.cycle-slideshow').cycle('resume');
                        }
                    });
                </script>
    			</div>
                </div>
            </div>
            <div class="col-lg-4 top-tabbed">
            	<div class="row">
            	<div class="col-lg-12">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#home" data-toggle="tab">मुख्य समाचार</a></li>
                      <li><a href="#popular" data-toggle="tab">लोक प्रिय</a></li>
                      <li><a href="#events" data-toggle="tab">कार्यक्रमहरु</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
                        <ul class="list-group tabbed-news-list">
                        <?php $a=0; foreach($MainNewsItems as $MainNewsItem): $a++; ?>
                          <li class="list-group-item">
                                <?php if($a<=2): ?>
                                <div class="row">
                                <div class="col-lg-3 news-thumb-img">
                                    <?php if($MainNewsItem->news_thumb!=""): ?>
                                    <img src="<?php echo base_url().$MainNewsItem->news_thumb; ?>" class="full img-responsive">
                                    <?php else: ?>
                                    <img src="<?php echo base_url(); ?>images/no-photo.jpg" class="img-responsive full">
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-9 news-desc">
                                    <h4><a href="<?php echo site_url("news/".$MainNewsItem->news_id); ?>"><?php echo $MainNewsItem->news_title; ?></a></h4>
                                    <p><?php echo character_limiter($MainNewsItem->news_desc,120); ?></p>
                                </div>
                                </div>
                                <?php else: ?>
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("news/".$MainNewsItem->news_id); ?>"><span class="glyphicon glyphicon-stop"></span> <?php echo $MainNewsItem->news_title; ?></a>
                                    </div>
                                </div>                        
                                <?php endif; ?>
                          </li>
                        <?php endforeach; ?>
                        </ul>
                      </div>
                      <div class="tab-pane" id="popular">
                        <ul class="list-group tabbed-news-list">
                        <?php foreach($popularnews as $Popularnews): ?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("popular/".$Popularnews->news_id); ?>"><span class="glyphicon glyphicon-stop"></span> <?php echo $Popularnews->news_title; ?></a>
                                    </div>
                                </div>                        
                                
                          </li>
                        <?php endforeach; ?>
                        </ul>
                      </div>
                      <div class="tab-pane" id="events">
                      	<ul class="list-group tabbed-news-list">
                        <?php foreach($events as $event): ?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("event/".$event->event_id); ?>"><span class="glyphicon glyphicon-stop"></span> <?php echo $event->event_title; ?></a>
                                    </div>
                                </div>                        
                                
                          </li>
                        <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                 </div>
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
    <div class="container part2">
    	<div class="row">
            
            <div class="col-lg-6">
                <div class="col-lg-12 part-2">
                    <div class="row">
                    <div class="col-lg-12"><h3 class="box-title"><a href="#">संस्था परिचय</a></h3></div>
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                        <img src="<?php echo base_url().$CompanyInfo->image; ?>" class="img-responsive">
                    </div>
                    <div class="col-lg-8">
                        <a href="<?php echo site_url("company/".$CompanyInfo->company_alias); ?>"><?php echo $CompanyInfo->title; ?></a>
                        <p>
                        <?php echo word_limiter(strip_tags($CompanyInfo->full_information),70); ?>
                        </p>
                        <a class="pull-right rm" href="<?php echo site_url("company/".$CompanyInfo->company_alias);?>">... बिस्तृत</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-lg-12 part-2">
                    <div class="row">
                    <div class="col-lg-12"><h3 class="box-title"><a href="#">सफलताको कथा</a></h3></div>
                    </div>
                    <div class="row">
                    <div class="col-lg-4" >
                        <img src="<?php echo base_url(); ?>images/sanstha-parichaya.jpg" class="img-responsive">
                        <p><?php echo $SuccessStory->person_name; ?></p>
                        <p>
                        <?php echo $SuccessStory->person_address; ?></p>
                    </div>
                    <div class="col-lg-8">
                        <p><a href="<?php echo site_url("successstory/".$SuccessStory->story_id); ?>"><?php echo $SuccessStory->title; ?></a></p>
                        <p>
                        <?php echo word_limiter(strip_tags($SuccessStory->success_story),80); ?>
                        </p>
                        <a class="pull-right rm" href="<?php echo site_url("successstory/".$SuccessStory->story_id);?>">... बिस्तृत</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container part3">
    	<div class="row">            
            <div class="col-lg-8">
            	<img src="<?php echo base_url(); ?>resources/advertisements/megha.jpg" class="img-responsive adv" />                
            </div>
            <div class="col-lg-4">
                <img src="<?php echo base_url(); ?>resources/advertisements/yeti.jpg" class="img-responsive adv" />
            </div>
        </div>
    </div>
    <div class="container part4">
    	<div class="row">
            
            <div class="col-lg-4">
                <div class="col-lg-12 part-2">
                    <div class="row">
                    <div class="col-lg-12"><h3 class="box-title"><a href="#">अन्तबार्ता</a></h3></div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                    	<div class="img-thumbnail inline-image-thumb pull-right">
                    	<img src="<?php echo base_url().$Interview->interview_thumb; ?>" class="pull-right" width="150">
                        </div>
                        <a href="<?php echo site_url("interviews/".$Interview->interview_id); ?>"><?php echo $Interview->interview_title; ?></a>
                        <p>
                        <?php echo word_limiter(strip_tags($Interview->interview_remarks),45); ?>
                        </p>
                         <a class="pull-right rm" href="<?php echo site_url("interviews/".$Interview->interview_id);?>">... बिस्तृत</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-lg-12 part-2">
                    <div class="row">
                    <div class="col-lg-12"><h3 class="box-title"><a href="#">लेख तथा रचनाहरु</a></h3></div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                    	<div class="img-thumbnail inline-image-thumb pull-left">
                    	<img src="<?php echo base_url().$PublicArticles->image; ?>" class="pull-left" width="150">
                        </div>
                        <a href="<?php echo site_url("publicarticles/".$PublicArticles->article_id);?>"><?php echo $PublicArticles->article_title." - ".$PublicArticles->article_writer; ?></a>
                    
                        
                        <p>
                        <?php echo word_limiter(strip_tags($PublicArticles->article_description),54); ?>
                        </p>
                        <a class="pull-right rm" href="<?php echo site_url("publicarticles/".$PublicArticles->article_id);?>">... बिस्तृत</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-lg-12 part-2">
                    <div class="row">
                    <div class="col-lg-12"><h3 class="box-title"><a href="#">हाम्रो कार्यक्रम - सहकारी संचार</a></h3></div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                    	<div class="videowrapper">
                        <iframe width="560" height="315" src="//www.youtube.com/embed/EQcrMlRUKCA" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container part5">
    	<div class="row">
            
            <div class="col-lg-5">
                <div class="col-lg-12 part-2">
                    <div class="row">
                    <div class="col-lg-12"><h3 class="box-title"><a href="#">अन्तराष्ट्रिय समाचार</a></h3></div>
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                        <?php $InternationalNewsItem=$InternationalNews[0]; ?>
                        <img src="<?php echo base_url().$InternationalNewsItem->news_thumb; ?>" class="img-responsive">
                        <p><a href="<?php echo site_url("intl/".$InternationalNewsItem->news_id);?>"><?php echo $InternationalNewsItem->news_title; ?></a></p>
                        <p>
                        <?php echo word_limiter(strip_tags($InternationalNewsItem->news_text),13); ?>
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <ul class="list-group tabbed-news-list">
                        <?php unset($InternationalNewsItems[0]); foreach($InternationalNewsItems as $InternationalNewsItem): ?>
                          <li class="list-group-item">
                                
                                <div class="row">
                                    <div class="col-lg-12 news-desc">
                                        <a href="<?php echo site_url("intl/".$InternationalNewsItem->news_id);?>"><span class="glyphicon glyphicon-stop"></span> <?php echo word_limiter(strip_tags($InternationalNewsItem->news_title),5); ?></a>
                                    </div>
                                </div>                        
                                
                          </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="col-lg-12 part-2">
                    <div class="row">
                    <div class="col-lg-12"><h3 class="box-title"><a href="#">राष्ट्रिय समाचार</a></h3></div>
                    </div>
                    <div class="row">
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
            <div class="col-lg-4">
                <div class="col-lg-12 part-2">
                    <div class="row">
                    <div class="col-lg-12"><h3 class="box-title"><a href="#">अनुकरणीय सफल संस्था</a></h3></div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <?php echo word_limiter(strip_tags($CompanyInfo->full_information),73); ?>
                         <a class="pull-right rm" href="#">... बिस्तृत</a>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  	<?php $this->load->view("image-gallery"); ?>
    <?php $this->load->view("footer"); ?>