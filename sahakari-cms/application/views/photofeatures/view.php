<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <script>
		function deletephotofeature(photofeature_id){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>photofeature/delete/"+photofeature_id+".html";
		}
    </script>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("photofeature/add"); ?>" class="btn btn-default">Add</a>
        </div>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th width="10">S.N</th>
                <th>Photo</th>
                <th width="200">Title</th>
                <th>Caption</th>
                <th width="100">Added On</th>
                <th width="200" >Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $a=0;foreach($PhotoFeatures as $PhotoFeature):$a++;?>
        
        <tr <?php if($PhotoFeature->status==0): ?> class="danger" <?php endif; ?>>	
            <td><?php echo $a;?></td>
            <td width="75"><div class="img-container img-rounded" style="width:75px; overflow:hidden;">
            <img src="<?php echo base_url()."../".$PhotoFeature->photo;?>" height="75" class="img-rounded">
            </div></td>
            <td><?php echo $PhotoFeature->title;?></td>
            <td><?php echo $PhotoFeature->caption;?></td>
            <td ><?php echo $PhotoFeature->added_on;?></td>
            <td >
            <a href="#" onclick="deletephotofeature('<?php echo $PhotoFeature->photofeature_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="<?php echo site_url("photofeature/edit/".$PhotoFeature->photofeature_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
            <?php if($PhotoFeature->status==1):?>
                    <a href="<?php echo site_url("photofeature/unpublish/".$PhotoFeature->photofeature_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
            <?php else: ?>
                    <a href="<?php echo site_url("photofeature/publish/".$PhotoFeature->photofeature_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
            <?php endif; ?>
            
            
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