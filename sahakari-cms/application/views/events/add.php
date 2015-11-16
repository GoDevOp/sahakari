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
        <div class="form-group  pull-right"><a href="<?php echo site_url("events"); ?>" class="btn btn-default">Cancel</a>
        </div>
        </div>
        <form role="form" method="post" action="" enctype="multipart/form-data">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="Event_title">Event Title</label>
            <input type="text" class="form-control" id="event_title" name="event_title">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="added_on">Event Date</label>
            <input type="text" class="datepicker form-control" id="event_date" name="event_date" >
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="Event_text">Event Details</label>
            <textarea name="event_details" class="form-control ckeditor" id="event_details"></textarea>
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