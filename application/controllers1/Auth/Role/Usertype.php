<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usertype extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }

    public function index($per_page = 30) {
        $mid = 1;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $data['basic_details'] = $this->Query->select('*', 'site_ab_basic_details', ['school_aa_id' => school_aa_id()], 'row');

        /* PAGINATE */
        $total = $this->Query->select('*', 'role_aa_usertype', ['role_aa_usertype_show' => 'Yes'], 'count');
        $paginate = $this->basic->create_links('Role/Usertype/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_aa_usertype', ['role_aa_usertype_show' => 'Yes'], 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/usertype/usertype_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function search($per_page = 30) {
        $mid = 1;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $search_value = $this->input->get('search');
        $data['basic_details'] = $this->Query->select('*', 'site_ab_basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $search = 'role_aa_usertype_show = "Yes" and role_aa_usertype_name like "%' . $search_value . '%"';
        /* PAGINATE */
        $total = $this->Query->select('*', 'role_aa_usertype', $search, 'count');
        $paginate = $this->basic->create_links('Role/Usertype/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_aa_usertype', $search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/usertype/usertype_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function insert() {
        $array = [
            'role_aa_usertype_name' => $this->input->post('usertype_name'),
            'role_aa_usertype_status' => $this->input->post('status'),
            'role_aa_usertype_show' => 'Yes'
        ];
        $qry = $this->Query->insert('role_aa_usertype', $array);
        if ($qry == TRUE) {
            set_msg('Usertype Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function edit($ce_id) {
        $data['values'] = $this->Query->select('*', 'role_aa_usertype', ['role_aa_usertype_id' => $ce_id], 'row');
        $this->load->view('auth/role/usertype/usertype_edit', $data);
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
            set_msg('Usertype Updated Successfully', 'S');
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
            set_msg('Usertype Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

}

?>