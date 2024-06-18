<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Module_Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }

    public function index($per_page = 30) {
        $mid = 3;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');

        /* PAGINATE */
        $total = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type'=>'main_category'], 'count');
        $paginate = $this->basic->create_links('Role/Module_Category/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type'=>'main_category'], 'result',['role_ba_category_ordering'=>'asc'], [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/module_category/module_category_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function search($per_page = 30) {
        $mid = 3;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $search_value=$this->input->get('search');
        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $search ='role_ba_category_type = "main_category" and (role_ba_category_name like"%' .$search_value. '%")';
        /* PAGINATE */
        $total = $this->Query->select('*', 'role_ba_category', $search, 'count');
        $paginate = $this->basic->create_links('Module_Category/index/', $total, $per_page, 5);
        $data['links'] = $paginate['links'];
        $search ='role_ba_category.role_ba_category_type = "main_category" and (role_ba_category.role_ba_category_name like"%' .$search_value. '%")';
        $select = "role_ba_category.*,site_ad_page.*";
        $join_arr= [
            ['site_ad_page','role_ba_category.role_ba_category_pagelink=site_ad_page.site_ad_page_id','left']
        ];
        $data['values'] = $this->Query->join($select,'role_ba_category',$join_arr,$search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */

        $data['pages'] = $this->Query->select('*', 'site_ad_page');
        $this->load->view('auth/role/module_category/module_category_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function insert() {
        $array = [
            'role_ba_category_name' => $this->input->post('category_name'),
            'role_ba_category_type' => 'main_category',
            'role_ba_category_status' => $this->input->post('status'),
            'role_ba_category_ordering' => $this->input->post('ordering')
        ];
        $qry = $this->Query->insert('role_ba_category', $array);
        if ($qry == TRUE) {
            set_msg('Module Category Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function edit($ce_id) {
        $data['values'] = $this->Query->select('*', 'role_ba_category', ['role_ba_category_id' => $ce_id], 'row');
        $this->load->view('auth/role/module_category/module_category_edit', $data);
    }

    public function update($ce_id) {
        $array = [
            'role_ba_category_name' => $this->input->post('category_name'),
            'role_ba_category_status' => $this->input->post('status'),
            'role_ba_category_ordering' => $this->input->post('ordering')
        ];
        $qry = $this->Query->update('role_ba_category', ['role_ba_category_id' => $ce_id], $array);
        if ($qry == TRUE) {
            set_msg('Module Category Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function delete($ce_id) {
        $array = [
            'role_ba_category_id' => $ce_id
        ];
        $qry = $this->Query->delete('role_ba_category', $array);
        if ($qry == TRUE) {
            set_msg('Module_Category Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function create_module_sub_category($ce_id) {
        $data['values'] = $this->Query->select('*', 'role_ba_category', ['role_ba_category_id' => $ce_id], 'row');
        $data['categorys'] = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type' => 'main_category']);
        $this->load->view('auth/role/module_category/create_module_sub_category', $data);
    }

    public function insert_module_sub_category($ce_id) {
        $array = [
            'role_ba_category_name' => $this->input->post('sub_category_name'),
            'role_ba_category_type' => 'sub_category',
            'role_ba_category_status' => $this->input->post('sub_category_status'),
            'role_ba_category_ordering' => $this->input->post('sub_category_ordering'),
            'role_ba_category_main_id' => $ce_id
        ];
        $qry = $this->Query->insert('role_ba_category', $array);
        if ($qry == TRUE) {
            set_msg('Module Sub-Category Inserted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }


}

?>