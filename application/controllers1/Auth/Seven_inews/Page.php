<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', 9);
class Page extends CI_Controller
{
      public function __construct()
    {
         parent::__construct();
         $this->load->library('basic');
         $this->basic->loader();
         $this->basic->checklogin();
    }
    
    public function index($per_page = 30)
    {
        $mid = 9;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
         $total = $this->Query->select('*', 'page', '', 'count');
        $paginate = $this->basic->create_links('Seven_inews/Page/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['page_data']=$this->Query->select('*','page','','','',[$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/seven_inews/admin/Page/Page',$data);
        $this->basic->footer($mid);
    }
    public function add_page()
    {
        $mid = 9;
        $data['permit'] = chk($mid, ['add']);
        $this->basic->header($mid, 'Front');
        $this->load->view('auth/seven_inews/admin/Page/Add_Page'); 
        $this->basic->footer($mid);
    }
    public function insert_page()
    {
       
        $array = array(
                      'pagename' => $this->input->post('pagename'),
                      'pagename_hindi' => $this->input->post('pagename'),
                      'pagelink_hindi' => str_replace(' ', '_', $this->input->post('pagename')),
                       'title_hindi' => $this->input->post('title_hindi'),
                      'content_hindi' => $this->input->post('cktext_hindi')
                  );
       $qry= $this->Query->insert('page',$array);
         if ($qry == TRUE) {
            set_msg('Page Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect(base_url('Auth/Seven_inews/Page'));
    }
    public function edit_page($id)
    {  
       
        $data['page_data']=$this->Query->select('*','page',['id'=>$id],'row');
        $this->load->view('auth/seven_inews/admin/Page/Edit_Page',$data);
        
    }
    public function update_page($id)
    {
        $page_data = [

                      'title_hindi' => $this->input->post('title'),
                      'content_hindi' => $this->input->post('cktext')
                      ];
        $oldlink=$this->input->post('oldlink');
        $menu_data=['pagelink'=>str_replace(' ', '_', $this->input->post('pagename'))];                         
         if($this->Query->update('page',['id'=>$id],$page_data) && $this->Query->update('menu',['pagelink'=>$oldlink], $menu_data)) {
              set_msg('Page Updated Successfully', 'S');
              redirect(base_url('Auth/Seven_inews/Page'));
          }else{
                  set_msg('Error Occured. Try Again!!', 'E');
                  redirect(base_url('Auth/Seven_inews/Page'));
          }
    }
    public function delete_page($id)
    {
       $qry = $this->Query->delete('page',['id'=>$id]);
         if ($qry == TRUE) {
            set_msg('Page Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect(base_url('Auth/Seven_inews/Page'));
    }
    
}?>