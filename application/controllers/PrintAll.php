<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  PrintAll extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('General_model');
        $this->General_model->auth_check();
        $this->General_model->auth_superadmin();
    }
    public function index()
    {
        $data['page_title']="Print";
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/controller/footer');
    }
   
    public function patla()
    {
        $data['page_title']="Print";
      
        $data['patla'] = $this->General_model->get_data('patla','status','patla_name,patla_id','1');
        $patla_id=$this->input->get("patla");
        $lot_no=$this->input->get("lot_no");
        $start=$this->input->get('start');
       
        $data['display']=false;
        if(isset($patla_id) && !empty($patla_id)){
            $devide_query="SELECT t1.*,t2.patla_name FROM `devide`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'";
            $data['devide'] = $this->db->query($devide_query)->result();
            $rdevide_query="SELECT t1.*,t2.patla_name FROM `returndevide`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'";
            $data['returndevide'] = $this->db->query($rdevide_query)->result();
            $color="SELECT t1.*,t2.patla_name FROM `patlacolor`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'";
            $data['color'] = $this->db->query($color)->result();
            $data['display']=true;
            $data['edit_lotno']=$lot_no;
            $data['edit_patla']=$patla_id;
            $uri='?patla='.$patla_id.((isset($start) && !empty($start) && isset($end) && !empty($end)) ?('&start='.$data['start'].'&end='.$data['end']):"").((isset($lot_no) && !empty($lot_no))?('&lot_no='.$lot_no):'');
            $data['button']=base_url('PrintAll/patla_print').$uri;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/patla/patla',$data);
        $this->load->view('admin/controller/footer');
    }
    public function patla_print()
    {
        $data['page_title']="Print";
        $patla_id=$this->input->get("patla");
        $lot_no=$this->input->get("lot_no");
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            
        }
        $end =$this->input->get('end'); 
      
        if(isset($end) && !empty($end)){
            $data['end']=$end;
        }
        $data['display']=false;
        if(isset($patla_id) && !empty($patla_id)){


            
            $data['devide'] = $this->db->query("SELECT t1.*,t2.patla1_name FROM `devide`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'".((!empty($start) && !empty($end))?" and (t1.date >='".$start."' and t1.date <='".$end."')":"")."")->result();

            
            $data['returndevide'] = $this->db->query("SELECT t1.*,t2.patla_name FROM `returnde1vide`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'".((!empty($start) && !empty($end))?" and (t1.date >='".$start."' and t1.date <='".$end."')":"")."")->result();
            
            $data['display']=true;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/patla/patla_print',$data);
        $this->load->view('admin/controller/footer');
    }
    public function printing()
    {
        $data['page_title']="Print";
        $data['lot_no'] =$this->db->query("SELECT `lot_no` FROM `cut` ORDER BY `cut`.`lot_no` DESC")->result();
        $data['patla'] = $this->General_model->get_data('patla','status','patla_name,patla_id','1');
        $patla_id=$this->input->get("patla");
        $lot_no=$this->input->get("lot_no");
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $data['display']=false;
        if(isset($patla_id) && !empty($patla_id)){
            $data['printing'] = $this->db->query("SELECT t1.*,t2.patla_name,t3.sub_total,t3.cloth_value,t4.srt_name FROM `priting_lot`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id LEFT JOIN printing as t3 ON t1.printing_id = t3.printing_id  LEFT JOIN party as t4 ON t1.`party_id`= t4.party_id WHERE t1.patla_id='".$patla_id."'".((isset($lot_no) && !empty($lot_no))?" and t1.lot_no='".$lot_no."'":"")."".((!empty($start) && !empty($end))?" and (t1.date >='".$data['start']."' and t1.date <='".$data['end']."')":"")."")->result();
            $data['patla_name']=$this->General_model->get_row('patla','patla_id',$patla_id);
            $data['display']=true;
            $data['edit_lotno']=$lot_no;
            $data['edit_patla']=$patla_id;
            $uri='?patla='.$patla_id.((isset($start) && !empty($start) && isset($end) && !empty($end)) ?('&start='.$data['start'].'&end='.$data['end']):"").((isset($lot_no) && !empty($lot_no))?('&lot_no='.$lot_no):'');
            $data['button']=base_url('PrintAll/printing_print').$uri;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/printing/printing',$data);
        $this->load->view('admin/controller/footer');
    }
    public function printing_print()
    {
        $data['page_title']="Print";
        $patla_id=$this->input->get("patla");
        $lot_no=$this->input->get("lot_no");
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $data['display']=false;
        if(isset($patla_id) && !empty($patla_id)){
            $data['printing'] = $this->db->query("SELECT t1.*,t2.patla_name,t3.sub_total,t3.cloth_value,t4.srt_name FROM `priting_lot`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id LEFT JOIN printing as t3 ON t1.printing_id = t3.printing_id  LEFT JOIN party as t4 ON t1.`party_id`= t4.party_id WHERE t1.patla_id='".$patla_id."'".((isset($lot_no) && !empty($lot_no))?" and t1.lot_no='".$lot_no."'":"")."".((!empty($start) && !empty($end))?" and (t1.date >='".$data['start']."' and t1.date <='".$data['end']."')":"")."")->result();
            $data['patla_name']=$this->General_model->get_row('patla','patla_id',$patla_id);
            $data['display']=true;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/printing/printing_print',$data);
        $this->load->view('admin/controller/footer');
    }
    public function process()
    {
        $data['page_title']="Print";
        $data['sub_process'] =$this->General_model->get_data('sub_process','is_status','*',1);
        $process=$this->input->get('process');
        $name=$this->input->get('name'); 
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $data['display']=false;
        if(isset($process) && !empty($process) && isset($start) && !empty($start) && isset($end) && !empty($end)  ){
            $data['display']=true;
            $data['process_id']=$process;
            if($process==2 || $process==3 || $process==4 ){
                $data['processing']=$this->db->query("SELECT t1.*,t2.name as process_name FROM process as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."'".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            if($process==5){
                $data['ghadi']=$this->db->query("SELECT t1.*,t2.name as process_name FROM ghadi as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."'".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            if($process==6){
                $data['embroidery']=$this->db->query("SELECT t1.*,t2.name as process_name FROM embroidery as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."' ".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            if($process==7){
                $data['packing']=$this->db->query("SELECT t1.*,t2.name as process_name FROM packing as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."' ".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            if($process==8){
                $data['emdevide']=$this->db->query("SELECT t1.*,t2.name as process_name FROM emdevide as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."' ".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            $uri='?process='.$process.'&start='.$data['start'].'&end='.$data['end'].((isset($name) && !empty($name))?('&name='.$name):'');
            $data['button']=base_url('PrintAll/process_print').$uri;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/process/process',$data);
        $this->load->view('admin/controller/footer');
    }
    public function process_print()
    {
        $data['page_title']="Print";
        $process=$this->input->get('process');
        $name=$this->input->get('name'); 
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $data['display']=false;
        if(isset($process) && !empty($process) && isset($start) && !empty($start) && isset($end) && !empty($end)  ){
            $data['display']=true;
            $data['process_id']=$process;
            if($process==2 || $process==3 || $process==4 ){
                $data['processing']=$this->db->query("SELECT t1.*,t2.name as process_name FROM process as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."'".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            if($process==5){
                $data['ghadi']=$this->db->query("SELECT t1.*,t2.name as process_name FROM ghadi as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."'".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            if($process==6){
                $data['embroidery']=$this->db->query("SELECT t1.*,t2.name as process_name FROM embroidery as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."' ".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            if($process==7){
                $data['packing']=$this->db->query("SELECT t1.*,t2.name as process_name FROM packing as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."' ".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            if($process==8){
                $data['emdevide']=$this->db->query("SELECT t1.*,t2.name as process_name FROM emdevide as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process WHERE t1.sb_id='".$process."' and  t1.date  >='".$start."' and t1.date  <='".$end."' ".((isset($name) && !empty($name))?"and t1.name='".$name."'":"")." ORDER BY `t1`.`date` ASC")->result();
            }
            $data['display']=true;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/process/process_print',$data);
        $this->load->view('admin/controller/footer');
    }
    public function emdevide()
    {
        $data['page_title']="Print";
        $data['lot_no'] =$this->db->query("SELECT `lot_no` FROM `cut` ORDER BY `cut`.`lot_no` DESC")->result();
        $data['em_user'] = $this->General_model->get_data('em_user','status','*','1');
        $emuser_id=$this->input->get("emuser");
        $lot_no=$this->input->get("lot_no");
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $data['display']=false;
        if(isset($emuser_id) && !empty($emuser_id)){
            $data['em_devide'] = $this->db->query("SELECT t1.*,t2.em_name,t3.challan_no,t3.date FROM `emdevide_lot`as t1 LEFT JOIN   em_user as t2 ON t1.emuser_id = t2.emuser_id  LEFT JOIN   emdevide as t3 ON t1.emdevide_id = t3.emdevide_id WHERE t1.emuser_id='".$emuser_id."'".((isset($lot_no) && !empty($lot_no))?" and t1.lot_no='".$lot_no."'":"")."".((!empty($start) && !empty($end))?" and (t3.date >='".$start."' and t3.date <='".$end."')":"")." and t1.status='1'")->result();
            $data['emuser_name']=$this->General_model->get_row('em_user','emuser_id',$emuser_id);
            $data['display']=true;
            $data['edit_emuser']=$emuser_id;
            $data['edit_lotno']=$lot_no;
            $uri='?emuser='.$emuser_id.((isset($start) && !empty($start) && isset($end) && !empty($end)) ?('&start='.$data['start'].'&end='.$data['end']):"").((isset($lot_no) && !empty($lot_no))?('&lot_no='.$lot_no):'');
            $data['button']=base_url('PrintAll/emdevide_print').$uri;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/emdevide/emdevide',$data);
        $this->load->view('admin/controller/footer');
    }
    public function emdevide_print()
    {
        $data['page_title']="Print";
        $emuser_id=$this->input->get("emuser");
        $lot_no=$this->input->get("lot_no");
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $data['display']=false;
        if(isset($emuser_id) && !empty($emuser_id)){
            $data['em_devide'] = $this->db->query("SELECT t1.*,t2.em_name,t3.challan_no,t3.date FROM `emdevide_lot`as t1 LEFT JOIN   em_user as t2 ON t1.emuser_id = t2.emuser_id  LEFT JOIN   emdevide as t3 ON t1.emdevide_id = t3.emdevide_id WHERE t1.emuser_id='".$emuser_id."'".((isset($lot_no) && !empty($lot_no))?" and t1.lot_no='".$lot_no."'":"")."".((!empty($start) && !empty($end))?" and (t3.date >='".$start."' and t3.date <='".$end."')":"")." and t1.status='1'")->result();
            $data['emuser_name']=$this->General_model->get_row('em_user','emuser_id',$emuser_id);
            $data['display']=true;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/emdevide/emdevide_print',$data);
        $this->load->view('admin/controller/footer');
    }
    public function embroidery()
    {
        $data['page_title']="Print";
        $data['lot_no'] =$this->db->query("SELECT `lot_no` FROM `cut` ORDER BY `cut`.`lot_no` DESC")->result();
        $data['em_user'] = $this->General_model->get_data('em_user','status','*','1');
        $emuser_id=$this->input->get("emuser");
        $lot_no=$this->input->get("lot_no");
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $data['display']=false;
        if(isset($emuser_id) && !empty($emuser_id)){
            $data['embroidery'] = $this->db->query("SELECT t1.*,t2.em_name,t3.challan_no,t3.date FROM `embroidery_lot`as t1 LEFT JOIN   em_user as t2 ON t1.emuser_id = t2.emuser_id  LEFT JOIN   embroidery as t3 ON t1.embroidery_id = t3.embroidery_id WHERE t1.emuser_id='".$emuser_id."'".((isset($lot_no) && !empty($lot_no))?" and t1.lot_no='".$lot_no."'":"")."".((!empty($start) && !empty($end))?" and (t3.date >='".$start."' and t3.date <='".$end."')":"")."")->result();
            $data['emuser_name']=$this->General_model->get_row('em_user','emuser_id',$emuser_id);
            $data['display']=true;
            $data['edit_emuser']=$emuser_id;
            $data['edit_lotno']=$lot_no;
            $uri='?emuser='.$emuser_id.((isset($start) && !empty($start) && isset($end) && !empty($end)) ?('&start='.$data['start'].'&end='.$data['end']):"").((isset($lot_no) && !empty($lot_no))?('&lot_no='.$lot_no):'');
            $data['button']=base_url('PrintAll/embroidery_print').$uri;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/embroidery/embroidery',$data);
        $this->load->view('admin/controller/footer');
    }
    public function embroidery_print()
    {
        $data['page_title']="Print";
        $emuser_id=$this->input->get("emuser");
        $lot_no=$this->input->get("lot_no");
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $data['display']=false;
        if(isset($emuser_id) && !empty($emuser_id)){
            $data['embroidery'] = $this->db->query("SELECT t1.*,t2.em_name,t3.challan_no,t3.date FROM `embroidery_lot`as t1 LEFT JOIN   em_user as t2 ON t1.emuser_id = t2.emuser_id  LEFT JOIN   embroidery as t3 ON t1.embroidery_id = t3.embroidery_id WHERE t1.emuser_id='".$emuser_id."'".((isset($lot_no) && !empty($lot_no))?" and t1.lot_no='".$lot_no."'":"")."".((!empty($start) && !empty($end))?" and (t3.date >='".$start."' and t3.date <='".$end."')":"")."")->result();
            $data['emuser_name']=$this->General_model->get_row('em_user','emuser_id',$emuser_id);
            $data['display']=true;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/embroidery/embroidery_print',$data);
        $this->load->view('admin/controller/footer');
    }
    public function stock()
    {
        $data['page_title']="Print";
        $data['party']=$this->General_model->get_data('party','status','*',1);
        $data['display']=false;
        $party_id=$this->input->get("party");
        if(isset($party_id) && !empty($party_id)) {
            if($party_id=="all"){
                $data['stock']=$this->db->query("SELECT t1.*,t2.party_name,t3.item_name FROM stock as t1 LEFT JOIN party as t2 ON t1.party_id = t2.party_id LEFT JOIN item as t3 ON t1.item_id = t3.item_id WHERE t1.status='1'")->result();
                $data['party_name']="all";
            }else{
                $data['stock']=$this->db->query("SELECT t1.*,t2.party_name,t3.item_name FROM stock as t1 LEFT JOIN party as t2 ON t1.party_id = t2.party_id LEFT JOIN item as t3 ON t1.item_id = t3.item_id WHERE t1.status='1' and t1.party_id='".$party_id."'")->result();
                $data['party_name']=$this->General_model->get_row('party','party_id',$party_id);
                $data['party_name']=$data['party_name']->party_name;
            }
            $data['display']= true; 
            $data['edit_party']=$party_id;
            $data['button']=base_url('PrintAll/stock_print')."?party=".$party_id;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/stock/stock',$data);
        $this->load->view('admin/controller/footer');
    }
    public function stock_print()
    {
        $data['page_title']="Print";
        $data['display']=false;
        $party_id=$this->input->get("party");
        if(isset($party_id) && !empty($party_id)) {
            if($party_id=="all"){
                $data['stock']=$this->db->query("SELECT t1.*,t2.party_name,t3.item_name FROM stock as t1 LEFT JOIN party as t2 ON t1.party_id = t2.party_id LEFT JOIN item as t3 ON t1.item_id = t3.item_id WHERE t1.status='1'")->result();
                $data['party_name']="all";
            }else{
                $data['stock']=$this->db->query("SELECT t1.*,t2.party_name,t3.item_name FROM stock as t1 LEFT JOIN party as t2 ON t1.party_id = t2.party_id LEFT JOIN item as t3 ON t1.item_id = t3.item_id WHERE t1.status='1' and t1.party_id='".$party_id."'")->result();
                $data['party_name']=$this->General_model->get_row('party','party_id',$party_id);
                $data['party_name']=$data['party_name']->party_name;
            }
            $data['display']= true; 
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/stock/stock_print',$data);
        $this->load->view('admin/controller/footer');
    }
    public function party_pcs()
    {
        $data['page_title']="Party Detail";
        $data['party']=$this->General_model->get_data('party','status','*','1');
        $data['display']=false;
        $party_id=$this->input->get("party_id");
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);  
        }
        $end =$this->input->get('end'); 
        $data['end']=$end;
        if(isset($end) && !empty($end)){
            $end=explode('/',$end);
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);  
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/party_pcs/party_pcs',$data);
        $this->load->view('admin/controller/footer');
    }
}