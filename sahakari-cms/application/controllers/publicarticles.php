<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PublicArticles extends CI_Controller{
	function index(){
	$this->load->model("MPublicArticles");
	$data['articles']=$this->MPublicArticles->getarticles();
	$this->load->view("publicarticles/view",$data);
	}
	function add(){
	$this->load->model("MPublicArticles");
		if(isset($_POST['submit'])){
		$data=array(
					'article_title'=>$_POST['article_title'],
					'article_description'=>$_POST['article_description'],
					'article_date'=>$_POST['article_date'],
					'article_writer'=>$_POST['article_writer'],
					'article_tagline'=>$_POST['article_tagline'],
					'image'=>$_POST['photo'],
					'display_order'=>$this->MPublicArticles->getDisplayOrder("tbl_publicarticles"),
					);
		$this->MPublicArticles->insert($data);
		redirect("publicarticles");
		}
	$this->load->view("publicarticles/add");
	}
	function edit($article_id){
		$this->load->model("MPublicArticles");
		$data['article']=$this->MPublicArticles->getArticlesById($article_id);
			if(isset($_POST['submit'])){
					$article=array(
								'article_title'=>$_POST['article_title'],
								'article_description'=>$_POST['article_description'],
								'article_date'=>$_POST['article_date'],
								'article_writer'=>$_POST['article_writer'],
								'article_tagline'=>$_POST['article_tagline'],
								'image'=>$_POST['photo'],
								);
					$this->MPublicArticles->updateArticles($article,$article_id);
					redirect("publicarticles");
			}
		$this->load->view("publicarticles/edit",$data);
	}
	function delete(){
		$this->load->model("MPublicArticles");
		$article_id=$this->uri->segment(3);
		$this->MPublicArticles->deleteArticle($article_id);
		redirect("publicarticles");
	}
	function publish($news_id)
	{
		$this->load->model("MPublicArticles");
		$this->MPublicArticles->publish($news_id);
		redirect("publicarticles");		
	}
	function unpublish($news_id)
	{
		$this->load->model("MPublicArticles");
		$this->MPublicArticles->unpublish($news_id);
		redirect("publicarticles");		
	}
}