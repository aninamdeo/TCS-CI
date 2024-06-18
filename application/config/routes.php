<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('EXT', '.php');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$default_controller = 'Web';

$route['default_controller'] = $default_controller;
$route['Web'] = $default_controller;
$route['Web/(:any)'] = $default_controller.'/$1';
$route['Web/(:any)/(:any)'] = $default_controller.'/$1/$2';
$route['Web/(:any)/(:any)/(:any)'] = $default_controller.'/$1/$2/$3';


$route['webadmin'] = 'Auth/Login';

$route['p'] = $default_controller.'/page';
$route['p/(:any)'] = $default_controller.'/page/$1';
$route['p/(:any)/(:any)'] = $default_controller.'/page/$1/$2';
$route['Top-News'] = $default_controller.'/top_news/Yes';
$route['Videos/gallery'] = $default_controller.'/video_gallery';
$route['Photo/gallery'] = $default_controller.'/photo_gallery';
$route['Videos/bulletin'] = $default_controller.'/video_bulletin';
$route['Videos/bulletin/(:any)'] = $default_controller.'/video_bulletin/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();
$query = $db->get('category');
$result = $query->result();
foreach( $result as $row )
{
     $route[$row->cat_name] = $default_controller.'/c_wise/'.$row->cat_name;
     // $route[$row->cat_name] = 'Seven_inews/c_wise/'.$row->cat_name;
}
// 
$query = $db->get('sub_category' );
$sub_result = $query->result();
foreach( $sub_result as $row1 )
{
	 $query1 = $db->select('*')->from('category')->where('id',$row1->cat_id)->get();         
	 $cat = $query1->row();
     $route[$cat->cat_name.'/'.$row1->sub_category_link] = $default_controller.'/s_wise/'.$cat->cat_name.'/'.$row1->sub_category_link;
}
// 
$n_query = $db->select("category.*,sub_category.*,news_details.*")->from('news_details')->join('category','news_details.cat_id=category.id','left')->join('sub_category','news_details.sub_cat_id=sub_category.sub_category_id','left')->get();
$news_result = $n_query->result();
foreach( $news_result as $news )
{ 
	 if($news->sub_category_link!=""){
	    $route[$news->cat_name.'/'.$news->sub_category_link.'/news/'.$news->news_link] = $default_controller.'/news_detail/'.$news->news_link ;
	 }elseif($news->cat_name!=""){
	 	$route[$news->cat_name.'/news/'.$news->news_link] = $default_controller.'/news_detail/'.$news->news_link ;
	 }else{
	 	$route['no-category/news/'.$news->news_link] = $default_controller.'/news_detail/'.$news->news_link ;
	 }
}
// 
$v_query = $db->get('video_gallery');
$v_result = $v_query->result();
foreach( $v_result as $row )
{
   $route['Videos/news/'.$row->link] = $default_controller.'/single_video/'.$row->link;
}

$p_query = $db->get('photo_gallery');
$p_result = $p_query->result();
foreach( $p_result as $row )
{
     $route['Photos/news/'.$row->link] = $default_controller.'/single_photo/'.$row->link;
}

$my_query = $db->select("states.*,selected_city.*,mysate_gallery.*")->from('mysate_gallery')->join('states','mysate_gallery.state_id=states.id','left')->join('selected_city','mysate_gallery.city_id=selected_city.id','left')->get();
$state_result = $my_query->result();
foreach( $state_result as $state )
{
	 $route['mera-shaher/'.$state->state_english] = $default_controller.'/state_gallery/'.$state->state_english ;
	 $route['mera-shaher/'.$state->state_english.'/'.$state->city_english.'/'.$state->link] = $default_controller.'/single_gallery/'.$state->link ;
}


//  Mobile route
$mobile_controller = 'Seven_inews';
$route['mob'] = 'Seven_inews';

$query = $db->get('category');
$result = $query->result();
foreach( $result as $row )
{
     $route['mob/'.$row->cat_name] = $mobile_controller.'/c_wise/'.$row->cat_name;
}
$query = $db->get('sub_category' );
$sub_result = $query->result();
foreach( $sub_result as $row1 )
{
	 $query1 = $db->select('*')->from('category')->where('id',$row1->cat_id)->get();         
	 $cat = $query1->row();
     $route['mob/'.$cat->cat_name.'/'.$row1->sub_category_link] = $mobile_controller.'/s_wise/'.$cat->cat_name.'/'.$row1->sub_category_link;
}

$n_query = $db->select("category.*,sub_category.*,news_details.*")->from('news_details')->join('category','news_details.cat_id=category.id','left')->join('sub_category','news_details.sub_cat_id=sub_category.sub_category_id','left')->get();
$news_result = $n_query->result();
foreach( $news_result as $news )
{ 
	 if($news->sub_category_link!=""){
	    $route['mob'.$news->cat_name.'/'.$news->sub_category_link.'/news/'.$news->news_link] = $mobile_controller.'/single_news/'.$news->news_link ;
	 }elseif($news->cat_name!=""){
	 	$route['mob'.$news->cat_name.'/news/'.$news->news_link] = $mobile_controller.'/single_news/'.$news->news_link ;
	 }else{
	 	$route['mob/no-category/news/'.$news->news_link] = $mobile_controller.'/single_news/'.$news->news_link ;
	 }
}