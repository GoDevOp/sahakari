<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPublicArticles extends CI_Model {
	function getArticle($id)
	{
		$t="select * from tbl_publicarticles where status=1 order by display_order desc";
		$q=$this->db->query($t);
		return $q->result();	
	}
	function getArticles($limit="")
	{
		if($limit!=""){
			$t="select * from tbl_publicarticles where status=1 order by display_order desc limit 0, $limit";
			$q=$this->db->query($t);
			return $q->result();	
		}
		else{
		$t="select * from tbl_publicarticles";
		$q=$this->db->query($t);
		return $q->result();
		}
	}	
	function getArticlesById($article_id){
		$query=$this->db->query("select * from tbl_publicarticles where article_id='$article_id'");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data="";
		return $data;
	}
}