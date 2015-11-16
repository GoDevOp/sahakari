<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("successstories"); ?>" class="btn btn-default">Cancel</a>
        </div>
        </div>
        <form role="form" method="post" action="" enctype="multipart/form-data">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $story->title;?>">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="person_name">Person Name</label>
            <input type="text" class="form-control" id="person_name" name="person_name" value="<?php echo $story->person_name;?>">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="person_address">Person Address</label>
            <input type="text" class="form-control" id="person_address" name="person_address" value="<?php echo $story->person_address;?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="success_story">Stories</label>
            <textarea name="success_story" class="form-control ckeditor" id="success_story"><?php echo $story->success_story;?></textarea>
          </div>
        </div>
        <div class="col-lg-5">
		<style type="text/css">
		#photo-container {
			width: 400px;
			height: 300px;
			overflow: hidden;
			cursor: pointer;
			background: #CCC;
			color: #FFF;
		}
		#photo-container img {
			
		}
		</style>
          <div class="form-group">
          	
            <label for="news_thumb">Photo</label>
            <input type="hidden" name="photo" id="photo" value="<?php echo $story->image;?>">
			<script>
			function openKCFinder(div) {
				window.KCFinder = {
					callBack: function(url) {
						window.KCFinder = null;
						div.innerHTML = '<div style="margin:5px">Loading...</div>';
						var img = new Image();
						img.src = url;
						img.onload = function() {
							div.innerHTML = '<img id="cover_img" src="' + url + '" width="400" />';
							var img = document.getElementById('cover_img');
							img.style.visibility = "visible";
							var i = ( $('#cover_img').attr('src')+ '').indexOf('uploads', (0 || 0));
							var murl=url.substr(i);
							$("#photo").val(murl);
						}
					}
				};
				window.open('<?php echo base_url(); ?>kcfinder/browse.php?type=images&dir=images',
					'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
					'directories=1, resizable=1, scrollbars=0, width=800, height=600'
				);
			}
			function removeCover()
				{
					$(this).click(function(e) {
						e.preventDefault();
					});
					$("#photo").val('');
					$("#photo-container").html("<div style=\"margin:5px\">Click here to choose an image</div>");	
				}
			</script>
            <div id="photo-container" onclick="openKCFinder(this)"><div style="margin:5px"><?php if($story->image!=""):?><img src="<?php echo base_url()."../".$story->image;?>"><?php else:?>Click here to choose an image<?php endif;?></div></div><a href="#" onclick="removeCover()">Remove Photo</a>
         	 </div>
        	</div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="collected_by">Collected By</label>
            <input type="text" name="collected_by" class="form-control" id="collected_by" value="<?php echo $story->collected_by;?>">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="collected_on">Collected On</label>
            <input type="text" class="datepicker form-control" id="collected_on" name="collected_on" value="<?php echo $story->success_story;?>">
          </div>
        </div>        
          <div class="col-lg-12">
          <input type="submit" name="submit" id="submit" class="btn btn-default" />
          </div>
        </form>
        </div>
    </div>
    <?php $this->load->view("footer"); ?>
  </body>
</html>