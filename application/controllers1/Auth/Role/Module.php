<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Module extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }

    public function index($per_page = 30) {
        $mid = 4;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');

        /* PAGINATE */
        $total = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type'=>'main_category'], 'count');
        $paginate = $this->basic->create_links('Role/Module/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type'=>'main_category'], 'result',['role_ba_category.role_ba_category_ordering'=>'asc'], [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/module/module_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function search($per_page = 30) {
        $mid = 4;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $search_value=$this->input->get('search');
        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $search ='role_ba_category_type = "main_category" and (role_ba_category_name like"%' .$search_value. '%")';
        /* PAGINATE */
        $total = $this->Query->select('*', 'role_ba_category', $search, 'count');
        $paginate = $this->basic->create_links('Module/index/', $total, $per_page, 5);
        $data['links'] = $paginate['links'];
        $search ='role_ba_category.role_ba_category_type = "main_category" and (role_ba_category.role_ba_category_name like"%' .$search_value. '%")';
        $select = "role_ba_category.*,site_ad_page.*";
        $join_arr= [
            ['site_ad_page','role_ba_category.role_ba_category_pagelink=site_ad_page.site_ad_page_id','left']
        ];
        $data['values'] = $this->Query->join($select,'role_ba_category',$join_arr,$search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */

        $data['pages'] = $this->Query->select('*', 'site_ad_page');
        $this->load->view('auth/role/module/module_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function create_module($ce_id) {
        $data['sub_category'] = $this->Query->select('*', 'role_ba_category', ['role_ba_category_id' => $ce_id], 'row');
        $data['category'] = $this->Query->select('*', 'role_ba_category', ['role_ba_category_id' => $data['sub_category']->role_ba_category_main_id],'row');
        $this->load->view('auth/role/module/create_module', $data);
    }

    public function insert($cat_id) {
        $array = [
            'role_bb_module_name' => $this->input->post('module_name'),
            'role_bb_module_status' => $this->input->post('status'),
            'role_bb_module_link' => $this->input->post('link'),
            'role_bb_module_view_permit' => $this->input->post('view'),
            'role_bb_module_add_permit' => $this->input->post('add'),
            'role_bb_module_edit_permit' => $this->input->post('edit'),
            'role_bb_module_delete_permit' => $this->input->post('delete'),
            'role_ba_category_id' => $cat_id
        ];
        $qry = $this->Query->insert('role_bb_module', $array);
        if ($qry == TRUE) {
            set_msg('Module Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function edit($ce_id) {
        $data['values'] = $this->Query->select('*', 'role_bb_module', ['role_bb_module_id' => $ce_id], 'row');
        $this->load->view('auth/role/module/module_edit', $data);
    }

    public function update($ce_id) {
        $array = [
            'role_bb_module_name' => $this->input->post('module_name'),
            'role_bb_module_status' => $this->input->post('status'),
            'role_bb_module_view_permit' => $this->input->post('view'),
            'role_bb_module_add_permit' => $this->input->post('add'),
            'role_bb_module_edit_permit' => $this->input->post('edit'),
            'role_bb_module_delete_permit' => $this->input->post('delete'),
            'role_bb_module_link' => $this->input->post('link')
        ];
        $qry = $this->Query->update('role_bb_module', ['role_bb_module_id' => $ce_id], $array);
        if ($qry == TRUE) {
            set_msg('Module Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function delete($ce_id) {
        $array = [
            'role_bb_module_id' => $ce_id
        ];
        $qry = $this->Query->delete('role_bb_module', $array);
        if ($qry == TRUE) {
            set_msg('Module Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }




}

?>