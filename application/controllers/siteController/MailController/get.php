<?php

class get Extends CI_Controller{

  public function __construct(){
    parent::__construct();

  }
  public function getMail(){
    $mbox = imap_open("{imap.yandex.com}", "m.sevindi@sezginmarble.com", "asd123", OP_HALFOPEN)
          or die("bağlanılamadı: " . imap_last_error());

    $list = imap_list($mbox, "{imap.yandex.com}", "*");
    if (is_array($list)) {
        foreach ($list as $val) {
            echo imap_utf7_decode($val) . "\n";
        }
    } else {
        echo "imap_list başarısız oldu: " . imap_last_error() . "\n";
    }

    imap_close($mbox);
  }
}
