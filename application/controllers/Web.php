<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('basic');
    //error_reporting(0);
    $this->basic->loader();
  }
  protected function mailerFunction($msg, $to, $sub, $link = '', $name = '')
  {
    $msg = urlencode($msg);
    $link = urlencode($link);
    $subject = urlencode($sub);
    $name = urlencode($name);
    $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
    $context = stream_context_create($opts);
    // $response = file_get_contents("http://api.crisil.xyz/mail/mail.php?id=1&to=$to&msg=$msg&subject=$subject");
  }
  protected function smsFunction($to, $msg)
  {
    $message = urlencode($msg);
    // $rsponse = file_get_contents('http://sms.crisil.xyz/api/send_http.php?authkey=cadc4e097f660a7b8fa7a7bc97085342&mobiles=' . $to . '&message=' . $message . '&sender=BRSBPL&route=B&unicode=1');

  }

  public function auto_redirect()
  {
    // $useragent = $_SERVER['HTTP_USER_AGENT'];
    // $path = uri_string();
    // $get_path = str_replace('Web', 'Backend', $path);
    // if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
    //   if ($get_path != "") {
    //     redirect(base_url($get_path));
    //   } else {
    //     redirect(base_url("mob"));
    //   }
    // }
  }


  public function header($page_title = 'टॉप न्यूज़', $meta_title = "", $meta_key = "", $meta_content = "", $meta_image = "", $url = "", $title = "")
  {
    // $this->auto_redirect();
    $data['basic_details'] = $this->Query->select('*', 'basic_details', ['id' => 1], 'row');
    $data['category_data'] = $this->Query->select('*', 'category', ['status' => 'Enabled', 'type' => 'Category', 'top_menu' => 'Yes'], 'result', ['ordering' => 'asc'], '12');
    $data['sidebar_category_data'] = $this->Query->select('*', 'category', ['status' => 'Enabled', 'type' => 'Category', 'top_menu !=' => 'Yes'], 'result', ['ordering' => 'asc']);
    $data['other_cat'] = $this->Query->select('*', 'category', ['status' => 'Enabled', 'type' => 'Other'], 'result', ['ordering' => 'asc']);
    $data['state_data'] = $this->Query->select('*', 'states', ['country_id' => '101', 'status' => 'Active'], 'result', '');
    $select = "menu.*,page.*";
    $join_arr = [
      ['page', 'menu.pagelink=page.id', 'left']
    ];
    $data['menus'] = $this->Query->join($select, 'menu', $join_arr, ['menu.type' => 'main_menu', 'menu.status' => 'Enabled'], 'result', ['menu.ordering' => 'asc']);
    $data['socials'] = $this->Query->select('*', 'social_link', '', 'result');

    //  if($pagelink != '') {
//    $page_data = $this->Query->select('*', 'page', ['pagelink like' => $pagelink], 'row');
//    $pagetitle = $page_data->page_title . ' - ';
//  }
    $data['pagetitle'] = $page_title;
    $data['user'] = $this->Query->select('*', 'user', ['id' => $this->session->userdata('user_id')], 'row');
    if ($meta_title == "") {
      $data['meta_title'] = $data['basic_details']->meta_key;
    } else {

    }
    if ($meta_title == "") {
      $data['meta_title'] = $data['basic_details']->site_name;
    } else {
      $data['meta_title'] = $meta_title;
    }
    if ($meta_key == "") {
      $data['meta_key'] = $data['basic_details']->meta_key;
    } else {
      $data['meta_key'] = $meta_key;
    }
    if ($meta_content != "") {
      $data['meta_content'] = $meta_content;
    } else {
      $data['meta_content'] = $data['basic_details']->meta_content;
    }

    if ($meta_image == "") {
      $data['meta_image'] = $data['basic_details']->logo;
    } else {
      $data['meta_image'] = $meta_image;
    }
    if ($url == "") {
      $data['url'] = '';
    } else {
      $data['url'] = $url;
    }
    if ($title == "") {
      $data['title'] = $data['basic_details']->site_name;
    } else {
      $data['title'] = $title;
    }
    $data['logo'] = $data['basic_details']->logo;
    $data['socials'] = $this->Query->select('*', 'social_link', '', 'result');
    $data['share'] = NULL;
    $this->load->view('site/desktop/basic/head', $data);
    $this->load->view('site/desktop/basic/header', $data);
  }

  public function head($page_title = 'टॉप न्यूज़', $meta_title = "", $meta_key = "", $meta_content = "", $meta_image = "", $url = "", $title = "")
  {
    $data['pagetitle'] = $page_title;
    $data['basic_details'] = $this->Query->select('*', 'basic_details', ['id' => 1], 'row');
    $data['user'] = $this->Query->select('*', 'user', ['id' => $this->session->userdata('user_id')], 'row');
    if ($meta_title == "") {
      $data['meta_title'] = $data['basic_details']->meta_key;
    } else {

    }
    if ($meta_title == "") {
      $data['meta_title'] = $data['basic_details']->site_name;
    } else {
      $data['meta_title'] = $meta_title;
    }
    if ($meta_key == "") {
      $data['meta_key'] = $data['basic_details']->meta_key;
    } else {
      $data['meta_key'] = $meta_key;
    }
    if ($meta_content != "") {
      $data['meta_content'] = $meta_content;
    } else {
      $data['meta_content'] = $data['basic_details']->meta_content;
    }

    if ($meta_image == "") {
      $data['meta_image'] = $data['basic_details']->logo;
    } else {
      $data['meta_image'] = $meta_image;
    }
    if ($url == "") {
      $data['url'] = '';
    } else {
      $data['url'] = $url;
    }
    if ($title == "") {
      $data['title'] = $data['basic_details']->site_name;
    } else {
      $data['title'] = $title;
    }
    $data['logo'] = $data['basic_details']->logo;
    $data['share'] = '';
    $data['user'] = $this->Query->select('*', 'user', ['id' => $this->session->userdata('user_id')], 'row');
    $this->load->view('site/desktop/basic/head', $data);
  }
  public function footer()
  {
    $this->load->view('site/desktop/basic/footer-links');
    $this->load->view('site/desktop/basic/footer');
  }

  public function index()
  {
    // $this->usercheck();
    $this->header();
    $data['sub_cat'] = $this->Query->select('*', 'sub_category', ['status' => 'Enabled', 'cat_id' => '1'], 'result', ['sub_ordering' => 'asc']);
    $where = "  status ='Enabled' and id != '1' and id != '27' and id != '20' and type = 'Category'";
    $data['categorys_data'] = $this->Query->select('*', 'category', $where, 'result', ['ordering' => 'asc']);
    $select = "category.*,sub_category.*,news_details.*";
    $join_arr = [
      ['category', 'news_details.cat_id = category.id', 'left'],
      ['sub_category', 'news_details.sub_cat_id = sub_category.sub_category_id', 'left']
    ];

    $data['news'] = $news = $this->Query->join($select, 'news_details', $join_arr, ['news_details.top_news' => 'Yes', 'news_details.status' => 'Enabled'], 'row', ['news_details.id' => 'desc'], '1');
    $data['news_data'] = $this->Query->join($select, 'news_details', $join_arr, ['news_details.top_news' => 'Yes', 'news_details.status' => 'Enabled', 'news_details.id !=' => $news->id], 'result', ['news_details.id' => 'desc'], '12');
    $data['interesting_data'] = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'news_details.cat_id' => '3'], 'result', ['news_details.id' => 'desc'],'6');
    $data['bollywood_data'] = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'news_details.cat_id' => '10'], 'result', ['news_details.id' => 'desc'], '4');
    $data['bolly_sub_cat'] = $this->Query->select('*', 'sub_category', ['status' => 'Enabled', 'cat_id' => '10'], 'result', ['sub_ordering' => 'asc'],'6');
    $data['photo_gallery'] = $this->Query->select('*', 'photo_gallery', '', 'result', ['ordering' => 'asc'],'6');
    $data['video_gallery'] = $this->Query->select('*', 'video_gallery', '', 'result', ['ordering' => 'asc'],'6');
    $this->load->view('site/desktop/pages/home', $data);
    $this->footer();
  }

  public function page($pagelink)
  {
    $this->header();
    $data['page'] = $this->Query->select('*', 'page', ['pagelink_hindi' => $pagelink], 'row');
    $this->load->view('site/desktop/pages/page', $data);
    $this->footer();
  }
  public function news_detail($news_link = '')
  {
    $select = "category.*,sub_category.*,news_details.*";
    $join_arr = [
      ['category', 'news_details.cat_id = category.id', 'left'],
      ['sub_category', 'news_details.sub_cat_id = sub_category.sub_category_id', 'left']
    ];
    $data['news_detail'] = $news = $this->Query->join($select, 'news_details', $join_arr, ['news_link' => $news_link], 'row');
    // $data['news_detail'] =$news= $this->Query->select('*','news_details',['news_link'=>$news_link],'row');
    if ($news->sub_category_link != "") {
      $news_link = $news->cat_name . '/' . $news->sub_category_link . '/news/' . $news->news_link;
    } elseif ($news->cat_name != "") {
      $news_link = $news->cat_name . '/news/' . $news->news_link;
    } else {
      $news_link = 'no-category/news/' . $news->news_link;
    }
    $data['category'] = $category = $this->Query->select('*', 'category', ['id' => $news->cat_id], 'row');
    // $share = array( 'title' => $news->title_hindi,
    //                 'url' => $news->news_link,
    //                 'image' => $news->image ,  
    //                 'video' =>''   
    //                );
    $url = $news_link;
    $this->header($category->cat_name_hindi, $news->title, $news->meta_key, $news->meta_content, $news->image, $url, $news->title_hindi);
    $data['news_data'] = $this->Query->join($select, 'news_details', $join_arr, ['news_details.id !=' => $news->id, 'news_details.cat_id' => $news->cat_id], 'result', ['news_details.id' => 'desc'], 6);
    $data['comments_count'] = $this->Query->select('*', 'news_comments', ['news_id' => $news->id, 'type' => 'Main_Comment', 'status' => 'Active'], 'count');
    $data['comments_data'] = $this->Query->select('*', 'news_comments', ['news_id' => $news->id, 'type' => 'Main_Comment', 'status' => 'Active'], 'result');
    $this->load->view('site/desktop/pages/single_news', $data);
    $this->load->view('site/desktop/basic/footer');
    $this->load->view('site/desktop/basic/footer-links');
  }
  public function top_news($type = 'Yes')
  {
    $data['cid'] = '1';
    $data['category'] = $category = $this->Query->select('*', 'category', ['id' => '1'], 'row');
    $this->header($category->cat_name_hindi);
    $data['sub_category'] = $this->Query->select('*', 'sub_category', ['cat_id' => '1', 'status' => 'Enabled'], 'result', ['sub_ordering' => 'asc']);
    $this->load->view('site/desktop/pages/category_wise', $data);
    $this->footer();
  }
  public function c_wise($link = '')
  {
    $data['category'] = $category = $this->Query->select('*', 'category', ['cat_name' => $link], 'row');
    $data['cid'] = $category->id;
    $this->header($category->cat_name_hindi, $category->meta_title, $category->meta_key, $category->meta_content);
    $data['sub_category'] = $this->Query->select('*', 'sub_category', ['cat_id' => $category->id, 'status' => 'Enabled'], 'result', ['sub_ordering' => 'asc']);
    $this->load->view('site/desktop/pages/category_wise', $data);
    $this->footer();
  }
  public function s_wise($clink = '', $slink = '')
  {
    $data['category'] = $category = $this->Query->select('*', 'category', ['cat_name' => $clink], 'row');
    $data['sub_category'] = $sub_cat = $this->Query->select('*', 'sub_category', ['cat_id' => $category->id, 'sub_category_link' => $slink], 'row');
    $this->header($category->cat_name_hindi, $sub_cat->meta_title, $sub_cat->meta_key, $sub_cat->meta_content);
    $select = "category.*,sub_category.*,news_details.*";
    $join_arr = [
      ['category', 'news_details.cat_id = category.id', 'left'],
      ['sub_category', 'news_details.sub_cat_id = sub_category.sub_category_id', 'left']
    ];
    $data['news_data'] = $this->Query->join($select, 'news_details', $join_arr, ['news_details.status' => 'Enabled', 'news_details.cat_id' => $category->id, 'news_details.sub_cat_id' => $sub_cat->sub_category_id], 'result', ['news_details.id' => 'desc']);
    $data['sub_category_data'] = $this->Query->select('*', 'sub_category', ['cat_id' => $category->id, 'status' => 'Enabled'], 'result', ['sub_ordering' => 'asc']);
    $data['sid'] = $sub_cat->sub_category_id;
    $data['cid'] = $category->id;
    $this->load->view('site/desktop/pages/sub_category_wise', $data);
    $this->footer();
  }
  public function single_video($link = '')
  {
    $data['video'] = $video = $this->Query->select('*', 'video_gallery', ['link' => $link], 'row');
    $url = 'Videos/news/' . $link;
    $this->header('', $video->title_share, $video->meta_key, $video->meta_content, $video->image, $url, $video->title_hindi);
    $data['video_data'] = $this->Query->select('*', 'video_gallery', ['id !=' => $video->id], 'result', ['ordering' => 'asc']);
    $this->load->view('site/desktop/pages/video_gallery_single', $data);
    $this->footer();
  }
  public function video_gallery()
  {
    $this->header();
    $data['video_gallery'] = $this->Query->select('*', 'video_gallery', '', 'result', ['id' => 'desc']);
    $this->load->view('site/desktop/pages/video_gallery', $data);
    $this->footer();
  }
  public function video_bulletin($link = '')
  {
    if ($link) {
      $data['video_bulletin'] = $bulletin = $this->Query->select('*', 'video_bulletin', ['link' => $link], 'row', ['id' => 'desc'], 1);
      $url = 'Videos/bulletin/' . $link;
      $this->header('', $bulletin->title_share, $bulletin->meta_key, $bulletin->meta_content, $bulletin->image, $url, $bulletin->title_hindi);
      $data['video_bulletin_data'] = $this->Query->select('*', 'video_bulletin', ['id !=' => $bulletin->id], 'result', ['id' => 'desc']);
    } else {
      $data['video_bulletin'] = $bulletin = $this->Query->select('*', 'video_bulletin', '', 'row', ['id' => 'desc'], 1);
      $url = 'Videos/bulletin/' . $bulletin->link;
      $this->header('', $bulletin->title_share, $bulletin->meta_key, $bulletin->meta_content, $bulletin->image, $url, $bulletin->title_hindi);
      $data['video_bulletin_data'] = $this->Query->select('*', 'video_bulletin', ['id !=' => $bulletin->id], 'result', ['id' => 'desc']);
    }
    $this->load->view('site/desktop/pages/video_bulletin', $data);
    $this->footer();
  }
  public function photo_gallery()
  {
    $this->header();
    $data['photo_gallery'] = $this->Query->select('*', 'photo_gallery', '', 'result', ['id' => 'asc']);
    $this->load->view('site/desktop/pages/photo_gallery', $data);
    $this->footer();
  }
  public function single_photo($link = '')
  {
    $data['photo'] = $photo = $this->Query->select('*', 'photo_gallery', ['link' => $link], 'row');
    $url = 'Photos/news/' . $link;
    $this->header('', $photo->title_share, $photo->meta_key, $photo->meta_content, $photo->image, $url);
    $data['photo_data'] = $this->Query->select('*', 'photo_gallery', ['id !=' => $photo->id], 'result', ['ordering' => 'asc']);
    $this->load->view('site/desktop/pages/single_photo_gallery', $data);
    $this->footer();
  }
  public function state_gallery($link)
  {
    $this->header();
    $data['state'] = $state = $this->Query->select('*', 'states', ['country_id' => '101', 'state_english' => $link], 'row', '');
    $data['gallery_data'] = $this->Query->select('*', 'mysate_gallery', ['state_id' => $state->id], 'result', ['id' => 'desc']);
    $data['city_data'] = $this->Query->select('*', 'selected_city', ['state_id' => $state->id, 'status' => 'Enabled'], 'result', '');
    $this->load->view('site/desktop/pages/state_gallery', $data);
    $this->footer();
  }
  public function single_gallery($link)
  {
    $data['video'] = $video = $this->Query->select('*', 'mysate_gallery', ['link' => $link], 'row');
    $data['state'] = $state = $this->Query->select('*', 'states', ['country_id' => '101', 'id' => $video->state_id], 'row', '');
    $data['city'] = $city = $this->Query->select('*', 'selected_city', ['state_id' => $video->state_id, 'id' => $video->city_id], 'row');
    $url = 'mera-shaher/' . $state->state_english . '/' . $city->city_english . '/' . $video->link;
    $this->header('', $video->title_share, $video->meta_key, $video->meta_content, $video->image, $url, $video->title_hindi);
    $data['video_data'] = $this->Query->select('*', 'mysate_gallery', ['id !=' => $video->id, 'state_id' => $video->state_id, 'city_id' => $video->city_id], 'result', ['id' => 'desc'], 8);
    $this->load->view('site/desktop/pages/single_state_gallery', $data);
    $this->footer();
  }
  public function ajax_gallery_data()
  {
    $dist_id = $this->input->post('dist_id');
    $district = $this->Query->select('*', 'selected_city', ['id' => $dist_id, 'status' => 'Enabled'], 'row', '');
    $data['gallery_data'] = $this->Query->select('*', 'mysate_gallery', ['state_id' => $district->state_id, 'city_id' => $dist_id], 'result', ['id' => 'desc']);
    $this->load->view('site/desktop/pages/ajax_gallery_data', $data);
  }
  //public function login() {
// $this->head();
// $this->load->view('site/desktop/pages/login');
// $this->footer();
//}
  public function user_login($news_id)
  {
    $contact = $this->input->post('contact');
    $password = $this->input->post('password');
    $this->session->set_userdata('news_id', $news_id);
    $user_chk = $this->Query->select('*', 'user', ['contact' => $contact, 'password' => $password], 'row');
    if (count((array) $user_chk) > 0) {
      if ($user_chk->status == 'Enabled') {
        $this->session->set_userdata('user_id', $user_chk->id);
        $this->session->set_userdata('user_contact', $user_chk->contact);
        $this->session->set_userdata('user_type', 'User');
        if ($user_chk->verification_status == 'Verified') {
          redirect($this->agent->referrer());
        } else {
          $array1 = ['verification_code' => rand('111111', '999999'), 'otp_time' => date('Y-m-d H:i:s')];
          $this->Query->update('user', ['id' => $user_chk->id], $array1);
          $user = $this->Query->select('*', 'user', ['id' => $user_chk->id], 'row');
          $msg1 = $user->verification_code . ' is your OTP from 7i News for mobile verification';
          $this->smsFunction($user->contact, $msg1);
          redirect(base_url('Web/mobile_verification'));
        }
      } else {
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_contact');
        $this->session->set_flashdata('swal_model', 'true');
        $this->session->set_flashdata('msg', 'Blocked');
      }
    } else {
      $user_check = $this->Query->select('user_number', 'user', '', 'row', ['id' => 'desc'], 1);
      $user_number = ($user_check == Null) ? 1000 : (int) $user_check->user_number + 1;
      $array = [
        'user_number' => $user_number,
        'name' => $this->input->post('name'),
        'contact' => $this->input->post('contact'),
        'password' => $this->input->post('password'),
        'date' => date('Y-m-d'),
        'status' => 'Enabled',
        'verification_status' => 'Unverified'
      ];
      $last_id = $this->Query->insert('user', $array, true);
      if ($last_id > 0) {
        $user_chk = $this->Query->select('*', 'user', ['id' => $last_id], 'row');
        $array1 = ['verification_code' => rand('111111', '999999'), 'otp_time' => date('Y-m-d H:i:s')];
        $this->Query->update('user', ['id' => $user_chk->id], $array1);
        $user = $this->Query->select('*', 'user', ['id' => $user_chk->id], 'row');
        $msg1 = $user->verification_code . ' is your OTP from 7i News for mobile verification';
        $this->smsFunction($user_chk->contact, $msg1);
        $this->session->set_userdata('user_id', $last_id);
        $this->session->set_userdata('user_type', 'User');
        $this->session->set_userdata('user_contact', $user_chk->contact);
        // $this->session->set_flashdata('swal_model', 'true');
        // $this->session->set_flashdata('msg','signup');
        redirect(base_url('Web/mobile_verification'));
      } else {
        $this->session->set_flashdata('swal_model', 'true');
        $this->session->set_flashdata('msg', 'error');
        redirect($this->agent->referrer());
      }
    }
  }

  public function mob_user_login()
  {
    $contact = $this->input->post('contact');
    $user_chk = $this->Query->select('*', 'user', ['contact' => $contact], 'row');
    if (count((array) $user_chk) > 0) {
      if ($user_chk->status == 'Enabled') {
        $this->session->set_userdata('user_id', $user_chk->id);
        $this->session->set_userdata('user_contact', $user_chk->contact);
        $this->session->set_userdata('user_type', 'User');
        if ($user_chk->verification_status == 'Verified') {
          redirect(base_url('Web/'));
        } else {
          $array1 = ['verification_code' => rand('111111', '999999'), 'otp_time' => date('Y-m-d H:i:s')];
          $this->Query->update('user', ['id' => $user_chk->id], $array1);
          $user = $this->Query->select('*', 'user', ['id' => $user_chk->id], 'row');
          $msg1 = $user->verification_code . ' is your OTP from 7i News for mobile verification';
          $this->smsFunction($user->contact, $msg1);
          redirect(base_url('Web/mobile_verification'));
        }
      } else {
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_contact');
        $this->session->set_flashdata('swal_model', 'true');
        $this->session->set_flashdata('msg', 'Blocked');
      }
    } else {
      $user_check = $this->Query->select('user_number', 'user', '', 'row', ['id' => 'desc'], 1);
      $user_number = ($user_check == Null) ? 1000 : (int) $user_check->user_number + 1;
      $array = [
        'user_number' => $user_number,
        'contact' => $this->input->post('contact'),
        'date' => date('Y-m-d'),
        'status' => 'Enabled',
        'verification_status' => 'Unverified'
      ];
      $last_id = $this->Query->insert('user', $array, true);
      if ($last_id > 0) {
        $user_chk = $this->Query->select('*', 'user', ['id' => $last_id], 'row');
        $array1 = ['verification_code' => rand('111111', '999999'), 'otp_time' => date('Y-m-d H:i:s')];
        $this->Query->update('user', ['id' => $user_chk->id], $array1);
        $user = $this->Query->select('*', 'user', ['id' => $user_chk->id], 'row');
        $msg1 = $user->verification_code . ' is your OTP from 7inews for mobile verification';
        $this->smsFunction($user_chk->contact, $msg1);
        $this->session->set_userdata('user_id', $last_id);
        $this->session->set_userdata('user_type', 'User');
        $this->session->set_userdata('user_contact', $user_chk->contact);
        // $this->session->set_flashdata('swal_model', 'true');
        // $this->session->set_flashdata('msg','signup');
        redirect(base_url('Web/mobile_verification'));
      } else {
        $this->session->set_flashdata('swal_model', 'true');
        $this->session->set_flashdata('msg', 'error');
        redirect(base_url('Web/login'));
      }
    }
  }

  public function mobile_verification()
  {
    $this->usercheck();
    $this->header();
    $this->load->view('site/desktop/pages/mobile_verification');
    $this->footer();
  }
  public function verify_otp()
  {
    $contact = $this->session->userdata('contact');
    $uid = $this->session->userdata('user_id');
    $check_user = $this->Query->select('*', 'user', ['id' => $uid, 'verification_code' => $this->input->post('otp')], 'row');
    if (count((array) $check_user) > 0) {
      $array = [
        'verification_status' => 'Verified',
        'verification_code' => '0',
        'otp_time' => '0000-00-00 00:00:00'
      ];
      $qry = $this->Query->update('user', ['id' => $this->session->userdata('user_id')], $array);
      $this->session->set_flashdata('swal_model', 'true');
      $this->session->set_flashdata('msg', 'verified');
      redirect(base_url('Web/single_news/' . $this->session->userdata('news_id')));
    } else {
      $this->session->set_flashdata('swal_model', 'true');
      // $this->session->set_flashdata('msg','verified');
      redirect($this->agent->referrer());
    }
  }

  public function mob_verify_otp()
  {
    $contact = $this->session->userdata('contact');
    $uid = $this->session->userdata('user_id');
    $check_user = $this->Query->select('*', 'user', ['id' => $uid, 'verification_code' => $this->input->post('otp')], 'row');
    if (count((array) $check_user) > 0) {
      $array = [
        'verification_status' => 'Verified',
        'verification_code' => '0',
        'otp_time' => '0000-00-00 00:00:00'
      ];
      $qry = $this->Query->update('user', ['id' => $this->session->userdata('user_id')], $array);
      $this->session->set_flashdata('swal_model', 'true');
      $this->session->set_flashdata('msg', 'verified');
      redirect(base_url('Web/profile'));
    } else {
      $this->session->set_flashdata('swal_model', 'true');
      // $this->session->set_flashdata('msg','verified');
      redirect($this->agent->referrer());
    }
  }

  function usercheck()
  {
    if (($this->session->userdata('user_type') != 'User') && ($this->session->userdata('user_id') == '')) {
      redirect(base_url('Web/login'));
    }
  }
  public function live_tv()
  {
    $this->header();
    $data['basic_details'] = $this->Query->select('*', 'basic_details', ['id' => 1], 'row');
    $this->load->view('site/desktop/pages/live_tv', $data);
    $this->footer();
  }
  public function logout()
  {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('user_type');
    $this->session->unset_userdata('user_contact');
    $this->session->unset_userdata('news_id');
    redirect(base_url('Web'));
  }

  public function news_comment($id)
  {

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
      $this->session->set_flashdata('msg', 'comment');
      redirect($this->agent->referrer());
    } else {
      $this->session->set_flashdata('swal_model', 'True');
      $this->session->set_flashdata('msg', 'error');
      redirect($this->agent->referrer());
    }
  }
  public function news_sub_comment($news_id, $cid)
  {

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
      $this->session->set_flashdata('msg', 'comment');
      redirect($this->agent->referrer());
    } else {
      $this->session->set_flashdata('swal_model', 'True');
      $this->session->set_flashdata('msg', 'error');
      redirect($this->agent->referrer());
    }
  }
  public function profile()
  {
    $this->usercheck();
    $this->head();
    $data['user'] = $this->Query->select('*', 'user', ['id' => $this->session->userdata('user_id')], 'row');
    $this->load->view('site/desktop/pages/profile', $data);
    $this->load->view('site/desktop/basic/footer-links');
  }
  public function edit_profile()
  {
    $this->usercheck();
    $this->head();
    $data['user'] = $this->Query->select('*', 'user', ['id' => $this->session->userdata('user_id')], 'row');
    $this->load->view('site/desktop/pages/edit_profile', $data);
    $this->load->view('site/desktop/basic/footer-links');
  }
  public function update_profile()
  {
    $image = $this->input->post('old_file');
    if ($_FILES['file']['name'] != "") {
      $image = $this->basic->file_upload('user_profile', 'file');
    }
    $array = [
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'gender' => $this->input->post('gender'),
      'birth_date' => date('d-m-Y', strtotime($this->input->post('birth_date'))),
      'image' => $image
    ];
    $qry = $this->Query->update('user', ['id' => $this->session->userdata('user_id')], $array);
    if ($qry == TRUE) {
      $this->session->set_flashdata('swal_model', 'True');
      $this->session->set_flashdata('msg', 'profile');
    } else {
      $this->session->set_flashdata('swal_model', 'True');
      $this->session->set_flashdata('msg', 'error');
    }
    redirect($this->agent->referrer());
  }

  public function login()
  {
    $this->head();
    $this->load->view('site/desktop/pages/login');
    $this->load->view('site/desktop/basic/footer-links');
  }

}
