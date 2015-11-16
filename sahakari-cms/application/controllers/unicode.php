<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unicode extends CI_Controller {
	function index()
	{
		$this->load->view("unicode");	
	}
}