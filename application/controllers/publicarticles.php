<?php if(!defined('BASEPATH')) exit('no scripts allowed');

class PublicArticles extends CI_Controller{
	function _remap($article_id){
	$this->load->model("MPublicArticles");
	$data['article']=$this->MPublicArticles->getArticlesById($article_id);
	$data['articles']=$this->MPublicArticles->getArticles();
	$this->load->view("publicarticles/list",$data);
	}
}