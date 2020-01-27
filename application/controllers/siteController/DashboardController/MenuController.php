<?php
class MenuController extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/DashboardModel/dashboardModel');
  }
  public function index(){

  }
  public function menu(){
    $menuGet     = $this->dashboardModel->get('category', '', 'sz_menu');
    $menuArray   = array(
      'menu'     => $menuGet,
      'altMenu'  => $menuGet
    );
    $this->load->view('DashboardView/menu_page', $menuArray);
  }
  public function menuInsert(){
    if($this->uri->segment(3) == 'update'){
      $menuName   = $this->input->post('menu_name');
      $editor     = $this->input->post('ckeditor');
      $menuSef    = $this->dashboardModel->sef_link($menuName);
      $id         = $this->uri->segment(4);
      $updateData = array(
        'name'     => $menuName,
        'editor'   => $editor,
        'link'     => $menuSef,
        'sef_link' => $menuSef
      );
      //print_r($insertData);
      $update   = $this->dashboardModel->update($id, 'sz_menu', $insertData);
      if($update){
        redirect(base_url('/dashboard/menu'));
        $this->session->set_flashdata('true', 'Completed');
      }else {
        redirect(base_url('/dashboard/menu'));
        $this->session->set_flashdata('err', 'Problem');
      }
    }elseif($this->uri->segment(3) == 'delete'){
      $id = $this->uri->segment(4);
      $updateData = array(
        'category' => 'delete'
      );
      $delete   = $this->dashboardModel->update($id, 'sz_menu', $updateData);
      if($delete){
        redirect(base_url('/dashboard/menu'));
        $this->session->set_flashdata('true', 'Completed');
      }else {
        redirect(base_url('/dashboard/menu'));
        $this->session->set_flashdata('err', 'Problem');
      }
    }elseif($this->uri->segment(3) == 'insert'){
      $editor   = $this->input->post('menu_name');
      $menuName = $this->input->post('ckeditor');
      $menuSef  = $this->dashboardModel->sef_link($menuName);
      $id = $this->uri->segment(4);
      $insertData = array(
        'name'    => $menuName,
        'editor'  => $editor,
        'link'    => $menuSef,
        'sef_link'=> $menuSef
      );
      $insert = $this->dashboardModel->insert('sz_menu', $insertData);
      if($insert){
        redirect(base_url('/dashboard/menu'));
        $this->session->set_flashdata('true', 'Completed');
      }else {
        redirect(base_url('/dashboard/menu'));
        $this->session->set_flashdata('err', 'Not Completed');
      }
    }
  }
}
