<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("header"); ?>
  </head>
  <body>
	<script>
		function deleteInterview(alias){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>interviews/delete/"+alias+".html";
		}
    </script>
	<?php $this->load->view("navigation"); ?>
    <div class="row">
    	<div class="container">
        <div class="form-group pull-right"><a href="<?php echo site_url("interviews/add"); ?>" class="btn btn-default">Add</a>
        </div>
        <table class="table table-striped">
        	<thead>
            	<tr>
                	<th width="20">Sn</th>
                    <th width="120">Thumb</th>
                    <th width="120">Title</th>
                    <th width="120">With Whom</th>
                    <th width="120">By Whom</th>
                    <th width="120">Interview Date</th>
                    <th width="120">Status</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $sn=0; foreach($Interviews as $Interview): $sn++; ?>
            	<tr>
                	<td><?php echo $sn; ?></td>
                    <td><div class="img-container img-rounded" style="width:75px; overflow:hidden;">
            <?php if($Interview->interview_thumb!=""): ?>
            <img src="<?php echo base_url()."../".$Interview->interview_thumb;?>" height="75" class="img-rounded">
            <?php else: ?>
            <img src="<?php echo base_url()."images/no-photo.jpg";?>" height="75" class="img-rounded">
            <?php endif; ?>
            </div></td>
                    <td><?php echo $Interview->interview_title;?></td>
                    <td><?php echo $Interview->interview_with; ?></td>
                    <td><?php echo $Interview->interview_by;?></td>
                    <td><?php echo $Interview->interview_date;?></td>
                    <td><?php echo ($Interview->status==1)?"Published":"Un Publishedd";?></td>
                    <td>
                    <?php if($Interview->status==1):?>
                    <a href="<?php echo site_url("interviews/unpublish/".$Interview->interview_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
                    <?php else: ?>
                    <a href="<?php echo site_url("interviews/publish/".$Interview->interview_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
                    <?php endif; ?>
                     <a href="#" class="btn btn-info btn-sm" title="details" data-toggle="modal" data-target="#details-<?php echo $Interview->interview_id; ?>"><span class="glyphicon glyphicon-search"></span></a>
            <a href="<?php echo site_url("interviews/displayorderup/".$Interview->interview_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-up"></span></a>
            <a href="<?php echo site_url("interviews/displayorderdown/".$Interview->interview_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-down"></span></a>
            <div class="modal fade" id="details-<?php echo $Interview->interview_id; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Details</h4>
              </div>
              <div class="modal-body" style="max-height:400px; overflow:scroll;">
              	<?php echo $Interview->interview_text; ?>
              </div>
              <div class="modal-footer">
                  <a href="#" onClick="deleteInterview('<?php echo $Interview->interview_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a> 
                    <a href="<?php echo site_url("interviews/edit/".$Interview->interview_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a> 
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
  </body>
</html>