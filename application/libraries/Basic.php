<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Basic {

    var $CI;

    public function __construct($params = array()) {
        $this->CI = & get_instance();
        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
        $this->CI->load->model('Query');
        date_default_timezone_set('Asia/Kolkata');
    }

    public function mpdf_load($param = NULL){
        include_once APPPATH . '/third_party/mpdf/mpdf.php';
        if ($params == NULL) {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';
        }
        return new mPDF();
    }

    public function loader() {
        $this->CI->load->library(array('session', 'user_agent'));
        $this->CI->load->helper(array('url', 'form', 'file'));
        $this->CI->load->model('Query');
    }

    function checklogin() {
        $this->CI->load->library('session');
        $chk = $this->CI->Query->select('*', 'role_ab_user', ['role_ab_user_id' => $this->CI->session->userdata('newsite_id')], 'count');
        if ($chk != 1) {
            redirect(base_url('Auth/Login'));
        }
    }

    function header($module_id = 0, $pagename = "") {
        $data['page'] = $data['title'] = '';
        if ($pagename != '') {
            if (is_array($pagename)) {
                $data['page'] = $pagename[0];
                $data['title'] = $pagename[1];
            } else {
                $data['page'] = $pagename;
                $data['title'] = $pagename;
            }
        }

        if ($module_id != "" && $module_id != 0) {
            $module = $this->CI->Query->select('*', 'role_bb_module', ['role_bb_module_id' => $module_id], 'row');
            $sub_category_id = $module->role_ba_category_id;
            $data['side_menus'] = menu_builder($module_id, $sub_category_id);
        } else {
            $data['side_menus']="";
        }

        $data['basic_details'] = $this->CI->Query->select('*', 'basic_details', ['school_aa_id' => $this->CI->session->userdata('newsite_id')], 'row');
        $data['admin'] = $this->CI->Query->select('*', 'role_ab_user', ['role_ab_user_id' => $this->CI->session->userdata('newsite_user')], 'row');
        $data['msg'] = $this->CI->session->flashdata('msg');
        $data['menus'] = menu_builder($module_id);

        $this->CI->load->view('auth/basic/head_vertical', $data);
        $this->CI->load->view('auth/basic/header_vertical', $data);
    }

    function header_horizontal($module_id = 0, $pagename = "") {
        $data['page'] = $data['title'] = '';
        if ($pagename != '') {
            if (is_array($pagename)) {
                $data['page'] = $pagename[0];
                $data['title'] = $pagename[1];
            } else {
                $data['page'] = $pagename;
                $data['title'] = $pagename;
            }
        }
        $data['basic_details'] = $this->CI->Query->select('*', 'school_aa_basic_details', ['school_aa_id' => $this->CI->session->userdata('newsite_id')], 'row');
        $data['msg'] = $this->CI->session->flashdata('msg');
        $data['menus'] = menu_builder($module_id);

        $this->CI->load->view('auth/basic/head', $data);
        $this->CI->load->view('auth/basic/header', $data);
    }

    function footer($module_id = '', $page = '1') {
        if ($module_id != "" && $module_id != 0) {
            $module = $this->CI->Query->select('*', 'role_bb_module', ['role_bb_module_id' => $module_id], 'row');
            $sub_category_id = $module->role_ba_category_id;
            $data['side_menus'] = menu_builder($module_id, $sub_category_id);
//            print_r('<pre>');
//            print_r($data['side_menus']);
//            print_r('</pre>');
//            die;
//            $this->CI->load->view('auth/basic/sidebar', $data);
        } else {
//            $this->CI->load->view('auth/basic/sidebar_common');
        }
        $this->CI->load->view('auth/basic/footer');
    }

    function reload_scripts() 
    {
        $this->CI->load->view('auth/basic/reload_scripts');
    }


    function footer_horizontal($module_id = '', $page = '1') {
        if ($module_id != "" && $module_id != 0) {
            $module = $this->CI->Query->select('*', 'role_bb_module', ['role_bb_module_id' => $module_id], 'row');
            $sub_category_id = $module->role_ba_category_id;
            $data['side_menus'] = menu_builder($module_id, $sub_category_id);
//            print_r('<pre>');
//            print_r($data['side_menus']);
//            print_r('</pre>');
//            die;
            $this->CI->load->view('auth/basic/sidebar', $data);
        } else {
            $this->CI->load->view('auth/basic/sidebar_common');
        }
        $this->CI->load->view('auth/basic/footer');
    }

    function footer_dashboard() {
        $this->CI->load->view('auth/basic/footer_dashboard');
    }

    function refer() {
        redirect($this->CI->agent->referrer());
    }

    function flash($msg = '') {
        $this->CI->session->set_flashdata('msg', $msg);
    }

    function clean($string) {
        $string1 = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string1); // Removes special chars.
    }

    public function file_upload($file_path, $file_name) 
    {
        $new_name = '';
        $new_name = mt_rand(111111, 999999) . $file_name;
        $config['file_name'] = $new_name;
        $config['upload_path'] = 'asset/site_images/' . $file_path;
        // $config['allowed_types']  = '*';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf|docx|mp4|gif';
        //  $config['max_size'] = 100;
        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload($file_name)) {
            $error = $this->CI->upload->display_errors();
            $new_name = '';
            return '';
            exit;
        } else {
            $upload_data = $this->CI->upload->data();
            $new_name = '';
            return $config['upload_path'] . '/' . $upload_data['file_name'];
        }
    }

    public function do_pagination($url, $segment, $total, $per_page = 10, $qry = '', $qry2 = '') {
        $config = array();
        $config["base_url"] = $url;
        $config["total_rows"] = $total;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $segment;
        $config["num_links"] = 5;
        $config['reuse_query_string'] = FALSE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li id="1">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#" >';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['page_query_string'] = FALSE;
//        $config['suffix'] = '?search=' . $qry;
        $config['reuse_query_string'] = TRUE;
//        if (count($_GET) > 0)
//            $config['suffix'] = '?' . http_build_query($_GET, '', "&");
        $this->CI->pagination->initialize($config);
        return $page = ($this->CI->uri->segment($segment)) ? $this->CI->uri->segment($segment) : 0;
    }

    public function create_links($url = "", $total = NULL, $per_page = 10, $segment = NULL) {
        $url = base_url('Auth/' . $url . '/' . $per_page);
        $limit = $per_page;
        $page = $this->do_pagination($url, $segment, $total, $limit);
        return $array = array(
            'total_rec' => $total,
            'num_records' => $per_page,
            'per_page' => $per_page,
            'page' => $page,
            'links' => $this->CI->pagination->create_links()
        );
    }

}
