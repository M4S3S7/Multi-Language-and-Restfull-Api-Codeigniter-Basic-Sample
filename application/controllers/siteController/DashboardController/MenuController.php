<?php
class MenuController extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/DashboardModel/dashboardModel');
  }
  public function index(){

  }
  public function menu(){
    $menuGet = $this->dashboardModel->get('category', '', 'sz_menu');
    print_r($menuGet);
  }
}
