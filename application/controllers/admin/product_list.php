<?php 

class product_list extends CI_Controller
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
        $data['product'] = $this->m_product->tampil_data()->result(); 
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/footer');
        $this->load->view('admin/product_list', $data);

    }

    public function add_action()
    {
        $prd_nm         = $this->input->post('prd_nm');
        $descriptions   = $this->input->post('descriptions');
        $category       = $this->input->post('category');
        $price          = $this->input->post('price');
        $stock          = $this->input->post('stock');
        $picture        = $_FILES['picture']['name'];
                        if($picture = '')
                        {

                        }
                        else
                        {
                            $config ['upload_path'] = './uploads';
                            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

                            $this->load->library('upload', $config);
                            if (!$this->upload->do_upload('picture'))
                            {
                                echo "Failed to upload picture!";
                            }
                            else
                            {
                                $picture = $this->upload->data('file_name');
                            }
                        }
                        $data = array(
                            'prd_nm'        => $prd_nm,
                            'descriptions'  => $descriptions,
                            'category'      => $category,
                            'price'         => $price,
                            'stock'         => $stock,
                            'picture'       => $picture

                        );

                        $this->m_product->add_product($data, 'product');
                        redirect('admin/product_list/index');
    }


    public function edit($id)
    {
        $where = array('prd_id' => $id);
        $data['product'] = $this->m_product->edit_product($where, 'product')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/footer');
        $this->load->view('admin/edit_product', $data);
    }

    public function update()
    {
        $prd_id         = $this->input->post('prd_id');
        $prd_nm         = $this->input->post('prd_nm');
        $descriptions   = $this->input->post('descriptions');
        $category       = $this->input->post('category');
        $price          = $this->input->post('price');
        $stock          = $this->input->post('stock');
       // $prd_id         = $this->input->post('prd_id');

       $data = array(
            'prd_nm'        => $prd_nm,
            'descriptions'  => $descriptions,
            'category'      => $category,
            'price'         => $price,
            'stock'         => $stock
       );

       $where = array(
            'prd_id' => $prd_id 
       );

       $this->m_product->update_product($where,$data, 'product');

       redirect('admin/product_list/index');



    }
    
    public function delete($id)
    {
        $where = array('prd_id' => $id);
        $this->m_product->delete_product($where, 'product');
        redirect('admin/product_list/index');
    }


}