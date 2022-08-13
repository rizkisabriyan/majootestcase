<?php

class m_category extends CI_Model{

    public function standart_data()
    {
        return $this->db->get_where('product', array('category'=>'standart'));
    }
    public function lifestyle_data()
    {
        return $this->db->get_where('product', array('category'=>'lifestyle'));
    }
    public function desktop_data()
    {
        return $this->db->get_where('product', array('category'=>'desktop'));
    }
    public function advance_data()
    {
        return $this->db->get_where('product', array('category'=>'advance'));
    }
    


}