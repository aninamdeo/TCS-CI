<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', '64');
class News_Desp extends CI_Controller
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
    $mid=65;
    $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
    $data['language']='';
    $this->basic->header($mid,'News');
    $total = $this->Query->select('*', 'news_details', '', 'count');
    $paginate = $this->basic->create_links('Seven_inews/News_Desp/index/', $total, $per_page,6);
    $data['links'] = $paginate['links'];
    $data['News_Desp'] = $total = $this->Query->select('*','news_details', '', 'result',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
    $this->load->view('auth/seven_inews/admin/News_Desp/News_Desp',$data);
    $this->basic->footer($mid);
}
public function search($per_page = 30) {
    $mid = 65;
    $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
    $this->basic->header($mid, 'Front');
    $search_value = $this->input->get('search');
    $search = '(title_hindi like"%' . $search_value . '%") or (status like"%' . $search_value . '%") or (ordering  = "' . $search_value . '")';
    $total = $this->Query->select('*', 'news_details', $search, 'count');
    $paginate = $this->basic->create_links('Seven_inews/News_Desp/index/', $total, $per_page,6);
    $data['links'] = $paginate['links'];
    $data['News_Desp'] = $total = $this->Query->select('*', 'news_details', $search, 'result',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
    $this->load->view('auth/seven_inews/admin/News_Desp/News_Desp',$data);
    $this->basic->footer($mid);
}
public function add_news_desp()
{
    $mid=mid;
    $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
    $this->basic->header($mid, 'Front');
    $data['category']=$this->Query->select('*','category',['type'=>'Category','status'=>'Enabled']);
    $data['sub_cat']=$this->Query->select('*','sub_category',['status'=>'Enabed']);
        // var_dump($data['sub_cat']);die;
    $this->load->view('auth/seven_inews/admin/News_Desp/Add_News_Desp',$data);
    $this->basic->footer($mid);
}
public function insert_news_desp($new_add='')
{
    $image ='';
    $vtype = '';
    if($_FILES['image']['name']!=""){
        $image=$this->basic->file_upload('News_Desp_Images/news_image','image');
    }else{
        $image = '';
    } 
    $vtype = $this->input->post('vtype');
    if($this->input->post('vtype') == 'Youtube')
    {
     $video = $this->input->post('video_link');
 }elseif($this->input->post('vtype') == 'Video'){
    $video=$this->basic->file_upload('News_Desp_Images/news_video','video');            
}else{
    $video = '';
}
$array = array( 'cat_id' => $this->input->post('category'),                   
    'sub_cat_id'=>$this->input->post('subcategory'),
    'area_hindi'=>$this->input->post('area_hindi'),
    'title_hindi'=>$this->input->post('title_hindi'),
    'content_hindi'=>$this->input->post('content_hindi'),
    'top_news'=>$this->input->post('top_news'),
    'video_type'=>$vtype,
    'image'=>$image,
    'video'=>$video,
    'date'=>$this->input->post('date'),
    'time'=>$this->input->post('time'),
                        // 'ordering'=>$this->input->post('ordering'),
    'status'=>$this->input->post('status'),
    'news_link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('news_link'))),
    'title'=>$this->input->post('title_share'),
    'meta_key'=>$this->input->post('meta_key'),
    'meta_content'=>$this->input->post('meta_content')
);
$last_id=$this->Query->insert('news_details',$array,true);
if($last_id> 0) {
    set_msg('News Added Successfully', 'S');
}else{
    set_msg('Error Occured. Try Again!!', 'E');
}
$this->basic->refer();

}

public function edit_news_desp($id)
{  
   $mid=65;
   $data['permit'] = chk($mid, ['edit']);
   $this->basic->header($mid, 'Front');
   $data['News_Desp'] = $news=$this->Query->select('*','news_details',['id'=>$id],'row');
   $data['category']=$this->Query->select('*','category',['type'=>'Category','status'=>'Enabled']);
   $data['sub_cat']=$this->Query->select('*','sub_category',['status'=>'Enabled','cat_id'=>$news->cat_id]);
        // $data['sub_cat']=$this->Query->select('*','category',['type'=>'Sub_Category','cat_id'=>'1']);
   $this->load->view('auth/seven_inews/admin/News_Desp/Edit_News_Desp',$data);
   $this->basic->footer($mid);
}
public function update_news_desp($id)
{
    $News_Desp=$this->Query->select('*','news_details',['id'=>$id]);
    $vtype = '';
    if($_FILES['image']['name']!="")
    {
        $image=$this->basic->file_upload('News_Desp_Images/news_image','image');
        if($News_Desp->image) {
            unlink($News_Desp->image);
        } 
    }else{
        $image =  $this->input->post('old_image'); 
    } 
    $vtype = $this->input->post('vtype');
    if($this->input->post('vtype') == 'Youtube')
    {
        $video = $this->input->post('video_link');
    }elseif($this->input->post('vtype') == 'Video'){
        $video=$this->basic->file_upload('News_Desp_Images/news_video','video');  
        if($News_Desp->video) {
            unlink($News_Desp->video);
        } 
    }else{
        $video = $News_Desp->video;
    }

    $News_Desp_data = [  'cat_id' => $this->input->post('category'),                   
    'sub_cat_id'=>$this->input->post('subcategory'),
    'area_hindi'=>$this->input->post('area_hindi'),
    'title_hindi'=>$this->input->post('title_hindi'),
    'content_hindi'=>$this->input->post('content_hindi'),
    'top_news'=>$this->input->post('top_news'),
    'image'=>$image,
    'video'=>$video,
    'video_type'=>$vtype,
    'date'=>$this->input->post('date'),
    'time'=>$this->input->post('time'),
                             // 'ordering'=>$this->input->post('ordering'),
    'status'=>$this->input->post('status'),    
    'news_link'=>preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-]/','-',$this->input->post('news_link'))),
    'title'=>$this->input->post('title_share'),
    'meta_key'=>$this->input->post('meta_key'),
    'meta_content'=>$this->input->post('meta_content')
];
if($this->Query->update('news_details',['id'=>$id],$News_Desp_data))
{
 set_msg('News Updated Successfully', 'S');
 $this->basic->refer();
}else{
   set_msg('Error Occured. Try Again!!', 'E');
   $this->basic->refer();
}    
}
public function delete_news_desp($id)
{
    $mid=65;
    $data['permit'] = chk($mid, ['delete']);
    $News_Desp=$this->Query->select('*','news_details',['id'=>$id]);
    $qry= $this->Query->delete('news_details',['id'=>$id]);
        // $this->Query->delete('all_news',['news_id'=>$id]);
    if($qry == TRUE) {
       if($News_Desp->video) {
        unlink($News_Desp->video);
    } 
    if($News_Desp->image) {
        unlink($News_Desp->image);
    } 
    $this->Query->delete('news_comments',['news_id'=>$id]);
    set_msg('News Deleted Successfully', 'S');
} else {
    set_msg('Error Occured. Try Again!!', 'E');
}
$this->basic->refer();
}
public function comments($id,$per_page=20)
{
    $mid=65;
    $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
    $data['language']='';
    $this->basic->header($mid,'News');
    $total = $this->Query->select('*', 'news_comments', ['news_id'=>$id,'type'=>'Main_Comment'], 'count');
    $paginate = $this->basic->create_links('Seven_inews/News_Desp/comments/'.$id.'/', $total, $per_page,7);
    $data['links'] = $paginate['links'];
    $data['values']=$this->Query->select('*','news_comments',['news_id'=>$id,'type'=>'Main_Comment'],'',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
    $news = $this->Query->select('*','news_details',['id'=>$id],'row');
    $data['cat_id']=  $news->cat_id;
    $this->load->view('auth/seven_inews/admin/News_Desp/all_news_comments',$data);
    $this->basic->footer($mid);
}
public function edit_comment($id)
{  
   $mid=65;
        // $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
   $this->basic->header($mid,'News');
   $data['comment']=$this->Query->select('*','news_comments',['id'=>$id],'row');
   $data['reply']=$this->Query->select('*','news_comments',['comment_id'=>$id,'type'=>'Sub_Comment','user_id'=>'0'],'row');
   $data['values']=$this->Query->select('*','news_comments',['comment_id'=>$id]);
   $this->load->view('auth/seven_inews/admin/News_Desp/edit_comment',$data);
   $this->basic->footer($mid);
}
public function edit_subcomment($ce_id) {
    $data['comment'] = $total = $this->Query->select('*', 'news_comments', ['id' => $ce_id], 'row');
    $this->load->view('auth/seven_inews/admin/News_Desp/edit_subcomment',$data);
}
public function update_comment($id)
{

    $Desp_data =   [
       'comment'=>$this->input->post('comment'),
       'status'=>$this->input->post('status')    
   ];
   if ($this->Query->update('news_comments',['id'=>$id],$Desp_data))
   {
     set_msg('Comment Updated Successfully', 'S');
     $this->basic->refer();
 }else{
    set_msg('Error Occured. Try Again!!', 'E');
    $this->basic->refer();
}    

}
public function insert_reply($id)
{

    $Desp_data =   [
       'news_id' =>$this->input->post('news_id'),
       'user_id' =>'0',
       'comment_id' =>$id,
       'comment' =>$this->input->post('reply'),
       'date' => date('Y-m-d H:i:s'),   
       'status' =>'Active',   
       'type' =>'Sub_Comment'   
   ];
   if($this->Query->insert('news_comments',$Desp_data))
   {
    set_msg('Comment Added Successfully', 'S');
    $this->basic->refer();
}else{
    set_msg('Error Occured. Try Again!!', 'E');
    $this->basic->refer();
}    

}
public function delete_comment($id)
{
    $qry=$this->Query->delete('news_comments',['id'=>$id]);
    if($qry == TRUE) {
        set_msg('Comment Deleted Successfully', 'S');
    } else {
        set_msg('Error Occured. Try Again!!', 'E');
    }
    $this->basic->refer();
} 

public function news_type()
{
    switch($this->input->post('type'))
    {
        case 'State':
        $state_data=$this->Query->select('*','selected_state');   
        $state='';
        $state.='<select name="news_info"  class="form-control" id="news_info" required>';
        $state.='<option value="">Select State </option> ';
        foreach($state_data as $s)
        {
            $state.='<option value="'.$s->id.'">'.$s->state.'</option> ';
        }
        $state.='</select>';
        echo $state;
        break;
        case 'City':
        $state_data=$this->Query->select('*','selected_state');   
        $state='';
        $state.='<select onchange="state_select(this.value)" name="city_state"  class="form-control"  >';
        $state.='<option value="">Select State </option> ';
        foreach($state_data as $s)
        {
            $state.='<option value="'.$s->id.'">'.$s->state.'</option> ';

        }
        $state.='</select>';
        echo $state;
        break;
        default:
        echo 'none';
        break;
    }
}
public function selected_state()
{
    $city_data=$this->Query->select('*','selected_city',['state_id'=>$this->input->post('state_id')]);   
    $city='';
    $city.='<select name="news_info"  class="form-control" id="news_info" required>';
    $city.='<option value="">Select City </option> ';
    foreach($city_data as $c)
    {
        $city.='<option value="'.$c->id.'">'.$c->city.'</option> ';
    }
    $city.='</select>';
    echo $city;
}
public function get_subcategory()
{
    $subcategory=$this->Query->select('*','sub_category',['cat_id'=>$this->input->post('cat_id')]);   
    $subcat.='<option value="">Select Subcategory </option> ';
    foreach($subcategory as $s)
    {
        $subcat.='<option value="'.$s->sub_category_id.'">'.$s->sub_category_name.'</option> ';
    }

    $subcat.='</select>';

    echo $subcat;
}

public function push_notify($id)
{
    $users=$this->Query->select('*','fcm_token','','result');
    foreach($users as $user){
        $this->curlsender($user->fcm_token_id,$id);
    }
     set_msg('Notification Sent Successfully', 'S');
    $this->basic->refer();
}

public function curlsender($uid,$id){
    $n_query = $this->db->select("category.*,sub_category.*,news_details.*")->from('news_details')->join('category','news_details.cat_id=category.id','left')->join('sub_category','news_details.sub_cat_id=sub_category.sub_category_id','left')->where('news_details.id',$id)->get();
        $news = $n_query->row();
     
   $newslink = "";
   if($news->sub_category_link!=""){
        $newslink = base_url($news->cat_name.'/'.$news->sub_category_link.'/news/'.$news->news_link);
     }elseif($news->cat_name!=""){
        $newslink = base_url($news->cat_name.'/news/'.$news->news_link);
     }else{
        $newslink = base_url('no-category/news/'.$news->news_link);
     }
    $user=$this->Query->select('*','fcm_token',['fcm_token_id'=>$uid],'row');
$secretKey = "AAAAXT-O2k0:APA91bFiziNG5LZcEnJ8JXDQaaIp6936arQfMSnqJUt3f9xgR57s9qx2ubjBp7YLS3u4gfravGxWp173dMjMvm7zdz4eunZQweCvnrKye0NTJTD-azIWb1Lzlpj7Wr6k4DNNqh6keCC-";
$fcmUrl = 'https://fcm.googleapis.com/fcm/send';
$token=$user->fcm_tokens;
   $title = implode(' ', array_slice(explode(' ', strip_tags($news->title_hindi)), 0, 11))."\n";//substr(strip_tags($news->title_hindi),0,25);
   $body = implode(' ', array_slice(explode(' ', strip_tags($news->content_hindi)), 0, 15))."\n";//substr(strip_tags($news->content_hindi),0,25);
   $notification = [
    'title' =>$title,
    'body' =>$body,
    'icon' =>'ic_notify', 
    'sound' => 'mySound'
];
$extraNotificationData = ['title' =>$title,"message" => $body,"image"=> base_url($news->image),"newslink"=>$newslink];
$fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            // 'notification' => $notification,
            'data' => $extraNotificationData
        ];
        $headers = [
            'Authorization: key=' . $secretKey,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


        echo $result;
       
       
    }

}

?>