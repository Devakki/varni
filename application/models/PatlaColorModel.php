<?php
class PatlaColorModel extends CI_Model 
{
    function __construct() {
        parent::__construct(); 
    }
    function allposts_count()
    {   
        $this->db->select('t1.*,t2.patla_name'); 
        $this->db->join('patla as t2', 't1.patla_id = t2.patla_id', 'left');
        $query = $this->db->get('patla_color as t1');
        return $query->num_rows();
    }
    function allposts($limit,$start,$col,$dir)
    {   
        $this->db->select('t1.*,t2.patla_name'); 
        $this->db->join('patla as t2', 't1.patla_id = t2.patla_id', 'left');
       $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get('patla_color as t1');
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
        $query=$this->db->select('t1.*,t2.patla_name')->from('patla_color as t1')
                ->join('patla as t2', 't1.patla_id = t2.patla_id', 'left')
                ->group_start()
                        ->like('t2.patla_name',$search)
                        ->or_like('t1.month',$search)
                        ->or_like('t1.date',$search)
                        ->or_like('t1.total_qty',$search)
                        ->or_like('t1.total',$search)
                        ->or_like('t1.year',$search)
                        ->or_like('t1.patlacolor_id',$search)
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
        $query=$this->db->select('t1.*,t2.patla_name')->from('patla_color as t1')
                ->join('patla as t2', 't1.patla_id = t2.patla_id', 'left')
                ->group_start()
                        ->like('t2.patla_name',$search)
                        ->or_like('t1.month',$search)
                        ->or_like('t1.date',$search)
                        ->or_like('t1.total_qty',$search)
                        ->or_like('t1.total',$search)
                        ->or_like('t1.year',$search)
                        ->or_like('t1.patlacolor_id',$search)
                ->group_end()
                ->get();
        return $query->num_rows();
    }
    public function challan_no()
    {
        $query=$this->db->select('challan_no')->from('patla_color')
                ->order_by('patlacolor_id ',"DESC")
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