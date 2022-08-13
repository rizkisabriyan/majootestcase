<?php 

class register extends CI_Controller
{
    
    public function index()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('username','username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.email]', ['is_unique' => 'This Email Already Registered!']);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', ['matches' => 'Password dont match!','min_length' => 'Password too short!']);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == FALSE)
        {
        $this->load->view('templates/header');
        $this->load->view('register');
        $this->load->view('templates/footer');
        }
        else
        {
            $data  = array (
                'id'        =>  '',
                'name'      =>  $this->input->post('name'),
                'username'  =>  $this->input->post('username'),
                'email'     =>  $this->input->post('email'),
                'password'  =>  $this->input->post('password1'),
                'role_id'   =>  2,
                'is_active' =>  1,
            );
            $this->db->insert('user',$data);
            redirect('auth/login');
        }
    }


}