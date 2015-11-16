<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("sahakari"); ?>" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
        </div>
        <form role="form" method="post" action="">
        <div class="col-lg-12">
          <div class="form-group">
            <label for="interview_title">Company Title(English)</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $sahakari->title;?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="sahakari_name">Sahakari Name</label>
            <input type="text" class="form-control" id="sahakari_name" name="sahakari_name" value="<?php echo $sahakari->sahakari_name;?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="sahakari_address">Sahakari Address</label>
            <input type="text" class="form-control" id="sahakari_address" name="sahakari_address" value="<?php echo $sahakari->sahakari_address;?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="short_intro">Short Intro</label>
            <textarea class="form-control ckeditor" id="short_intro" name="short_intro"><?php echo $sahakari->short_intro;?></textarea>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="sahakari_email">Email</label>
            <input type="text" class="form-control" id="sahakari_email" name="sahakari_email" value="<?php echo $sahakari->sahakari_email; ?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="facebook_email">Facebook Email</label>
            <input type="text" class="form-control" id="facebook_email" name="facebook_email" value="<?php echo $sahakari->facebook_email;?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="contact_person">Contact Person</label>
            <input type="text" class="form-control" id="contact_person" name="contact_person" value="<?php echo $sahakari->contact_person;?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="contact_person_mobile">Contact Person Mobile</label>
            <input type="text" class="form-control" id="contact_person_mobile" name="contact_person_mobile" value="<?php echo $sahakari->contact_person_mobile; ?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="membership_date">Membership Date</label>
            <input type="text" class="form-control datepicker" id="membership_date" name="membership_date" value="<?php echo $sahakari->membership_date;?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="membership_by">Membership By</label>
            <input type="text" class="form-control" id="membership_by" name="membership_by" value="<?php echo $sahakari->membership_by; ?>">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="remarks">Ramarks</label>
            <textarea class="form-control ckeditor" id="remarks" name="remarks"><?php if($sahakari->remarks!=""):echo $sahakari->remarks;endif; ?></textarea>
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
		</style>
          <div class="form-group">
          	
            <label for="news_thumb">Photo</label>
            <input type="hidden" name="photo" id="photo" value="<?php echo $sahakari->logo;?>">
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
            <div id="photo-container" onclick="openKCFinder(this)"><div style="margin:5px"><?php if($sahakari->logo!=""):?><img src="<?php echo base_url()."../".$sahakari->logo;?>"><?php else:?>Click here to choose an image<?php endif;?></div></div><a href="#" onclick="removeCover()">Remove Photo</a>
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