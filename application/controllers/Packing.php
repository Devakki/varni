<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  Packing extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('General_model');
        $this->load->model('PackingModel');
        $this->load->model('LogModel');
        $this->General_model->auth_check();
        $this->General_model->auth_role7();
    }
    public function index()
    {
        $data['page_title']="Packing";
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/packing/index',$data);
        $this->load->view('admin/controller/footer');
    }
    public function get_addfrm()
    {
        $this->General_model->auth_check();
        $data['page_title']="Packing";
        $data['party']=$this->General_model->get_data('party','status','*','1');
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/packing/create',$data);
        $this->load->view('admin/controller/footer');
    }
    public function create()
    {
        $this->General_model->auth_check();
       
        $party_id=trim($this->input->post('party'));
        $item_id=trim($this->input->post('item'));
        $date = explode('/',$this->input->post('date')); 
        $date =[$date[2],$date[1],$date[0]];
        $date=implode("-", $date);
        $challan_no=trim($this->input->post("challan"));
        if(isset($challan_no) && !empty($challan_no) &&  isset($date) && !empty($date) && isset($party_id) && !empty($party_id) && isset($item_id) && !empty($item_id))
        {
           
            $i=0;
            foreach ($this->input->post('bala_no') as $key) {
                $bala_no=$this->input->post('bala_no')[$i];
                $cut=$this->input->post('cut')[$i];
                $pcs=$this->input->post('pcs')[$i];
                $mno=$this->input->post('mno')[$i];
                if(isset($bala_no) && !empty($bala_no) && !empty($cut) && !empty($cut)  &&!empty($pcs)){
                      
                    $packing_lot=['party_id'=>$party_id,
                                    'item_id'=>$item_id,
                                    'challan_no'=>$challan_no,
                                    'bala_no'=>$bala_no,
                                    'cut'=>$cut,
                                    'pcs'=>$pcs,
                                    'mno'=>$mno,
                                    'status'=>1,
                                    'created_at'=>date("Y-m-d h:i:s")];
                    $this->General_model->add('packing',$packing_lot);
                    }
                $i++;
            }
            $sess_data = ['status'  => 'success',
                            'msg'  => 'Packing Added' ];
            $this->session->set_userdata($sess_data);       
            redirect('Packing/index/');
        }else{
            $sess_data = ['status'  => 'error',
                            'msg'  => 'Something Is Worng' ];
            $this->session->set_userdata($sess_data);   
            redirect('Packing/get_addfrm/');
        }
    }
    public function getLists(){
        $columns = array( 
                    0 =>'part_name ', 
                    1 =>'challan_no', 
                    2=> 'unique_code'
                );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
        $totalData = $this->PackingModel->allposts_count();
        $totalFiltered = $totalData; 
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->PackingModel->allposts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 
            $posts =  $this->PackingModel->posts_search($limit,$start,$search,$order,$dir);
            $totalFiltered = $this->PackingModel->posts_search_count($search);
        }
        $data = array();
        if(!empty($posts))
        {
            setlocale(LC_MONETARY, 'en_IN');
            $i=1;
            foreach ($posts as $post)
            {
              
                $button='<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                     <div class="btn-group" role="group">
                       <button id="btnGroupDrop1" type="button" class="btn btn-custom btn-sm waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fa fa-eye" aria-hidden="true"></i>
                       </button>
                       <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                       <a class="dropdown-item" href="'.base_url('Packing/view_invoice/').$post->packing_id .'">Invoice 1</a>
                         <a class="dropdown-item" href="'.base_url('Packing/view_invoice2/').$post->packing_id.'">Invoice 2</a>
                       </div>
                     </div>
                   </div>
                   <button type="button" class="btn btn-danger btn-sm waves-effect waves-light" data-id="delete" data-value="'.$post->packing_id .'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                
                $nestedData['sr_no'] =$i;
                $nestedData['challan_no'] =$post->challan_no;
                $nestedData['party_name'] =$post->party_name;
                $nestedData['button'] =$button;
                $data[] = $nestedData;
                $i++;
            }
        }
        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
        echo json_encode($json_data);
    }
    public function get_editfrm($id)
    {
    }
    public function update()
    {
    }
    public function view_invoice($id)
    {
        $data['page_title']="Packing";
        $data['packing']=$this->db->query("select p1.*,p2.party_name,i1.item_name from packing as p1,party as p2,item as i1 where p1.party_id=p2.party_id and p1.item_id=i1.item_id")->result();
       
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/packing/invoice',$data);
        $this->load->view('admin/controller/footer');
    }
    public function view_invoice2($id)
    {
        $data['page_title']="Packing";
        $data['packing']=$this->db->query("SELECT t1.*,t2.name as process_name FROM packing as t1 LEFT JOIN sub_process as t2 ON t1.sb_id = t2.id_sub_process where  t1.packing_id ='".$id."'")->row();
        if($data['packing']->child_sb=="A" || $data['packing']->child_sb=="D"){
            $data['balance']=$this->db->query("SELECT `ghadi_cloth` as process_val FROM `balance` WHERE lot_no=".$data['packing']->lot_no."")->row();
        }else{
            $data['balance']=$this->db->query("SELECT `embroidery_cloth` as process_val FROM `balance` WHERE lot_no=".$data['packing']->lot_no."")->row();
        }
        $data['packing_lot']=$this->db->query("SELECT t1.*,t2.patla_name ,t3.em_name FROM packing_lot as t1 LEFT JOIN patla as t2 ON t1.patla_id = t2.patla_id  LEFT JOIN em_user as t3 ON t1.emuser_id = t3.emuser_id WHERE packing_id='".$id."' ORDER BY `t1`.`design_no` ASC")->result();
        $data['party']=$this->db->query("SELECT t1.party_id,t2.srt_name,t2.gst_number FROM cut as t1 LEFT JOIN party as t2 ON t1.party_id =t2.party_id where t1.lot_no='".$data['packing']->lot_no."'")->row();
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/packing/invoice2',$data);
        $this->load->view('admin/controller/footer');
    }
    public function delete($id)
    {
        $this->General_model->auth_check();
        if(isset($id) && !empty($id)){
            $msg="packing delete id ".$id;
            $this->LogModel->simplelog($msg);
            $packing_lot=$this->General_model->get_data('packing_lot','packing_id','*',$id);
            foreach ($packing_lot as $key => $value) {
                $lot_no=$value->lot_no; 
                $design_unique=$value->unique_design;
                if($value->child_sb=="A"){
                    $where=['lot_no'=>$lot_no,'unique_design'=>$design_unique,'status'=>0,'child_sb'=>"A"];
                    $table='ghadi_lot';
                }elseif ($value->child_sb=="B"){
                    $where=['lot_no'=>$lot_no,'unique_design'=>$design_unique,'status'=>0,'child_sb'=>"B"];
                    $table='ghadi_lot';
                }
                elseif ($value->child_sb=="C"){
                    $where=['lot_no'=>$lot_no,'unique_design'=>$design_unique,'status'=>0];
                    $table='embroidery_lot';
                }
                elseif ($value->child_sb=="D"){
                    $where=['lot_no'=>$lot_no,'unique_design'=>$design_unique,'status'=>0,'child_sb'=>"C"];
                    $table='ghadi_lot';
                }else{
                }
                $data=['status'=>1];
                $this->General_model->update_where($table,$data,$where);
            }
            $this->General_model->delete('packing_lot','packing_id',$id);
            $this->General_model->delete('packing','packing_id',$id);
            $data['status']="success";
            $data['msg']="Packing Deleted";
        }else{
            $data['status']="error";
            $data['msg']="Something is Worng";              
        }
        echo json_encode($data);
    }
    public function get_design()
    {
        $this->General_model->auth_check();
        $lot_no=$this->input->post('lot_no');
        $child_sb=$this->input->post('child_sb'); 
        if(isset($lot_no) && !empty($lot_no) && isset($child_sb) && !empty($child_sb) ){
            if($child_sb=="A"){
                $data['design']=$this->db->query("SELECT gl_id as design_id,`n_design` as design FROM `ghadi_lot` WHERE lot_no='".$lot_no."' and child_sb='A' and status='1'")->result();
                $data['balance']=$this->db->query("SELECT ghadi_cloth as process_val FROM `balance` WHERE lot_no=".$lot_no."")->row();
            }elseif($child_sb=="B"){
                $data['design']=$this->db->query("SELECT el_id as design_id,`design_no` as design FROM embroidery_lot WHERE lot_no='".$lot_no."' and status='1'")->result();
                $data['balance']=$this->db->query("SELECT embroidery_cloth as process_val FROM `balance` WHERE lot_no=".$lot_no."")->row();
            }elseif($child_sb=="C"){
                $data['design']=$this->db->query("SELECT gl_id as design_id,`n_design` as design FROM `ghadi_lot` WHERE lot_no='".$lot_no."' and child_sb='B' and status='1'")->result();
                $data['balance']=$this->db->query("SELECT embroidery_cloth as process_val FROM `balance` WHERE lot_no=".$lot_no."")->row();
            }elseif ($child_sb=="D") {
                $data['design']=$this->db->query("SELECT gl_id as design_id,`n_design` as design FROM `ghadi_lot` WHERE lot_no='".$lot_no."' and child_sb='C' and status='1'")->result();
                $data['balance']=$this->db->query("SELECT ghadi_cloth as process_val FROM `balance` WHERE lot_no=".$lot_no."")->row();
            }else{
            }
            $data['status']="success";
        }else{
            $data['status']="error";
        }
        echo json_encode($data);
    }
    public function design_row()
    {
        $this->General_model->auth_check();
        $child_sb=$this->input->post('child_sb');
        $design=$this->input->post('design');
        $this->General_model->auth_check();
        if(isset($child_sb) && !empty($child_sb) && isset($design) && !empty($design) ){
            if($child_sb=="B"){
                $data['datail']=$this->db->query("SELECT t1.color as color ,t1.f_pcs as pcs ,t1.m_pcs as missprint,t1.patla_id, t2.patla_name as p_name,t3.em_name,t1.emuser_id,t1.ghat_saree FROM `embroidery_lot`as t1 LEFT JOIN patla as t2 on t1.`patla_id`=t2.patla_id  LEFT JOIN em_user as t3 on t1.`emuser_id` =t3.emuser_id  WHERE  t1.`el_id`='".$design."'" )->row();
            }else{
                $data['datail']=$this->db->query("SELECT t1.color as color ,t1.pcs as pcs ,t1.dmg_pcs as missprint,t1.patla_id, t2.patla_name as p_name,t3.em_name,t1.emuser_id,t1.ghat_saree FROM `ghadi_lot`as t1 LEFT JOIN patla as t2 on t1.`patla_id`=t2.patla_id  LEFT JOIN em_user as t3 on t1.`emuser_id` =t3.emuser_id  WHERE  t1.`gl_id`='".$design."'" )->row();
            }
            $data['status']="success";
        }else{
            $data['status']="error"; 
        }
        echo json_encode($data);
    }
}