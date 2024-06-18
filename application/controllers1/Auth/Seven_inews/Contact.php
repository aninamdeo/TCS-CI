<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', '82');
class Contact extends CI_Controller
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
        $mid=82;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $data['language']='';
        $this->basic->header($mid,'News');
        $total = $this->Query->select('*','imported_contact', '', 'count');
        $paginate = $this->basic->create_links('Seven_inews/Contact/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['Contact_data'] = $total = $this->Query->select('*','imported_contact', '', 'result',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/seven_inews/admin/Contact/Contact',$data);
        $this->basic->footer($mid);
    }
    public function search($per_page = 30) {
        $mid = 82;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Front');
        $search_value = $this->input->get('search');
         $search = '(device_id like"%' . $search_value . '%") or (name like"%' . $search_value . '%") or (contact  = "' . $search_value . '")';
        $total = $this->Query->select('*', 'imported_contact', $search, 'count');
        $paginate = $this->basic->create_links('Seven_inews/Contact/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['Contact_data'] = $total = $this->Query->select('*','imported_contact', $search, 'result',['id'=>'desc'],[$paginate['per_page'], $paginate['page']]);
         $this->load->view('auth/seven_inews/admin/Contact/Contact',$data);
         $this->basic->footer($mid);
    }
   public function export($type='All') {
        // create file name
        $fileName = 'contact_list-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1','S.No.');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1','Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1','Mobile Number');
        // set Row
        $rowCount = 2;
        $values = $this->Query->select('*', 'imported_contact','','result');
            $sno = 1;
            foreach ($values as $value) {
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $sno);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value->name);
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $value->contact);
                $rowCount++;
                $sno++;
            }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url($fileName));      
    }

}

?>