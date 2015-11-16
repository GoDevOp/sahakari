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
        <div class="form-group  pull-right"><a href="<?php echo site_url("advertisement"); ?>" class="btn btn-default">Cancel</a>
        </div>
        </div>
        <form role="form" method="post" action="" enctype="multipart/form-data">
        <div class="col-lg-12">
          <div class="form-group">
            <label for="advertisement_title">Title</label>
            <input type="text" class="form-control" id="advertisement_title" name="advertisement_title" value="<?php echo $advertisement->advertisement_title;?>">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="advertisement_url">URL</label>
            <input type="text" class="form-control" id="advertisement_url" name="advertisement_url" value="<?php echo $advertisement->advertisement_url;?>">
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
			visibility: hidden;
		}
		</style>
          <div class="form-group">
          	
            <label for="news_thumb">Photo</label>
            <input type="hidden" name="photo" id="photo">
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
            <div id="photo-container" onclick="openKCFinder(this)"><div style="margin:5px"><?php if(!$advertisement->image=""):?><img src="<?php echo base_url()."../".$advertisement->image?>"><?php else:?>Click here to choose an image<?php endif;?></div></div><a href="#" onclick="removeCover()">Remove Photo</a>
         	 </div>
        	</div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="from_date">From</label>
            <input type="text" class="datepicker form-control" id="from_date" name="from_date" value="<?php echo $advertisement->from_date;?>">
          </div>
        </div>
        <div class="col-lg-4">
        <div class="form-group">
            <label for="to_date">To</label>
            <input type="text" class="datepicker form-control" id="to_date" name="to_date" value="<?php echo $advertisement->to_date;?>">
          </div>
        </div>
        <div class="col-lg-4">
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="<?php echo $advertisement->location;?>">
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