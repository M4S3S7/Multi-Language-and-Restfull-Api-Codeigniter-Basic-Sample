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
  public function sef_link($string){
    $cevir  = array("ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ğ", "Ğ", "İ", ".", ":");
    $deneme = array("s", "s", "i", "u", "u", "o", "o", "c", "c", "g", "g", "i", ".", "-");
    $string = str_replace($cevir, $deneme, $string);
    $string = trim($string);
    $string = html_entity_decode($string);
    $string = strip_tags($string);
    $string = strtolower($string);
    $string = preg_replace('~[^ a-z0-9_.]~', ' ', $string);
    $string = preg_replace('~ ~', '-', $string);
    $string = preg_replace('~-+~', '-', $string);
    return $string;
  }
}
