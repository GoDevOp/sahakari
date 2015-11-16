<?php 

class MPublicArticles extends CI_Model{
	function getDisplayOrder($TableName="")
	{
		$q=$this->db->query("select max(display_order)+1 as display_order from $TableName")->row();
		return $q->display_order;
	}
	function getarticles(){
	$query=$this->db->query("select * from tbl_publicarticles");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getArticlesById($article_id){
	$query=$this->db->query("select * from tbl_publicarticles where article_id='$article_id'");
	if($query==true)
	return $query->row();
	else
	return array();
	}
	function insert($data){
	$query=$this->db->insert("tbl_publicarticles",$data);
	if($query==true)
	return true;
	else
	return false;
	}
	function deleteArticle($article_id){
	$query=$this->db->query("delete from tbl_publicarticles where article_id='$article_id'");
	if($query==true)
	return true;
	else
	return false;
	}
	function updateArticles($data,$article_id){
	$this->db->where("article_id",$article_id);
	$this->db->update("tbl_publicarticles",$data);
	}
	function publish($article_id)
	{
		$this->db->where("article_id",$article_id);	
		$this->db->update("tbl_publicarticles",array("status"=>1));
	}
	function unpublish($article_id)
	{
		$this->db->where("article_id",$article_id);	
		$this->db->update("tbl_publicarticles",array("status"=>0));
	}
}