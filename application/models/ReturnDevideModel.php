<?php
class ReturnDevideModel extends CI_Model 
{
    function __construct() {
        parent::__construct(); 
    }
    function allposts_count()
    {   
        $this->db->select('t1.*,t2.patla_name,t5.username as user_name'); 
        $this->db->join('patla as t2', 't1.patla_id  = t2.patla_id ', 'left');
        $this->db->join('master_admin as t5', 't1.user_id = t5.id_master', 'left');
        $query = $this->db->get('returndevide as t1');
        return $query->num_rows();
    }
    function allposts($limit,$start,$col,$dir)
    {   
        $this->db->select('t1.*,t2.patla_name,t5.username as user_name'); 
        $this->db->join('patla as t2', 't1.patla_id  = t2.patla_id ', 'left');
        $this->db->join('master_admin as t5', 't1.user_id = t5.id_master', 'left');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get('returndevide as t1');
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
        $query=$this->db->select('t1.*,t2.patla_name,t5.username as user_name')->from('returndevide as t1')
                ->join('patla as t2', 't1.patla_id  = t2.patla_id ', 'left')
                ->join('master_admin as t5', 't1.user_id = t5.id_master', 'left')
                ->group_start()
                        ->like('t2.patla_name',$search)
                        ->or_like('t5.username',$search)
                        ->or_like('t1.challan_no',$search)
                        ->or_like('t1.lot_no',$search)
                        ->or_like('t1.vahicle_no',$search)
                        ->or_like('t1.address',$search)
                        ->or_like('t1.returndevide_pcs',$search)
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
        $query=$this->db->select('t1.*,t2.patla_name,t5.username as user_name')->from('returndevide as t1')
                ->join('patla as t2', 't1.patla_id  = t2.patla_id ', 'left')
                ->join('master_admin as t5', 't1.user_id = t5.id_master', 'left')
                ->group_start()
                        ->like('t2.patla_name',$search)
                        ->or_like('t5.username',$search)
                        ->or_like('t1.challan_no',$search)
                        ->or_like('t1.lot_no',$search)
                        ->or_like('t1.vahicle_no',$search)
                        ->or_like('t1.address',$search)
                        ->or_like('t1.returndevide_pcs',$search)
                ->group_end()
                ->get();
        return $query->num_rows();
    }
    public function challan_no()
    {
        $query=$this->db->select('challan_no')->from('returndevide')
                ->order_by('id_returndevide',"DESC")
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