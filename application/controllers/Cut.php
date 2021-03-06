<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  Cut extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('General_model');
        $this->load->model('CutModel');
        $this->load->model('LogModel');
        $this->General_model->auth_check();
        $this->General_model->auth_role2();
    }
    public function index()
    {
        $this->General_model->auth_check();
        $data['page_title']="Cut";
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/cut/index',$data);
        $this->load->view('admin/controller/footer');
    }
    public function get_addfrm()
    {
        $this->General_model->auth_check();
        $data['page_title']="Cut";
        $data['party']=$this->General_model->get_data('party','status','*','1');
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/cut/create',$data);
        $this->load->view('admin/controller/footer');
    }
    public function create()
    {
        $this->General_model->auth_check();
        $name=ucwords(trim($this->input->post("name")));
        $date = explode('/',$this->input->post('date')); 
        $date =[$date[2],$date[1],$date[0]];
        $date=implode("-", $date);
        $party_id=$this->input->post('party');
        $item_id=$this->input->post('item');        
        $tp_mtr=$this->input->post('tp_mtr');
        $t_pcs=$this->input->post('t_pcs');  
        $t_fent=$this->input->post('t_fent');        
        if(isset($name) && !empty($name) &&  isset($date) && !empty($date) &&  isset($party_id) && !empty($party_id) && isset($item_id) && !empty($item_id) && isset($tp_mtr) && !empty($tp_mtr) && isset($t_pcs) && !empty($t_pcs)){
            $challan_no=$this->CutModel->challan_no();
            $detail=[
                    'challan_no'=>$challan_no['challan_no'],                    
                    'date'=>$date,
                    'name'=>$name,
                    'party_id'=>$party_id,
                    'item_id'=>$item_id,
                    'total_purchase_mtr'=>$tp_mtr,
                    'total_pcs'=>$t_pcs,
                    'total_fent'=>$t_fent,
                    'status'=>'1',
                    'user_id'=>$_SESSION['auth_user_id'],
                    'created_at'=>date("Y-m-d h:i:s")];
            $cut = $this->General_model->addid('cut',$detail);
            $msg="Cut insert id ".$cut;
            $this->LogModel->simplelog($msg);
            $i=0;           
            foreach($this->input->post('schallan_no') as $lt)
            {
                $challan=$this->input->post('schallan_no')[$i];
                $p_mtr=$this->input->post('p_mtr')[$i];
                $pcs=$this->input->post('pcs')[$i];
                $fent=$this->input->post('fent')[$i];
                if(isset($challan) && !empty($challan) && isset($cut) && !empty($cut) && isset($pcs) && !empty($pcs)){
                    $cut_lot=["cut_id"=>$cut,
                                'date'=>$date,                              
                                "challan_no"=>$challan,
                                "party_id"=>$party_id,
                                "item_id"=>$item_id,
                                "p_mtr"=>$p_mtr,
                                'pcs'=>$pcs,
                                "fent"=>$fent,
                                "created_at"=>date("Y-m-d h:i:s")];
                    $where =['party_id'=>$party_id,'item_id'=>$item_id,'challan_no'=>$challan];
                    $update=['status'=>0];
                    $this->General_model->update_where('stock',$update,$where);
                    $this->General_model->add('cut_lot',$cut_lot);
                }
                $i++;
            }            
            $sess_data = ['status'  => 'success',
                            'msg'  => 'Cut Added' ];
            $this->session->set_userdata($sess_data);       
            redirect('Cut/view_invoice/'.$cut);
        }else{
            $sess_data = ['status'  => 'error',
                            'msg'  => 'Something Is Worng' ];
            $this->session->set_userdata($sess_data);   
            redirect('Cut/get_addfrm/');
        }
    }
    public function getLists(){
        $columns = array( 
                    0 =>'id_cut',
                    1 =>'challan_no',
                    2=> 'date',
                    3=> 'name',
                    4 =>'party_name',
                    5 =>'use_for',
                    6=> 'item_name',
                    7=> 'total_pcs',
                    8=> 'total_purchase_mtr',
                    9=> 'cut_mtr',
                    10=> 'total_fent',
                    11=>'user_name'
                );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
        $totalData = $this->CutModel->allposts_count();
        $totalFiltered = $totalData; 
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->CutModel->allposts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 
            $posts =  $this->CutModel->posts_search($limit,$start,$search,$order,$dir);
            $totalFiltered = $this->CutModel->posts_search_count($search);
        }
        $data = array();
        if(!empty($posts))
        {
            $i=1;
            foreach ($posts as $post)
            {  
                if($_SESSION['auth_role_id']=="1"){
                    $button='<a href="'.base_url('Cut/get_editfrm/').$post->id_cut.'"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                        <a href="'.base_url('Cut/view_invoice/').$post->id_cut.'"><button type="button" class="btn btn-custom waves-effect btn-sm  waves-light"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                        <button type="button" class="btn btn-danger waves-effect btn-sm waves-light" data-id="delete" data-value="'.$post->id_cut.'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                }else{
                    $button='<a href="'.base_url('Cut/get_editfrm/').$post->id_cut.'"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                        <a href="'.base_url('Cut/view_invoice/').$post->id_cut.'"><button type="button" class="btn btn-custom waves-effect btn-sm  waves-light"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
                }
                $nestedData['sr_no'] =$i;
                $nestedData['challan_no'] =$post->challan_no;
                $nestedData['name'] =$post->name;
                $nestedData['party_name'] =$post->party_name;
                $nestedData['item_name'] = $post->item_name;
                $nestedData['date'] =date('d/m/Y',strtotime($post->date));
                $nestedData['total_pcs'] =$post->total_pcs;
                $nestedData['purchase_mtr'] = $post->total_purchase_mtr;
                $nestedData['total_fent'] = $post->total_fent;
                $nestedData['user_name'] = strtoupper($post->user_name);
                $nestedData['button'] =$button;
                ;
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
        $data['page_title']="Cut";
        $data['cut']=$this->db->query("SELECT t1.*,t2.party_name,t3.item_name FROM cut as t1 LEFT JOIN party as t2 ON t1.party_id= t2.party_id LEFT JOIN item as t3 ON t1.item_id= t3.item_id where t1.id_cut='".$id."'")->row();
        $data['challan']=$this->db->query("SELECT challan_no FROM `stock` WHERE `party_id`='".$data['cut']->party_id."' and item_id='".$data['cut']->item_id."' and status='1'")->result();
        $stock=$this->db->query("SELECT SUM(`total_meter`) as total_meter FROM `stock` WHERE `party_id`='".$data['cut']->party_id."' AND `item_id`='".$data['cut']->item_id."'")->row();
        $cut_mtr=$this->db->query("SELECT SUM(`total_purchase_mtr`) as total_purchase_mtr FROM `cut` WHERE `party_id`='".$data['cut']->party_id."' AND `item_id`='".$data['cut']->item_id."' AND id_cut !='".$id."'")->row();
        $data['stock_mtr']=$stock->total_meter-$cut_mtr->total_purchase_mtr;  
        $data['cut_lot'] = $this->General_model->get_data('cut_lot','cut_id','*',$id);
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/cut/edit',$data);
        $this->load->view('admin/controller/footer');
    }
    public function update()
    {
        $this->General_model->auth_check();
        $cut_id=$this->input->post('cut_id');
        $name=ucwords(trim($this->input->post("name")));
        $date = explode('/',$this->input->post('date')); 
        $date =[$date[2],$date[1],$date[0]];
        $date=implode("-", $date);
        $tp_mtr=$this->input->post('tp_mtr');
        $t_pcs=$this->input->post('t_pcs');     
        $t_fent=$this->input->post('t_fent');   
        if(isset($name) && !empty($name) &&  isset($date) && !empty($date)  && isset($tp_mtr) && !empty($tp_mtr) && isset($t_pcs) && !empty($t_pcs)){
            $cut=$this->General_model->get_row('cut','id_cut',$cut_id);
            $detail=[
                    'date'=>$date,
                    'name'=>$name,
                    'total_purchase_mtr'=>$tp_mtr,
                    'total_pcs'=>$t_pcs,
                    'total_fent'=>$t_fent ];
            $this->General_model->update('cut',$detail,'id_cut',$cut_id);
            $msg="Cut Update id  ".$cut_id;
            $this->LogModel->simplelog($msg);
            $i=0;
            foreach($this->input->post('schallan_no') as $lt){
                    $challan=$this->input->post('schallan_no')[$i];
                    $p_mtr=$this->input->post('p_mtr')[$i];
                    $pcs=$this->input->post('pcs')[$i];
                    $fent=$this->input->post('fent')[$i];
                    $cutlot_id=$this->input->post('cutlot_id')[$i];
                    if( isset($cutlot_id) && !empty($cutlot_id) &&($challan) && !empty($challan) && isset($cut->id_cut) && !empty($cut->id_cut) && isset($pcs) && !empty($pcs) ){
                        $cut_lot=[
                                    'date'=>$date,                              
                                    "p_mtr"=>$p_mtr,
                                    'pcs'=>$pcs,
                                    "fent"=>$fent];
                        $this->General_model->update('cut_lot',$cut_lot,'cutlot_id',$cutlot_id);
                    }elseif (isset($challan) && !empty($challan) && isset($cut->id_cut) && !empty($cut->id_cut) && isset($pcs) && !empty($pcs)) {
                        $cut_lot=["cut_id"=>$cut->id_cut,
                                    'date'=>$date,                              
                                    "challan_no"=>$challan,
                                    "party_id"=>$cut->party_id,
                                    "item_id"=>$cut->item_id,
                                    "p_mtr"=>$p_mtr,
                                    'pcs'=>$pcs,
                                    "fent"=>$fent,
                                    "created_at"=>date("Y-m-d h:i:s")];
                        $where =['party_id'=>$cut->party_id,'item_id'=>$cut->item_id,'challan_no'=>$challan];
                        $update=['status'=>0];
                        $this->General_model->update_where('stock',$update,$where);
                        $this->General_model->add('cut_lot',$cut_lot);
                    }else{
                    }
                    $i++;
                }
                $sess_data = ['status'  => 'success',
                                    'msg'  => 'Cut Updated' ];
                $this->session->set_userdata($sess_data); 
                      
                redirect('Cut/view_invoice/'.$cut->id_cut);
            }else{
                $sess_data = ['status'  => 'error',
                                'msg'  => 'Something Is Worng' ];
                $this->session->set_userdata($sess_data);   
                redirect('Cut/get_editfrm/'.$cut_id);
        }
    }
    public function view_invoice($id)
    {
        $data['page_title']="Cut";
        $data['cut'] = $this->db->query("SELECT t1.*,t2.party_name,t3.item_name FROM cut as t1 LEFT JOIN party as t2 ON t1.party_id = t2.party_id LEFT JOIN item as t3 ON t1.item_id = t3.item_id WHERE id_cut='".$id."'")->row();
        $data['cut_lot'] = $this->General_model->get_data('cut_lot','cut_id','*',$id);
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/cut/invoice',$data);
        $this->load->view('admin/controller/footer');
    }
    public function delete($id)
    {
        $this->General_model->auth_check();
        if(isset($id) && !empty($id)){
            $cut=$this->General_model->get_row('cut','id_cut',$id);
            $cut_lot=$this->General_model->get_data('cut_lot','cut_id','*',$id);
            $msg=$msg="Cut delete Lotno  ".$cut->lot_no;
            $this->LogModel->simplelog($msg);
            foreach ($cut_lot as $cut_lot) {
                $stock=$this->db->query("select * from stock where party_id='".$cut_lot->party_id."' and challan_no='".$cut_lot->challan_no."' and item_id='".$cut_lot->item_id."' and status='0'")->num_rows();
                if($stock>0){
                    $where=['party_id'=>$cut_lot->party_id,'challan_no'=>$cut_lot->challan_no,'item_id'=>$cut_lot->item_id];
                    $this->General_model->update_where('stock',['status'=>1,'lot_no'=>NULL],$where);
                }
            }
            $this->General_model->delete('cut_lot','cutlot_id ',$id);
            $this->General_model->delete('balance','lot_no',$cut->lot_no);
            $data['status']="success";
            $data['msg']="Lot No ".LOT.$cut->lot_no." Deleted";
            $this->General_model->delete('cut','id_cut',$id);
        }else{
            $data['status']="error";
            $data['msg']="Something is Worng";              
        }
        echo json_encode($data);
    }
    public function get_item($id)
    {
        $this->General_model->auth_check();
        if(isset($id) && !empty($id)){
            $cut=$this->db->query("SELECT item_id FROM `stock` WHERE party_id='".$id."' GROUP BY `item_id`");
            $count=$cut->num_rows();
            if($count>0){
                $query=$cut->result();
                foreach ($query as $key=> $value) {
                    $item=$this->General_model->get_row('item','item_id',$value->item_id);
                    $items[]=[$item->item_id,$item->item_name];
                }
            $data['item']=$items;
            $data['status']="success";
            }else{
                $data['status']="error";
            }
        }else{
            $data['status']="error";
        }
        echo json_encode($data);
    }
    public function get_challan()
    {   
        $this->General_model->auth_check();
        $party=$this->input->post('party');
        $item=$this->input->post('item');
        if(isset($party) && !empty($party) && isset($item) && !empty($item)){
            $cut=$this->db->query("SELECT `challan_no` FROM `stock` WHERE `party_id`='".$party."' AND `item_id`='".$item."' AND `status`='1'");
              $count=$cut->num_rows();
            if($count>0){
                $query=$cut->result();
            $data['challan_no']=$query;
            $stock=$this->db->query("SELECT SUM(`total_meter`) as total_meter FROM `stock` WHERE `party_id`='".$party."' AND `item_id`='".$item."'")->row();
            $cut_mtr=$this->db->query("SELECT SUM(`total_purchase_mtr`) as total_purchase_mtr FROM `cut` WHERE `party_id`='".$party."' AND `item_id`='".$item."'")->row();
            $data['stock_mtr']=$stock->total_meter-$cut_mtr->total_purchase_mtr;            
            $data['status']="success";
            }else{
                $data['status']="error";
            }
        }else{
            $data['status']="error";
        }
        echo json_encode($data);
    }
    public function get_rowdetail()
    {   
        $this->General_model->auth_check();
        $party=$this->input->post('party');
        $item=$this->input->post('item');
        $challan_no=$this->input->post('challan');
        if(isset($party) && !empty($party) && isset($item) && !empty($item) && isset($challan_no) && !empty($challan_no)){
            $cut=$this->db->query("SELECT `total_meter`,`t_bala` FROM `stock` WHERE `party_id`='".$party."' AND `item_id`='".$item."' AND `challan_no`='".$challan_no."' AND `status`='1'");
            $count=$cut->num_rows();
            if($count>0){
                $query=$cut->row();
            $data['row']=$query;
            $data['status']="success";
            }else{
                $data['status']="error";
            }
        }else{
            $data['status']="error";
        }
        echo json_encode($data);
    }
}