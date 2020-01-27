<?php
/**
   * @package Contact :  CodeIgniter Multi Language Loader
   *
   * @author Mustafa Sevindi
   * Description of Multi Language Loader Hook
   */

  class MultiLanguageLoader
  {
      function initialize() {
          $ci =& get_instance();
          // load language helper
          $ci->load->helper('language');
          $siteLang = $ci->session->userdata('site_lang');
          if ($siteLang) {
              // difine all language files
              $ci->lang->load('m',$siteLang);
          } else {
              // default slanguage files
              $ci->lang->load('m','english');
          }
      }
  }
