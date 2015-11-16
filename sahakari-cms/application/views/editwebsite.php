<?php $this->load->view("welcome_message");?>
<div class="container">
	<div class="row">
    	<div class="panel panel-default">
        	<form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="form-control col-md-8">
            <input type="text" name="title" value="<?php echo $website->title;?>" class="form-group">
            </div>
            <div class="form-control col-md-8">
            <input type="text" name="contact" value="<?php echo $website->contact;?>" class="form-group">
            </div>
            <div class="form-control col-md-8">
            <input type="text" name="copyright" value="<?php echo $website->copyright;?>" class="form-group">
            <input type="submit" class="btn btn-success" value="update">
            </div>
            </form>
        </div>
    </div>
</div>    
  