<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interviews extends CI_Controller {
	function index()
	{
		$this->load->model("MInterviews");
		$Interviews=$this->MInterviews->getInterviews();
		$data['Interviews']=$Interviews;
		$this->load->view("interviews/list",$data);
	}
	function add()
	{
		$this->load->model("MInterviews");
		$this->load->view("interviews/add");	
		if(isset($_POST['submit']))
		{
			$interviewData=array(
			"interview_title"=>$_POST['interview_title'],
			"interview_with"=>$_POST['interview_with'],
			"interview_date"=>$_POST['interview_date'],
			"interview_by"=>$_POST['interview_by'],
			"interview_text"=>$_POST['interview_text'],
			"interview_remarks"=>$_POST['interview_remarks'],
			"display_order"=>$this->MInterviews->getDisplayOrder("tbl_interviews"),
			"interview_thumb"=>$_POST['photo'],
			);
			//testArray($interviewData);die;
			$this->MInterviews->add($interviewData);
			$data['message']="Interview Added Successfully!!!";
			redirect("interviews");
		}
		
		
	}
	function edit($interview_id)
	{
		$this->load->model("MInterviews");
		if(isset($_POST['submit']))
		{
			$interviewData=array(
			"interview_id"=>$interview_id,
			"interview_title"=>$_POST['interview_title'],
			"interview_date"=>$_POST['interview_date'],
			"interview_with"=>$_POST['interview_with'],
			"interview_by"=>$_POST['interview_by'],
			"interview_text"=>$_POST['interview_text'],
			"interview_remarks"=>$_POST['interview_remarks'],
			"interview_thumb"=>$_POST['photo'],
			);
			$this->MInterviews->update($interviewData);
			$data['message']="Interview Updated Successfully!!!";
		}
		$Interview=$this->MInterviews->getInterviewByID($interview_id);
		$data['Interview']=$Interview;
		$this->load->view("interviews/edit",$data);	
	}
	function delete($interview_id){
		$this->load->model("MInterviews");
		$this->MInterviews->delete($interview_id);
		redirect("interviews");	
	}
	function publish($interview_id)
	{
		$this->load->model("MInterviews");
		$this->MInterviews->publish($interview_id);
		redirect("interviews");		
	}
	function unpublish($interview_id)
	{
		$this->load->model("MInterviews");
		$this->MInterviews->unpublish($interview_id);
		redirect("interviews");		
	}
	function displayorderup($interview_id){
		$this->load->model("MInterviews");
		$current=$this->MInterviews->getDisplayOrderById($interview_id);
		$newdisplayorder=$this->MInterviews->getDisplayOrderToMove($current);
		$newstory=$this->MInterviews->getNewsByDisplayOrder($newdisplayorder);
		//testArray($newstory);die;
		$oldstory=$this->MInterviews->getNewsByDisplayOrder($current);
		$this->MInterviews->updateDisplayOrder($current,$newstory->interview_id);
		$this->MInterviews->updateDisplayOrder($newdisplayorder,$oldstory->interview_id);
		redirect("interviews");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
	function displayorderdown($interview_id){
		$this->load->model("MInterviews");
		$current=$this->MInterviews->getDisplayOrderById($interview_id);
		$newdisplayorder=$this->MInterviews->getDisplayOrderToMoveDown($current);
		$newstory=$this->MInterviews->getNewsByDisplayOrder($newdisplayorder);
		$oldstory=$this->MInterviews->getNewsByDisplayOrder($current);
		$this->MInterviews->updateDisplayOrder($current,$newstory->interview_id);
		$this->MInterviews->updateDisplayOrder($newdisplayorder,$oldstory->interview_id);
		redirect("interviews");
		//$this->MSuccessStories->updateDisplayOrder($story_id);
	}
}