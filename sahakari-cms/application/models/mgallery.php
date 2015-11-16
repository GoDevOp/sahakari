<?php 

class MGallery extends CI_Model{
	function getDisplayOrder($TableName)
	{
		$t="select max(display_order)+1 as display_order from $TableName";
		$q=$this->db->query($t);
		if($q->row()->display_order!=""):
			return $q->row()->display_order;
		else:
			return 1;
		endif;
	}
	function getGallery(){
	$query=$this->db->query("select * from tbl_gallery order by display_order desc");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getGalleryById($gallery_id){
	$query=$this->db->query("select * from tbl_gallery where gallery_id='$gallery_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data="";
	return $data;
	}
	function insertGallery($data){
	$query=$this->db->insert("tbl_gallery",$data);
	if($query==true)
	return true;	
	else
	return false;
	}
	function deleteGallery($gallery_id){
	$query=$this->db->query("delete from tbl_gallery where gallery_id='$gallery_id'");
	if($query==true)
	return true;
	else
	return false;
	}
	function updateGallery($data,$gallery_id){
	$this->db->where("gallery_id",$gallery_id);
	$this->db->update("tbl_gallery",$data);
	}
	function getGalleryByDisplayOrder($display_order){
		$query=$this->db->query("select * from tbl_gallery where display_order='$display_order'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function getDisplayOrderById($gallery_id){
		$query=$this->db->query("select display_order as displayorder from tbl_gallery where gallery_id='$gallery_id'");
		if($query->num_rows()>0)
		return $query->row()->displayorder;
		else
		return $data="";
	}
	function getDisplayOrderToMove($display_order){
		$query=$this->db->query("select min(display_order) as newdisplayorder from tbl_gallery where display_order>'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getDisplayOrderToMoveDown($display_order){
		$query=$this->db->query("select max(display_order) as newdisplayorder from tbl_gallery where display_order<'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function publish($gallery_id)
	{
		$this->db->where("gallery_id",$gallery_id);	
		$this->db->update("tbl_gallery",array("status"=>1));
	}
	function unpublish($gallery_id)
	{
		$this->db->where("gallery_id",$gallery_id);	
		$this->db->update("tbl_gallery",array("status"=>0));
	}
	function updateDisplayOrder($display_order,$gallery_id){
		$this->db->where("gallery_id",$gallery_id);
		$this->db->update("tbl_gallery",array("display_order"=>$display_order));
	}
}