<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_Details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }

    public function index($per_page = 30) {
        $mid = 6;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Basic Details');
        $data['values'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $this->load->view('auth/website/basic_details/basic_view', $data);
        $this->basic->footer($mid);
    }

    public function edit() {
        $data['values'] = $total = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $this->load->view('auth/website/basic_details/basic_edit', $data);
    }

    public function update() {
        $logo =$this->input->post('old_logo');
        $logo_other =$this->input->post('old_logo_other');
        $favicon =$this->input->post('old_favicon');
        if ($_FILES) {
            if($_FILES['logo']['name']!=''){
                $logo = $this->basic->file_upload('logo', 'logo');
            }
            if($_FILES['logo_other']['name']!=''){
                $logo_other = $this->basic->file_upload('logo', 'logo_other');
            }
            if($_FILES['favicon']['name']!=''){
                $favicon = $this->basic->file_upload('logo', 'favicon');
            }
        }
        $array = [
            'site_name' => $this->input->post('site_name'),
            'meta_key' =>$this->input->post('meta_key'),
            'meta_content' => $this->input->post('meta_content'),
            'about_us' => $this->input->post('about_us'),
            'live_tv' => $this->input->post('live_tv'),
            'email' => $this->input->post('email'),
            'email2' => $this->input->post('email2'),
            'contact' => $this->input->post('contact'),
            'contact2' => $this->input->post('contact2'),
            'address' => $this->input->post('address'),
            'logo' => $logo,
            'logo_other' => $logo_other,
            'icon' => $favicon
        ];
        $qry = $this->Query->update('basic_details',['school_aa_id' => 1], $array);
        if ($qry == TRUE) {
            set_msg('Details Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

}

?>