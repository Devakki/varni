<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PatlaColor extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('General_model');
        $this->load->model('CutModel');
        $this->load->model('PatlaColorModel');
        $this->load->model('LogModel');
        $this->General_model->auth_check();
        $this->General_model->auth_role2();
        
    }
    public function index()
    {
        $this->General_model->auth_check();
        $data['page_title']="Patla Color";
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/patlacolor/index',$data);
        $this->load->view('admin/controller/footer');
    }
    public function get_addfrm()
    {
        $this->General_model->auth_check();
        $data['page_title']="Patla Color entry";
       
        $data['color']=$this->General_model->get_data('color','status','*','1');
        $data['patla']=$this->General_model->get_data('patla','status','*','1');
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/patlacolor/create',$data);
        $this->load->view('admin/controller/footer');
    }
    public function create()
    {
        $this->General_model->auth_check();
        $date = explode('/',$this->input->post('date')); 
        $date =[$date[2],$date[1],$date[0]];
        $date=implode("-", $date);
        $patla_id=$this->input->post('patla');
        $total_qty=$this->input->post('t_color_qty');
        $total=trim($this->input->post("total"));      
        if(isset($date) && !empty($date) &&  isset($patla_id) && !empty($patla_id) && isset($total_qty) && !empty($total_qty) && isset($total) && !empty($total)){
           
            $detail=[
                    'date'=>$date,
                    'patla_id'=>$patla_id,
                    'month'=>date('m'),
                    'year'=>date('Y'),
                    'total_qty'=>$total_qty,
                    'total'=>$total,
                    'status'=>'1',
                    'created_at'=>date("Y-m-d h:i:s")];
            $patlacolor = $this->General_model->addid('patlacolor',$detail);
            $msg="Patla Color insert id ".$patlacolor;
            $this->LogModel->simplelog($msg);
            $i=0;
           
            foreach($this->input->post('color') as $lt)
            {
                $color=$this->input->post('color')[$i];
                $qty=$this->input->post('qty')[$i];
                $rate=$this->input->post('rate')[$i];
                $amount=$this->input->post('amount')[$i];
                if(isset($color) && !empty($color) && isset($qty) && !empty($qty) && isset($rate) && !empty($rate)&& isset($amount) && !empty($amount)){
                    $cut_lot=["patlacolor_id"=>$patlacolor,
                                "color_id"=> $color,
                                "qty"=>$qty,
                                'rate'=>$rate,
                                "amount"=>$amount,
                                "created_at"=>date("Y-m-d h:i:s")];
                    $this->General_model->add('patlacolordetail',$cut_lot);
                }
                $i++;
            }
            $sess_data = ['status'  => 'success',
                            'msg'  => 'Cut Added' ];
            $this->session->set_userdata($sess_data);       
            redirect('PatlaColor/view_invoice/'.$cut);
        }else{
            $sess_data = ['status'  => 'error',
                            'msg'  => 'Something Is Worng' ];
            $this->session->set_userdata($sess_data);   
            redirect('PatlaColor/get_addfrm/');
        }
    }
    public function getLists(){
        $columns = array( 
                    0 =>'patlacolor_id', 
                    1 => 'patla_name',
                    2 => 'date',
                    3 => 'total_qty',
                    4 => 'total'
                );
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
        $totalData = $this->PatlaColorModel->allposts_count();
        $totalFiltered = $totalData; 
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->PatlaColorModel->allposts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 
            $posts =  $this->PatlaColorModel->posts_search($limit,$start,$search,$order,$dir);
            $totalFiltered = $this->PatlaColorModel->posts_search_count($search);
        }
        $data = array();
        if(!empty($posts))
        {
            $i=1;
            foreach ($posts as $post)
            {  
               $button='<a href="'.base_url('PatlaColor/get_editfrm/').$post->patlacolor_id.'"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                        <a href="'.base_url('PatlaColor/view_invoice/').$post->patlacolor_id.'"><button type="button" class="btn btn-custom waves-effect btn-sm  waves-light"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                        <button type="button" class="btn btn-danger waves-effect btn-sm waves-light" data-id="delete" data-value="'.$post->patlacolor_id.'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                
              
                $nestedData['sr_no'] =$i;
                $nestedData['patlacolor_id'] =$post->patlacolor_id;
                $nestedData['patla_name'] =$post->patla_name;
                $nestedData['month'] =$post->month;
                $nestedData['year'] =$post->year;
                $nestedData['total_qty'] =$post->total_qty;
                $nestedData['total'] = $post->total;
                $nestedData['date'] =date('d/m/Y',strtotime($post->date));
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
                    'purchase_mtr'=>$tp_mtr,
                    'total_pcs'=>$t_pcs,
                    'total_fent'=>$t_fent ];
            $this->General_model->update('cut',$detail,'id_cut',$cut_id);
            $msg="Cut Update Lotno  ".$cut->lot_no;
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
                                    "lot_no"=>$cut->lot_no,
                                    "challan_no"=>$challan,
                                    "party_id"=>$cut->party_id,
                                    "item_id"=>$cut->item_id,
                                    "p_mtr"=>$p_mtr,
                                    'pcs'=>$pcs,
                                    "fent"=>$fent,
                                    "created_at"=>date("Y-m-d h:i:s")];
                        $where =['party_id'=>$cut->party_id,'item_id'=>$cut->item_id,'challan_no'=>$challan];
                        $update=['status'=>0,'lot_no'=>$cut->lot_no];
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
        $data['page_title']="Patla Color";
        $data['patlacolor'] = $this->db->query("SELECT t1.*,t2.patla_name FROM patlacolor as t1 LEFT JOIN patla as t2 ON t1.patla_id = t2.patla_id WHERE patlacolor_id='".$id."'")->row();
        $data['patlacolordetail'] =  $this->db->query("SELECT t1.*,t2.color_name FROM patlacolordetail as t1 LEFT JOIN color as t2 ON t1.color_id = t2.color_id ")->result();
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/patlacolor/invoice',$data);
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
    public function check_lotno()
    {
        $this->General_model->auth_check();
        $lot_no=$this->input->post('lot_no');
        if(isset($lot_no) && !empty($lot_no)){
            $check_lot=$this->db->query("SELECT * FROM `cut` WHERE `lot_no`='".$lot_no."'")->num_rows();
            if($check_lot > 0){
                $data['status']="error";
                $data['msg']="Lot No Already Exist";
            }else{
                $check_lot=$this->db->query("SELECT * FROM `balance` WHERE `lot_no`='".$lot_no."'")->num_rows();
                if($check_lot > 0){
                    $data['status']="error";
                    $data['msg']="Lot No Already Exist";
                }else{
                    $data['status']="success";
                }
            }
        }else{
            $data['status']="error";
            $data['msg']="Something is Worng";              
        }
        echo json_encode($data);
    }
}