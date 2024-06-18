<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', '79');
class My_state extends CI_Controller
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
        $mid = 79;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $total = $this->Query->select('*', 'mysate_gallery','', 'count');
        $paginate = $this->basic->create_links('Seven_inews/My_state/index', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['My_state_data'] = $total = $this->Query->select('*', 'mysate_gallery','', 'result',['id'=>'desc'], [$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/seven_inews/admin/My_state/view_mystate',$data);
        $this->basic->footer($mid);
    }
    public function add_video()
    {
        $mid = 79;
        $data['permit'] = chk($mid, ['add']);
        $this->basic->header($mid, 'Front');
         $data['state_data']=$this->Query->select('*','states',['country_id'=>'101','status'=>'Active'],'',['id'=>'asc']);
        $this->load->view('auth/seven_inews/admin/My_state/add_mystate',$data); 
        $this->basic->footer($mid);
    }
     public function get_city_data()
    {
        $city_data=$this->Query->select('*','selected_city',['state_id'=>$this->input->post('state_id'),'status'=>'Enabled']);   
        $city='';
        $city.='<option value="">Select District </option> ';
       foreach($city_data as $c)
        {
            $city.='<option value="'.$c->id.'">'.$c->city.'</option> ';
       }

        $city.='</select>';

        echo $city;

    }
  public function search($per_page = 30) {
        $mid = 79;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $search_value = $this->input->get('search');
        $search = '(title_hindi like"%' . $search_value . '%") or (ordering like"%' . $search_value . '%") ';
        /* PAGINATE */
        $total = $this->Query->select('*', 'mysate_gallery', $search, 'count');
        $paginate = $this->basic->create_links('Seven_inews/My_state/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['My_state_data'] = $total = $this->Query->select('*', 'mysate_gallery', $search, 'result', '', [$paginate['per_page'], $paginate['page']]);
        /* END PAGINATE */
        $this->load->view('auth/seven_inews/admin/My_state/view_mystate',$data);
        $this->basic->footer($mid);
    }
    public function insert_video()
    {
       if($_FILES['image']['name']!=""){
            $image=$this->basic->file_upload('mysate_gallery/image','image');
        }else{
            $image = '';
        }
       if($_FILES['video']['name']!=""){
            $video=$this->basic->file_upload('mysate_gallery','video');
        }else{
            $video = '';
        }
        $array = array( 
                        'image' => $image,
                        'video' => $video,
                        'state_id' => $this->input->post('state_id'),
                        'city_id' => $this->input->post('city_id'),
                        'title' => $this->input->post('title'),
                        'title_hindi' => $this->input->post('title_hindi'),
                        'link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('link'))),
                        'short_description' => $this->input->post('short_description'),
                        'title_share' => $this->input->post('title_share'),
                        'meta_key' => $this->input->post('meta_key'),
                        'meta_content' => $this->input->post('meta_content'),
                        'ordering' => $this->input->post('ordering'),                    
                        'date' => date('Y-m-d',strtotime($this->input->post('date'))),                    
                        'time' => $this->input->post('time')                    
                      );
       $qry= $this->Query->insert('mysate_gallery',$array);
         if($qry == TRUE){
            set_msg('Video Added Successfully', 'S');
        }else{
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/My_state/');
    }
  public function edit_video($id)
  {  
        $mid = 79;
        $data['permit'] = chk($mid, ['edit']);
        $data['video']=$video= $this->Query->select('*','mysate_gallery',['id'=>$id],'row');
        $data['state_data']=$this->Query->select('*','states',['country_id'=>'101','status'=>'Active'],'',['id'=>'asc']);
        $data['city_data']=$this->Query->select('*','selected_city',['state_id'=>$video->state_id],'',['id'=>'asc']);
        $this->load->view('auth/seven_inews/admin/My_state/edit_mystate',$data);
    }

    public function update_video($id)
    {
        if($_FILES['image']['name']!="")
        {
            $image=$this->basic->file_upload('mysate_gallery/image','image');
        }elseif($this->input->post('old_image') !='')
        {
            $image=$this->input->post('old_image');
        }else{
             $image='';
        }
        if($_FILES['video']['name']!="")
        {
            $video=$this->basic->file_upload('mysate_gallery','video');
        }elseif($this->input->post('old_video') !='')
        {
            $video=$this->input->post('old_video');
        }else{
             $video='';
        }
        $photo_My_state_data = [
                                'image' => $image,
                                'video' => $video,
                                'title' => $this->input->post('title'),
                                'state_id' => $this->input->post('state_id'),
                                'city_id' => $this->input->post('city_id'),
                                'title_hindi' => $this->input->post('title_hindi'),
                                'short_description' => $this->input->post('short_description'),
                                'link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('link'))),
                               'title_share' => $this->input->post('title_share'),
                                'meta_key' => $this->input->post('meta_key'),
                                'meta_content' => $this->input->post('meta_content'),
                                'ordering' => $this->input->post('ordering'),
                                'date' => date('Y-m-d',strtotime($this->input->post('date'))),                    
                               'time' => $this->input->post('time')     
                             ];
       $qry = $this->Query->update('mysate_gallery',['id'=>$id], $photo_My_state_data);
       if($qry == TRUE) {
            set_msg('Video Updated Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
     redirect('Auth/Seven_inews/My_state/');
    }
    public function delete_video($id)
    {
         $mid = 79;
        $data['permit'] = chk($mid, ['delete']);
        $qry = $this->Query->delete('mysate_gallery',['id'=>$id]);
        if($qry == TRUE) {
            set_msg('Video Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
     redirect('Auth/Seven_inews/My_state/');
    }
}    
?>