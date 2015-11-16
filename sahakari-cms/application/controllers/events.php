<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
	function index()
	{
		$this->load->model("MEvents");
		$data['Events']=$this->MEvents->getEvents();
		//testArray($data);
		$this->load->view("Events/view",$data);
	}
	function add()
	{
		$this->load->model("MEvents");
		
		if(isset($_POST['submit']))
		{
			$data=array(
					'event_title'=>$_POST['event_title'],
					'event_details'=>$_POST['event_details'],
					'event_date'=>$_POST['event_date']
					);
			$this->MEvents->Insert($data);
			redirect("events");
		}
		$this->load->view("events/add");
	}
	function edit($event_id)
	{
		$this->load->model("MEvents");
		if(isset($_POST['submit'])){
		$data=array(
					'event_id'=>$event_id,
					'event_title'=>$_POST['event_title'],
					'event_details'=>$_POST['event_details'],
					'event_date'=>$_POST['event_date']
					);
			$this->MEvents->Update($data);	
			redirect("events");
		}
		$data['Event']=$this->MEvents->getEvent($event_id);
		$this->load->view("events/edit",$data);
		
	}
	function Delete($event_id){
		$this->load->model("MEvents");
		$this->MEvents->Delete($event_id);
		redirect("events");
	}
	function Publish($event_id)
	{
		$this->load->model("MEvents");
		$this->MEvents->Publish($event_id);
		redirect("events");		
	}
	function unPublish($event_id)
	{
		$this->load->model("MEvents");
		$this->MEvents->unPublish($event_id);
		redirect("events");		
	}
}