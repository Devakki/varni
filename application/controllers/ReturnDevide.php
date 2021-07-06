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
		$data['page_title']="ReturnDevide";
		$data['party']=$this->General_model->get_data('party','status','*','1');
		$data['patla'] = $this->General_model->get_data('patla','status','patla_name,patla_id','1');
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
		if(isset($date) && !empty($date) && isset($patla_id) && !empty($patla_id) && isset($party_id) && !empty($party_id)&& isset($item_id) && !empty($item_id) && isset($total_pcs) && !empty($total_pcs)){
				$msg="ReturnDevide insert challan no ".$challan_no;
				$this->LogModel->simplelog($msg);
			$returndevide=['challan_no'=>$challan_no,
						'party_id'=>$party_id,
						'item_id'=>$item_id,							
						'date'=>$date,
						'patla_id'=>$patla_id,
						'total_pcs'=>$total_pcs,
						'user_id'=>$_SESSION['auth_user_id'],
						'status'=>'1',
						'created_at'=>date("Y-m-d h:i:s")];
			$returndevide1 = $this->General_model->addid('returndevide',$returndevide);
			$where =['party_id'=>$party_id,'item_id'=>$item_id,'challan_no'=>$challan_no];
			$update=['status'=>0];
			$this->General_model->update_where('cut',$update,$where);
			if($returndevide1)
			{
				$data_account =['patla_id'=>$patla_id, 'pcs'=>$total_pcs, 'type'=>'credit', 'cur_month'=>date('m'), 'cur_year'=>date('y'),'status'=>0];
				$ada_acoount = $this->General_model->addid('patla_account',$data_account);
				$sess_data = ['status'  => 'success',
				            'msg'  => 'ReturnDevide Added' ];
			$this->session->set_userdata($sess_data);		
			redirect('ReturnDevide/view_invoice/'.$returndevide);
			}
			
		}else{
			$sess_data = ['status'  => 'error',
				            'msg'  => 'Something Is Worng' ];
			$this->session->set_userdata($sess_data);	
			redirect('ReturnDevide/get_addfrm/');
		}
	}
	public function getLists(){
		$columns = array( 
                    0 =>'returndevide_id', 
                    2 =>'challan_no',
                    3=> 'date',
                    4 =>'patla_name',
                    6=> 'returndevide_pcs',
                    8=> 'user_name',
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
	    		if($_SESSION['auth_role_id']=="1"){
	    			$button='<a href="'.base_url('ReturnDevide/get_editfrm/').$post->returndevide_id.'"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
		        	<a href="'.base_url('ReturnDevide/view_invoice/').$post->returndevide_id.'"><button type="button" class="btn btn-custom btn-sm waves-effect waves-light"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
		        	<button type="button" class="btn btn-danger btn-sm waves-effect waves-light" data-id="delete" data-value="'.$post->returndevide_id.'"><i class="fa fa-trash" aria-hidden="true"></i></button>';
	    		}else{
	    			$button='<a href="'.base_url('ReturnDevide/get_editfrm/').$post->returndevide_id.'"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
		        		<a href="'.base_url('ReturnDevide/view_invoice/').$post->returndevide_id.'"><button type="button" class="btn btn-custom btn-sm waves-effect waves-light"><i class="fa fa-eye" aria-hidden="true"></i></button></a>';
	    		}
		        $nestedData['sr_no'] =$i;
		        $nestedData['challan_no'] =$post->challan_no;
		        $nestedData['date'] =date('d/m/Y',strtotime($post->date));
		        $nestedData['patla_name'] =$post->patla_name;
		        $nestedData['total_pcs'] = $post->total_pcs;
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
    	$data['returndevide']=$this->General_model->get_row('returndevide','returndevide_id',$id);
    	$cut=$this->db->query("SELECT SUM(total_pcs) as total_pcs FROM `cut` WHERE party_id='".$data['returndevide']->party_id."' and item_id='".$data['returndevide']->item_id."' and use_for='1'")->row();
    	$returndevide_pcs=$this->db->query("SELECT SUM(returndevide_pcs) as returndevide_pcs FROM `returndevide` WHERE party_id='".$data['returndevide']->party_id."' and item_id='".$data['returndevide']->item_id."' and returndevide_id != '".$id."'")->row();
    	$data['total_pcs']=$cut->total_pcs-$returndevide_pcs->returndevide_pcs;
    	$data['patla'] = $this->General_model->get_data('patla','status','*','1');
    	$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/returndevide/edit',$data);
		$this->load->view('admin/controller/footer');
    }
    public function update()
    {
    	$this->General_model->auth_check();
    	$lot_no=trim($this->input->post("lot_no"));
    	$returndevide_id=$this->input->post('returndevide_id');
    	$date = explode('/',$this->input->post('date')); 
    	$date =[$date[2],$date[1],$date[0]];
    	$date=implode("-", $date);
    	$vahicle=strtoupper(trim($this->input->post("vahicle")));
    	$vahicle_no=strtoupper(trim($this->input->post("vahicle_no")));
    	$total_pcs=$this->input->post('total_pcs');
    	$address=strtoupper(trim($this->input->post("address")));
    	$patla_id=$this->input->post('patla');
    	$pcs=$this->input->post('pcs');
    	if(isset($date) && !empty($date) && isset($patla_id) && !empty($patla_id) && isset($pcs) && !empty($pcs) && isset($returndevide_id) && !empty($returndevide_id)){
    		$lotno=
    		$msg="ReturnDevide Update lotno ".$lot_no;
			$this->LogModel->simplelog($msg);
    		$returndevide=['address'=>$address,
    					'vahicle'=>$vahicle,
    					'vahicle_no'=>$vahicle_no,
    					'date'=>$date,
    					'patla_id'=>$patla_id,
    					'returndevide_pcs'=>$pcs,
    					'total_pcs'=>$total_pcs,
    					'user_id'=>$_SESSION['auth_user_id'] ];
    			$this->General_model->update('returndevide',$returndevide,'returndevide_id',$returndevide_id);
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
    	$data['page_title']="ReturnDevide";
    	$data['returndevide']=$this->db->query("SELECT t1.*,t3.patla_name FROM returndevide as t1 LEFT JOIN patla as t3 ON t1.patla_id = t3.patla_id WHERE t1.returndevide_id='".$id."'")->row();
    	$data['party']=$this->db->query("SELECT t1.party_id,t2.party_name,t3.item_name,t2.srt_name,t2.gst_number FROM returndevide as t1 LEFT JOIN party as t2 ON t1.party_id =t2.party_id LEFT JOIN item as t3 ON t1.item_id =t3.item_id where t1.challan_no='".$data['returndevide']->challan_no."'")->row();
		
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
    		$cut_row=$this->General_model->get_row('cut','challan_no',$id);
    		$party_id=$cut_row->party_id;
    		$item_id=$cut_row->item_id;
    		$cut_pcs=$cut_row->total_pcs;
    		$cut_tpcs=$this->db->query("SELECT SUM(total_pcs) as total_pcs FROM `devide` WHERE party_id='".$party_id."' and item_id='".$item_id."' and challan_no ='".$id."'")->row();
    		$total_pcs=((empty($cut_tpcs->total_pcs) && !isset($cut_tpcs->total_pcs))?0:$cut_tpcs->total_pcs);
    		$data['flag']=['total_pcs'=>$total_pcs];
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
            $cut=$this->db->query("SELECT `challan_no` FROM `devide` WHERE `party_id`='".$party."' AND `item_id`='".$item."' AND `status`='1'");
           	$query=$cut->result();
            $data['challan_no']=$query;
            $data['status']="success";
		}
        echo json_encode($data);
    }
}