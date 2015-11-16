<?php 

class MPhotos extends CI_Model{
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
	function getPhotosByPhotoId($photos_id){
	$query=$this->db->query("select * from tbl_photos where photos_id='$photos_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data="";
	return $data;
	}
	function getPhotos(){
	$query=$this->db->query("select * from tbl_photos order by display_order desc");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function insertPhotos($data){
	$query=$this->db->insert("tbl_photos",$data);
	if($query==true)
	return true;
	else 
	return false;
	}
	function updatePhotos($data,$photos_id){
	$this->db->where("photos_id",$photos_id);
	$this->db->update("tbl_photos",$data);
	}
	function delete($photos_id){
	$query=$this->db->query("delete from tbl_photos where photos_id='$photos_id'");
	if($query==true)
	return true;
	else
	return false;
	}
	function getDisplayOrderById($photos_id){
		$query=$this->db->query("select display_order as displayorder from tbl_photos where photos_id='$photos_id'");
		if($query->num_rows()>0)
		return $query->row()->displayorder;
		else
		return $data="";
	}
	function getDisplayOrderToMove($display_order){
		$query=$this->db->query("select min(display_order) as newdisplayorder from tbl_photos where display_order>'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getDisplayOrderToMoveDown($display_order){
		$query=$this->db->query("select max(display_order) as newdisplayorder from tbl_photos where display_order<'$display_order'");
		if($query->num_rows()>0)
		return $query->row()->newdisplayorder;
		else
		return "";
	}
	function getPhotosByDisplayOrder($display_order){
		$query=$this->db->query("select * from tbl_photos where display_order='$display_order'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
	function publish($photos_id)
	{
		$this->db->where("photos_id",$photos_id);	
		$this->db->update("tbl_photos",array("status"=>1));
	}
	function unpublish($photos_id)
	{
		$this->db->where("photos_id",$photos_id);	
		$this->db->update("tbl_photos",array("status"=>0));
	}
	function updateDisplayOrder($display_order,$photos_id){
		$this->db->where("photos_id",$photos_id);
		$this->db->update("tbl_photos",array("display_order"=>$display_order));
	}
}