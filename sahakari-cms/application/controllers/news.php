<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	function index()
	{
		$this->load->model("MNews");
		$data['news']=$this->MNews->getNews();
		//testArray($data);
		$this->load->view("news/view",$data);
	}
	function add()
	{
		$this->load->model("MNews");
		$this->load->view("news/add");
		if(isset($_POST['news_title'])){
				
			$data=array(
					'news_desc'=>$_POST['news_desc'],
					'news_title'=>$_POST['news_title'],
					'news_text'=>$_POST['news_text'],
					'added_on'=>$_POST['added_on'],
					'news_thumb'=>$_POST['photo'],
					'display_order'=>$this->MNews->getDisplayOrder("tbl_news"),
					);
		$this->MNews->insertnews($data);
		redirect("news");
		}
	}
	function edit()
	{
		$this->load->model("MNews");
		$id=$this->uri->segment(3);
		$data['news']=$this->MNews->getNewsItem($id);
		//testArray($data);
		$this->load->view("news/edit",$data);
		if(isset($_POST['news_title'])){
		$data=array(
					'news_desc'=>$_POST['news_desc'],
					'news_title'=>$_POST['news_title'],
					'news_text'=>$_POST['news_text'],
					'added_on'=>$_POST['added_on'],
					'news_thumb'=>$_POST['photo'],
					);
			$this->MNews->update($data,$id);	
			redirect("news");
		}
		
	}
	function delete(){
		$this->load->model("MNews");
		$id=$this->uri->segment(3);
		$this->MNews->deleteNews($id);
		redirect("news");
	}
	function publish($news_id)
	{
		$this->load->model("MNews");
		$this->MNews->publish($news_id);
		redirect("news");		
	}
	function unpublish($news_id)
	{
		$this->load->model("MNews");
		$this->MNews->unpublish($news_id);
		redirect("news");		
	}
	function details($news_id){
		$this->load->model("MNews");
		$data['newsdetail']=$this->MNews->getNewsDetail($news_id);
		//testArray($data);
		$this->load->view("news/detail",$data);
	}
	function displayorderup($news_id){
		$this->load->model("MNews");
		$current=$this->MNews->getDisplayOrderById($news_id);
		$newdisplayorder=$this->MNews->getDisplayOrderToMove($current);
		$newstory=$this->MNews->getNewsByDisplayOrder($newdisplayorder);
		//testArray($newstory);die;
		$oldstory=$this->MNews->getNewsByDisplayOrder($current);
		$this->MNews->updateDisplayOrder($current,$newstory->news_id);
		$this->MNews->updateDisplayOrder($newdisplayorder,$oldstory->news_id);
		redirect("news");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
	function displayorderdown($news_id){
		$this->load->model("MNews");
		$current=$this->MNews->getDisplayOrderById($news_id);
		$newdisplayorder=$this->MNews->getDisplayOrderToMoveDown($current);
		$newstory=$this->MNews->getNewsByDisplayOrder($newdisplayorder);
		$oldstory=$this->MNews->getNewsByDisplayOrder($current);
		$this->MNews->updateDisplayOrder($current,$newstory->news_id);
		$this->MNews->updateDisplayOrder($newdisplayorder,$oldstory->news_id);
		redirect("news");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
}