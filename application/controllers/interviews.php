<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interviews extends CI_Controller{
	function _remap($interview_id){
	$this->load->model("MInterviews");
	$data['interviews']=$this->MInterviews->getInterviews();
	$Interview=$this->MInterviews->getInterviewById($interview_id);
	$data['interview']=$Interview;
	//testArray($data);die;
	$this->load->view("interview/list",$data);
	}
}