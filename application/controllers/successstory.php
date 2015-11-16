<?php if(!defined('BASEPATH')) exit ('no direct scripts allowed');

class SuccessStory extends CI_Controller{
	function _remap($story_id){
	$this->load->model("MSuccessStory");
	$data['story']=$this->MSuccessStory->getSuccessStoryById($story_id);
	$data['stories']=$this->MSuccessStory->getSuccesStories();
	//testArray($data);
	$this->load->view("successstory/list",$data);
	}
}