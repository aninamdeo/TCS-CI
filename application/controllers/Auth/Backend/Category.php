<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', '61');

class Category extends CI_Controller
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
         $mid=62;
         $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
         $this->basic->header($mid, 'Front');
         $total = $this->Query->select('*', 'category','', 'count');
        $paginate = $this->basic->create_links('Backend/Category/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['category']=$this->Query->select('*','category','','',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/backend/admin/Category/Category',$data);
        $this->basic->footer($mid);
    }
      public function search($per_page = 30) {
        $mid = 62;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $search_value = $this->input->get('search');
        $search = '(cat_name like"' . $search_value . '") or (ordering ="' . $search_value . '") or (cat_name_hindi like"' . $search_value . '")  ';
        /* PAGINATE */
        $total = $this->Query->select('*', 'category',$search, 'count');
        $paginate = $this->basic->create_links('Backend/Category/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['category']=$this->Query->select('*','category',$search,'',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/backend/admin/Category/Category',$data);
        $this->basic->footer($mid);
    }
    public function add_category()
    {
        $mid=mid;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Category');
        $this->load->view('auth/backend/admin/Category/Add_Category');
        $this->basic->footer($mid);
    }
    public function insert_category()
    {
        // if($_FILES['image']['name']!="")
        // {
        //     $image=$this->basic->file_upload('Category_Images','image');
        // }
        // else{
        //     $image = '';
        // }
        $array = array( 
                        'cat_name' => preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('cat_name_link'))),                   
                        'cat_name_hindi' => $this->input->post('cat_name_hindi'),                   
                        'meta_title' => $this->input->post('meta_title'),                   
                        'meta_key' => $this->input->post('meta_key'),                   
                        'meta_content' => $this->input->post('meta_content'),                   
                        // 'image'=>$image,    
                        'cat_id'=>1,               
                        'ordering'=>$this->input->post('ordering'),                  
                        'status'=>$this->input->post('status'),
                        'top_menu'=>$this->input->post('top_menu'),
                        'type'=>$this->input->post('type')
                      );
        
      $qry =  $this->Query->insert('category',$array);
         if ($qry == TRUE) {
            set_msg('Category Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('backend/Category/add_category');
    }
    public function edit_category($id)
    {  
        $data['category']=$this->Query->select('*','category',['id'=>$id],'row');
        $this->load->view('auth/backend/admin/Category/Edit_Category',$data);
    }
    public function update_Category($id)
    {
        // if($_FILES['image']['name']!="")
        // {
        //     $image=$this->basic->file_upload('Category_Images','image');
        // }elseif($this->input->post('old_image') !='')
        // {
        //     $image=$this->input->post('old_image');
        // }
        $category_data = [  
                            'cat_name' => preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('cat_name_link'))),                   
                            'cat_name_hindi' => $this->input->post('cat_name_hindi'),
                            // 'image'=>$image,     
                            'meta_title' => $this->input->post('meta_title'),                   
                            'meta_key' => $this->input->post('meta_key'),                   
                            'meta_content' => $this->input->post('meta_content'),              
                            'ordering'=>$this->input->post('ordering'),                  
                            'status'=>$this->input->post('status'),
                            'top_menu'=>$this->input->post('top_menu'),
                            'type'=>$this->input->post('type')
                        ];
        if ($this->Query->update('category',['id'=>$id],$category_data))
            {
               set_msg('Category Updated Successfully', 'S');
               redirect('backend/Category/');
            }else{
                    set_msg('Error Occured. Try Again!!', 'E');
                    redirect('backend/Category/');
            } 
    }
    public function delete_category($id)
    {
        $qry= $this->Query->delete('category',['id'=>$id]);
         if ($qry == TRUE) {
            set_msg('Category Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('backend/Category/');
    }    
    public function subcategory($cid,$per_page = 30)
    {
         $mid=62;
         $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
         $this->basic->header($mid, 'Front');
         $total = $this->Query->select('*', 'sub_category',['cat_id'=>$cid], 'count');
         $paginate = $this->basic->create_links('Backend/Category/subcategory/'.$cid.'/', $total, $per_page,7);
         $data['links'] = $paginate['links'];
         $data['sub_category']=$this->Query->select('*','sub_category',['cat_id'=>$cid],'',['sub_ordering'=>'asc'],[$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/backend/admin/Category/category_wise_subcategory',$data);
        $this->basic->footer($mid);

    }
     public function news($id,$per_page = 30)
    {
        $mid=65;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $data['language']='';
        $this->basic->header($mid,'News');
        $data['cid'] = $id;
        if($id == '1'){
            $total = $this->Query->select('*', 'news_details',['top_news'=>'Yes'], 'count');
            $paginate = $this->basic->create_links('Backend/News_Desp/news/'.$id.'/', $total, $per_page,7);
            $data['links'] = $paginate['links'];
            $data['News_Desp'] = $total = $this->Query->select('*','news_details',['top_news'=>'Yes'], 'result',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
       }else{
            $total = $this->Query->select('*', 'news_details',['cat_id'=>$id], 'count');
            $paginate = $this->basic->create_links('Backend/News_Desp/news/'.$id.'/', $total, $per_page,7);
            $data['links'] = $paginate['links'];
            $data['News_Desp'] = $total = $this->Query->select('*','news_details',['cat_id'=>$id], 'result',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
         }
        $this->load->view('auth/backend/admin/Category/category_wise_news',$data);
        $this->basic->footer($mid);
    }
    
     public function search1($id,$per_page = 30) {
        $mid = 65;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
          $data['cid'] = $id;
        if($id== '1'){
        $search_value = $this->input->get('search');
        $search = '(top_news = "Yes") and (title_hindi like"%' . $search_value . '%") ';
        $total = $this->Query->select('*', 'news_details', $search, 'count');
        $paginate = $this->basic->create_links('Backend/News_Desp/news/'.$id.'/', $total, $per_page,7);
        $data['links'] = $paginate['links'];
        $data['News_Desp'] = $total = $this->Query->select('*', 'news_details', $search, 'result',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
     }else{
           $search_value = $this->input->get('search');
            $search = '(cat_id = "'.$id.'") and (title_hindi like"%' . $search_value . '%") ';
            $total = $this->Query->select('*', 'news_details', $search, 'count');
            $paginate = $this->basic->create_links('Backend/News_Desp/news/'.$id.'/', $total, $per_page,7);
            $data['links'] = $paginate['links'];
            $data['News_Desp'] = $total = $this->Query->select('*', 'news_details', $search, 'result',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
       }
         $this->load->view('auth/backend/admin/Category/category_wise_news',$data);
         $this->basic->footer($mid);
    }
    public function add_news($id)
    {
        $mid=mid;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $data['cid']=$id;
        $data['category']=$this->Query->select('*','category',['status'=>'Enabled'],'result');
      $data['sub_cat']=$this->Query->select('*','sub_category',['status'=>'Enabled','cat_id'=>$id]);
        // var_dump($data['category']);die;
        $this->load->view('auth/backend/admin/Category/Add_News',$data);
        $this->basic->footer($mid);
    }
}
?>