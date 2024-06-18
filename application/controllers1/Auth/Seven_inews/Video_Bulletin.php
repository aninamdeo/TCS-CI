<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', '84');
class Video_Bulletin extends CI_Controller
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
        $mid = 84;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $total = $this->Query->select('*','video_bulletin','', 'count');
        $paginate = $this->basic->create_links('Seven_inews/Video_Bulletin/video/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['Video_bulletin_data']=$this->Query->select('*','video_bulletin','','',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/seven_inews/admin/Video_Bulletin/view_bulletin',$data);
        $this->basic->footer($mid);
    }
    public function add_bulletin()
  {
        $mid = 84;
        $data['permit'] = chk($mid, ['add']);
        $this->basic->header($mid, 'Front');
        $this->load->view('auth/seven_inews/admin/Video_Bulletin/add_bulletin'); 
        $this->basic->footer($mid);
    }
  public function search($per_page = 30) {
        $mid = 84;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $search_value = $this->input->get('search');
        $search = '(title_hindi like"%' . $search_value . '%") or (ordering like"%' . $search_value . '%") ';
        $total = $this->Query->select('*', 'video_bulletin', $search, 'count');
        $paginate = $this->basic->create_links('Seven_inews/Video_Bulletin/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['Video_Bulletin_data'] = $total = $this->Query->select('*', 'video_bulletin', $search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/seven_inews/admin/Video_Bulletin/video_bulletin',$data);
        $this->basic->footer($mid);
    }
    public function insert_bulletin()
    {
       if($_FILES['image']['name']!="")
        {
            $image=$this->basic->file_upload('video_bulletin/image','image');
        }else{
            $image = '';
        }
         $vtype = $this->input->post('vtype');
        if($this->input->post('vtype') == 'Youtube')
        {
           $video = $this->input->post('video_link');
       }elseif($this->input->post('vtype') == 'Video'){
        $video=$this->basic->file_upload('video_bulletin','video');            
       }else{
        $video = '';
       }
       
        $array = array( 
                        'image' => $image,
                        'video' => $video,
                        'title' => $this->input->post('title'),
                        'title_hindi' => $this->input->post('title_hindi'),
                        'short_description' => $this->input->post('short_description'),
                          'link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('link'))),
                        'type'=>$vtype,
                         'date'=> date('Y-m-d',strtotime($this->input->post('date'))),
                         'time'=>$this->input->post('time'),
                        'title_share' => $this->input->post('title_share'),
                        'meta_key' => $this->input->post('meta_key'),
                        'meta_content' => $this->input->post('meta_content')
                        // 'ordering' => $this->input->post('ordering')                    
                      );
       $qry= $this->Query->insert('video_bulletin',$array);
         if ($qry == TRUE) {
            set_msg('Video Bulletin Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/Video_Bulletin/video');
    }
    public function edit_bulletin($id)
    {  
        $mid = 84;
        $data['permit'] = chk($mid, ['edit']);
        $data['video']=$this->Query->select('*','video_bulletin',['id'=>$id],'row');
        $this->load->view('auth/seven_inews/admin/Video_Bulletin/edit_bulletin',$data);
    }
    public function update_bulletin($id)
    {
        $bulletin =$this->Query->select('*','video_bulletin',['id'=>$id]);
        if($_FILES['image']['name']!="")
        {
            $image=$this->basic->file_upload('video_bulletin/image','image');
        }elseif($this->input->post('old_image') !='')
        {
            $image=$this->input->post('old_image');
        }else{
             $image='';
        }
       
        $vtype = $this->input->post('vtype');
        if($this->input->post('vtype') == 'Youtube')
        {
            $video = $this->input->post('video_link');
        }elseif($this->input->post('vtype') == 'Video'){
            $video=$this->basic->file_upload('video_bulletin/','video');  
            // if($bulletin->video) {
            //     unlink($bulletin->video);
            // } 
        }else{
            $video = $bulletin->video;
        }
        $video_Bulletin_data = [
                                'image' => $image,
                                'video' => $video,
                                 'type'=>$vtype,
                                'title' => $this->input->post('title'),
                                'title_hindi' => $this->input->post('title_hindi'),
                                 'short_description' => $this->input->post('short_description'),
                                'title_share' => $this->input->post('title_share'),
                                 'date'=> date('Y-m-d',strtotime($this->input->post('date'))),
                                 'time'=>$this->input->post('time'),
                                 'link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('link'))),
                                'meta_key' => $this->input->post('meta_key'),
                                'meta_content' => $this->input->post('meta_content')
                                // 'ordering' => $this->input->post('ordering')
                             ];
                             // var_dump($video_Bulletin_data);die;
       $qry = $this->Query->update('video_bulletin',['id'=>$id], $video_Bulletin_data);
       if($qry == TRUE) {
            set_msg('Video Bulletin Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
     redirect('Auth/Seven_inews/Video_Bulletin');
    }
    public function delete_bulletin($id)
    {
        $mid = 84;
        $data['permit'] = chk($mid, ['delete']);
        $qry = $this->Query->delete('video_bulletin',['id'=>$id]);
        if($qry == TRUE) {
            set_msg('Video Bulletin Deleted Successfully', 'S');
        }else{
            set_msg('Error Occured. Try Again!!', 'E');
        }
       redirect('Auth/Seven_inews/Video_Bulletin');
    }
}?>