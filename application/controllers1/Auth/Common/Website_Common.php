<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecom_Common extends CI_Controller
{
    public function __construct()
    {
         parent::__construct();
         $this->load->library('basic');
         $this->basic->loader();
         $this->basic->checklogin();
    }

    public function get_product_sub_category($category_id)
    {
        
    }
}
?>