<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <script>
		function deletestory(alias){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>publicarticles/delete/"+alias+".html";
		}
    </script>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("publicarticles/add"); ?>" class="btn btn-default">Add</a>
        </div>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th width="10">S.N</th>
                <th width="120">Photo</th>
                <th>Title</th>
                <th>Person Name</th>
                <th>Person Address</th>
                <th width="200">Short Description</th>
                <th width="200" >Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $a=0;foreach($articles as $article):$a++;?>
        
        <tr <?php if($article->status==0): ?> class="danger" <?php endif; ?>>	
            <td><?php echo $a;?></td>
            <td><div class="img-container img-rounded" style="width:75px; overflow:hidden;">
            <?php if($article->image!=""): ?>
            <img src="<?php echo base_url()."../".$article->image;?>" height="75" class="img-rounded">
            <?php else: ?>
            <img src="<?php echo base_url()."images/no-photo.jpg";?>" height="75" class="img-rounded">
            <?php endif; ?>
            </div></td>
            <td><?php echo $article->article_title;?></td>
            <td><?php echo $article->article_writer;?></td>
            <td><?php echo $article->article_tagline;?></td>
            <td ><?php echo $article->article_date;?></td>
            <td width="200">
            <?php if($article->status==1):?>
                    <a href="<?php echo site_url("publicarticles/unpublish/".$article->article_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
            <?php else: ?>
                    <a href="<?php echo site_url("publicarticles/publish/".$article->article_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
            <?php endif; ?>
            <a href="#" class="btn btn-info btn-sm" title="details" data-toggle="modal" data-target="#details-<?php echo $article->article_id; ?>"><span class="glyphicon glyphicon-search"></span></a>
            <a href="<?php echo site_url("successstories/displayorderup/".$article->article_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-up"></span></a>
            <a href="<?php echo site_url("successstories/displayorderdown/".$article->article_id);?>" title="sort up" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-down"></span></a>
            <div class="modal fade" id="details-<?php echo $article->article_id; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Details</h4>
              </div>
              <div class="modal-body" style="max-height:400px; overflow:scroll;">
              	<?php echo $article->article_description;?>
              </div>
              <div class="modal-footer">
                <a href="#" onclick="deletestory('<?php echo $article->article_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="<?php echo site_url("publicarticles/edit/".$article->article_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
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