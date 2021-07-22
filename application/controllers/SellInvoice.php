<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  SellInvoice extends CI_Controller {
	function __construct() {
        parent::__construct();        
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('General_model');
        $this->load->model('Genral_datatable');
        $this->load->database(); $this->General_model->auth_check();
        $this->General_model->auth_role2();
    }
	public function index()
	{
		$this->General_model->auth_check();
		$data['page_title']="Sale Invoice";
		$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/sales/invoice_detail',$data);
		$this->load->view('admin/controller/footer');
	}
	public function get_addfrm()
	{
		$this->General_model->auth_check();
		$data["party"]=$this->General_model->get_all_where('party','status','1');
		$data["items"]=$this->General_model->get_all_where('item','status','1');
		$data["method"]="add";
		$data['page_title']="Sale Invoice";
		$data["settings"]=$this->General_model->get_data('settings','s_index','*','1');
		$data['invoice']=$this->db->query("SELECT invoice_no FROM sell_invoice ORDER BY invoice_no DESC LIMIT 1")->row();
		$data["transport"]=$this->General_model->get_data('transport','status','*','1'); 
		$data['action']=base_url('SellInvoice/create');
		$date=date("Y-m-d", strtotime("-7days"));
		
		if(empty($data['invoice'])){
			$data['invoice']= array('no_invoice' => '1');
		}else{
			$no_invoice=(($data['invoice']->invoice_no)+1);
			$data['invoice']= array('no_invoice' =>$no_invoice);
		}
		$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/partial/sell_invoice',$data);
		$this->load->view('admin/controller/footer');
	}
	public function create()
	{
		$this->General_model->auth_check();
		$bill_type=$this->input->post("bill_type");
		$gst_type=$this->input->post("gst_type");
		$invoice_no=$this->input->post("invoice_no");
		$party_id=$this->input->post("party_id");
		$transport_id=$this->input->post("transport_id");
		
		$date=$this->input->post("date");
		$date=explode("/", $date);
		$date=[$date[2],$date[1],$date[0]];
		$date=implode("-", $date);
		$s_total=$this->input->post("sub_total");
		$all_gst=$this->input->post("all_gst");
		$g_total=$this->input->post("grand_total");		
		if(isset($bill_type) && !empty($bill_type) &&  isset($invoice_no) && !empty($invoice_no) && isset($party_id) && !empty($party_id) &&  isset($date) && !empty($date) && isset($s_total) && !empty($s_total) &&  isset($g_total) && !empty($g_total)   ) {		
			$i=0;
			$query=$this->db->query("SELECT * from party where `party_id`='".$party_id."'")->row();
			if(isset($transport_id) && !empty($transport_id) && $transport_id !=0){
				$transport=$this->General_model->get_row('transport','transport_id',$transport_id);
				$transport_id=$transport_id;
				$transport_name=$transport->name;
			}else{
				$transport_id=NULL;
				$transport_name=NULL;
			}
			$sell_invoice=['bill_type'=>$bill_type,
							'gst_type'=>$gst_type,
							'party_id'=>$party_id,
							'invoice_no'=>$invoice_no,
							'transport_id'=>$transport_id,
							'transport_name'=>$transport_name,
							'buyer_name'=>$query->party_name,
							'address'=>$query->address,
							'city'=>$query->city,
							'state'=>'West bangal',
							'country'=>'india',
							'date'=>$date,
							'mobile'=>$query->mobile_number,							
							'subtotal'=>$s_total,
							'all_gst'=>$all_gst,
							'grandtotal'=>$g_total,
							'status'=>'1',
							'created_at'=>date("Y-m-d h:i:s")
						];
			$this->db->insert('sell_invoice',$sell_invoice);
			$lastid= $this->db->insert_id();			
			foreach ($this->input->post("item_id") as $pr) {
				$item_id=$this->input->post("item_id")[$i];
				$cut_mtr=$this->input->post("cut_mtr")[$i];
				$quality=$this->input->post("quality")[$i];
				$t_meter=$this->input->post("total_mtr")[$i];
				$price=$this->input->post("item_price")[$i];
				$total=$this->input->post("total")[$i];
				$igst=$this->input->post("igst")[$i];
				
				$amount=$this->input->post("amount")[$i];
				if(!empty($item_id) && !empty($quality) && !empty($price)&& !empty($total)&& !empty($amount) && !empty($lastid)) {
					$setting=$this->General_model->get_data('settings','s_index','*','1');
					if($gst_type=="1"):	
						$sell_product=['sellinvoice_id'=>$lastid,
											'item_id'=>$item_id,
											'quality'=>$quality,
											'cut_mtr'=>$cut_mtr,
											't_meter'=>$t_meter,
											'price'=>$price,
											'date'=>$date,
											'total'=>$total,
											'sgst_p'=>$setting[0]->s_value,
											'cgst_p'=>$setting[1]->s_value,
											'cgst'=>$cgst,
											'sgst'=>$sgst,
											'amount'=>$amount,
											'status'=>1,					
											'created_at'=>date("Y-m-d h:i:s")];
					else:
						$sell_product=['sellinvoice_id'=>$lastid,
											'item_id'=>$item_id,
											'quality'=>$quality,
											'cut_mtr'=>$cut_mtr,
											't_mtr'=>$t_meter,
											'price'=>$price,
											'date'=>$date,
											'total'=>$total,
											'igst_p'=>$setting[2]->s_value,
											'igst'=>$igst,
											'amount'=>$amount,
											'status'=>1,					
											'created_at'=>date("Y-m-d h:i:s")];
					endif;				
						$this->db->insert('sell_product',$sell_product);		
					} 		
					$i++;
				}
				
				$this->session->set_userdata('Msg','Invoice Created');
			}else{
				$this->session->set_userdata('Msg','warning');			
			}					
			redirect('SellInvoice');
	}
	public function getLists(){
			$this->General_model->auth_check();
			$table='sell_invoice';
			$order_column_array=array('id_sell', 'bill_type','gst_type','invoice_no','buyer_name','address','city','state','country','date','mobile','subtotal','all_gst','grandtotal');
			$search_order= array('bill_type','invoice_no','address','buyer_name','city','date','mobile','subtotal','all_gst','grandtotal');
			$order_by_array= array('id_sell' => 'ASC');
	        $data = $row = array();
	        $Master_Data = $this->Genral_datatable->getRows($_POST,$table,$order_column_array,$search_order,$order_by_array);
	        $i = $_POST['start'];
	        foreach($Master_Data as $m_data){
	            $i++;
	            $data[] = 	[$i,
	    					ucwords($m_data->buyer_name),
	    					date('d/m/Y',Strtotime($m_data->date)),
	    					'OC/'.$m_data->invoice_no,
	    					$m_data->grandtotal,
	    					'<a href="'.base_url('SellInvoice/get_editfrm/').$m_data->id_sell.'"><button type="button" class="btn btn-custom waves-effect waves-light"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
	    					<button type="button" class="btn btn-danger waves-effect waves-light" data-id="delete" data-value="'.$m_data->id_sell.'"><i class="fa fa-trash" aria-hidden="true"></i></button>
	    					<a href="'.base_url('SellInvoice/invoice/').$m_data->id_sell.'"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-eye"></i></button></a>
	    					'];
	        }
	        $output = array(
	            "draw" => $_POST['draw'],
	            "recordsTotal" => $this->Genral_datatable->countAll($table),
	            "recordsFiltered" => $this->Genral_datatable->countFiltered($_POST,$table,$order_column_array,$search_order,$order_by_array),
	            "data" => $data,
	        );
	        echo json_encode($output);
	}
	public function get_editfrm($id){
		$this->General_model->auth_check();
		$data['method']="edit"; 
		$data['page_title']="Sale Invoice"; 
		$data["party"]=$this->General_model->get_all_where('party','status','1');
		$data["item"]=$this->General_model->get_all_where('item','status','1');	    	    	
		$data['sell_invoice']=$this->General_model->get_row('sell_invoice','id_sell',$id);
		$data["settings"]=$this->General_model->get_data('settings','s_index','*','1');
		$data["sell_product"]=$this->General_model->get_data('sell_product','sellinvoice_id','*',$id);
		$data["transport"]=$this->General_model->get_data('transport','status','*','1');
		$date=date("Y-m-d", strtotime("-7days"));
		$pfine=$this->db->query("SELECT SUM(`fine`) as tfine FROM `sellpurchase_item` WHERE `date`<= '".$date."'")->row();
		$sfine=$this->db->query("SELECT SUM(`sfine`) as sfine FROM `sell_product` WHERE `sellinvoice_id` != '".$id."'")->row();
		if(isset($pfine->tfine) && !empty($pfine->tfine) && $pfine->tfine >=$sfine->sfine){
			$data['tfine']=($pfine->tfine-$sfine->sfine);
		}else{
			$data['tfine']=0;
		}
		$data['action']=base_url('SellInvoice/update');
		$this->load->view('admin/controller/header');
		$this->load->view('admin/controller/sidebar');
		$this->load->view('admin/partial/sell_invoice',$data);
		$this->load->view('admin/controller/footer');
	}
    public function update(){
		$this->General_model->auth_check();
		$bill_type=$this->input->post("bill_type");
		$gst_type=$this->input->post("gst_type");
		$transport_id=$this->input->post("transport_id");	
		$invoice_no=$this->input->post("invoice_no");
		$party=$this->input->post("party_id");	
		$date=$this->input->post("date");
		$date=explode("/", $date);
		$date=[$date[2],$date[1],$date[0]];
		$date=implode("-", $date);
		$pand_fine=$this->input->post("pand_fine");
		$touch=$this->input->post("touch");
		$s_total=$this->input->post("sub_total");
		$all_gst=$this->input->post("all_gst");
		$g_total=$this->input->post("grand_total");
		$id_sell=$this->input->post("id_sell");	
		if(isset($bill_type) && !empty($bill_type) &&  isset($invoice_no) && !empty($invoice_no) && isset($party) && !empty($party) &&  isset($date) && !empty($date) && isset($s_total) && !empty($s_total) &&  isset($g_total) && !empty($g_total) &&  isset($id_sell) && !empty($id_sell) && isset($pand_fine) && !empty($pand_fine) &&  isset($touch) && !empty($touch)) {		
	    			$i=0;
	    			$query=$this->db->query("SELECT t1.*,t2.name as city_name ,t3.name as state_name,t3.country FROM party as t1 LEFT JOIN city as t2 ON t1.city_id = t2.id LEFT JOIN state as t3 ON t1.state_id = t3.id WHERE t1.`id_party`='".$party."'")->row();
	    			if(isset($transport_id) && !empty($transport_id)){
	    				$transport=$this->General_model->get_row('transport','id',$transport_id);
	    				$transport_id=$transport_id;
	    				$transport_name=$transport->name;
	    			}else{
	    				$transport_id=NULL;
	    				$transport_name=NULL;
	    			}			
	    			$sell_invoice=['bill_type'=>$bill_type,
							'gst_type'=>$gst_type,
							'party_id'=>$party,
							'pand_find'=>$pand_fine,
							'touch'=>$touch,
							'transport_id'=>$transport_id,
							'transport_name'=>$transport_name,
							'invoice_no'=>$invoice_no,
							'buyer_name'=>$query->name,
							'address'=>$query->address,
							'city'=>$query->city_name,
							'state'=>$query->state_name,
							'country'=>$query->country,
							'date'=>$date,
							'mobile'=>$query->mobile,							
							'subtotal'=>$s_total,
							'all_gst'=>$all_gst,
							'grandtotal'=>$g_total
						];
	    			$this->General_model->update('sell_invoice',$sell_invoice,'id_sell',$id_sell);
	    			foreach ($this->input->post("item_id") as $pr) {
							$item_id=$this->input->post("item_id")[$i];
							$quality=$this->input->post("quality")[$i];
							$price=$this->input->post("item_price")[$i];
							$total=$this->input->post("total")[$i];
							$fine=$this->input->post("fine")[$i];
							$id_sellitem=$this->input->post("sellitem")[$i];
							$amount=$this->input->post("amount")[$i];
							$setting=$this->General_model->get_data('settings','s_index','*','1');
							if(isset($id_sellitem) && !empty($id_sellitem) && !empty($item_id) && !empty($quality) && !empty($price)&& !empty($total)&& !empty($amount)) {
								if($gst_type=="1"):
									$cgst=$this->input->post("cgst")[$i];
									$sgst=$this->input->post("sgst")[$i];	
									$sell_product=['sellinvoice_id'=>$id_sell,
														'item_id'=>$item_id,
														'quality'=>$quality,
														'date'=>$date,
														'sfine'=>$fine,
														'price'=>$price,
														'total'=>$total,
														'sgst_p'=>$setting[0]->s_value,
														'cgst_p'=>$setting[1]->s_value,
														'cgst'=>$cgst,
														'sgst'=>$sgst,
														'amount'=>$amount ];
								else:
									$igst=$this->input->post("igst")[$i];
									$sell_product=['sellinvoice_id'=>$id_sell,
														'item_id'=>$item_id,
														'date'=>$date,
														'sfine'=>$fine,
														'quality'=>$quality,
														'price'=>$price,
														'total'=>$total,
														'igst_p'=>$setting[2]->s_value,
														'igst'=>$igst,
														'amount'=>$amount ];
								endif;				
								$this->General_model->update('sell_product',$sell_product,'id_sellitem',$id_sellitem);	
								}elseif (!empty($item_id) && !empty($quality) && !empty($price)&& !empty($total)&& !empty($amount)) {
									if($gst_type=="1"):
											$cgst=$this->input->post("cgst")[$i];
											$sgst=$this->input->post("sgst")[$i];	
											$sell_product=['sellinvoice_id'=>$id_sell,
																'item_id'=>$item_id,
																'quality'=>$quality,
																'date'=>$date,
																'sfine'=>$fine,
																'price'=>$price,
																'total'=>$total,
																'sgst_p'=>$setting[0]->s_value,
																'cgst_p'=>$setting[1]->s_value,
																'cgst'=>$cgst,
																'sgst'=>$sgst,
																'amount'=>$amount,
																'status'=>1,					
																'created_at'=>date("Y-m-d h:i:s")];
										else:
											$igst=$this->input->post("igst")[$i];
											$sell_product=['sellinvoice_id'=>$id_sell,
																'item_id'=>$item_id,
																'date'=>$date,
																'sfine'=>$fine,
																'quality'=>$quality,
																'price'=>$price,
																'total'=>$total,
																'igst_p'=>$setting[2]->s_value,
																'igst'=>$igst,
																'amount'=>$amount,
																'status'=>1,					
																'created_at'=>date("Y-m-d h:i:s")];
										endif;				
										$this->db->insert('sell_product',$sell_product);
								}else{
								} 		
							$i++;
						}
					$sell_payment = ['bill_type'=>'2',
										'date'=>$date,
										'rs'=>$g_total,
										'party_id'=>$party,
										'party_name'=>$query->name,
										'status'=>'0'
										];
					$this->General_model->update('sell_payment',$sell_payment,'sellinvoice_id',$id_sell);
	    			$this->session->set_userdata('Msg','Invoice Updated');
	    	}else{
	    		$this->session->set_userdata('Msg','Something Worng');
	    	}
	    	redirect('SellInvoice');
	    }
	    public function delete($id)
	    {
	    	$this->General_model->auth_check();
	    	if(isset($id) && !empty($id)){
	    		$this->General_model->delete('sell_invoice','id_sell',$id);
	    		$this->General_model->delete('sell_product','sellinvoice_id',$id);
	    		$this->General_model->delete('sell_payment','sellinvoice_id',$id);  		
	    		$data['status']="success";
	    		$data['msg']="Invoice Deleted";
	    	}else{
	    		$data['status']="error";
	    		$data['msg']="Something is Worng";				
	    	}
	    	echo json_encode($data);
	    }
	    public function invoice($id)
	    {
	    	$this->General_model->auth_check();
			require_once APPPATH.'third_party/fpdf/fpdf.php';
	    	$pdf = new FPDF();
	    	$pdf->AddPage();
	    	setlocale(LC_MONETARY, 'en_IN');
	    	$sell_invoice=$this->General_model->get_row('sell_invoice','id_sell',$id);
	    	$sell_product=$this->db->query("SELECT t1.*,t2.item_name,t2.hsn_code  FROM sell_product as t1 LEFT JOIN item as t2 ON t1.item_id = t2.item_id WHERE t1.sellinvoice_id='".$id."'")->result(); 
	    	$party=$this->db->query("SELECT * from party WHERE party_id='".$sell_invoice->party_id."'")->row();
	    	$image=base_url('assets/admin/images/bill.jpg');
			$pdf->Image($image,0,0.5,210,0,'JPG');
			$pdf->SetFont('Arial','',9);
	    	$pdf->SetFont('Arial','',9);
			$pdf->SetXY(39,30);
			$pdf->Cell(40,5,ADDRESS1,0,1,'c');
			$pdf->SetFont('Arial','B',11);
			$pdf->SetXY(12,44);
			$pdf->Cell(40,5,ucfirst($sell_invoice->bill_type)." Memo",0,1,'L');
			
		
			$pdf->SetFont('Arial','',9);
			$pdf->SetXY(27,50.5);
			$city_code=((isset($party->city_code) && !empty($party->city_code))?" - ".$party->city_code:"");
			$pdf->MultiCell(96,5, strtoupper($party->party_name)."\n". strtoupper($party->address).", ".strtoupper($party->city),0,'L');
		
			/*invoice No*/
			
			$pdf->SetFont('Arial','',9);
			$pdf->SetXY(155,50.5);
			$pdf->Cell(20,5,$sell_invoice->invoice_no,0,1,'L');
		
			$pdf->SetFont('Arial','',9);
			$pdf->SetXY(155,56.5);
			$pdf->Cell(20,5,date('d/m/Y',strtotime($sell_invoice->date)),0,1,'L');
			$pdf->SetXY(35,76);
			$pdf->Cell(20,5,strtoupper($party->gst_number),0,1,'L');
			$state_code=((isset($party->state_code) && !empty($party->state_code))?" - ".$party->state_code:"");
			$pdf->SetXY(41,70);
			$pdf->Cell(20,5,strtoupper($sell_invoice->state),0,1,'L');
			$pdf->SetFont('Arial','B',9);
			$pdf->SetXY(12,220);
			$pdf->Cell(20,5,"GST No : ".strtoupper(GST_NO),0,1,'L');
			
			$pdf->SetXY(162,208);
			$pdf->Cell(37,5,number_format($sell_invoice->subtotal,2),0,1,'R');
			$pdf->SetXY(170,214.4);
			$pdf->Cell(29,5,number_format($sell_invoice->subtotal,2),0,1,'R');
			if($sell_invoice->gst_type==2){
				$pdf->SetXY(150,227);
				$pdf->Cell(20,5,"IGST   5.0%",0,1,'L');
				$pdf->SetXY(170,227);
				$pdf->Cell(29,5,number_format($sell_invoice->all_gst,2),0,1,'R');
			}else{
				$pdf->SetXY(138.5,223);
				$pdf->Cell(20,5,"SGST   1.5%",0,1,'L');
				$pdf->SetXY(170,223.5);
				$pdf->Cell(29,5,number_format(($sell_invoice->all_gst/2)),0,1,'R');
				$pdf->SetXY(138.5,230.5);
				$pdf->Cell(20,5,"CGST   1.5%",0,1,'L');
				$pdf->SetXY(170,230.5);
				$pdf->Cell(29,5,number_format(($sell_invoice->all_gst/2)),0,1,'R');
			}
			$pdf->SetXY(170,238.5);
			$pdf->Cell(29,5,number_format(($sell_invoice->grandtotal-($sell_invoice->subtotal+$sell_invoice->all_gst))),0,1,'R');
			$pdf->SetXY(170,255);
			$pdf->Cell(29,5,number_format($sell_invoice->grandtotal,2),0,1,'R');
			
			/*item*/
			$pdf->SetFont('Arial','',9);
			$i=1;
			$j=0;		
			foreach ($sell_product as $sell_product) {
				if($i<5){
					
					$pdf->SetXY(20,93+$j);
					$pdf->MultiCell(79.5,5,$sell_product->item_name,0,'L');
					$pdf->SetXY(40,93+$j);
					$pdf->MultiCell(79.5,5,$sell_product->Description,0,'L');
					$pdf->SetXY(100,93+$j);
					$pdf->MultiCell(13,5,$sell_product->hsn_code,0,'C');
					$pdf->SetXY(117,93+$j);
					$pdf->MultiCell(13,5,$sell_product->cut_mtr,0,'C');
					$pdf->SetXY(123,93+$j);
					$pdf->Cell(24,5,$sell_product->quality,0,1,'C');
					$pdf->SetXY(138,93+$j);
					$pdf->Cell(24,5,$sell_product->t_mtr,0,1,'C');
					$pdf->SetXY(153,93+$j);
					$pdf->Cell(27,5,number_format($sell_product->price,2),0,1,'C');
					$pdf->SetXY(165,93+$j);
					$pdf->Cell(27,5,number_format($sell_product->igst_p,2),0,1,'C');
					$pdf->SetXY(180,93+$j);
					$pdf->Cell(23,5,$sell_product->total,0,1,'C');
					$j=$j+15;
				}else{
				}
				$i++;
			}
			/*end item*/
			$g_total=$this->General_model->getIndianCurrency($sell_invoice->grandtotal);
			$pdf->SetFont('Arial','',9);			
			$pdf->SetXY(40,253);
			$pdf->MultiCell(125,5,$g_total,0,'L');
			$pdf->SetFont('Arial','',9);
			$pdf->SetXY(45,228.5);
			$pdf->Cell(40,5,"ICICI BANK  ",0,1,'L');
			$pdf->SetXY(45,234);
			$pdf->Cell(40,5,"239605500869 ",0,1,'L');
			$pdf->SetXY(45,239);
			$pdf->Cell(40,5,"ICIC0002396",0,1,'L');
			$pdf->SetFont('Arial','B',7);
			$pdf->SetXY(157,267);
			$pdf->Cell(40,5,"FOR Varni Print",0,0,'L');

			/*samksamsa
	    	$pdf->AddPage();
	    	setlocale(LC_MONETARY, 'en_IN');
	    	$sell_invoice=$this->General_model->get_row('sell_invoice','id_sell',$id);
	    	$sell_product=$this->db->query("SELECT t1.*,t2.name as item_name,t2.hsn_code  FROM sell_product as t1 LEFT JOIN item as t2 ON t1.item_id = t2.id_item WHERE t1.sellinvoice_id='".$id."'")->result(); 
	    	$party=$this->db->query("SELECT t1.*,t2.name as city_name,t2.code as city_code,t3.name as state_name,t3.code as state_code,t3.country,t1.pan_no FROM party as t1 LEFT JOIN city as t2 ON t1.city_id= t2.id LEFT JOIN state as t3 ON t1.state_id= t3.id WHERE t1.id_party='".$sell_invoice->party_id."'")->row();
	    	$image=base_url('assets/admin/images/invoice.png');
			$pdf->Image($image,5,5,200,0,'PNG');
			$pdf->SetFont('Arial','',9);
	    	$pdf->SetXY(45,41);
			$pdf->MultiCell(150,5,ADDRESS2,0,'L'); 
	    	$pdf->SetFont('Arial','',13);
			$pdf->SetXY(70,34);
			$pdf->Cell(40,5,ADDRESS1,0,1,'L');
			$pdf->SetFont('Arial','B',11);
			$pdf->SetXY(12,53);
			$pdf->Cell(40,5,ucfirst($sell_invoice->bill_type)." Memo",0,1,'L');
			$pdf->SetXY(92,53);
			$pdf->Cell(40,5,"TAX INVOICE",0,1,'L');
			$pdf->SetXY(178,53);
			$pdf->Cell(20,5,"Duplicate",0,1,'L');
			$pdf->SetFont('Arial','B',10);
			$pdf->SetXY(12,62);
			$pdf->Cell(15,5,"M/s :",0,1,'L');
			$pdf->SetXY(12,83);
			$pdf->Cell(20,5,"State :",0,1,'L');
			$pdf->SetXY(12,90);
			$pdf->Cell(40,5,"GST No :",0,1,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->SetXY(23,62);
			$city_code=((isset($party->city_code) && !empty($party->city_code))?" - ".$party->city_code:"");
			$pdf->MultiCell(95,5, strtoupper($party->name)."\n". strtoupper($party->address)." ".strtoupper($party->city_name).$city_code,0,'L');
			
			$pdf->SetFont('Arial','B',10);
			$pdf->SetXY(125,62);
			$pdf->Cell(40,5,"Invoice No :",0,1,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->SetXY(155,62);
			$pdf->Cell(20,5,"OC /".$sell_invoice->invoice_no,0,1,'L');
			$pdf->SetFont('Arial','B',10);
			$pdf->SetXY(125.2,72);
			$pdf->Cell(40,5,"Date :",0,1,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->SetXY(155,72);
			$pdf->Cell(20,5,date('d/m/Y',strtotime($sell_invoice->date)),0,1,'L');
			$pdf->SetXY(30,90);
			$pdf->Cell(20,5,strtoupper($party->gst_no),0,1,'L');
			$state_code=((isset($party->state_code) && !empty($party->state_code))?" - ".$party->state_code:"");
			$pdf->SetXY(30,83);
			$pdf->Cell(20,5,strtoupper($party->state_name.$state_code),0,1,'L');
			$pdf->SetFont('Arial','B',9);
			$pdf->SetXY(12,207);
			$pdf->Cell(20,5,"GST No : ".strtoupper(GST_NO),0,1,'L');
			$pdf->SetXY(12,213);
			$pdf->Cell(20,5,"Bank Name : ",0,1,'L');
			$pdf->SetXY(56,213);
			$pdf->Cell(20,5,"Branch : ",0,1,'L');
			$pdf->SetXY(12,218);
			$pdf->Cell(20,5,"Bank A/c No. : ",0,1,'L');
			$pdf->SetXY(12,223);
			$pdf->Cell(20,5,"RTGS/IFSC Code : ",0,1,'L');
			$pdf->SetXY(12,231);
			$pdf->Cell(20,5,"Bill Amount : ",0,1,'L');
			$pdf->SetXY(12,247);
			$pdf->Cell(20,5,"Note : ",0,1,'L');
			$pdf->SetXY(138.5,207);
			$pdf->Cell(20,5,"Sub Total : ",0,1,'L');
			$pdf->SetXY(138.5,216.4);
			$pdf->Cell(20,5,"Taxable Amount : ",0,1,'L');
			$pdf->SetXY(138.5,238.5);
			$pdf->Cell(20,5,"Round of : ",0,1,'L');
			$pdf->SetXY(138.5,247.5);
			$pdf->Cell(20,5,"Grand Total : ",0,1,'L');
			$pdf->SetXY(162,207);
			$pdf->Cell(37,5,number_format($sell_invoice->subtotal),0,1,'R');
			$pdf->SetXY(170,216.4);
			$pdf->Cell(29,5,number_format( $sell_invoice->subtotal),0,1,'R');
			if($sell_invoice->gst_type==2){
				$pdf->SetXY(138.5,227);
				$pdf->Cell(20,5,"IGST   3.0%",0,1,'L');
				$pdf->SetXY(170,227);
				$pdf->Cell(29,5,number_format($sell_invoice->all_gst),0,1,'R');
			}else{
				$pdf->SetXY(138.5,223);
				$pdf->Cell(20,5,"SGST   1.5%",0,1,'L');
				$pdf->SetXY(170,223.5);
				$pdf->Cell(29,5,number_format(($sell_invoice->all_gst/2)),0,1,'R');
				$pdf->SetXY(138.5,230.5);
				$pdf->Cell(20,5,"CGST   1.5%",0,1,'L');
				$pdf->SetXY(170,230.5);
				$pdf->Cell(29,5,number_format(($sell_invoice->all_gst/2)),0,1,'R');
			}
			$pdf->SetXY(170,238.5);
			$pdf->Cell(29,5,number_format(($sell_invoice->grandtotal-($sell_invoice->subtotal+$sell_invoice->all_gst))),0,1,'R');
			$pdf->SetXY(170,247.5);
			$pdf->Cell(29,5,number_format($sell_invoice->grandtotal),0,1,'R');
			$pdf->SetXY(10,97);
			$pdf->Cell(12,5,"Sr No",0,1,'C');
			$pdf->SetXY(24,97);
			$pdf->Cell(82,5,"Particular",0,1,'C');
			$pdf->SetXY(103,97);
			$pdf->Cell(20,5,"HSN",0,1,'C');
			$pdf->SetXY(120,97);
			$pdf->Cell(26,5,"Qty (in kg)",0,1,'C');
			$pdf->SetXY(146,97);
			$pdf->Cell(28,5,"Rate / kg",0,1,'C');
			$pdf->SetXY(174,97);
			$pdf->Cell(26,5,"Amount",0,1,'C');
			
			$pdf->SetFont('Arial','',9);
			$i=1;
			$j=0;		
			foreach ($sell_product as $sell_product) {
				if($i<5){
					$pdf->SetXY(10,105+$j);
					$pdf->Cell(12,5,$i,0,1,'C');
					$pdf->SetXY(24,105+$j);
					$pdf->MultiCell(79.5,5,$sell_product->item_name,0,'L');
					$pdf->SetXY(106,105+$j);
					$pdf->MultiCell(13,5,$sell_product->hsn_code,0,'C');
					$pdf->SetXY(121,105+$j);
					$pdf->Cell(24,5,$sell_product->quality,0,1,'C');
					$pdf->SetXY(147,105+$j);
					$pdf->Cell(27,5,number_format($sell_product->price,2),0,1,'C');
					$pdf->SetXY(176,105+$j);
					$pdf->Cell(23,5,$sell_product->total,0,1,'C');
					$j=$j+15;
				}else{
				}
				$i++;
			}
			
			$g_total=$this->General_model->getIndianCurrency($sell_invoice->grandtotal);
			$pdf->SetFont('Arial','',9);			
			$pdf->SetXY(12,237);
			$pdf->MultiCell(125,5,$g_total,0,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->SetXY(35,213);
			$pdf->Cell(40,5,"ICICI BANK  ",0,1,'L');
			$pdf->SetXY(72,213);
			$pdf->Cell(40,5,"Ranchhodnagar, Rajkot  ",0,1,'L');
			$pdf->SetXY(42,218);
			$pdf->Cell(40,5,"239605500869 ",0,1,'L');
			$pdf->SetXY(42,223);
			$pdf->Cell(40,5,"ICIC0002396",0,1,'L');
			$pdf->SetFont('Arial','B',7);
			$pdf->SetXY(157,255);
			$pdf->Cell(40,5,"FOR OM CASTING",0,0,'L');


		
	    	$pdf->AddPage();
	    	setlocale(LC_MONETARY, 'en_IN');
	    	$sell_invoice=$this->General_model->get_row('sell_invoice','id_sell',$id);
	    	$sell_product=$this->db->query("SELECT t1.*,t2.name as item_name,t2.hsn_code  FROM sell_product as t1 LEFT JOIN item as t2 ON t1.item_id = t2.id_item WHERE t1.sellinvoice_id='".$id."'")->result(); 
	    	$party=$this->db->query("SELECT t1.*,t2.name as city_name,t2.code as city_code,t3.name as state_name,t3.code as state_code,t3.country,t1.pan_no FROM party as t1 LEFT JOIN city as t2 ON t1.city_id= t2.id LEFT JOIN state as t3 ON t1.state_id= t3.id WHERE t1.id_party='".$sell_invoice->party_id."'")->row();
	    	$image=base_url('assets/admin/images/invoice.png');
			$pdf->Image($image,5,5,200,0,'PNG');
			$pdf->SetFont('Arial','',9);
	    	$pdf->SetXY(45,41);
			$pdf->MultiCell(150,5,ADDRESS2,0,'L'); 
	    	$pdf->SetFont('Arial','',13);
			$pdf->SetXY(70,34);
			$pdf->Cell(40,5,ADDRESS1,0,1,'L');
			$pdf->SetFont('Arial','B',11);
			$pdf->SetXY(12,53);
			$pdf->Cell(40,5,ucfirst($sell_invoice->bill_type)." Memo",0,1,'L');
			$pdf->SetXY(92,53);
			$pdf->Cell(40,5,"TAX INVOICE",0,1,'L');
			$pdf->SetXY(178,53);
			$pdf->Cell(20,5,"Triplicate",0,1,'L');
			$pdf->SetFont('Arial','B',10);
			$pdf->SetXY(12,62);
			$pdf->Cell(15,5,"M/s :",0,1,'L');
			$pdf->SetXY(12,83);
			$pdf->Cell(20,5,"State :",0,1,'L');
			$pdf->SetXY(12,90);
			$pdf->Cell(40,5,"GST No :",0,1,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->SetXY(23,62);
			$city_code=((isset($party->city_code) && !empty($party->city_code))?" - ".$party->city_code:"");
			$pdf->MultiCell(95,5, strtoupper($party->name)."\n". strtoupper($party->address).", ".strtoupper($party->city_name).$city_code,0,'L');
		
			$pdf->SetFont('Arial','B',10);
			$pdf->SetXY(125,62);
			$pdf->Cell(40,5,"Invoice No :",0,1,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->SetXY(155,62);
			$pdf->Cell(20,5,"OC /".$sell_invoice->invoice_no,0,1,'L');
			$pdf->SetFont('Arial','B',10);
			$pdf->SetXY(125.2,72);
			$pdf->Cell(40,5,"Date :",0,1,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->SetXY(155,72);
			$pdf->Cell(20,5,date('d/m/Y',strtotime($sell_invoice->date)),0,1,'L');
			$pdf->SetXY(30,90);
			$pdf->Cell(20,5,strtoupper($party->gst_no),0,1,'L');
			$state_code=((isset($party->state_code) && !empty($party->state_code))?" - ".$party->state_code:"");
			$pdf->SetXY(30,83);
			$pdf->Cell(20,5,strtoupper($party->state_name.$state_code),0,1,'L');
			$pdf->SetFont('Arial','B',9);
			$pdf->SetXY(12,207);
			$pdf->Cell(20,5,"GST No : ".strtoupper(GST_NO),0,1,'L');
			$pdf->SetXY(12,213);
			$pdf->Cell(20,5,"Bank Name : ",0,1,'L');
			$pdf->SetXY(56,213);
			$pdf->Cell(20,5,"Branch : ",0,1,'L');
			$pdf->SetXY(12,218);
			$pdf->Cell(20,5,"Bank A/c No. : ",0,1,'L');
			$pdf->SetXY(12,223);
			$pdf->Cell(20,5,"RTGS/IFSC Code : ",0,1,'L');
			$pdf->SetXY(12,231);
			$pdf->Cell(20,5,"Bill Amount : ",0,1,'L');
			$pdf->SetXY(12,247);
			$pdf->Cell(20,5,"Note : ",0,1,'L');
			$pdf->SetXY(138.5,207);
			$pdf->Cell(20,5,"Sub Total : ",0,1,'L');
			$pdf->SetXY(138.5,216.4);
			$pdf->Cell(20,5,"Taxable Amount : ",0,1,'L');
			$pdf->SetXY(138.5,238.5);
			$pdf->Cell(20,5,"Round of : ",0,1,'L');
			$pdf->SetXY(138.5,247.5);
			$pdf->Cell(20,5,"Grand Total : ",0,1,'L');
			$pdf->SetXY(162,207);
			$pdf->Cell(37,5,number_format($sell_invoice->subtotal),0,1,'R');
			$pdf->SetXY(170,216.4);
			$pdf->Cell(29,5,number_format( $sell_invoice->subtotal),0,1,'R');
			if($sell_invoice->gst_type==2){
				$pdf->SetXY(138.5,227);
				$pdf->Cell(20,5,"IGST   3.0%",0,1,'L');
				$pdf->SetXY(170,227);
				$pdf->Cell(29,5,number_format($sell_invoice->all_gst),0,1,'R');
			}else{
				$pdf->SetXY(138.5,223);
				$pdf->Cell(20,5,"SGST   1.5%",0,1,'L');
				$pdf->SetXY(170,223.5);
				$pdf->Cell(29,5,number_format(($sell_invoice->all_gst/2)),0,1,'R');
				$pdf->SetXY(138.5,230.5);
				$pdf->Cell(20,5,"CGST   1.5%",0,1,'L');
				$pdf->SetXY(170,230.5);
				$pdf->Cell(29,5,number_format(($sell_invoice->all_gst/2)),0,1,'R');
			}
			$pdf->SetXY(170,238.5);
			$pdf->Cell(29,5,number_format(($sell_invoice->grandtotal-($sell_invoice->subtotal+$sell_invoice->all_gst))),0,1,'R');
			$pdf->SetXY(170,247.5);
			$pdf->Cell(29,5,number_format($sell_invoice->grandtotal),0,1,'R');
			$pdf->SetXY(10,97);
			$pdf->Cell(12,5,"Sr No",0,1,'C');
			$pdf->SetXY(24,97);
			$pdf->Cell(82,5,"Particular",0,1,'C');
			$pdf->SetXY(103,97);
			$pdf->Cell(20,5,"HSN",0,1,'C');
			$pdf->SetXY(120,97);
			$pdf->Cell(26,5,"Qty (in kg)",0,1,'C');
			$pdf->SetXY(146,97);
			$pdf->Cell(28,5,"Rate / kg",0,1,'C');
			$pdf->SetXY(174,97);
			$pdf->Cell(26,5,"Amount",0,1,'C');
		
			$pdf->SetFont('Arial','',9);
			$i=1;
			$j=0;		
			foreach ($sell_product as $sell_product) {
				if($i<5){
					$pdf->SetXY(10,105+$j);
					$pdf->Cell(12,5,$i,0,1,'C');
					$pdf->SetXY(24,105+$j);
					$pdf->MultiCell(79.5,5,$sell_product->item_name,0,'L');
					$pdf->SetXY(106,105+$j);
					$pdf->MultiCell(13,5,$sell_product->hsn_code,0,'C');
					$pdf->SetXY(121,105+$j);
					$pdf->Cell(24,5,$sell_product->quality,0,1,'C');
					$pdf->SetXY(147,105+$j);
					$pdf->Cell(27,5,number_format($sell_product->price,2),0,1,'C');
					$pdf->SetXY(176,105+$j);
					$pdf->Cell(23,5,$sell_product->total,0,1,'C');
					$j=$j+15;
				}else{
				}
				$i++;
			}
			
			$g_total=$this->General_model->getIndianCurrency($sell_invoice->grandtotal);
			$pdf->SetFont('Arial','',9);			
			$pdf->SetXY(12,237);
			$pdf->MultiCell(125,5,$g_total,0,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->SetXY(35,213);
			$pdf->Cell(40,5,"ICICI BANK  ",0,1,'L');
			$pdf->SetXY(72,213);
			$pdf->Cell(40,5,"Ranchhodnagar, Rajkot  ",0,1,'L');
			$pdf->SetXY(42,218);
			$pdf->Cell(40,5,"239605500869 ",0,1,'L');
			$pdf->SetXY(42,223);
			$pdf->Cell(40,5,"ICIC0002396",0,1,'L');
			$pdf->SetFont('Arial','B',7);
			$pdf->SetXY(157,255);
					$pdf->Cell(40,5,"FOR OM CASTING",0,0,'L');
					/*end item*/
	    	$pdf->Output();
	    }
	    public function sellitem_delete($id)
	    {
	    	$this->General_model->auth_check();
	    	if(isset($id) && !empty($id)){
	    		$detail=$this->General_model->delete('sell_product','id_sellitem',$id);
	    		$data['status']="success";
	    		$data['msg']="Product Deleted";
	    	}else{
	    		$data['status']="error";
	    		$data['msg']="Something is Worng";				
	    	}
	    	echo json_encode($data);
	    }
}