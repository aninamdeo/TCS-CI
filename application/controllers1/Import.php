<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('basic');
        // error_reporting(0);
    $this->basic->loader();
  }

  public function index() {

  }

  public function check_contact() {
    $id = $this->input->get('uid');
    $chk= $this->Query->select('*','imported_contact',['device_id'=>$id],'row');
    if(count((array)$chk)>0){
      echo "Exist";
    }else{
      echo "No Available";
    }

  }
  public function import_contact() {
    $name= $this->input->get('name');
    $phone= $this->input->get('phone');
    $id = $this->input->get('uid');
    $array = [
      'device_id' => $id,
      'name' => $name,
      'contact'=>$phone
    ];
    $this->Query->insert('imported_contact', $array);
  }

  public function fcmtoken($id) {
    $token= $this->input->get('token');
    $array = [
      'device_id' => $id,
      'fcm_tokens' => $token,
      'date' => date('Y-m-d')
    ];
    $chk= $this->Query->select('*','fcm_token',['device_id'=>$id],'row');
    if(count((array)$chk)>0){
     $this->Query->update('fcm_token',['device_id'=>$id],['fcm_tokens'=>$token,'date' => date('Y-m-d')]);
    }else{
      $this->Query->insert('fcm_token', $array);
    }
    
  }

}
