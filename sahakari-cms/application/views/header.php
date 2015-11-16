<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>General CMS</title>
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>ckeditor/adapters/jquery.js"></script>
    
    <script type="text/javascript">
	$(document).ready(function (e) {
		$(".datepicker").datepicker({dateFormat:'yy-mm-dd'});
		$(".ckeditor").ckeditor({
			 filebrowserBrowseUrl : 'kcfinder/browse.php?type=files',
		   filebrowserImageBrowseUrl : 'kcfinder/browse.php?type=images',
		   filebrowserFlashBrowseUrl : 'kcfinder/browse.php?type=flash',
		   filebrowserUploadUrl : 'kcfinder/upload.php?type=files',
		   filebrowserImageUploadUrl : 'kcfinder/upload.php?type=images',
		   filebrowserFlashUploadUrl : 'kcfinder/upload.php?type=flash'
		   
		   
			/*toolbar:
            [
                ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-','image']
             ]*/
		});
		$(".tooltip-example").tooltip({placement: 'bottom',trigger: 'manual', html: true}).tooltip();
		$.clicked=false;
		$(".tooltip-example").on('click',function(){
			if($.clicked)
			{
				$(this).removeClass("fa-minus-square-o").addClass("fa-plus-square-o");
				$(this).tooltip('hide');
				$.clicked=false;
			}
			else
			{
				$(this).removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
				$(this).tooltip('show');$.clicked=true;
			}
			});
	  
	});
</script>