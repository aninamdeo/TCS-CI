<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        error_reporting(0);
        $this->basic->loader();
    }
protected function mailerFunction($msg, $to, $sub, $link = '',$name='')
    {  
        $msg = urlencode($msg);
        $link = urlencode($link);
        $subject = urlencode($sub);
        $name = urlencode($name);
        $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        //$response = file_get_contents("http://api.getcodes.xyz/mail?id=12&to=$to&name=$name&msg=$msg&subject=$subject");   
        // echo "http://api.crisil.xyz/mail/mail.php?id=10&to=$to&msg=$msg&subject=$subject";die;
        $response = file_get_contents("http://api.crisil.xyz/mail/mail.php?id=1&to=$to&msg=$msg&subject=$subject");   
    }
    protected function smsFunction($to,$msg)
    {  
      $message = urlencode($msg);
      $rsponse = file_get_contents('http://sms.crisil.xyz/api/send_http.php?authkey=cadc4e097f660a7b8fa7a7bc97085342&mobiles=' . $to . '&message=' . $message . '&sender=BRSBPL&route=B&unicode=1');
      
    }
    public function header($pagetitle = "टॉप न्यूज़",$title="",$meta_title="",$meta_key="",$meta_content="",$meta_image="",$url) {
        // $this->usercheck();
        // $meta_key = $meta_content = $image =$pagelink= "";
        $data['basic_details'] = $this->Query->select('*', 'basic_details', ['id' => 1], 'row');
        $data['category_data'] = $this->Query->select('*','category',['status'=>'Enabled','type'=>'Category'],'result',['ordering'=>'asc']);
          $data['state_data'] = $this->Query->select('*','states',['country_id'=>'101','status'=>'Active'],'result','');
        $data['share'] = NULL;
        $select = "menu.*,page.*";
        $join_arr = [
            ['page', 'menu.pagelink=page.id', 'left']
        ];
        $data['menus'] = $this->Query->join($select, 'menu', $join_arr, ['menu.type' => 'main_menu','menu.status' => 'Enabled'], 'result', ['menu.ordering', 'asc']);
        $data['socials'] = $this->Query->select('*', 'social_link', '', 'result');

        if ($pagelink != '') {
            $page_data = $this->Query->select('*', 'page', ['pagelink like' => $pagelink], 'row');
            $pagetitle = $page_data->page_title . ' - ';
        }
           $data['pagetitle'] = $pagetitle;
           $data['user']= $this->Query->select('*','user',['id'=>$this->session->userdata('user_id')],'row');
           $data['other_cat'] = $this->Query->select('*','category',['status'=>'Enabled','type'=>'Other'],'result',['ordering'=>'asc']);
          $data['title'] = $title;
         if($meta_title==""){
            $data['meta_title'] = $data['basic_details']->site_name;
          }else{
            $data['meta_title'] =$meta_title;
          }
          if($meta_key==""){
            $data['meta_key'] =$data['basic_details']->meta_key;
          }else{
           $data['meta_key']=$meta_key;
          }
          if($meta_content!=""){
            $data['meta_content'] =$meta_content;
          }else{
            $data['meta_content'] =$data['basic_details']->meta_content;
          }

          if($meta_image==""){
           $data['meta_image'] = $data['basic_details']->logo;
          }else{
            $data['meta_image'] = $meta_image;
          }
          if($url ==""){
           $data['url'] = '';
          }else{
            $data['url'] = $url;
          }
        $data['logo'] = $data['basic_details']->logo;
          $data['socials'] = $this->Query->select('*', 'social_link', '', 'result');
        $this->load->view('site/common/head', $data);
        $this->load->view('site/common/header', $data);
    }

    public function head($title="",$meta_title="",$meta_key="",$meta_content="",$meta_image="",$url) {
           $data['share']= NULL ;
           $data['title'] = $title;
           $data['user']= $this->Query->select('*','user',['id'=>$this->session->userdata('user_id')],'row');
          $data['basic_details'] = $this->Query->select('*', 'basic_details', ['id' => 1], 'row');
       
          if($meta_title==""){
            $data['meta_title'] = $data['basic_details']->site_name;
          }else{
            $data['meta_title'] =$meta_title;
          }
          if($meta_key==""){
            $data['meta_key'] =$data['basic_details']->meta_key;
          }else{
           $data['meta_key']=$meta_key;
          }
          if($meta_content!=""){
            $data['meta_content'] =$meta_content;
          }else{
            $data['meta_content'] =$data['basic_details']->meta_content;
          }

          if($meta_image==""){
           $data['meta_image'] = $data['basic_details']->logo;
          }else{
            $data['meta_image'] = $meta_image;
          }
          if($url ==""){
           $data['url'] = '';
          }else{
            $data['url'] = $url;
          }

          $this->load->view('site/common/head', $data);
    } 
    public function footer() {
        $this->load->view('site/common/footer-links');
        $this->load->view('site/common/footer');
    }

    public function index() {
        // $this->usercheck();
        $this->header();
        // $data['sub_cat'] = $this->Query->select('*','sub_category',['status'=>'Enabled','cat_id'=>'1'],'result',['sub_ordering'=>'asc']);
        // $data['other_cat'] = $this->Query->select('*','category',['status'=>'Enabled','type'=>'Other'],'result',['ordering'=>'asc']);
        $where = "  status ='Enabled' and id != '1' and id != '27' and type = 'Category'";
        $data['categorys_data'] = $this->Query->select('*','category',$where,'result',['ordering'=>'asc']);
        $data['news'] =$news= $this->Query->select('*','news_details',['status'=>'Enabled','top_news'=>'Yes'],'row',['id'=>'desc'],'1');
        $data['news_data'] = $this->Query->select('*','news_details',['status'=>'Enabled','top_news'=>'Yes','id !='=>$news->id],'result',['id'=>'desc'],4);
        $data['news_data1'] = $this->Query->select('*','news_details',['status'=>'Enabled','top_news'=>'Yes','id !='=>$news->id],'result',['id'=>'asc'],10);
        $data['interesting_data'] = $this->Query->select('*','news_details',['status'=>'Enabled','cat_id'=>'27'],'result',['id'=>'desc']);
       $data['photo_gallery'] = $this->Query->select('*','photo_gallery','','result',['ordering'=>'asc']);
       $data['video_gallery'] = $this->Query->select('*','video_gallery','','result',['ordering'=>'asc']);
        $this->load->view('site/pages/home',$data);
        $this->load->view('site/common/footer-links');
    }

    public function page($pagelink) {
        $this->header($pagelink);
        $data['page'] = $this->Query->select('*','page',['pagelink_hindi'=>$pagelink],'row');
        $this->load->view('site/pages/page',$data);
        $this->load->view('site/common/footer-links');
    }
    public function live_tv() {
        $this->head();
            $data['basic_details'] = $this->Query->select('*', 'basic_details', ['id' => 1], 'row');
        $this->load->view('site/pages/live_tv',$data);
        $this->load->view('site/common/footer-links');
    }
   public function single_news($id='',$title='') {
        $data['news_detail'] =$news= $this->Query->select('*','news_details',['id'=>$id],'row');
         $data['category']= $category = $this->Query->select('*','category',['id'=>$news->cat_id],'row');
        $url =  'Backend/single_news/'.$id.'/'.preg_replace('/-+/','_',preg_replace('/[^A-Za-z0-9\-]/','_',$news->title));
        $this->head($news->title_hindi,$news->title,$news->meta_key,$news->meta_content,$news->image,$url);
        $data['news_data'] =$this->Query->select('*','news_details',['id !='=>$id,'cat_id'=>$news->cat_id],'result',['id'=>'desc'],6);
        $data['comments_count']= $this->Query->select('*','news_comments',['news_id'=>$id,'type'=>'Main_Comment','status'=>'Active'],'count');
        $this->load->view('site/pages/single_news',$data);
        $this->load->view('site/common/footer-links');
    }
     public function c_wise($id='') {
             $data['cid']= $id;
             $category = $this->Query->select('*','category',['id'=>$id],'row');
            $this->header($category->cat_name_hindi);
            $data['sub_category'] = $this->Query->select('*','sub_category',['cat_id'=>$id,'status'=>'Enabled'],'result',['sub_ordering'=>'asc']);
            $data['news_data'] =$this->Query->select('*','news_details',['cat_id'=>$id],'result',['id'=>'desc']);
            $data['sid']= '';
            $this->load->view('site/pages/category_wise',$data);
           $this->load->view('site/common/footer-links');
    }
      public function top_news($type='') {
             $data['cid']= '1';
             $category = $this->Query->select('*','category',['id'=>'1'],'row');
            $this->header($category->cat_name_hindi);
            $data['sub_category'] = $this->Query->select('*','sub_category',['cat_id'=>'1','status'=>'Enabled'],'result',['sub_ordering'=>'asc']);
            $data['news_data'] =$this->Query->select('*','news_details',['top_news'=>'Yes'],'result',['id'=>'desc']);
            $data['sid']= '';
            $this->load->view('site/pages/category_wise',$data);
    }
     public function s_wise($cid='',$sid='') {
          $category = $this->Query->select('*','category',['id'=>$cid],'row');
            $this->header($category->cat_name_hindi);
            $data['sub_category'] = $this->Query->select('*','sub_category',['cat_id'=>$cid,'status'=>'Enabled'],'result',['sub_ordering'=>'asc']);
            $data['news_data'] =$this->Query->select('*','news_details',['cat_id'=>$cid,'sub_cat_id'=>$sid],'result',['id'=>'desc']);
             $data['sid']= $sid;
              $data['cid']= '';
            $this->load->view('site/pages/category_wise',$data);
             $this->load->view('site/common/footer-links');
    }
    public function single_video($id='',$title='') {
         $data['video'] =$video= $this->Query->select('*','video_gallery',['id'=>$id],'row');
         // $share = array( 'title' => $video->title_hindi,
         //                  'url' => 'Backend/single_video/'.$id.'/'.$video->title_share,
         //                  'image' => $video->image,
         //                  'meta_title' => $video->title_share,  
         //                  'meta_key' => $video->meta_key,  
         //                  'meta_content' => $video->meta_content,   
         //                  'video' => $video->video    
         //                );
        $url =  'Backend/single_video/'.$id.'/'.preg_replace('/-+/','_',preg_replace('/[^A-Za-z0-9\-]/','_',$video->title_share));
        $this->header('',$video->title_hindi,$video->title_share,$video->meta_key,$video->meta_content,$video->image,$url);
        $data['video_data'] =$this->Query->select('*','video_gallery',['id !='=>$id],'result',['ordering'=>'asc']);
        $this->load->view('site/pages/video_gallery_single',$data);
        $this->load->view('site/common/footer-links');
    }
     public function video_gallery() {
        $this->header();
        $data['video_gallery'] =$this->Query->select('*','video_gallery','','result',['id'=>'desc']);
        $this->load->view('site/pages/video_gallery',$data);
       // $this->footer();
    }
    public function photo_gallery() {
        $this->header();
        $data['photo_gallery'] =$this->Query->select('*','photo_gallery','','result',['id'=>'asc']);
        $this->load->view('site/pages/photo_gallery',$data);
       $this->load->view('site/common/footer-links');
    }
    public function single_photo($id='',$title='') {
         $data['photo'] =$photo= $this->Query->select('*','photo_gallery',['id'=>$id],'row');
        //  $share = array( 'title' => $photo->title_hindi,
        //                  'url' => 'Backend/single_photo/'.$id.'/'.$photo->title_share,
        //                  'image' => $photo->image,
        //                   'meta_title' => $photo->title_share,  
        //                   'meta_key' => $photo->meta_key,  
        //                   'meta_content' => $photo->meta_content,
        //                  'video' =>''  
        //               );
        // $this->header('',$share);
        $url =  'Backend/single_photo/'.$id.'/'.preg_replace('/-+/','_',preg_replace('/[^A-Za-z0-9\-]/','_',$photo->title_share));
        $this->header('',$photo->title_hindi,$photo->title_share,$photo->meta_key,$photo->meta_content,$photo->image,$url);
        $data['photo_data'] =$this->Query->select('*','photo_gallery',['id !='=>$id],'result',['id'=>'desc']);
        $this->load->view('site/pages/single_photo_gallery',$data);
        $this->load->view('site/common/footer-links');
    }
     public function state_gallery($id) {
        $this->head();
        $data['gallery_data'] =$this->Query->select('*','mysate_gallery',['state_id'=>$id],'result',['id'=>'desc']);
          $data['state'] = $this->Query->select('*','states',['country_id'=>'101','id'=>$id],'row','');
          $data['city_data'] = $this->Query->select('*','selected_city',['state_id'=>$id,'status'=>'Enabled'],'result','');
        $this->load->view('site/pages/state_gallery',$data);
        $this->load->view('site/common/footer-links');
    }
     public function single_gallery($id='',$title='') {
      
        $data['video'] =$video= $this->Query->select('*','mysate_gallery',['id'=>$id],'row');
        //  $share = array( 'title' => $video->title_hindi,
        //                  'url' => 'Backend/single_gallery/'.$id.'/'.$video->title_share,
        //                  'image' => $video->image,
        //                   'meta_title' => $video->title_share,  
        //                   'meta_key' => $video->meta_key,  
        //                   'meta_content' => $video->meta_content,  
        //                  'video' => $video->video   
        //                 );
        // $this->header('',$share);
        $url =  'Backend/single_gallery/'.$id.'/'.preg_replace('/-+/','_',preg_replace('/[^A-Za-z0-9\-]/','_',$video->title_share));
        $this->header('',$video->title_hindi,$video->title_share,$video->meta_key,$video->meta_content,$video->image,$url);
        $data['video_data'] =$this->Query->select('*','mysate_gallery',['id !='=>$id,'state_id'=>$video->state_id],'result',['id'=>'desc']);
        $this->load->view('site/pages/single_state_gallery',$data);
        $this->load->view('site/common/footer-links');
    }
     public function ajax_gallery_data() {
        $dist_id = $this->input->post('dist_id');
        $district = $this->Query->select('*','selected_city',['id'=>$dist_id,'status'=>'Enabled'],'row','');
         $data['gallery_data'] =$this->Query->select('*','mysate_gallery',['state_id'=>$district->state_id,'city_id'=>$dist_id],'result',['id'=>'desc']);
         $this->load->view('site/pages/ajax_gallery_data',$data);
    }
    public function login() {
         $this->head();
         $this->load->view('site/pages/login');
         $this->load->view('site/common/footer-links');
    }
    public function user_login() {
    $contact = $this->input->post('contact');
    $user_chk = $this->Query->select('*','user',['contact' => $contact],'row');
    if(count((array)$user_chk) > 0) {
        if($user_chk->status == 'Enabled')
        {
            $this->session->set_userdata('user_id', $user_chk->id);
            $this->session->set_userdata('user_contact', $user_chk->contact);
            $this->session->set_userdata('user_type','User');
            if($user_chk->verification_status == 'Verified'){
               redirect(base_url('Backend/'));
            }else{
               $array1 = ['verification_code' => rand('111111','999999'),'otp_time' =>date('Y-m-d H:i:s')];
              $this->Query->update('user', ['id' =>$user_chk->id], $array1);
                $user = $this->Query->select('*','user',['id' =>$user_chk->id],'row');
               $msg1 = $user->verification_code .' is your OTP from 7i News for mobile verification';
                $this->smsFunction($user->contact,$msg1); 
              redirect(base_url('Backend/mobile_verification'));
            }
        }else{
            $this->session->unset_userdata('user_type');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('user_contact');
            $this->session->set_flashdata('swal_model', 'true');
            $this->session->set_flashdata('msg', 'Blocked');
       }
    }else{
          $user_check=$this->Query->select('user_number','user','','row',['id'=>'desc'],1);
          $user_number= ($user_check == Null) ? 1000 : (int)$user_check->user_number+1;
          $array = [
                    'user_number' => $user_number,
                    'contact' => $this->input->post('contact'),
                    'date' => date('Y-m-d'),
                    'status' => 'Enabled',
                    'verification_status' => 'Unverified'
                 ];
      $last_id = $this->Query->insert('user', $array, true);
      if($last_id > 0){
         $user_chk =$this->Query->select('*','user',['id'=>$last_id],'row');
         $array1 = ['verification_code' => rand('111111','999999'),'otp_time' =>date('Y-m-d H:i:s')];
          $this->Query->update('user',['id' =>$user_chk->id], $array1);
            $user = $this->Query->select('*','user',['id' =>$user_chk->id],'row');
            $msg1 = $user->verification_code .' is your OTP from 7inews for mobile verification';
            $this->smsFunction($user_chk->contact,$msg1); 
        $this->session->set_userdata('user_id',$last_id);
        $this->session->set_userdata('user_type','User');
        $this->session->set_userdata('user_contact', $user_chk->contact);
        // $this->session->set_flashdata('swal_model', 'true');
        // $this->session->set_flashdata('msg','signup');
        redirect(base_url('Backend/mobile_verification'));
     }else{
        $this->session->set_flashdata('swal_model', 'true');
        $this->session->set_flashdata('msg', 'error');
        redirect(base_url('Backend/login'));
    }
   } 
 }
  public function mobile_verification() {
        $this->usercheck();
        $this->head();
        $this->load->view('site/pages/mobile_verification');
        $this->load->view('site/common/footer-links');
    }
    public function verify_otp() {
    $contact = $this->session->userdata('contact');
    $uid = $this->session->userdata('user_id');
    $check_user = $this->Query->select('*','user',['id' =>$uid,'verification_code' =>$this->input->post('otp')], 'row');
    if(count((array)$check_user) > 0) {
         $array = [
                     'verification_status' => 'Verified',
                     'verification_code' => '0',
                     'otp_time' => '0000-00-00 00:00:00'
                  ];
      $qry = $this->Query->update('user',['id'=>$this->session->userdata('user_id')], $array);
         $this->session->set_flashdata('swal_model', 'true');
        $this->session->set_flashdata('msg','verified');
        redirect(base_url('Backend/profile'));
    } else {
         $this->session->set_flashdata('swal_model', 'true');
        // $this->session->set_flashdata('msg','verified');
       redirect($this->agent->referrer());
    }
}
 function usercheck() {
  if(($this->session->userdata('user_type') != 'User') && ($this->session->userdata('user_id') == '')) 
   {
      redirect(base_url('Backend/login'));
   }
}
 public function logout()
{
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('user_contact');
     redirect(base_url('Backend'));
}
  public function comments($id) {
         // $this->usercheck();
         $this->head();
         $data['user']= $this->Query->select('*','user',['id'=>$this->session->userdata('user_id')],'row');
         $data['news_id']= $id;
         $data['comments_data']= $this->Query->select('*','news_comments',['news_id'=>$id,'type'=>'Main_Comment','status'=>'Active'],'result',['id'=>'desc']);
         $this->load->view('site/pages/comment',$data);
         $this->load->view('site/common/footer-links');
    }
 public function news_comment($id) {

    $array = [
                'news_id' => $id,
                'user_id' => $this->session->userdata('user_id'),
                'comment' => $this->input->post('comment'),
                'date' => date('Y-m-d H:i:s'),
                'status' => 'Active',
                'type' => 'Main_Comment'
         ];
    $qry = $this->Query->insert('news_comments', $array);
    if ($qry == True) {
            $this->session->set_flashdata('swal_model', 'True');
            $this->session->set_flashdata('msg','comment');
        redirect($this->agent->referrer());
    } else {
          $this->session->set_flashdata('swal_model', 'True');
            $this->session->set_flashdata('msg','error');
          redirect($this->agent->referrer());
    }
  }
  public function news_sub_comment($news_id,$cid) {

    $array = [
                'news_id' => $news_id,
                'comment_id' => $cid,
                'user_id' => $this->session->userdata('user_id'),
                'comment' => $this->input->post('comment'),
                'date' => date('Y-m-d H:i:s'),
                'status' => 'Active',
                'type' => 'Sub_Comment'
             ];
    $qry = $this->Query->insert('news_comments', $array);
    if ($qry == True) {
            $this->session->set_flashdata('swal_model', 'True');
            $this->session->set_flashdata('msg','comment');
        redirect($this->agent->referrer());
    } else {
          $this->session->set_flashdata('swal_model', 'True');
            $this->session->set_flashdata('msg','error');
          redirect($this->agent->referrer());
    }
  }
  public function profile() {
         $this->usercheck();
         $this->head();
         $data['user']= $this->Query->select('*','user',['id'=>$this->session->userdata('user_id')],'row');
         $this->load->view('site/pages/profile',$data);
         $this->load->view('site/common/footer-links');
    }
     public function edit_profile() {
         $this->usercheck();
         $this->head();
         $data['user']= $this->Query->select('*','user',['id'=>$this->session->userdata('user_id')],'row');
         $this->load->view('site/pages/edit_profile',$data);
         $this->load->view('site/common/footer-links');
    }
    public function update_profile() {
        $image = $this->input->post('old_file');
        if ($_FILES['file']['name'] != "") {
            $image = $this->basic->file_upload('user_profile', 'file');
        }
        $array = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'gender' =>$this->input->post('gender'),
                    'birth_date' => date('d-m-Y',strtotime($this->input->post('birth_date'))),
                    'image' => $image
                  ];
         $qry = $this->Query->update('user', ['id' =>$this->session->userdata('user_id')], $array);
        if ($qry == TRUE) {
             $this->session->set_flashdata('swal_model', 'True');
            $this->session->set_flashdata('msg','profile');
        } else {
            $this->session->set_flashdata('swal_model', 'True');
            $this->session->set_flashdata('msg','error');
        }
       redirect($this->agent->referrer());
    }

}
