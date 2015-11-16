<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Popular extends CI_Controller {
	public function _remap($news_id)
	{
		$this->load->model("MNews");
		$NewsItem=$this->MNews->getNewsItemByID($news_id);
		$this->MNews->UpdateViews($news_id);
		$data['NewsItem']=$NewsItem;
		$data['popularnews']=$this->MNews->getPopularNews();
		$this->load->view('popular',$data);
	}
}
