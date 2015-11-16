<?php 

class MWebsite extends CI_Model{
	function getwebsite(){
	$query=$this->db->query("select * from tbl_website");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data=array();
	return $data;
	}
	function getWebsiteByTitle($title){
	$query=$this->db->query("select * from tbl_website where title='$title'");
	if($query->num_rows())
	$data=$query->row();
	else
	$data="";
	return $data;
	}
	function updateWebsite($data){
	$title=$data['title'];
	$contact=$data['contact'];
	$copyright=$data['copyright'];
	$query=$this->db->update("tbl_website",$data);
	if($query==true)
	return true;
	else
	return false;
	}
}
