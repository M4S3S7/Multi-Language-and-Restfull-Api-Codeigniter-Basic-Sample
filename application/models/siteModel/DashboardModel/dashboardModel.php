<?php

class DashboardModel extends CI_Model{

  public function __construct(){
    parent::__construct();
  }
  public function get($cloumn, $cloumnData, $data){
    return $this->db->where($cloumn, $cloumnData)->order_by('id', 'ASC')->get($data)->result();
  }
  public function insert($tbl, $data){
    return $this->db->insert($tbl, $data);
  }
  public function update($id, $tbl, $data){
    return $this->db->where('id', $id)->update($tbl, $data);
  }
}
