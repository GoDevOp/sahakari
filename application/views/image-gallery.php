<?php $photos=getPhotos();?>
<div class="row">
      <div class="cycle-slideshow photo-gallery-carousel" 
        data-cycle-fx=carousel
        data-cycle-timeout=0 
        data-cycle-carousel-fluid=true
        data-cycle-swipe=true
        data-cycle-next="#gallery-carousel-next"
        data-cycle-prev="#gallery-carousel-prev"
        data-cycle-carousel-slide-height=100
        data-cycle-slides="> a"
        >
        <?php foreach($photos as $photo):?>
        <a href="<?php echo base_url().$photo->photo;?>" rel="prettyPhoto['photo-gallery']"><span class="roll"><i class="glyphicon glyphicon-chevron-right"></i></span><img src="<?php echo base_url().$photo->photo;?>"></a>
        <?php endforeach;?>
      </div>
		<div id="gallery-carousel-next" class="carousel-nav"><span class="glyphicon glyphicon-chevron-right"></span></div>
    	<div id="gallery-carousel-prev" class="carousel-nav"><span class="glyphicon glyphicon-chevron-left"></span></div>
	   <style>
       span.roll {
        height: 100%;
        position: absolute;
        width: 100%;
        z-index: 10;	
        }
        .photo-gallery-carousel img:hover
        {
            opacity: 0.55;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity = 55);
            filter: alpha(opacity = 55);
        }
       </style>
	   <script>
       $(document).ready(function(e) {
           $(".photo-gallery-carousel a").prettyPhoto();
        $(".roll").css("opacity","0");
            $(".roll").width($(".roll").next("img").width());
            $(".roll").css("width",$(".roll").next("img").css("width"));
            $(".roll").hover(function () {
                $(this).stop().animate({opacity: .7}, "slow");},
                function () {
                    $(this).stop().animate({opacity: 0}, "slow");
                });
    });
       </script>
  </div>