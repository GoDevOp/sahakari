<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("header"); ?>
  </head>
  <body>
	<script>
		function deleteAdvertisement(alias){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>advertisement/delete/"+alias+".html";
		}
    </script>
	<?php $this->load->view("navigation"); ?>
    <div class="row">
    	<div class="container">
        <div class="form-group pull-right"><a href="<?php echo site_url("advertisement/add"); ?>" class="btn btn-default">Add</a>
        </div>
        <table class="table table-striped">
        	<thead>
            	<tr>
                	<th width="20">Sn</th>
                    <th width="120">Image</th>
                    <th width="120">Title</th>
                    <th width="120">URL</th>
                    <th width="120">From</th>
                    <th width="120">To</th>
                    <th width="120">Location</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $sn=0; foreach($advertisement as $Advertisement): $sn++; ?>
            	<tr>
                	<td><?php echo $sn; ?></td>
                    <td><div class="img-container img-rounded" style="width:75px; overflow:hidden;">
            <img src="<?php echo base_url()."../".$Advertisement->image;?>" height="75" class="img-rounded">
            </div></td>
                    <td><?php echo $Advertisement->advertisement_title; ?></td>
                    <td><?php echo $Advertisement->advertisement_url;?></td>
                    <td><?php echo $Advertisement->from_date;?></td>
                    <td><?php echo $Advertisement->to_date;?></td>
                    <td><?php echo $Advertisement->location;?></td>
                    <td><?php echo ($Advertisement->status==1)?"Published":"Un Publishedd";?></td>
                    <td>
                    <?php if($Advertisement->status==1):?>
                    <a href="<?php echo site_url("advertisement/unpublish/".$Advertisement->advertisement_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
                    <?php else: ?>
                    <a href="<?php echo site_url("advertisement/publish/".$Advertisement->advertisement_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
                    <?php endif; ?>
            <a href="<?php echo site_url("advertisement/displayorderup/".$Advertisement->advertisement_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-up"></span></a>
            <a href="<?php echo site_url("advertisement/displayorderdown/".$Advertisement->advertisement_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-down"></span></a>
                  <a href="#" onClick="deleteAdvertisement('<?php echo $Advertisement->advertisement_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a> 
                    <a href="<?php echo site_url("advertisement/edit/".$Advertisement->advertisement_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a> 
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
  </body>
</html>