<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News_Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }

    public function index($per_page = 30) {
        $mid = 81;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');

        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        /* PAGINATE */
        $total = $this->Query->select('*', 'role_ab_user', ['role_ab_user_status' => 'Enabled','role_aa_usertype_id'=>'4'], 'count');
        $paginate = $this->basic->create_links('Role/News_Category/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_ab_user', ['role_ab_user_status' => 'Enabled','role_aa_usertype_id'=>'4'], 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/news_category/news_category_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function search($per_page = 30) {
        $mid = 81;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');


        $search_value = $this->input->get('search');
        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $search = 'role_ab_user_show = "Yes" and role_ab_user_name like "%' . $search_value . '%"';
        /* PAGINATE */
        $total = $this->Query->select('*', 'role_ab_user', $search, 'count');
        $paginate = $this->basic->create_links('Role/News_Category/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['values'] = $this->Query->select('*', 'role_ab_user', $search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/role/news_category/news_category_add_view_delete', $data);
        $this->basic->footer($mid);
    }

    public function allot_module_news_category($user_id) {
        $mid = 81;
        $data['permit'] = chk($mid, ['add', 'view', 'edit', 'delete']);
        $this->basic->header($mid, 'Category');
        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['school_aa_id' => school_aa_id()], 'row');
        $data['categorys'] = $this->Query->select('*', 'category', ['status' => 'Enabled'], 'result');
        $data['user'] = $this->Query->select('*', 'role_ab_user', ['role_ab_user_id' =>$user_id], 'row');
        $data['user_id'] = $user_id;
        $this->load->view('auth/role/news_category/allot_module_news_category', $data);
        $this->basic->footer($mid);
    }
  
   public function insert($usertype_id) {
        $news_category = $this->Query->select('news_category_id', 'role_bd_news_category',['role_ab_user_id'=>$usertype_id], 'result');
          $categorys = $this->input->post('cat_id'); 
      if($categorys){
         for($i=0; $i <count((array)$categorys); $i++) {
              $news_category_check = $this->Query->select('news_category_id', 'role_bd_news_category',['role_ab_user_id'=>$usertype_id,'news_category_id'=>$categorys[$i]], 'row');
               if($news_category_check == NULL){
                   $array =  array(
                                      'role_ab_user_id' =>$usertype_id,
                                      'news_category_id' =>$categorys[$i]
                                  );
                  $qry = $this->Query->insert('role_bd_news_category', $array);
              }elseif($news_category_check != NULL) {
                $this->Query->delete('role_bd_news_category',['role_ab_user_id'=>$usertype_id,'role_bd_news_category_id'=>$news_category_check->role_bd_news_category_id]);
              }
           }
      }else{
         $qry =  $this->Query->delete('role_bd_news_category',['role_ab_user_id'=>$usertype_id]);
      }
        if($qry == TRUE) {
            set_msg('News Category Applied Successfully', 'S');
        }else{
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }
    public function edit($ce_id) {
        $data['values'] = $this->Query->select('*', 'role_ab_user', ['role_ab_user_id' => $ce_id], 'row');
        $this->load->view('auth/role/news_category/news_category_edit', $data);
    }

    public function update($ce_id) {
        $array = [
            'role_ab_user_name' => $this->input->post('usertype_name'),
            'role_ab_user_status' => $this->input->post('status')
        ];
        $values = $this->Query->select('*', 'role_ab_user', ['role_ab_user_id' => $ce_id], 'row');
        if ($values->role_ab_user_news_category == 'Edit') {
            $qry = $this->Query->update('role_ab_user', ['role_ab_user_id' => $ce_id], $array);
        }
        if ($qry == TRUE) {
            set_msg('News_Category Updated Successfully', 'S');
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
            set_msg('News_Category Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        $this->basic->refer();
    }

}

?>