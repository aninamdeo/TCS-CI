<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }

    public function index($per_page = 30) {
        $mid = 2;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $data['basic_details'] = $this->Query->select('*', 'site_ab_basic_details', ['school_aa_id' => school_aa_id()], 'row');

        $select = 'role_ab_user.*,role_aa_usertype.*';
        $join = [
            ['role_aa_usertype','role_ab_user.role_aa_usertype_id=role_aa_usertype.role_aa_usertype_id','left']
        ];
        /* PAGINATE */
        $total = $this->Query->join($select, 'role_ab_user',$join,'', 'count');
        $paginate = $this->basic->create_links('Role/User/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->join($select, 'role_ab_user',$join,'', 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $data['usertypes'] = $this->Query->select('*', 'role_aa_usertype');
        $this->load->view('auth/role/user/user_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function search($per_page = 30) {
        $mid = 2;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $search_value = $this->input->get('search');
        $data['basic_details'] = $this->Query->select('*', 'site_ab_basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $search = 'role_ab_user_show = "Yes" and role_ab_user_name like "%' . $search_value . '%"';
        /* PAGINATE */
        $total = $this->Query->select('*', 'role_ab_user', $search, 'count');
        $paginate = $this->basic->create_links('Role/User/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_ab_user', $search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/user/user_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function insert() {
        $image = "";
        if ($_FILES['file1']['name'] != "") {
            $image = $this->basic->file_upload('role_user', 'file1');
        }
        $array = [
            'role_ab_user_username' => $this->input->post('username'),
            'role_ab_user_password' => encrypt($this->input->post('password')),
            'role_ab_user_status' => $this->input->post('status'),
            'role_aa_usertype_id' => $this->input->post('usertype_id'),
            'role_ab_user_name' => $this->input->post('name'),
            'role_ab_user_image' => $image,
            'school_aa_id' => school_aa_id()
        ];
        $qry = $this->Query->insert('role_ab_user', $array);
        if ($qry == TRUE) {
            set_msg('User Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function edit($ce_id) {
        $select = 'role_ab_user.*,role_aa_usertype.*';
        $join = [
            ['role_aa_usertype','role_ab_user.role_aa_usertype_id=role_aa_usertype.role_aa_usertype_id','left']
        ];
        $data['values'] =$this->Query->join($select, 'role_ab_user',$join,['role_ab_user.role_ab_user_id' => $ce_id], 'row');
        $data['usertypes'] = $this->Query->select('*', 'role_aa_usertype');
        $this->load->view('auth/role/user/user_edit', $data);
    }

    public function update($ce_id) {
        $image = $this->input->post('old_file1');
        if ($_FILES['file1']['name'] != "") {
            $image = $this->basic->file_upload('role_user', 'file1');
        }
        if($this->input->post('password')!=''){
            $password = encrypt($this->input->post('password'));
        }else{
            $password = "";
        }
        $array = [
            'role_ab_user_username' => $this->input->post('username'),
            'role_ab_user_password' => $password,
            'role_ab_user_status' => $this->input->post('status'),
            'role_aa_usertype_id' => $this->input->post('usertype_id'),
            'role_ab_user_name' => $this->input->post('name'),
            'role_ab_user_image' => $image
        ];
        $values = $this->Query->select('*', 'role_ab_user', ['role_ab_user_id' => $ce_id], 'row');
        $qry = $this->Query->update('role_ab_user', ['role_ab_user_id' => $ce_id], $array);
        if ($qry == TRUE) {
            set_msg('User Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

    public function delete($ce_id) {
        $array = [
            'role_ab_user_id' => $ce_id
        ];
        $qry = $this->Query->delete('role_ab_user', $array);
        if ($qry == TRUE) {
            set_msg('User Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

}

?>