<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function send_sms($msg, $to) {
    $msg = urlencode($msg);
    $to = $to;
    //$response = file_get_contents('http://prioritysms.tulsitainfotech.com/api/mt/SendSMS?user=ipskidz&password=helloIPS&senderid=IPSKID&channel=Trans&DCS=8&flashsms=0&number='.$to.'&text='.$msg.'&route=15');
    echo $rsponse = file_get_contents('http://sms.crisil.xyz/api/send_http.php?authkey=cadc4e097f660a7b8fa7a7bc97085342&mobiles=' . $to . '&message=' . $msg . '&sender=DRMBPL&route=B');
    return true;
}

function set_msg($msg, $type = 'E') {
    if ($type == 'S') {
        $type = 'Success';
    } elseif ($type == 'E') {
        $type = 'Error';
    }
    $CI = get_instance();
    $CI->load->library('session');
    $CI->session->set_flashdata('msg', array($type, $msg));
}

function site_ab_id() {
    $CI = get_instance();
    $CI->load->library('session');
    return 1; //$CI->session->userdata('newschool_id');
}

function school_aa_id() {
    $CI = get_instance();
    $CI->load->library('session');
    return 1; //$CI->session->userdata('newschool_id');
}

function cur_ses_id() {
    $CI = get_instance();
    $CI->load->library('session');
    return $CI->session->userdata('newsite_session_id');
}

function admin() {
    $CI = get_instance();
    $CI->load->library('session');
    return $CI->session->userdata('newschool_id');
}

function refer($link = '') {
    $CI = get_instance();
    $CI->load->library('user_agent');
    if ($link != '') {
        $link = $CI->user_agent->referrer();
    }
    redirect($link);
}

function convert_date($date = '') {
    $date = explode('-', $date);
    if (count($date) == 3) {
        return $ndate = $date[2] . '-' . $date[1] . '-' . $date[0];
    } else {
        return null;
    }
}

function cus_date($date = '') {
    $date = explode('-', $date);
    if (count($date) == 3) {
        return $ndate = $date[0] . '/' . $date[1] . '/' . $date[2];
    } else {
        return null;
    }
}

function get_date($date = '') {
    $date = explode('-', $date);
    if (count($date) == 3) {
        return $ndate = $date[2];
    } else {
        return null;
    }
}

function get_year($date = '') {
    $date = explode('-', $date);
    if (count($date) == 3) {
        return $ndate = $date[0];
    } else {
        return null;
    }
}

function encrypt($password) {
    $CI = get_instance();
    $CI->load->library('encrypt');
    return $CI->encrypt->encode($password);
}

function decrypt($password) {
    $CI = get_instance();
    $CI->load->library('encrypt');
    return $CI->encrypt->decode($password);
}

function template_folder() {
    $CI = get_instance();
    $CI->load->library('session', 'database');
    $usertype = $CI->Query->select('*', 'template_aa_type', ['template_aa_type_status' => 'Enabled'], 'row');
    return 'templates/template' . $usertype->template_aa_type_id;
}

//should be changed on user based permissions
function chk($module_id, $permit) {
    $CI = get_instance();
    $CI->load->library('session', 'database');
    $usertype = $CI->Query->select('*', 'role_aa_usertype', ['role_aa_usertype_id' => $CI->session->userdata('newsite_usertype')], 'row');
    if ($usertype->role_aa_usertype_name == 'Superadmin') {
        return $array = [
            'view' => 1,
            'add' => 1,
            'edit' => 1,
            'delete' => 1,
            'print' => 1
        ];
    } else {
        if ($permit[0] == 'view' || $permit[0] == 'add' || $permit[0] == 'edit' || $permit[0] == 'delete' || $permit[0] == 'print') {
            $module = $CI->Query->select('*', 'role_bb_module', ['role_bb_module_status' => 'Enabled', 'role_bb_module_id' => $module_id], 'row');
            if (count($module) == 1) {
                $qry = "select *  from role_bc_permission where ";
                $where = 'role_aa_usertype_id="' . $usertype->role_aa_usertype_id . '" and role_bb_module_id="' . $module_id . '" and (role_bc_permission_' . $permit[0] . '=1';
                foreach ($permit as $per) {
                    $where .= ' or role_bc_permission_' . $per . '=1';
                }
                $where .= ')';

                $chk = $CI->Query->query_build($qry . $where, 'row');
                if (count($chk) == 1) {
                    return $array = [
                        'view' => $chk->role_bc_permission_view,
                        'add' => $chk->role_bc_permission_add,
                        'edit' => $chk->role_bc_permission_edit,
                        'delete' => $chk->role_bc_permission_delete,
                        'print' => $chk->role_bc_permission_print
                    ];
                } else {
                    redirect(base_url('Error/unauthorized'));
                }
            } else {
                redirect(base_url('Error/unauthorized'));
            }
        } else {
            redirect(base_url('Error/unauthorized'));
        }
    }
}

function menu_builder($active_module_id = "0", $sub_cat_id = "") {
    $CI = get_instance();
    $CI->load->library('session', 'database');
    $array = [];
    if ($sub_cat_id == "") {
        $array['Dashboard'][] = [
            'id' => 0,
            'name' => 'Dashboard',
            'link' => 'Auth/Dashboard',
            'active' => $active_module_id == 0 ? 'active' : ''
        ];
    }
    $categorys = $CI->Query->select('*', 'role_ba_category', ['role_ba_category_type' => 'main_category', 'role_ba_category_status' => 'Enabled'], 'result', ['role_ba_category_ordering' => 'asc']);

    if (count($categorys) > 0) {
        foreach ($categorys as $category) {

            if ($sub_cat_id != "") {
                $sub_categorys = $CI->Query->select('*', 'role_ba_category', ['role_ba_category_main_id' => $category->role_ba_category_id, 'role_ba_category_id' => $sub_cat_id, 'role_ba_category_type' => 'sub_category', 'role_ba_category_status' => 'Enabled'], 'result', ['role_ba_category_ordering' => 'asc']);
            } else {
                $sub_categorys = $CI->Query->select('*', 'role_ba_category', ['role_ba_category_main_id' => $category->role_ba_category_id, 'role_ba_category_type' => 'sub_category', 'role_ba_category_status' => 'Enabled'], 'result', ['role_ba_category_ordering' => 'asc']);
            }

            if (count($sub_categorys) > 0) {
                foreach ($sub_categorys as $sub_category) {
                    $modules = $CI->Query->select('*', 'role_bb_module', ['role_ba_category_id' => $sub_category->role_ba_category_id, 'role_bb_module_status' => 'Enabled'], 'result', ['role_bb_module_ordering' => 'asc']);
                    if (count($modules) > 0) {
                        foreach ($modules as $module) {
                            $array[$sub_category->role_ba_category_name][] = [
                                'id' => $module->role_bb_module_id,
                                'name' => $module->role_bb_module_name,
                                'link' => $module->role_bb_module_link,
                                'active' => $module->role_bb_module_id == $active_module_id ? 'active' : ''
                            ];
                        }
                    }
                }
            }
        }
    }
    return $array;
}

function date_difference($curr_date, $max_date) {
    $date1 = strtotime($curr_date);
    $date2 = strtotime($max_date);
    return ($date1 - $date2)/60/60/24;
}

function convert_time($time) {
    $date = new DateTime($time);
    return $date = $date->format('h:i:s a');
}
