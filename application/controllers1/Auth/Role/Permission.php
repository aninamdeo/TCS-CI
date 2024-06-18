<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }

    public function index($per_page = 30) {
        $mid = 5;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');

        /* PAGINATE */
        $total = $this->Query->select('*', 'role_aa_usertype', ['role_aa_usertype_show' => 'Yes'], 'count');
        $paginate = $this->basic->create_links('Role/Permission/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_aa_usertype', ['role_aa_usertype_show' => 'Yes'], 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/permission/permission_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function search($per_page = 30) {
        $mid = 5;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $search_value = $this->input->get('search');
        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $search = 'role_aa_usertype_show = "Yes" and role_aa_usertype_name like "%' . $search_value . '%"';
        /* PAGINATE */
        $total = $this->Query->select('*', 'role_aa_usertype', $search, 'count');
        $paginate = $this->basic->create_links('Role/Permission/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_aa_usertype', $search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/permission/permission_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function allot_module_permission($usertype_id) {
        $mid = 5;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $data['categorys'] = $this->Query->select('*', 'role_ba_category', ['role_ba_category_type' => 'main_category'], 'result', ['role_ba_category_ordering' => 'asc']);
        $data['usertype_id'] = $usertype_id;
        $this->load->view('auth/role/permission/allot_module_permission', $data);
        $this->basic->footer($mid);
    }

    public function allot_module_permission_search($usertype_id) {
        $mid =5;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');

        $select = "sub_category.*,category.role_ba_category_id as category_id,category.role_ba_category_name as category_name,category.role_ba_category_status as category_status";
        $join = [
            ['role_ba_category category', 'sub_category.role_ba_category_main_id=category.role_ba_category_id', 'left']
        ];
        $data['values'] = $this->Query->join($select, 'role_ba_category sub_category', $join, ['sub_category.role_ba_category_type' => 'sub_category'], 'result', ['category.role_ba_category_ordering'=>'asc']);

        $data['usertype_id'] = $usertype_id;
        $this->load->view('auth/role/permission/allot_module_permission_search', $data);
        $this->basic->footer($mid);
    }

    public function insert($usertype_id) {
        $modules = $this->Query->select('*', 'role_bb_module', '', 'result');
        foreach ($modules as $module) {
            $chk = $this->Query->select('*', 'role_bc_permission', ['role_aa_usertype_id' => $usertype_id, 'role_bb_module_id' => $module->role_bb_module_id], 'count');
            $array = '';
            if ($module->role_bb_module_view_permit == 1) {
                $array['role_bc_permission_view'] = $this->input->post('view' . $module->role_bb_module_id);
            }else{
                $array['role_bc_permission_view'] =0;
            }
            if ($module->role_bb_module_add_permit == 1) {
                $array['role_bc_permission_add'] = $this->input->post('add' . $module->role_bb_module_id);
            }else{
                $array['role_bc_permission_add'] =0;
            }
            if ($module->role_bb_module_edit_permit == 1) {
                $array['role_bc_permission_edit'] = $this->input->post('edit' . $module->role_bb_module_id);
            }else{
                $array['role_bc_permission_edit'] =0;
            }
            if ($module->role_bb_module_delete_permit == 1) {
                $array['role_bc_permission_delete'] = $this->input->post('delete' . $module->role_bb_module_id);
            }else{
                $array['role_bc_permission_delete'] =0;
            }
            if ($chk > 0) {
                //update
                $qry = $this->Query->update('role_bc_permission', ['role_aa_usertype_id' => $usertype_id, 'role_bb_module_id' => $module->role_bb_module_id], $array);
            } else {
                //insert
                $array['role_aa_usertype_id'] = $usertype_id;
                $array['role_bb_module_id'] = $module->role_bb_module_id;

                $qry = $this->Query->insert('role_bc_permission', $array);
            }

        }

        if ($qry == TRUE) {
            set_msg('Permission Applied Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function edit($ce_id) {
        $data['values'] = $this->Query->select('*', 'role_aa_usertype', ['role_aa_usertype_id' => $ce_id], 'row');
        $this->load->view('auth/role/permission/permission_edit', $data);
    }

    public function update($ce_id) {
        $array = [
            'role_aa_usertype_name' => $this->input->post('usertype_name'),
            'role_aa_usertype_status' => $this->input->post('status')
        ];
        $values = $this->Query->select('*', 'role_aa_usertype', ['role_aa_usertype_id' => $ce_id], 'row');
        if ($values->role_aa_usertype_permission == 'Edit') {
            $qry = $this->Query->update('role_aa_usertype', ['role_aa_usertype_id' => $ce_id], $array);
        }
        if ($qry == TRUE) {
            set_msg('Permission Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function delete($ce_id) {
        $array = [
            'role_aa_usertype_id' => $ce_id
        ];
        $qry = $this->Query->delete('role_aa_usertype', $array);
        if ($qry == TRUE) {
            set_msg('Permission Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

}

?>