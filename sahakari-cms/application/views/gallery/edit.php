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
        <div class="form-group  pull-right"><a href="<?php echo site_url("gallery"); ?>" class="btn btn-default">Cancel</a>
        </div>
        </div>
        <form role="form" method="post" action="" enctype="multipart/form-data">
            <div class="col-lg-8">
              <div class="form-group">
                <label for="gallery_title">Title</label>
                <input type="text" class="form-control" id="gallery_title" name="gallery_title" value="<?php echo $gallery->gallery_title;?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="gallery_description">Gallery Description</label>
                <textarea class="form-control ckeditor" id="gallery_description" name="gallery_description"><?php echo $gallery->gallery_description;?></textarea>
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