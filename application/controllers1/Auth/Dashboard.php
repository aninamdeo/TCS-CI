<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
         parent::__construct();
         $this->load->library('basic');
         $this->basic->loader();
         $this->basic->checklogin();
    }

    public function index()
    {
        $this->basic->header(0,'Dashboard');
        $data['basic_details']=$this->Query->select('*','basic_details',['school_aa_id' =>school_aa_id()],'row');
        $this->load->view('auth/dashboard/dashboard',$data);
        $this->basic->footer_dashboard();
    }
}
?>