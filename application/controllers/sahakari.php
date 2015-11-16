<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sahakari extends CI_Controller{
	function index()
	{
		$this->load->model("MSahakari");
		$data['Sahakaries']=$this->MSahakari->getSahakariesAlphabetically();
		$this->load->view("sahakari/list",$data);
	}
	function Site($alias)
	{
		$alias=$this->uri->segment(1);
		$this->load->model("MSahakari");
		$data['Sahakari']=$this->MSahakari->getSahakariByAlias($alias);	
		//testArray($data);die;
		$this->load->view("sahakari/site",$data);
	}
}