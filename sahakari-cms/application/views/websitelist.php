<?php $this->load->view("welcome_message");?>
<div class="panel panel-default">
	<table class="table table-striped">
    	<tr>
        	<th>Title</th>
            <th>Contact</th>
            <th>Copyright</th>
        	<th>Actions</th>
        </tr>
        <tr>
        	<td><?php echo $website->title;?></td>
            <td><?php echo $website->contact;?></td>
            <td><?php echo $website->copyright;?></td>
        	<td><a href="<?php echo site_url("website/updatewebsite/");?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
        </tr>
    </table>
</div>
