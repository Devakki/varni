<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Color extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('General_model');
        $this->load->model('Genral_datatable');
        $this->load->model('LogModel');
        $this->General_model->auth_superadmin();
    }
	public function index()
	{
		$this->General_model->auth_check();
		$data['page_title']="Color";
		$data["method"]="add";
		$data['frm_id']="Add_frm";
		$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/setting/color',$data);
		$this->load->view('admin/controller/footer');
	}
	public function create()
	{
		$this->General_model->auth_check();
		$name=ucwords(trim($this->input->post("name")));
		if(isset($name) && !empty($name)){
			$count=$this->General_model-> has_duplicate($name,'color','color_name');
			if($count>0){
				$data['status']="error";
				$data['msg']="Color Already Exist";	
			}else{
				$msg="Color insert ".$name;
				$this->LogModel->simplelog($msg);
				$detail=['color_name'=>$name,
							'status'=>'1',
							'created_at'=>date("Y-m-d h:i:s"),
							'user_id'=>$_SESSION['auth_user_id']];
			$detail=$this->db->insert('color',$detail);
			$data['status']="success";
			$data['msg']="Color Added" ;		
		}
		}else{
			$data['status']="error";
			$data['msg']="Something is Worng";				
		}
		echo json_encode($data);
	}
	public function getLists(){
		$this->General_model->auth_check();
		$table='color';
		$order_column_array=array('color_id', 'color_name');
		$search_order= array('color_name');
		$order_by_array= array('color_id' => 'ASC');
        $data = $row = array();
        $Master_Data = $this->Genral_datatable->getRows($_POST,$table,$order_column_array,$search_order,$order_by_array);
        $i = $_POST['start'];
        foreach($Master_Data as $m_data){
            $i++;
            $created = date( 'jS M Y', strtotime($m_data->created_at));
            $data[] = 	[$i,	        				
    					$m_data->color_name,
    					'<a href="'.base_url('Color/get_editfrm/').$m_data->color_id.'"><button type="button" class="btn btn-custom btn-sm "><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>'];
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Genral_datatable->countAll($table),
            "recordsFiltered" => $this->Genral_datatable->countFiltered($_POST,$table,$order_column_array,$search_order,$order_by_array),
            "data" => $data,
        );
        echo json_encode($output);
    }
	    public function get_editfrm($id)
	    {
	    	$this->General_model->auth_check();
	    	$data['method']="edit";
       		$data['frm_id']="Edit_frm";
       		$data['page_title']="Color";
	    	$data['result']=$this->General_model->get_row('color','color_id',$id);
	    	$this->load->view('admin/controller/header');
			$this->load->view('admin/controller/sidebar');
			$this->load->view('admin/setting/color',$data);
			$this->load->view('admin/controller/footer');
	    }
	    public function update()
	    {
	    	$this->General_model->auth_check();
		    $name=ucwords($this->input->post("name"));
			$status=$this->input->post("status");
			$id=$this->input->post("id");
	    	if(isset($name) && !empty($name)){
				$count=$this->General_model-> has_duplicate_query("select color_name from color where color_name ='".$name."' and color_id !='".$id."'");
				
				if($count>0){
					$data['status']="error";
		    		$data['msg']="Color Already Exist";
				}else{
					$msg="Color update ".$name;
					$this->LogModel->simplelog($msg);
		    		$detail=['color_name'=>$name,
		    			'user_id'=>$_SESSION['auth_user_id'],
						'status'=>$status,
						];
		    		$this->General_model->update('color',$detail,'color_id',$id);
		    		$data['status']="success";
		    		$data['msg']="Color Updated";
		    		}
		    	}else{
		    		$data['status']="error";
		    		$data['msg']="Something is Worng";				
		    	}
		    echo json_encode($data);
	    }
	    public function delete($id)
	    {
	    	$this->General_model->auth_check();
	    	if(isset($id) && !empty($id)){
	    		$msg="Color delete ".$id;
				$this->LogModel->simplelog($msg);
	    		$detail=$this->General_model->delete('item','id_item',$id);
	    		$data['status']="success";
	    		$data['msg']="Item Deleted";
	    	}else{
	    		$data['status']="error";
	    		$data['msg']="Something is Worng";				
	    	}
	    	echo json_encode($data);
	    }
}