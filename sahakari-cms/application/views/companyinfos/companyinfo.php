<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <script>
		function deletecompany(alias){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>companyinfo/delete/"+alias+".html";
		}
    </script>
    <div class="row">
    	<div class="container">
        <div class="col-lg-12">
        <div class="form-group  pull-right"><a href="<?php echo site_url("companyinfo/add"); ?>" class="btn btn-default">Add</a>
        </div>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th width="10">S.N</th>
                <th width="120">Thumb</th>
                <th width="250">Title</th>
                <th>Name(English)</th>
                <th>About Company</th>
                <th width="150" >Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $a=0;foreach($CompanyInfos as $companyinfo):$a++;?>
        
        <tr>	
            <td><?php echo $a;?></td>
            <td><div class="img-container img-rounded" style="width:75px; overflow:hidden;">
            <?php if($companyinfo->image!=""): ?>
            <img src="<?php echo base_url()."../".$companyinfo->image;?>" height="75" class="img-rounded">
            <?php else: ?>
            <img src="<?php echo base_url()."images/no-photo.jpg";?>" height="75" class="img-rounded">
            <?php endif; ?>
            </div></td>
            <td><?php echo $companyinfo->title;?></td>
            <td><?php echo $companyinfo->company_name;?></td>
            <td><?php echo $companyinfo->short_intro;?></td>
            <td width="200">
            <a href="#" onclick="deletecompany('<?php echo $companyinfo->company_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="<?php echo site_url("companyinfo/edit/".$companyinfo->company_id);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="<?php echo site_url("companyinfo/details/".$companyinfo->company_alias);?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"></span></a>
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