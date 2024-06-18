<?php

defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', '66');


class Sub_Category extends CI_Controller
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
        $mid=68;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid);
          $total = $this->Query->select('*', 'sub_category','', 'count');
        $paginate = $this->basic->create_links('Seven_inews/Sub_Category/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['sub_category']=$this->Query->select('*','sub_category','','',['sub_ordering'=>'asc'],[$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/seven_inews/admin/Sub_Category/Sub_Category',$data);
        $this->basic->footer($mid);
    }
    // public function add_sub_category1()
    // {
    //     $mid=61;
    //     $this->basic->header($mid);
    //     $data['category']=$this->Query->select('*','category',['type'=>'Category'],'',['id'=>'desc']);
    //     $this->load->view('auth/seven_inews/admin/Sub_Category/Add_Sub_Category',$data);
    //     $this->basic->footer($mid);
    // }

    public function add_sub_category()
    {
        $mid=mid;
        $data['permit'] = chk($mid, ['add']);
        $this->basic->header($mid);
        $data['category']=$this->Query->select('*','category',['type'=>'Category','status'=>'Enabled'],'',['id'=>'asc']);
        $data['sub_category']=$this->Query->select('*','sub_category','','result',['sub_ordering'=>'desc']);
        $this->load->view('auth/seven_inews/admin/Sub_Category/Add_Sub_Category',$data);
        $this->basic->footer($mid);
    }
    public function insert_sub_category()
    {
        $array = array( 
            'sub_category_name' => $this->input->post('sub_cat_name'), 
            'sub_category_link' => preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('sub_category_link'))),                   
            'cat_id' => $this->input->post('cat_id'), 
            'sub_ordering'=>$this->input->post('sub_ordering'),
            'meta_title' => $this->input->post('meta_title'),                   
            'meta_key' => $this->input->post('meta_key'),                   
            'meta_content' => $this->input->post('meta_content'),                   
            'status'=>$this->input->post('status')
        );
        $qry = $this->Query->insert('sub_category',$array);
     // $this->Query->insert('sub_category',$array2);
       if ($qry == TRUE) {
            set_msg('Sub Category Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/Sub_Category/add_sub_category');
    }
 public function edit_sub_category($id)
  {  
     $data['category']=$this->Query->select('*','category',['type'=>'Category']);
     $data['sub_category']=$this->Query->select('*','sub_category',['sub_category_id'=>$id],'row');
     $this->load->view('auth/seven_inews/admin/Sub_Category/Edit_Sub_Category',$data);
  }
public function update_sub_category($id)
{
    $Sub_Category_data = [
                        'sub_category_name' => $this->input->post('sub_cat_name'),                   
                        'sub_category_link' => preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('sub_category_link'))),                   
                        'cat_id'=>$this->input->post('cat_id'),                 
                        'sub_ordering'=>$this->input->post('ordering'),  
                        'meta_title' => $this->input->post('meta_title'),                   
                        'meta_key' => $this->input->post('meta_key'),                   
                        'meta_content' => $this->input->post('meta_content'),                 
                        'status'=>$this->input->post('status')
                    ];
    if ($this->Query->update('sub_category',['sub_category_id'=>$id],$Sub_Category_data))
    {
        set_msg('Sub Category Updated Successfully', 'S');
         $this->basic->refer();
    }else{
        set_msg('Error Occured. Try Again!!', 'E');
        $this->basic->refer();
    }    

}
public function delete_sub_category($id)
{
   $qry = $this->Query->delete('sub_category',['sub_category_id'=>$id]);
   if ($qry == TRUE) {
            set_msg('Sub Category Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
     $this->basic->refer();

}   

}

?>