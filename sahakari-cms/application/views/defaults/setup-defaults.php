<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("interviews"); ?>" class="btn btn-default">Cancel</a>
        </div>
        </div>
        <form action="" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Website Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $website->title;?>">
          </div>
          <div class="form-group">
            <label for="contact">Website Contact</label>
            <textarea id="contact" name="contact" class="form-control">
            <?php echo $website->contact;?>
            </textarea>
          </div>
          <div class="form-group">
            <label for="contact">Website Copyright</label>
            <input type="text" class="form-control" id="copyright" name="copyright" value="<?php echo $website->copyright;?>">
          </div>
           <div class="form-group">         
            <input type="submit" class="btn btn-success" value="update">
            </div>
            </form>
        </div>
    </div>
    <?php $this->load->view("footer"); ?>
  </body>
</html>