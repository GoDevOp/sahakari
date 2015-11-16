<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <script>
		function Delete(event_id){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>events/delete/"+event_id+".html";
		}
    </script>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("events/add"); ?>" class="btn btn-default">Add</a>
        </div>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th width="50">S.N</th>
                <th >Title</th>
                <th width="100">Event Date</th>
                <th width="200" >Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $a=0;foreach($Events as $Event):$a++;?>
        
        <tr <?php if($Event->status==0): ?> class="danger" <?php endif; ?>>	
            <td><?php echo $a;?></td>
            <td><?php echo $Event->event_title;?></td>
            <td ><?php echo $Event->event_date;?></td>
            <td >
            <a href="#" onclick="Delete('<?php echo $Event->event_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="<?php echo site_url("events/edit/".$Event->event_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
            <?php if($Event->status==1):?>
                    <a href="<?php echo site_url("events/unpublish/".$Event->event_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
            <?php else: ?>
                    <a href="<?php echo site_url("events/publish/".$Event->event_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
            <?php endif; ?>
            <a href="#" class="btn btn-info btn-sm" title="details" data-toggle="modal" data-target="#details-<?php echo $Event->event_id; ?>"><span class="glyphicon glyphicon-search"></span></a>
            <div class="modal fade" id="details-<?php echo $Event->event_id; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">पुरा जानकारी</h4>
              </div>
              <div class="modal-body" style="max-height:400px; overflow:scroll;">
              	<?php echo $Event->event_details; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
        </table>
        </div>
    </div>
    <?php $this->load->view("footer"); ?>
  </body>
</html>