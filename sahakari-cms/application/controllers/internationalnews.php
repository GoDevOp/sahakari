<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InternationalNews extends CI_Controller{
	function index(){
	$this->load->model("MInternationalNews");
	$data['news']=$this->MInternationalNews->getnews();
	$this->load->view("internationalnews/view",$data);
	}
	function add()
	{
		$this->load->model("MInternationalNews");
		$this->load->view("internationalnews/add");
		if(isset($_POST['news_title'])){
				
			$data=array(
					'news_desc'=>$_POST['news_desc'],
					'news_title'=>$_POST['news_title'],
					'news_text'=>$_POST['news_text'],
					'added_on'=>$_POST['added_on'],
					'news_thumb'=>$_POST['photo'],
					'display_order'=>$this->MInternationalNews->getDisplayOrder("tbl_internationalnews"),
					);
		//testArray($data);die;			
		$this->MInternationalNews->insertnews($data);
		redirect("internationalnews");
		}
	}
	function edit()
	{
		$this->load->model("MInternationalNews");
		$id=$this->uri->segment(3);
		$data['news']=$this->MInternationalNews->getNewsItem($id);
		//testArray($data);
		$this->load->view("news/edit",$data);
		if(isset($_POST['news_title'])){
		$data=array(
					'news_desc'=>$_POST['news_desc'],
					'news_title'=>$_POST['news_title'],
					'news_text'=>$_POST['news_text'],
					'added_on'=>$_POST['added_on']
					);
			$this->MInternationalNews->update($data,$id);	
			redirect("internationalnews");
		}
		
	}
	function delete(){
		$this->load->model("MInternationalNews");
		$id=$this->uri->segment(3);
		$this->MInternationalNews->deleteNews($id);
		redirect("internationalnews");
	}
	function publish($news_id)
	{
		$this->load->model("MInternationalNews");
		$this->MInternationalNews->publish($news_id);
		redirect("internationalnews");		
	}
	function unpublish($news_id)
	{
		$this->load->model("MInternationalNews");
		$this->MInternationalNews->unpublish($news_id);
		redirect("internationalnews");		
	}
	function displayorderup($news_id){
		$this->load->model("MInternationalNews");
		$current=$this->MInternationalNews->getDisplayOrderById($news_id);
		$newdisplayorder=$this->MInternationalNews->getDisplayOrderToMove($current);
		$newstory=$this->MInternationalNews->getNewsByDisplayOrder($newdisplayorder);
		//testArray($newstory);die;
		$oldstory=$this->MInternationalNews->getNewsByDisplayOrder($current);
		$this->MInternationalNews->updateDisplayOrder($current,$newstory->news_id);
		$this->MInternationalNews->updateDisplayOrder($newdisplayorder,$oldstory->news_id);
		redirect("internationalnews");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
	function displayorderdown($news_id){
		$this->load->model("MInternationalNews");
		$current=$this->MInternationalNews->getDisplayOrderById($news_id);
		$newdisplayorder=$this->MInternationalNews->getDisplayOrderToMoveDown($current);
		$newstory=$this->MInternationalNews->getNewsByDisplayOrder($newdisplayorder);
		$oldstory=$this->MInternationalNews->getNewsByDisplayOrder($current);
		$this->MInternationalNews->updateDisplayOrder($current,$newstory->news_id);
		$this->MInternationalNews->updateDisplayOrder($newdisplayorder,$oldstory->news_id);
		redirect("internationalnews");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
}