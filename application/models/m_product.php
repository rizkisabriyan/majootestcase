<?php

use LDAP\Result;

class m_product extends CI_Model{
    
    public function tampil_data()
    {
        return $this->db->get('product');
    }

    public function add_product($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function edit_product($where,$table)
    {
        return $this->db->get_where($table,$where);
    }

    public function update_product($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function delete_product($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('prd_id', $id)
                           ->limit(1)
                           ->get('product');
        if($result -> num_rows() > 0 )
        {
            return $result->row();
        }
        else
        {
            return array();
        }
    }


    public function detail_product($prd_id)
    {
        $result = $this->db->where('prd_id', $prd_id)->get('product');
        if($result->num_rows() > 0){
            return $result->result();
        }
        else
        {
            return false;
        }
    }




}