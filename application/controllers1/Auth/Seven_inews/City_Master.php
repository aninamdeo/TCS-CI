<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('mid', '8');

class City_Master extends CI_Controller
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
        $mid = mid;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Master');
        $data['states']=$this->Query->select('*','states',['country_id'=>101,'status'=>'Active']);
        $select='states.*, states.id as s_id,selected_city.*,selected_city.id as c_id';
        $array=[
                ['states','selected_city.state_id = states.id','LEFT']
               ];                                    
        $total = $this->Query->select('*', 'selected_city','', 'count');
        $paginate = $this->basic->create_links('Seven_inews/City_Master/index/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['select_city_data']=$this->Query->join($select,'selected_city',$array,'','result', '', [$paginate['per_page'], $paginate['page']]);
        $data['city_data']=$this->Query->select('*','cities',['state_id'=>'21']);
        $this->load->view('auth/seven_inews/admin/City_Master/Add_City',$data);
        $this->basic->footer($mid);
    }
   public function search($per_page = 30) {
        $mid = 8;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid, 'Master');
        $search_value = $this->input->get('search');
        $search = ' (city like"%' . $search_value . '%") or (status like"%' . $search_value . '%")';
        $total = $this->Query->select('*', 'selected_city',$search, 'count');
        $paginate = $this->basic->create_links('Seven_inews/City_Master/index/', $total, $per_page, 6);
        $data['links'] = $paginate['links'];
         $select='states.*, states.id as s_id,selected_city.*,selected_city.id as c_id';
        $array=[
                ['states','selected_city.state_id = states.id','LEFT']
               ];
        $data['select_city_data']=$this->Query->join($select,'selected_city',$array,$search,'result', '', [$paginate['per_page'], $paginate['page']]);
          $data['city_data']=$this->Query->select('*','cities',['state_id'=>'21']);
          $data['states']=$this->Query->select('*','states',['country_id'=>101,'id'=>'21']);
          $this->load->view('auth/seven_inews/admin/City_Master/Add_City',$data);
        $this->basic->footer($mid);
    }

    public function select_city_data($state_id)
    {
        $select_city_data=$this->Query->select('*','selected_city',['state_id'=>$state_id],'result');
        $city_data=$this->Query->select('*','cities',['state_id'=>$state_id]);
          $district[] = NULL;
            $selected_district = array();
            foreach ($select_city_data as $city1) {
                   $district[] = $city1->old_city_id;
            } 
            foreach ($city_data as $city) {
              echo '<input type="checkbox"';if(in_array($city->id,$district)){echo ' checked ';}echo 'name="city[]" value="'.$city->id.'"/>'.$city->name.'<br>';
        }
    }
    public function insert_city()
    {
        if($this->Query->select('id','selected_state',['old_state_id'=>$this->input->post('state')],'count') == 0)
        {
            $state_data=$this->Query->select('*','states',['id'=>$this->input->post('state')],'row');   
            $array = array(
                            'state'=> $state_data->name,
                            'old_state_id'=> $this->input->post('state')
                          );

            $last_id=$this->Query->insert('selected_state',$array,true);
            $city=$this->input->post('city');
            for($i=0;$i<count((array)$city); $i++){
                    $city_data=$this->Query->select('*','cities',['id'=>$city[$i]],'row');   
            $array = array('city'=> $city_data->name,
                           'old_city_id'=> $city[$i],
                           // 'state_id'=> $last_id
                           'status'=>'Enabled',
                           'state_id'=> $this->input->post('state')
                           );
       $qry=  $this->Query->insert('selected_city',$array);
            }
        }else{
            $last_id=$this->Query->select('id','selected_state',['old_state_id'=>$this->input->post('state')],'row');
            $city=$this->input->post('city');
            for($i=0;$i<count((array)$city); $i++){
              if($this->Query->select('id','selected_city',['old_city_id'=>$city[$i]],'count')>=1){
                    continue;
                }else{
                    $city_data=$this->Query->select('*','cities',['id'=>$city[$i]],'row');   
                    $array = array(
                                    'city'=> $city_data->name,
                                    'old_city_id'=> $city[$i],
                                    // 'state_id'=> $last_id->id
                                    'status'=>'Enabled',
                                    'state_id'=> $this->input->post('state')
                                  );

                  $qry=   $this->Query->insert('selected_city',$array);
                }
            
            }
        }
       if($qry == TRUE) {
            set_msg('District Added Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/City_Master/');
    }
     public function edit($ce_id) {
        $data['values'] = $total = $this->Query->select('*', 'selected_city', ['id' => $ce_id], 'row');
         $this->load->view('auth/seven_inews/admin/City_Master/edit_district',$data);
    }
    public function update($id)
    {
        $data = [     
                  'city' => $this->input->post('city'),                   
                 'status'=>$this->input->post('status')
               ];
        if ($this->Query->update('selected_city',['id'=>$id],$data))
            {
                set_msg('District Updated Successfully', 'S');
            }else{
               set_msg('Error Occured. Try Again!!', 'E');
            }
         redirect('Auth/Seven_inews/City_Master/');    
    }

    public function delete($id)
    {
         $mid =8;
        $data['permit'] = chk($mid, ['delete']);
        $qry = $this->Query->delete('selected_city',['id'=>$id]);
        if($qry == TRUE) {
            set_msg('District Deleted Successfully', 'S');
        } else {
            set_msg('Error Occured. Try Again!!', 'E');
        }
        redirect('Auth/Seven_inews/City_Master/');
    } 
      public function states($per_page = 20)
    {
        $mid = mid;
        $data['permit'] = chk($mid, ['add', 'view','edit','delete']);
        $this->basic->header($mid);
        $total = $this->Query->select('*', 'states',['country_id'=>101], 'count');
        $paginate = $this->basic->create_links('Seven_inews/City_Master/states/', $total, $per_page,6);
        $data['links'] = $paginate['links'];
        $data['select_state_data']=$this->Query->select('*','states',['country_id'=>101],'result', '', [$paginate['per_page'], $paginate['page']]);
        $this->load->view('auth/seven_inews/admin/City_Master/view_states',$data);
        $this->basic->footer($mid);
    }  
    public function edit_state($ce_id) {
        $data['values'] = $total = $this->Query->select('*', 'states', ['id' => $ce_id], 'row');
         $this->load->view('auth/seven_inews/admin/City_Master/edit_state',$data);
    }
    public function update_state($id)
    {
        $data = [     
                  'name' => $this->input->post('state'),                   
                  'status'=>$this->input->post('status')
               ];
        if ($this->Query->update('states',['id'=>$id],$data))
            {
                set_msg('State Updated Successfully', 'S');
            }else{
               set_msg('Error Occured. Try Again!!', 'E');
            }
         redirect('Auth/Seven_inews/City_Master/states');    
    }
}
?>