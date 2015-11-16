<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <script>
		function deletecompany(alias){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>news/delete/"+alias+".html";
		}
    </script>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("news/add"); ?>" class="btn btn-default">Add</a>
        </div>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th width="10">S.N</th>
                <th>Thumb</th>
                <th width="200">Title</th>
                <th>Short Description</th>
                <th width="100">Added On</th>
                <th width="200" >Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $a=0;foreach($news as $new):$a++;?>
        
        <tr <?php if($new->status==0): ?> class="danger" <?php endif; ?>>	
            <td><?php echo $a;?></td>
            <td width="75"><div class="img-container img-rounded" style="width:75px; overflow:hidden;">
            <?php if($new->news_thumb!=""): ?>
            <img src="<?php echo base_url()."../".$new->news_thumb;?>" height="75" class="img-rounded">
            <?php else: ?>
            <img src="<?php echo base_url()."images/no-photo.jpg";?>" height="75" class="img-rounded">
            <?php endif; ?>
            </div></td>
            <td><?php echo $new->news_title;?></td>
            <td><?php echo $new->news_desc;?></td>
            <td ><?php echo $new->added_on;?></td>
            <td >
            <?php if($new->status==1):?>
                    <a href="<?php echo site_url("news/unpublish/".$new->news_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
            <?php else: ?>
                    <a href="<?php echo site_url("news/publish/".$new->news_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
            <?php endif; ?>
            <a href="#" class="btn btn-info btn-sm" title="details" data-toggle="modal" data-target="#details-<?php echo $new->news_id; ?>"><span class="glyphicon glyphicon-search"></span></a>
            <a href="<?php echo site_url("news/displayorderup/".$new->news_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-up"></span></a>
            <a href="<?php echo site_url("news/displayorderdown/".$new->news_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-down"></span></a>
            <div class="modal fade" id="details-<?php echo $new->news_id; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">पुरा समाचार</h4>
              </div>
              <div class="modal-body" style="max-height:400px; overflow:scroll;">
              	<?php echo $new->news_text; ?>
              </div>
              <div class="modal-footer">
                 <a href="#" onclick="deletecompany('<?php echo $new->news_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="<?php echo site_url("news/edit/".$new->news_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
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