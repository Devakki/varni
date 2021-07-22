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
        $data['page_title']="Print Patla";
        $data['patla'] = $this->General_model->get_data('patla','status','patla_name,patla_id','1');
        $patla_id=$this->input->get("patla");        
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $start = explode('/',$start); 
            $start =[$start[2],$start[1],$start[0]];
            $start=implode("-", $start);
            $data['start']=$start;
        }
        $end=$this->input->get('end');
        if(isset($end) && !empty($end)){
            $end = explode('/',$end); 
            $end =[$end[2],$end[1],$end[0]];
            $end=implode("-", $end);
            $data['end']=$end;
        }
        $data['display']=false;
        if(isset($patla_id) && !empty($patla_id)){
            $devide_query="SELECT t1.*,t2.patla_name FROM `devide`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'".((!empty($start) && !empty($end))?" and (t1.date >='".$start."' and t1.date <='".$end."')":"")."";
            $data['devide'] = $this->db->query($devide_query)->result();
            $rdevide_query="SELECT t1.*,t2.patla_name FROM `return_devide`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'".((!empty($start) && !empty($end))?" and (t1.date >='".$start."' and t1.date <='".$end."')":"")."";
            $data['returndevide'] = $this->db->query($rdevide_query)->result();
            $color="SELECT t1.*,t2.patla_name FROM `patla_color`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'".((!empty($start) && !empty($end))?" and (t1.date >='".$start."' and t1.date <='".$end."')":"")."";
            $data['color'] = $this->db->query($color)->result();            $data['display']=true;
            $data['edit_patla']=$patla_id;
            $uri='?patla='.$patla_id.((isset($start) && !empty($start) && isset($end) && !empty($end)) ?('&start='.$data['start'].'&end='.$data['end']):"");
            $data['button']=base_url('PrintAll/patla_print').$uri;
            $data['display']=true;
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
        $start=$this->input->get('start');
        if(isset($start) && !empty($start)){
            $data['start']=$start;
        }
        $end=$this->input->get('end');
        if(isset($end) && !empty($end)){
            $data['end']=$end;
        }
       
        if(isset($patla_id) && !empty($patla_id)){
            $devide_query="SELECT t1.*,t2.patla_name FROM `devide`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'".((!empty($start) && !empty($end))?" and (t1.date >='".$start."' and t1.date <='".$end."')":"")."";
            $data['devide'] = $this->db->query($devide_query)->result();
            $rdevide_query="SELECT t1.*,t2.patla_name FROM `return_devide`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'".((!empty($start) && !empty($end))?" and (t1.date >='".$start."' and t1.date <='".$end."')":"")."";
            $data['returndevide'] = $this->db->query($rdevide_query)->result();
            $color="SELECT t1.*,t2.patla_name FROM `patla_color`as t1 LEFT JOIN  patla as t2 ON t1.patla_id = t2.patla_id  WHERE t1.patla_id='".$patla_id."'".((!empty($start) && !empty($end))?" and (t1.date >='".$start."' and t1.date <='".$end."')":"")."";
            $data['color'] = $this->db->query($color)->result();            $data['display']=true;
            $data['edit_patla']=$patla_id;
            $uri='?patla='.$patla_id.((isset($start) && !empty($start) && isset($end) && !empty($end)) ?('&start='.$data['start'].'&end='.$data['end']):"");
            $data['button']=base_url('PrintAll/patla_print').$uri;
            $data['display']=true;
        }
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/print/patla/patla_print',$data);
        $this->load->view('admin/controller/footer');
    }
}