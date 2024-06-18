<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', '51');
class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }
    public function index($per_page = 20)
    {
        $mid = 51;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $total = $this->Query->select('*', 'photo_gallery','', 'count');
        $paginate = $this->basic->create_links('Seven_inews/Gallery/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['photo_gallery_data']=$this->Query->select('*','photo_gallery','','',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/seven_inews/admin/Gallery/Gallery',$data);
        $this->basic->footer($mid);
    }
    public function add_gallery()
    {
        $mid = 51;
        $data['permit'] = chk($mid, ['add']);
        $this->basic->header($mid, 'Photo Gallery');
        $this->load->view('auth/seven_inews/admin/Gallery/Add_Gallery'); 
        $this->basic->footer($mid);
    }
    public function search($per_page = 30) {
        $mid = 51;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');

        $search_value = $this->input->get('search');
        $search = '(title_hindi like"%' . $search_value . '%") or (ordering like"%' . $search_value . '%") ';
        /* PAGINATE */
        $total = $this->Query->select('*', 'photo_gallery', $search, 'count');
        $paginate = $this->basic->create_links('Seven_inews/Gallery/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];

        $data['photo_gallery_data'] = $total = $this->Query->select('*', 'photo_gallery', $search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
          $this->load->view('auth/seven_inews/admin/Gallery/Gallery',$data);
        $this->basic->footer($mid);
    }

    public function insert_gallery()
    {
        if($_FILES['image']['name']!="")
        {
            $image=$this->basic->file_upload('photo_gallery','image');
        }
        else{
            $image = '';
        }
        $array = array( 
                        'image' => $image,
                        'title' => $this->input->post('title'),
                        'title_hindi' => $this->input->post('title_hindi'),
                        'short_description' => $this->input->post('short_description'),
                        'title_share' => str_replace(' ','-',$this->input->post('title_share')),
                        'link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('link'))),
                        'meta_key' => $this->input->post('meta_key'),
                        'meta_content' => $this->input->post('meta_content'),
                        'ordering' => $this->input->post('ordering')
                      );
        $qry = $this->Query->insert('photo_gallery',$array);
      if ($qry == TRUE) {
            set_msg('Gallery Link Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/Gallery/add_gallery');
    }


    public function edit_gallery($id)
    {  
         $mid = 51;
        $data['permit'] = chk($mid, ['edit']);
        $data['gallery']=$this->Query->select('*','photo_gallery',['id'=>$id],'row');
        $this->load->view('auth/seven_inews/admin/Gallery/Edit_Gallery',$data);
    }
    public function update_gallery($id)
    {
        if($_FILES['image']['name']!="")
        {
            $image=$this->basic->file_upload('photo_gallery','image');
        }elseif($this->input->post('old_image') !='')
        {
            $image=$this->input->post('old_image');
        }else{
             $image='';
        }
        $photo_gallery_data = [
                               'image' => $image,
                               'title' => $this->input->post('title'),
                               'title_hindi' => $this->input->post('title_hindi'),
                                'short_description' => $this->input->post('short_description'),
                               'title_share' => str_replace(' ','-',$this->input->post('title_share')),
                            'link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('link'))),
                                'meta_key' => $this->input->post('meta_key'),
                                'meta_content' => $this->input->post('meta_content'),
                                'ordering' => $this->input->post('ordering')
                            ];
       $qry = $this->Query->update('photo_gallery',['id'=>$id], $photo_gallery_data);
     if ($qry == TRUE) {
            set_msg('Gallery Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/Gallery/');
    }
    public function delete_gallery($id)
    {
         $mid = 51;
        $data['permit'] = chk($mid, ['delete']);
        $gallery =$this->Query->select('*','photo_gallery',['id'=>$id],'row');
        if($gallery->image){
            unlink($gallery->image);
        }
        $this->Query->delete('photo_gallery',['id'=>$id]);
        if ($qry == TRUE) {
            set_msg('Gallery Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/Gallery/');
    }
     public function video()
    {
        $mid = 52;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $data['gallery_data']=$this->Query->select('*','video_gallery','','',['id'=>'desc']);
        $this->load->view('auth/seven_inews/admin/Gallery/video_gallery',$data);
        $this->basic->footer($mid);
    }
    public function add_video()
    {
        $mid = 52;
        $data['permit'] = chk($mid, ['add']);
        $this->basic->header($mid, 'Front');
        $this->load->view('auth/seven_inews/admin/Gallery/Add_video_gallery'); 
        $this->basic->footer($mid);
    }
  public function search1($per_page = 30) {
        $mid = 52;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $search_value = $this->input->get('search');
        $search = '(title_hindi like"%' . $search_value . '%") or (ordering like"%' . $search_value . '%") ';
        /* PAGINATE */
        $total = $this->Query->select('*', 'video_gallery', $search, 'count');
        $paginate = $this->basic->create_links('Seven_inews/Gallery/video/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
        $data['gallery_data'] = $total = $this->Query->select('*', 'video_gallery', $search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/seven_inews/admin/Gallery/video_gallery',$data);
        $this->basic->footer($mid);
    }
    public function insert_video()
    {
       if($_FILES['image']['name']!="")
        {
            $image=$this->basic->file_upload('video_gallery/image','image');
        }
        else{
            $image = '';
        }

       if($_FILES['video']['name']!="")
        {
            $video=$this->basic->file_upload('video_gallery','video');
        }
        else{
            $video = '';
        }
        $array = array( 
                        'image' => $image,
                        'video' => $video,
                        'title' => $this->input->post('title'),
                        'title_hindi' => $this->input->post('title_hindi'),
                         'short_description' => $this->input->post('short_description'),
                         'title_share' => str_replace(' ','-',$this->input->post('title_share')),
                          'link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('link'))),
                        'meta_key' => $this->input->post('meta_key'),
                        'meta_content' => $this->input->post('meta_content'),
                        'ordering' => $this->input->post('ordering')                    
                      );
       $qry= $this->Query->insert('video_gallery',$array);
         if ($qry == TRUE) {
            set_msg('Video Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/Gallery/video');
    }

    public function edit_video($id)
    {  
         $mid = 52;
        $data['permit'] = chk($mid, ['edit']);
        $data['video']=$this->Query->select('*','video_gallery',['id'=>$id],'row');
        $this->load->view('auth/seven_inews/admin/Gallery/Edit_video_gallery',$data);
       
    }

    public function update_video($id)
    {
        if($_FILES['image']['name']!="")
        {
            $image=$this->basic->file_upload('video_gallery/image','image');
        }elseif($this->input->post('old_image') !='')
        {
            $image=$this->input->post('old_image');
        }else{
             $image='';
        }
        if($_FILES['video']['name']!="")
        {
            $video=$this->basic->file_upload('video_gallery','video');
        }elseif($this->input->post('old_video') !='')
        {
            $video=$this->input->post('old_video');
        }else{
             $video='';
        }
        $photo_gallery_data = [
                                'image' => $image,
                                'video' => $video,
                                'title' => $this->input->post('title'),
                                'title_hindi' => $this->input->post('title_hindi'),
                                 'short_description' => $this->input->post('short_description'),
                                'title_share' => str_replace(' ','-',$this->input->post('title_share')),
                                 'link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('link'))),
                                'meta_key' => $this->input->post('meta_key'),
                                'meta_content' => $this->input->post('meta_content'),
                                'ordering' => $this->input->post('ordering')
                             ];
       $qry = $this->Query->update('video_gallery',['id'=>$id], $photo_gallery_data);
       if($qry == TRUE) {
            set_msg('Gallery Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
     redirect('Auth/Seven_inews/Gallery/video');
    }
    public function delete_video($id)
    {
         $mid = 52;
        $data['permit'] = chk($mid, ['delete']);
        $qry = $this->Query->delete('video_gallery',['id'=>$id]);
        if($qry == TRUE) {
            set_msg('Video Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
     redirect('Auth/Seven_inews/Gallery/video');
    }
}    
?>