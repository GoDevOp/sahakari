<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <script>
		function deletegallery(galleryid){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>gallery/delete/"+galleryid+".html";
		}
    </script>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("gallery/add"); ?>" class="btn btn-default">Add</a>
        </div>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th width="50">S.N</th>
                <th width="200">Title</th>
                <th width="200" >Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $a=0;foreach($gallery as $Gallery):$a++;?>
        
        <tr <?php if($Gallery->status==0): ?> class="danger" <?php endif; ?>>	
            <td><?php echo $a;?></td>
            <td><?php echo $Gallery->gallery_title;?></td>
            <td >
            <?php if($Gallery->status==1):?>
                    <a href="<?php echo site_url("gallery/unpublish/".$Gallery->gallery_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
                    <?php else: ?>
                    <a href="<?php echo site_url("gallery/publish/".$Gallery->gallery_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
                    <?php endif; ?>
            <a href="<?php echo site_url("gallery/displayorderup/".$Gallery->gallery_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-up"></span></a>
            <a href="<?php echo site_url("gallery/displayorderdown/".$Gallery->gallery_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-down"></span></a>
            <a href="#" onclick="deletegallery('<?php echo $Gallery->gallery_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="<?php echo site_url("gallery/edit/".$Gallery->gallery_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
           <a href="#" data-toggle="modal" data-target="#editModal-<?php echo $Gallery->gallery_id; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"></span></a>
            <div class="modal fade" id="editModal-<?php echo $Gallery->gallery_id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $Gallery->gallery_title;?></h4>
              </div>
              <div class="modal-body">
              	<?php echo $Gallery->gallery_description;?>
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