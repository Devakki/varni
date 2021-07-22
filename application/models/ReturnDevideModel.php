<?php
class ReturnDevideModel extends CI_Model 
{
    function __construct() {
        parent::__construct(); 
    }
    function allposts_count()
    {   
        $this->db->select('t1.*,t2.patla_name,t3.item_name,t4.party_name,t5.username as user_name'); 
        $this->db->join('patla as t2', 't1.patla_id  = t2.patla_id ', 'left');
        $this->db->join('item as t3', 't1.item_id  = t3.item_id ', 'left');
        $this->db->join('party as t4', 't1.party_id  = t4.party_id ', 'left');
        $this->db->join('master_admin as t5', 't1.user_id = t5.id_master', 'left');
        $query = $this->db->get('return_devide as t1');
        return $query->num_rows();
    }
    function allposts($limit,$start,$col,$dir)
    {   
        $this->db->select('t1.*,t2.patla_name,t3.item_name,t4.party_name,t5.username as user_name'); 
        $this->db->join('patla as t2', 't1.patla_id  = t2.patla_id ', 'left');
        $this->db->join('item as t3', 't1.item_id  = t3.item_id ', 'left');
        $this->db->join('party as t4', 't1.party_id  = t4.party_id ', 'left');
        $this->db->join('master_admin as t5', 't1.user_id = t5.id_master', 'left');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get('return_devide as t1');
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }
    function posts_search($limit,$start,$search,$col,$dir)
    {   
        $query=$this->db->select('t1.*,t2.patla_name,t3.item_name,t4.party_name,t5.username as user_name')->from('return_devide as t1')
                ->join('patla as t2', 't1.patla_id  = t2.patla_id ', 'left')
                ->join('item as t3', 't1.item_id  = t3.item_id ', 'left')
                ->join('party as t4', 't1.party_id  = t4.party_id ', 'left')
                ->join('master_admin as t5', 't1.user_id = t5.id_master', 'left')
                ->group_start()
                        ->like('t2.patla_name',$search)
                        ->or_like('t1.challan_no',$search)
                        ->or_like('t1.date',$search)
                        ->or_like('t1.g_total',$search)
                        ->or_like('t1.total_pcs',$search)
                        ->or_like('t5.username',$search)
                        ->or_like('t3.item_name',$search)
                        ->or_like('t4.party_name',$search)                        
                ->group_end()
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function posts_search_count($search)
    {
        $query=$this->db->select('t1.*,t2.patla_name,t3.item_name,t4.party_name,t5.username as user_name')->from('return_devide as t1')
                ->join('patla as t2', 't1.patla_id  = t2.patla_id ', 'left')
                ->join('item as t3', 't1.item_id  = t3.item_id ', 'left')
                ->join('party as t4', 't1.party_id  = t4.party_id ', 'left')
                ->join('master_admin as t5', 't1.user_id = t5.id_master', 'left')
                ->group_start()
                        ->like('t2.patla_name',$search)
                        ->or_like('t1.challan_no',$search)
                        ->or_like('t1.date',$search)
                        ->or_like('t1.g_total',$search)

                        ->or_like('t1.total_pcs',$search)
                        ->or_like('t5.username',$search)
                        ->or_like('t3.item_name',$search)
                        ->or_like('t4.party_name',$search)                        
                ->group_end()
                ->get();
        return $query->num_rows();
    }
    public function challan_no()
    {
        $query=$this->db->select('challan_no')->from('return_devide')
                ->order_by('returndevide_id',"DESC")
                ->limit('1')
                ->get();
        $count=$query->num_rows();
        if ($count > 0)
        {
            $result=$query->row(); 
            $result=['challan_no'=>$result->challan_no+1]; 
            return $result;  
        }
        else
        {
            $result=['challan_no'=>1];
            return $result; 
        } 
    }
}