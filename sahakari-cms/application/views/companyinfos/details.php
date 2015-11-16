<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view("header"); ?>
  </head>
  <body>
	<?php $this->load->view("navigation"); ?>
    <div class="row">
    	<div class="container">
        <div class="row">
        <div class="col-lg-8"><h3>सहकारी परिचय - <?php echo $CompanyInfo->title; ?><br>
		(<?php echo $CompanyInfo->company_name; ?>)</h3></div>
        <div class="col-lg-4"><a href="<?php echo site_url("companyinfo/edit/".$CompanyInfo->company_id); ?>" class="btn btn-default pull-right">Edit Company Info</a></div>
        </div>
        <div class="panel panel-default">
        <div class="panel-heading">छोटकरी</div>
        <div class="panel-body"><?php echo $CompanyInfo->short_intro; ?></div>
        </div>
        <div class="panel panel-default">
        <div class="panel-heading">पुरा जानकारी</div>
        <div class="panel-body"><?php echo $CompanyInfo->full_information; ?></div>
        </div>
        <div class="panel panel-default">
        <div class="panel-heading">थप जानकारीहरु <a href="#" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#addModal">Add</a></div>
        <div class="panel-body">
			<table class="table table-striped">
        	<thead>
            	<tr>
                	<th width="50">Sn</th>
                    <th>Title</th>
                    <th width="120">Action</th>
                	
                </tr>
            
            </thead>
            <tbody>
	            
                <?php $a=0; foreach($CompanyInfo->Details as $Details): ?>
                <tr>
                	<td><?php $a++; echo $a;  ?></td>
                    <td><?php echo $Details->details_title; ?></td>
                    <td><a href="#" onclick="deletecompanydetails('<?php echo $Details->companyinfo_details_id;?>');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
            <a href="#" data-toggle="modal" data-target="#editModal-<?php echo $Details->companyinfo_details_id; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
            <div class="modal fade" id="editModal-<?php echo $Details->companyinfo_details_id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">राखिएको जानकारी सुधर्नुहोस </h4>
              </div>
              <div class="modal-body">
              	<input type="hidden" name="companyinfo_details_id" id="companyinfo_details_id-<?php echo $Details->companyinfo_details_id;?>" value="<?php echo $Details->companyinfo_details_id;?>">
                <label for="title">सिर्षक</label><input type="text" class="form-control" id="title-<?php echo $Details->companyinfo_details_id;?>" name="title" value="<?php echo $Details->details_title; ?>">
                <label for="text">बिषयबस्तु </label>
                <textarea class="ckeditor" name="text" id="text-<?php echo $Details->companyinfo_details_id;?>"><?php echo $Details->details_text; ?></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updatebtn" data-id="<?php echo $Details->companyinfo_details_id;?>">Save</button>
              </div>
            </div>
          </div>
        </div>
            </td>
            </tr>
                <?php endforeach; ?>	
                
            
            </tbody>
            </table>
            
        <script>
			function deletecompanydetails(companyinfo_details_id)
			{
				if(window.confirm("Are you sure you want to delete?"))
				{
					window.location.href="<?php echo base_url(); ?>companyinfo/delete_details/"+companyinfo_details_id+".html";	
				}
			}
		</script>
       
		<div class="modal fade" id="addModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">सँस्था सम्बन्धित थप जानकारीहरु</h4>
              </div>
              <div class="modal-body">
              	<input type="hidden" name="company_id" id="company_id" value="<?php echo $CompanyInfo->company_id;?>">
                <label for="title">सिर्षक</label><input type="text" class="form-control" id="title" name="title">
                <label for="text">बिषयबस्तु </label>
                <textarea class="ckeditor" name="text" id="text"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary savebtn">Save</button>
              </div>
            </div>
          </div>
        </div>
        
        <script>
		
		$('#addModal .savebtn').on('click', function (e) {
				var data={"title":$("#title").val(),"text":$("#text").val(),"company_id":$("#company_id").val()};
				$.ajax({
					url:'<?php echo site_url("companyinfo/ajax/add_details"); ?>',
					data:data,
					type:"POST",
					cache:false,
					success:function(data){
						//alert(data);
						$('#addModal').modal('hide');
						window.location.reload();
					
					}
				});
				})
		$(".updatebtn").on('click',function(e){
			var tid=$(this).data("id");
			var data={"title":$("#title-"+tid).val(),"text":$("#text-"+tid).val(),"companyinfo_details_id":$("#companyinfo_details_id-"+tid).val()};
			$.ajax({
				url:'<?php echo site_url("companyinfo/ajax/update_details"); ?>',
				data:data,
				type:"POST",
				cache:false,
				success: function(data)
				{
					$(".modal").modal("hide");	
				}
			});
		});
		</script>
            
        </div>
        </div>      
       
        </div>
        
        
        
        </div>
    </div>
    <?php $this->load->view("footer"); ?>
  </body>
</html>