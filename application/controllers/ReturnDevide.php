<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  ReturnDevide extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('General_model');
        $this->load->model('ReturnDevideModel');
        $this->load->model('LogModel');
        $this->General_model->auth_check();
        $this->General_model->auth_role2();
    }
	public function index()
	{
		$data['page_title']="ReturnDevide";
		$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/returndevide/index',$data);
		$this->load->view('admin/controller/footer');
	}
    public function get_addfrm()
    {
    	$this->General_model->auth_check();
		$data['page_title']="Return Devide";
		$data['party']=$this->General_model->get_data('party','status','*','1');
		$data['patla'] = $this->General_model->get_data('patla','status','*','1');
		$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/returndevide/create',$data);
		$this->load->view('admin/controller/footer');
    }
	public function create()
	{
		$this->General_model->auth_check();
		$date = explode('/',$this->input->post('date')); 
		$date =[$date[2],$date[1],$date[0]];
		$date=implode("-", $date);
		$total_pcs=$this->input->post('total_pcs');
		$patla_id=$this->input->post('patla');
		$item_id=$this->input->post('item');
		$party_id=$this->input->post('party');
		$challan_no=$this->input->post('challan');
		$miss_print=$this->input->post('miss_print');
		$rate=$this->input->post('rate');
		$total_rate=$this->input->post('total_rate');
		if(isset($date) && !empty($date) && isset($patla_id) && !empty($patla_id) && isset($party_id) && !empty($party_id)&& isset($item_id) && !empty($item_id) && isset($total_pcs) && !empty($total_pcs)){
			$devide_lot=$this->db->query("SELECT * FROM `devide` WHERE `devide_id`='".$challan_no."'")->row();
			$invoice_no=$this->ReturnDevideModel->challan_no();
			$devide=['challan_no'=>$invoice_no['challan_no'],
						'party_id'=>$party_id,
						'item_id'=>$item_id,							
						'date'=>$date,
						'cutlot_id'=>$devide_lot->cutlot_id,
						'devide_id'=>$devide_lot->devide_id,
						'devide_challan_no'=>$devide_lot->cutlot_challan,
						'patla_id'=>$patla_id,
						'total_pcs'=>$total_pcs,
						'miss_pcs'=>$miss_print,
						'rate'=>$rate,
						'g_total'=>$total_rate,
						'user_id'=>$_SESSION['auth_user_id'],
						'status'=>'1',
						'created_at'=>date("Y-m-d h:i:s")];
			$devide1 = $this->General_model->addid('return_devide',$devide);
			$where =['devide_id'=>$challan_no];
			$update=['status'=>0];
			$this->General_model->update_where('devide',$update,$where);
			$msg="Return Devide insert ID ".$devide1;
			$this->LogModel->simplelog($msg);			
			$sess_data = ['status'  => 'success',
				            'msg'  => 'Devide Added' ];
			$this->session->set_userdata($sess_data);
			redirect('Devide/view_invoice/'.$devide1);
		}else{
			$sess_data = ['status'  => 'error',
				            'msg'  => 'Something Is Worng' ];
			$this->session->set_userdata($sess_data);	
			redirect('Devide/get_addfrm/');
		}
	}
	public function getLists(){
		$columns = array( 
                    0 =>'returndevide_id', 
                    1 =>'challan_no',
                    2 =>'devide_challan_no',
                    3 => 'date',
                    4 =>'patla_name',
                    5 =>'item_name',
                    6 =>'party_name',
                    7 => 'total_pcs',
                    8 => 'g_total',
                    9=> 'user_name',
                );
		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];
		$totalData = $this->ReturnDevideModel->allposts_count();
		$totalFiltered = $totalData; 
		if(empty($this->input->post('search')['value']))
		{            
		    $posts = $this->ReturnDevideModel->allposts($limit,$start,$order,$dir);
		}
		else {
		    $search = $this->input->post('search')['value']; 
		    $posts =  $this->ReturnDevideModel->posts_search($limit,$start,$search,$order,$dir);
		    $totalFiltered = $this->ReturnDevideModel->posts_search_count($search);
		}
		$data = array();
		if(!empty($posts))
		{
		    $i=1;
		    foreach ($posts as $post)
		    {
				$button='<a href="'.base_url('ReturnDevide/get_editfrm/').$post->returndevide_id.'"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
	        	<a href="'.base_url('ReturnDevide/view_invoice/').$post->returndevide_id.'"><button type="button" class="btn btn-custom btn-sm waves-effect waves-light"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
	        	<button type="button" class="btn btn-danger btn-sm waves-effect waves-light" data-id="delete" data-value="'.$post->returndevide_id.'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
		        $nestedData['sr_no'] =$i;
		        $nestedData['challan_no'] =$post->challan_no;
		        $nestedData['devide_challan_no'] =$post->devide_challan_no;
		        $nestedData['date'] =date('d/m/Y',strtotime($post->date));
		        $nestedData['patla_name'] =$post->patla_name;
		        $nestedData['item_name'] =$post->item_name;
		        $nestedData['party_name'] =$post->party_name;
		        $nestedData['total_pcs'] = $post->total_pcs;
		        $nestedData['g_total'] = number_format($post->g_total,1);
		        $nestedData['user_name'] =strtoupper($post->user_name);
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
    	$data['page_title']="ReturnDevide";
    	$data['devide']=$this->General_model->get_row('return_devide','returndevide_id',$id);
    	$data['devide_lot'] = $this->General_model->get_row('devide','devide_id',$data['devide']->devide_id);
    	$data['patla'] = $this->General_model->get_row('patla','patla_id',$data['devide']->patla_id);
    	$data['party'] = $this->General_model->get_row('party','party_id',$data['devide']->party_id);
    	$data['item'] = $this->General_model->get_row('item','item_id',$data['devide']->item_id);
    	$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/returndevide/edit',$data);
		$this->load->view('admin/controller/footer');
    }
    public function update()
    {
    	$this->General_model->auth_check();
    	$returndevide_id=trim($this->input->post("returndevide_id"));
    	$date = explode('/',$this->input->post('date')); 
    	$date =[$date[2],$date[1],$date[0]];
    	$date=implode("-", $date);
    	$total_pcs=$this->input->post('total_pcs');
    	$rate=$this->input->post('rate');
    	$g_total=$this->input->post('total_rate');
    	$miss_print=$this->input->post('miss_print');
    	if(isset($date) && !empty($date) && isset($total_pcs) && !empty($total_pcs) && isset($returndevide_id) && !empty($returndevide_id)){   		
    		$return_devide=[ 'date'=>$date,
		    					'total_pcs'=>$total_pcs,
		    					'miss_pcs'=>$miss_print,
		    					'rate'=>$rate,
		    					'g_total'=>$g_total,
		    					'user_id'=>$_SESSION['auth_user_id'] 
		    			];
    			$this->General_model->update('return_devide',$return_devide,'returndevide_id',$returndevide_id);
    			$msg="Return Devide Update ID ".$returndevide_id;
				$this->LogModel->simplelog($msg);	
    			$sess_data = ['status'  => 'success',
    				            	'msg'  => 'ReturnDevide Updated' ];
    			$this->session->set_userdata($sess_data);		
    			redirect('ReturnDevide/view_invoice/'.$returndevide_id);
    		}else{
    			$sess_data = ['status'  => 'error',
    				            'msg'  => 'Something Is Worng' ];
    			$this->session->set_userdata($sess_data);	
    			redirect('ReturnDevide/get_editfrm/'.$returndevide_id);
    	}
    }
    public function view_invoice($id)
    {
    	$data['page_title']="Return Devide";
    	$data['returndevide']=$this->db->query("SELECT t1.*,t3.patla_name FROM return_devide as t1 LEFT JOIN patla as t3 ON t1.patla_id = t3.patla_id WHERE t1.returndevide_id='".$id."'")->row();
    	$data['party']=$this->db->query("SELECT t1.party_id,t2.party_name,t3.item_name,t2.srt_name,t2.gst_number FROM return_devide as t1 LEFT JOIN party as t2 ON t1.party_id =t2.party_id LEFT JOIN item as t3 ON t1.item_id =t3.item_id where t1.returndevide_id='".$data['returndevide']->returndevide_id."'")->row();    
    	$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/returndevide/invoice',$data);
		$this->load->view('admin/controller/footer');
    }
    public function delete($id)
    {
    	$this->General_model->auth_check();
    	if(isset($id) && !empty($id)){
    		$returndevide=$this->General_model->delete('returndevide','returndevide_id',$id);
    		$msg="ReturnDevide Deleted id ".$id;
			$this->LogModel->simplelog($msg);
    		$data['status']="success";
    		$data['msg']="ReturnDevide Deleted";
    	}else{
    		$data['status']="error";
    		$data['msg']="Something is Worng";				
    	}
    	echo json_encode($data);
    }
        public function totalpcs($id)
        { 			
        	$this->General_model->auth_check();
        	if(isset($id) && !empty($id)){
        		$data['status']="success";
        		$devide_row=$this->General_model->get_row('devide','devide_id',$id);
        		$data['data']=$devide_row;
        	}else{
        		$data['status']="error";
        		$data['msg']="Something is Worng";				
        	}
        	echo json_encode($data);
        }
    	public function get_challan()
        {   
            $this->General_model->auth_check();
            $party=$this->input->post('party');
            $item=$this->input->post('item');
            if(isset($party) && !empty($party) && isset($item) && !empty($item)){
                $devide=$this->db->query("SELECT `devide_id`,`cutlot_challan`,`total_pcs` FROM `devide` WHERE `party_id`='".$party."' AND `item_id`='".$item."' AND `status`='1'");
               	$query=$devide->result();
                $data['challan_no']=$query;
                $data['status']="success";
    		}
            echo json_encode($data);
        }
}