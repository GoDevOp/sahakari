<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intl extends CI_Controller{
	function _remap($news_id){
	$this->load->model("MInternationalNews");
	$InternationalNews=$this->MInternationalNews->getNewsItems();
	$data['InternationalNews']=$InternationalNews;
	$data['news']=$this->MInternationalNews->getNewsItemById($news_id);
	$this->MInternationalNews->UpdateViews($news_id);
	$this->load->view("international/list",$data);
	}
}
	