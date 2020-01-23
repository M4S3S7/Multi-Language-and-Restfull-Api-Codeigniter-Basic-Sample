<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/HomeModel/homeModel');
  }
	public function index(){
    $slayt = $this->homeModel->get('category', 'slayt', 'sz_image');
    $data  = array(
      'images' => $slayt
    );
		$this->load->view('HomeView/home_page', $data);
	}
}
