<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("header"); ?>
  </head>
  <body>
	<script>
		function deleteSahakari(alias){
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>sahakari/delete/"+alias+".html";
		}
    </script>
	<?php $this->load->view("navigation"); ?>
    <div class="row">
    	<div class="container">
        <div class="form-group pull-right"><a href="<?php echo site_url("sahakari/add"); ?>" class="btn btn-default">Add</a>
        </div>
        <table class="table table-striped">
        	<thead>
            	<tr>
                	<th width="20">Sn</th>
                    <th width="75" >Logo</th>
                    <th >Title</th>
                    <th >Sahakari Name</th>
                    <th >Contact Person</th>
                    <th >Mobile</th>
                    <th >Membership Date</th>
                    <th >Membership By</th>
                    <th >Ramarks</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $sn=0; foreach($sahakari as $Sahakari): $sn++; ?>
            	<tr>
                	<td><?php echo $sn; ?></td>
                    <td><div class="img-container img-rounded" style="width:75px; overflow:hidden;">
            <img src="<?php echo base_url()."../".$Sahakari->logo;?>" height="75" class="img-rounded">
            </div></td>
                    <td><?php echo $Sahakari->title; ?></td>
                    <td><?php echo $Sahakari->sahakari_name;?></td>
                    <td><?php echo $Sahakari->contact_person;?></td>
                    <td><?php echo $Sahakari->contact_person_mobile;?></td>
                    <td><?php echo $Sahakari->membership_date;?></td>
                    <td><?php echo $Sahakari->membership_by;?></td> 
                    <td><?php echo $Sahakari->remarks;?></td> 
                    <td><?php if($Sahakari->status==1):?>
                    <a href="<?php echo site_url("sahakari/unpublish/".$Sahakari->sahakari_id);?>" title="Unpublish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-minus-sign"></span></a>
                    <?php else: ?>
                    <a href="<?php echo site_url("sahakari/publish/".$Sahakari->sahakari_id);?>" title="Publish" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-ok-sign"></span></a>
                    <?php endif; ?>
                   <a href="#" data-toggle="modal" data-target="#editModal-<?php echo $Sahakari->sahakari_id; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search"></span></a>
                   <a href="#" data-sahakari_id="<?php echo $Sahakari->sahakari_id; ?>" class=" setupWebsiteTrigger btn btn-info btn-sm"><span class="glyphicon glyphicon-cloud-upload"></span></a>
            <div class="modal fade" id="editModal-<?php echo $Sahakari->sahakari_id; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Details</h4>
              </div>
              <div class="modal-body">
              	<?php echo $Sahakari->short_intro;?>
              </div>
              <div class="modal-footer">
              	<a class="btn btn-default" href="<?php echo site_url("sahakari/edit/".$Sahakari->sahakari_id); ?>">Edit</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div></td>
                   
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        		<div class="modal fade" id="setupWebsite">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Enter Content For Sahakari Website</h4>
              </div>
              <div class="modal-body">
              	<ul class="nav nav-tabs">
                  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                  <li><a href="#about" data-toggle="tab">About</a></li>
                  <li><a href="#services" data-toggle="tab">Services</a></li>
                  <li><a href="#members" data-toggle="tab">Members</a></li>
                  <li><a href="#report" data-toggle="tab">Report</a></li>
                  <li><a href="#contact" data-toggle="tab">Contact</a></li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="home">
                  <p>Content for Home page</p>
                  <textarea name="home" id="homepage" class="ckeditor" ></textarea></div>
                  <div class="tab-pane" id="about">
                  <p>Content for About page</p>
                  <textarea name="about" id="aboutpage" class="ckeditor" ></textarea></div>
                  <div class="tab-pane" id="services">
                  <p>Content for Services page</p>
                  <textarea name="services" id="servicespage" class="ckeditor" ></textarea></div>
                  <div class="tab-pane" id="members">
                  <p>Content for Members page</p>
                  <textarea name="services" id="memberspage" class="ckeditor" ></textarea></div>
                  <div class="tab-pane" id="report">
                  <p>Content for Report page</p>
                  <textarea name="report" id="reportpage" class="ckeditor" ></textarea></div>
                  <div class="tab-pane" id="contact">
                  <p>Content for Contact page</p>
                  <textarea name="contact" id="contactpage" class="ckeditor" ></textarea></div>
                </div>
              </div>
              <div class="modal-footer">
              	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-default" id="savebtn" data-sahakari_id="">Save</button>
              </div>
            </div>
          </div>
        </div>
        
        <script>
		$(".setupWebsiteTrigger").click(function(e) {
            $.sahakari_id=$(this).data("sahakari_id");
			$("#savebtn").data("sahakari_id",$.sahakari_id);
			$.ajax({
				url:'<?php echo site_url("sahakari/ajax/getSahakariWebsite"); ?>',
				type:"POST",
				dataType:"json",
				data:{sahakari_id:$.sahakari_id},
				success: function(data)
				{
					if(data!="")
					{
						$("#homepage").val(data.homepage);
						$("#aboutpage").val(data.about);
						$("#memberspage").val(data.members);
						$("#servicespage").val(data.services);
						$("#reportpage").val(data.report);
						$("#contactpage").val(data.contact);
						$("#setupWebsite").modal("show");
					}
					else
					{
						$("#setupWebsite").modal("show");
					}
				}
				
			});
        });
		$("#savebtn").click(function(e) {
			$.sahakari_id=$(this).data("sahakari_id");
			formdata={sahakari_id:$.sahakari_id,homepage:$("#homepage").val(),about:$("#aboutpage").val(),services:$("#servicespage").val(),report:$("#reportpage").val(),members:$("#memberspage").val(),contact:$("#contactpage").val()};
			$.ajax({
				url:'<?php echo site_url("sahakari/ajax/save"); ?>',
				data:formdata,
				type:"POST",
				success: function(data)
				{
					//alert(data);	
				}
			});
			
        });
		</script>
        </div>
    </div>
  </body>
</html>