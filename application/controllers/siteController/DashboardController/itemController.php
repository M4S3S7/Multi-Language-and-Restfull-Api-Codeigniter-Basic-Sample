<?php
class itemController extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('siteModel/dashboardModel/dashboardModel');
    $this->load->helper('string');
  }
  public function item(){
    $item = $this->dashboardModel->get('category','item','sz_item');
    $arrayData = array(
      'item'   => $item,
      'itemCh' => $item
    );
    $this->load->view('DashboardView/item_page', $arrayData);
  }
  public function itemInsert(){
    $name     = $this->input->post('name');
    $text     = $this->input->post('content');
    $sef_link = $this->dashboardModel->sef_link($name);
    if ($this->uri->segment(3) == 'i') {

      $dataInsert           = array(
        'category' => 'item',
        'name'     => $name,
        'text'     => $text,
        'sef_link' => $sef_link
      );
      $insert = $this->dashboardModel->insert('sz_item', $dataInsert);
      if($insert){
        $this->session->set_flashdata('true', 'completed');
        return redirect(base_url('/dashboard/item'));
      }else {
        $this->session->set_flashdata('err', 'not Completed');
        return redirect(base_url('/dashboard/item'));
      }
    }elseif($this->uri->segment(3) == 'update'){
      $id                          = $this->uri->segment(4);
      $config['allowed_types']     = 'jpg|gif|png';
      $config['upload_path']       = 'uploads/';
      $file_save_name              = random_string('alnum', 16);
      $config['file_name']         = $file_save_name.".jpg";
      $this->load->library("upload", $config);
      if($this->upload->do_upload('file')){
        $dataArray                 = array(
          'category' => 'item',
          'name'     => $name,
          'image'    => $file,
          'text'     => $text,
          'sef_link' => $sef_link
        );
        $update = $this->dashboardModel->update($id, 'sz_item', $dataArray);
        if ($insert) {
          redirect(base_url('dashboard/item'));
        }
      }
    }
  }
  
}
