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
        $data['page_title']="Patla Color";
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
        $new_date=explode('-',$date); 
        $patla_id=$this->input->post('patla');
        $total_qty=$this->input->post('t_color_qty');
        $total=trim($this->input->post("total"));      
        if(isset($date) && !empty($date) &&  isset($patla_id) && !empty($patla_id) && isset($total_qty) && !empty($total_qty) && isset($total) && !empty($total)){
            $invoice_no=$this->PatlaColorModel->challan_no();
            $detail=[
                'challan_no'=>$invoice_no['challan_no'],
                    'date'=>$date,
                    'patla_id'=>$patla_id,
                    'month'=>$new_date[1],
                    'year'=>$new_date[0],
                    'total_qty'=>$total_qty,
                    'total'=>$total,
                    'status'=>'1',
                    'created_at'=>date("Y-m-d h:i:s")];
            $patlacolor = $this->General_model->addid('patla_color',$detail);
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
                    $patla_color_lot=["patlacolor_id"=>$patlacolor,
                                "color_id"=> $color,
                                "qty"=>$qty,
                                'rate'=>$rate,
                                "amount"=>$amount,
                                'status'=>'1',
                                "created_at"=>date("Y-m-d h:i:s")];
                    $this->General_model->add('patla_color_lot',$patla_color_lot);
                }
                $i++;
            }
            $sess_data = ['status'  => 'success',
                            'msg'  => 'Patla Color Added' ];
            $this->session->set_userdata($sess_data);       
            redirect('PatlaColor/view_invoice/'.$patlacolor);
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
                    1 => 'challan_no',
                    2 => 'date',
                    3 => 'patla_name',
                    4 => 'month',
                    5 => 'year',
                    6 => 'total_qty',
                    7 => 'total'
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
                $nestedData['challan_no'] =$post->challan_no;
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
        $data['page_title']="Patla Color";
        $data['patla_color']=$this->General_model->get_row('patla_color','patlacolor_id',$id);
        $data['patla']=$this->General_model->get_row('patla','patla_id',$data['patla_color']->patla_id);
        $data['color']=$this->General_model->get_data('color','status','*','1');
        $data['patla_color_lot']=$this->General_model->get_data('patla_color_lot','patlacolor_id','*',$id);
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/patlacolor/edit',$data);
        $this->load->view('admin/controller/footer');
    }
    public function update()
    {
        $this->General_model->auth_check();
        $patlacolor_id = $this->input->post('patlacolor_id'); 
        $date = explode('/',$this->input->post('date')); 
        $date =[$date[2],$date[1],$date[0]];
        $date=implode("-", $date);
        $new_date=explode('-',$date); 
        $patla_id=$this->input->post('patla');
        $total_qty=$this->input->post('t_color_qty');
        $total=trim($this->input->post("total"));      
        if(isset($date) && !empty($date) &&  isset($patla_id) && !empty($patla_id) && isset($total_qty) && !empty($total_qty) && isset($total) && !empty($total) && isset($patlacolor_id) && !empty($patlacolor_id)){
            $detail=[
                    'date'=>$date,
                    'month'=>$new_date[1],
                    'year'=>$new_date[0],
                    'total_qty'=>$total_qty,
                    'total'=>$total,
                    ];
            $patlacolor = $this->General_model->update('patla_color',$detail,'patlacolor_id',$patlacolor_id);
            $msg="Patla Color Update id ".$patlacolor_id;
            $this->LogModel->simplelog($msg);
            $i=0;
            foreach($this->input->post('color') as $lt)
            {
                $color=$this->input->post('color')[$i];
                $qty=$this->input->post('qty')[$i];
                $rate=$this->input->post('rate')[$i];
                $amount=$this->input->post('amount')[$i];
                $lot_id=$this->input->post('lot_id')[$i];
                if(isset($color) && !empty($color) && isset($qty) && !empty($qty) && isset($rate) && !empty($rate)&& isset($amount) && !empty($amount) && isset($lot_id) && !empty($lot_id)){
                    $patla_color_lot=[
                                "color_id"=> $color,
                                "qty"=>$qty,
                                'rate'=>$rate,
                                "amount"=>$amount,
                                ];
                    $this->General_model->update('patla_color_lot',$patla_color_lot,'pcd_id',$lot_id);
                }else{
                    $patla_color_lot=["patlacolor_id"=>$patlacolor_id,
                                "color_id"=> $color,
                                "qty"=>$qty,
                                'rate'=>$rate,
                                "amount"=>$amount,
                                'status'=>'1',
                                "created_at"=>date("Y-m-d h:i:s")];
                    $this->General_model->add('patla_color_lot',$patla_color_lot);
                }
                $i++;
            }
            $sess_data = ['status'  => 'success',
                            'msg'  => 'Patla Color Updated' ];
            $this->session->set_userdata($sess_data);       
            redirect('PatlaColor/view_invoice/'.$patlacolor_id);
        }else{
            $sess_data = ['status'  => 'error',
                            'msg'  => 'Something Is Worng' ];
            $this->session->set_userdata($sess_data);   
            redirect('PatlaColor/get_addfrm/');
        }
    }
    public function view_invoice($id)
    {
        $data['page_title']="Patla Color";
        $data['patla_color'] = $this->db->query("SELECT t1.*,t2.patla_name FROM patla_color as t1 LEFT JOIN patla as t2 ON t1.patla_id = t2.patla_id WHERE patlacolor_id='".$id."'")->row();
        $data['patla_color_lot'] =  $this->db->query("SELECT t1.*,t2.color_name FROM patla_color_lot as t1 LEFT JOIN color as t2 ON t1.color_id = t2.color_id  WHERE patlacolor_id='".$id."'")->result();
        $this->load->view('admin/controller/header');
        $this->load->view('admin/controller/sidebar');
        $this->load->view('admin/patlacolor/invoice',$data);
        $this->load->view('admin/controller/footer');
    }
    public function delete($id)
    {
        $this->General_model->auth_check();
        if(isset($id) && !empty($id)){
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
}