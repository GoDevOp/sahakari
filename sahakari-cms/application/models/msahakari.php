<?php 

class MSahakari extends CI_Model{
	function getSahakari(){
	$query=$this->db->query("select * from tbl_sahakari");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getShakariById($sahakari_id){
	$query=$this->db->query("select * from tbl_sahakari where sahakari_id='$sahakari_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data="";
	return $data;
	}
	function getShakariWebsite($sahakari_id){
	$query=$this->db->query("select * from tbl_sahakari_website where sahakari_id='$sahakari_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data="";
	return $data;
	}
	function UpdateWebsite($PostedData)
	{
		$this->db->where("sahakari_id",$PostedData['sahakari_id']);
		$this->db->update("tbl_sahakari_website",$PostedData);
	}
	function CreateWebsite($PostedData)
	{
		$this->db->insert("tbl_sahakari_website",$PostedData);
	}
	function addSahakari($data){
	$query=$this->db->insert("tbl_sahakari",$data);
	if($query==true)
	return true;
	else
	return false;
	}
	function updateSahakari($data,$sahakari_id){
	$this->db->where("sahakari_id",$sahakari_id);
	$query=$this->db->update("tbl_sahakari",$data);
	if($query==true)
	return true;
	else
	return false;
	}
	function publish($sahakari_id)
	{
		$this->db->where("sahakari_id",$sahakari_id);	
		$this->db->update("tbl_sahakari",array("status"=>1));
	}
	function unpublish($sahakari_id)
	{
		$this->db->where("sahakari_id",$sahakari_id);	
		$this->db->update("tbl_sahakari",array("status"=>0));
	}
	function createAlias($text,$tablename,$fieldname){
	$new_string = trim(preg_replace('/[^A-Za-z0-9_]/', ' ', strip_tags($text)));
	$new_string = preg_replace( '/\s+/', ' ', $new_string );
	$alias=strtolower(str_replace(" ","_",trim($new_string)));
	$CI=& get_instance();
	$q=$CI->db->query("select * from $tablename where $fieldname='$alias'");
	if($q->num_rows()>0)
	{
		$alias.=date("ymdhis");	
	}
	return $alias;
}
}