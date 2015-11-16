<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller{
	function _remap($event_id){
	$this->load->model("MEvents");
	$Event=$this->MEvents->getEvents();
	$data['Events']=$Event;
	$data['event']=$this->MEvents->getEventById($event_id);
	$this->MEvents->UpdateViews($event_id);
	$this->load->view("event/list",$data);
	}
}