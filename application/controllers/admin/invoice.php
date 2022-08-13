<?php 

class invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
            if($this->session->userdata('role_id')!= '1')
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>You Are Not Login
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>');
                redirect('auth/login');
            }
    }



    public function index()
    {
        $data['invoice'] = $this->m_invoice->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer'); 
    }


    public function detail($ivc_id)
    {
        $data['invoice'] = $this->m_invoice->get_id_invoice($ivc_id);
        $data['orders']  = $this->m_invoice->get_id_orders($ivc_id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer'); 
    }




}