<?php

class m_invoice extends CI_Model{
    
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $name       = $this->input->post('name');
        $address    = $this->input->post('address');

        $invoice = array (
            'ivc_nm'      => $name,
            'address'   => $address,
            'order_dt'  => date('Y-m-d H:i:s'),
            'lmt_tm_pay'  => date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'), date('m'), date('d') + 1,date('y'))),
        );
        $this->db->insert('invoice', $invoice);
        $ivc_id = $this->db->insert_id();

        foreach ($this->cart->contents() as $item)
        {
            $data = array(
                'ivc_id'    =>  $ivc_id,
                'prd_id'    =>  $item['id'],
                'prd_nm'    =>  $item['name'],
                'qty'       =>  $item['qty'],
                'price'     =>  $item['price'],
            );
            $this->db->insert('orders',$data);
        }
          return TRUE;
    }

    public function tampil_data()
    {
        $result = $this->db->get('invoice');
        if($result->num_rows() > 0)
        {
            return $result->result();
        }
        else
        {
            return false;
        }
    }


    public function get_id_invoice($ivc_id)
    {
        $result = $this->db->where('ivc_id', $ivc_id)->limit(1)->get('invoice');
        if ($result->num_rows() > 0 )
        {
            return $result->row();
        }
        else
        {
            return false;
        }
    }


    public function get_id_orders($ivc_id)
    {
        $result = $this->db->where('ivc_id', $ivc_id)->limit(1)->get('orders');
        if ($result->num_rows() > 0 )
        {
            return $result->result();
        }
        else
        {
            return false;
        }
    }




}