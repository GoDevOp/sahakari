<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuccessStories extends CI_Controller{
	function index(){
		$this->load->model("MSuccessStories");
		$stories=$this->MSuccessStories->getStories();
		foreach($stories as $story):
		$story->storydescription=$this->MSuccessStories->getstoriesdescription($story->story_id);
		endforeach;
		$data['stories']=$stories;
		//testArray($data);die;
		$this->load->view("successstories/view",$data);
	}
	function delete($story_id){
		$this->load->model("MSuccessStories");
		$this->MSuccessStories->deleteStories($story_id);
		redirect("successstories");
	}
	function add(){
		$this->load->model("MSuccessStories");
		$this->load->view("successstories/add");
			if(isset($_POST['person_name'])){
			$data=array(
						'title'=>$_POST['title'],
						'person_name'=>$_POST['person_name'],
						'person_address'=>$_POST['person_address'],
						'success_story'=>$_POST['success_story'],
						'collected_by'=>$_POST['collected_by'],
						'collected_on'=>$_POST['collected_on'],
						'display_order'=>$this->MSuccessStories->getDisplayOrder("tbl_successstories"),
						'image'=>$_POST['photo'],
						);
			$this->MSuccessStories->insertStories($data);
			redirect("successstories");
			}
	}
	function edit($story_id){
		$this->load->model("MSuccessStories");
		$data['story']=$this->MSuccessStories->getStoriesById($story_id);
		if(isset($_POST['person_name'])){
			$data=array(
						'title'=>$_POST['title'],
						'person_name'=>$_POST['person_name'],
						'person_address'=>$_POST['person_address'],
						'success_story'=>$_POST['success_story'],
						'collected_by'=>$_POST['collected_by'],
						'collected_on'=>$_POST['collected_on'],
						'image'=>$_POST['photo'],
						);
			$this->MSuccessStories->updateStory($data,$story_id);
			redirect("successstories");
			}
		$this->load->view("successstories/edit",$data);
	}
	function publish($story_id)
	{
		$this->load->model("MSuccessStories");
		$this->MSuccessStories->publish($story_id);
		redirect("successstories");		
	}
	function unpublish($story_id)
	{
		$this->load->model("MSuccessStories");
		$this->MSuccessStories->unpublish($story_id);
		redirect("successstories");		
	}
	function displayorderup($story_id){
		$this->load->model("MSuccessStories");
		$current=$this->MSuccessStories->getDisplayOrderById($story_id);
		$newdisplayorder=$this->MSuccessStories->getDisplayOrderToMove($current);
		$newstory=$this->MSuccessStories->getStoriesByDisplayOrder($newdisplayorder);
		$oldstory=$this->MSuccessStories->getStoriesByDisplayOrder($current);
		$this->MSuccessStories->updateDisplayOrder($current,$newstory->story_id);
		$this->MSuccessStories->updateDisplayOrder($newdisplayorder,$oldstory->story_id);
		redirect("successstories");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
	function displayorderdown($story_id){
		$this->load->model("MSuccessStories");
		$current=$this->MSuccessStories->getDisplayOrderById($story_id);
		$newdisplayorder=$this->MSuccessStories->getDisplayOrderToMoveDown($current);
		$newstory=$this->MSuccessStories->getStoriesByDisplayOrder($newdisplayorder);
		$oldstory=$this->MSuccessStories->getStoriesByDisplayOrder($current);
		$this->MSuccessStories->updateDisplayOrder($current,$newstory->story_id);
		$this->MSuccessStories->updateDisplayOrder($newdisplayorder,$oldstory->story_id);
		redirect("successstories");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
}