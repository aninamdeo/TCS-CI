<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
    }

    function checklogin() {
        if ($this->session->userdata('newsite_user') != NULL && $this->session->userdata('newsite_id') != NULL) {
            redirect(base_url('Auth/Dashboard'));
        }
    }

    public function index() {
        $this->checklogin();
        $data['basics'] = $this->Query->select('*', 'basic_details', '', 'row');
        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('auth/login/login', $data);
    }

    public function verifylogin() {
        $admin = $this->Query->select('*', 'role_ab_user', ['role_ab_user_username' => $this->input->post('username')], 'row');
        // echo decrypt($admin->role_ab_user_password);die;
        if (count((array)$admin) > 0) {
            if ($this->input->post('password') === $admin->role_ab_user_password) {
                $this->session->set_userdata('newsite_user', $admin->role_ab_user_id);
                $this->session->set_userdata('newsite_id', $admin->school_aa_id);
                $this->session->set_userdata('newsite_usertype', $admin->role_aa_usertype_id);
                set_msg("Logged in Successfully");
                redirect(base_url('Auth/Dashboard'));
            } else {
                $this->session->unset_userdata('newsite_user');
                $this->session->unset_userdata('newsite_id');
                $this->session->unset_userdata('newsite_usertype');
                $this->session->unset_userdata('newsite_session_id');
                set_msg("Username or Password Mismatch");
                redirect($this->agent->referrer());
            }
        } else {
            set_msg("Username doesnot exists");
            redirect($this->agent->referrer());
        }
    }

    public function logout() {
        $this->session->unset_userdata('newsite_user');
        $this->session->unset_userdata('newsite_id');
        $this->session->unset_userdata('newsite_usertype');
         $this->session->unset_userdata('newsite_session_id');
        $this->session->unset_userdata('base_url', base_url());
        set_msg("User Logout Successfully");
        redirect(base_url('Auth/Login'));
    }

}

?>