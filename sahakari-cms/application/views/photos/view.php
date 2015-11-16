<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <script>
		function deletephoto(photoid){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>photos/delete/"+photoid+".html";
		}
    </script>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("photos/add"); ?>" class="btn btn-default">Add</a>
        </div>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th width="10">S.N</th>
                <th>Photo</th>
                <th width="200">Title</th>
                <th>Caption</th>
                <th width="250" >Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $a=0;foreach($photos as $photo):$a++;?>
        
        <tr <?php if($photo->status==0): ?> class="danger" <?php endif; ?>>	
            <td><?php echo $a;?></td>
            <td width="75"><div class="img-container img-rounded" style="width:75px; overflow:hidden;">
            <img src="<?php echo base_url()."../".$photo->photo;?>" height="75" class="img-rounded">
            </div></td>
            <td><?php echo $photo->photo_title;?></td>
            <td><?php echo $photo->photo_caption;?></td>
            <td width="250">
            <a href="#" onclick="deletephoto('<?php echo $photo->photos_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="<?php echo site_url("photos/edit/".$photo->photos_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
            <?php if($photo->status==1):?>
                    <a href="<?php echo site_url("photos/unpublish/".$photo->photos_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
            <?php else: ?>
                    <a href="<?php echo site_url("photos/publish/".$photo->photos_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
            <?php endif; ?>
            <a href="<?php echo site_url("photos/displayorderup/".$photo->photos_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-up"></span></a>
            <a href="<?php echo site_url("photos/displayorderdown/".$photo->photos_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-down"></span></a>
            
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