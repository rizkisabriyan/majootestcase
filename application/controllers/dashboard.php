<?php 

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
            if($this->session->userdata('role_id')!= '2')
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

    public function add_cart($id)
    {
        $product = $this->m_product->find($id);
        $data = array(
            'id'      => $product->prd_id,
            'qty'     => 1,
            'price'   => $product->price,
            'name'    => $product->prd_nm
        );
    
        $this->cart->insert($data);
        redirect('welcome');
    }

    public function detail_cart()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cart');
        $this->load->view('templates/footer');
    }

    public function delete_cart()
    {
        $this->cart->destroy();
        redirect('welcome/index');
    }


    public function payment()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('payment');
        $this->load->view('templates/footer');
    }

    public function order_process()
    {
        $is_processed =  $this->m_invoice->index();
        if($is_processed)
        {
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('order_process');
            $this->load->view('templates/footer');   
        }else{
            echo "Sorry, Your Order Has Failed To Process!";
        }
    }


    public function detail($prd_id)
    {
        $data['product'] = $this->m_product->detail_product($prd_id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_product',$data);
        $this->load->view('templates/footer');   


    }


}