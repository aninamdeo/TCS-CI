<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('basic');
        $this->basic->loader();
        $this->basic->checklogin();
    }

    public function get_state($country_id) {
        $values = $this->Query->select('*', 'common_ac_state', ['common_ab_country_id' => $country_id]);
        echo "<option value=''>Select State</option>";
        foreach ($values as $value) {
            echo "<option value='" . $value->common_ac_state_id . "'>" . $value->common_ac_state_name . "</option>";
        }
    }

    public function get_city($state_id) {
        $values = $this->Query->select('*', 'common_ad_city', ['common_ac_state_id' => $state_id]);
        echo "<option value=''>Select City</option>";
        foreach ($values as $value) {
            echo "<option value='" . $value->common_ad_city_id . "'>" . $value->common_ad_city_name . "</option>";
        }
    }

    public function get_ses($id) {
        $values = $this->Query->select('*', 'ins_ab_session', ['ins_ab_session_id' => $id], 'row');
        $value = $this->Query->select('*', 'ins_ae_course_duration', ['ins_ae_course_duration_id' => $values->ins_ae_course_duration_id], 'row');
        echo $value->ins_ae_course_duration_name;
    }

    public function get_duration_id($id) {
        $values = $this->Query->select('*', 'ins_ab_session', ['ins_ab_session_id' => $id], 'row');
        echo $values->ins_ae_course_duration_id;
    }

    public function get_course($id) {
        $did = $this->Query->select('*', 'ins_ab_session', ['ins_ab_session_id' => $id], 'row');
        $values = $this->Query->select('*', 'ins_ac_course', ['ins_ae_course_duration_id' => $did->ins_ae_course_duration_id], 'result');
        echo "<option value=''>Select Course</option>";
        foreach ($values as $value) {
            echo "<option value='" . $value->ins_ac_course_id . "'>" . $value->ins_ac_course_name . ' - ' . $value->ins_ac_course_code . "</option>";
        }
    }

    public function get_course_sess($id,$category_id) {
        $did = $this->Query->select('*', 'ins_ab_session', ['ins_ab_session_id' => $id], 'row');
        $values = $this->Query->select('*', 'ins_ac_course', ['ins_ae_course_duration_id' => $did->ins_ae_course_duration_id,'ins_ad_course_category_id'=>$category_id], 'result');
        echo "<option value=''>Select Course</option>";
        foreach ($values as $value) {
            echo "<option value='" . $value->ins_ac_course_id . "'>" . $value->ins_ac_course_name . ' - ' . $value->ins_ac_course_code . "</option>";
        }
    }

    public function get_branch($id) {
        $values = $this->Query->select('*', 'ins_ac_course_branch', ['ins_ac_course_id' => $id], 'result');
        echo "<option value=''>Select Branch</option>";
        foreach ($values as $value) {
            echo "<option value='" . $value->ins_ac_course_branch_id . "'>" . $value->ins_ac_course_branch_name . "</option>";
        }
    }

    public function get_year($id) {
        $values = $this->Query->select('*', 'ins_ac_course_year', ['ins_ac_course_id' => $id], 'result');
        echo "<option value=''>Select Year</option>";
        foreach ($values as $value) {
            echo "<option value='" . $value->ins_ac_course_year_id . "'>" . $value->ins_ac_course_year_name . "</option>";
        }
    }
     public function get_semester($id) {
        $values = $this->Query->select('*','ins_af_course_semester', ['ins_ac_course_year_id' => $id], 'result');
        echo "<option value=''>Select Semester</option>";
        foreach ($values as $value) {
            echo "<option value='" . $value->ins_af_course_semester_id . "'>" . $value->ins_af_course_semester_name . "</option>";
        }
    }

    public function save_download() {
        $this->load->library('m_pdf');
        $this->data['title'] = $this->input->post('title');
        $this->data['description'] = $this->input->post('description');
        $doc_name = $this->input->post('doc_name');
        $html = $this->load->view('pdf_output', $this->data, true);
        $pdfFilePath = $doc_name . "-download.pdf";
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html, 2);
        $pdf->Output($pdfFilePath, "D");
    }

}

?>