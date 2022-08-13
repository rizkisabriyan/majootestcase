<?php 

class category extends CI_Controller
{
    
    public function standart()
    {
        $data['standart'] = $this->m_category->standart_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('standart', $data);
        $this->load->view('templates/footer');
    }
    public function lifestyle()
    {
        $data['lifestyle'] = $this->m_category->lifestyle_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lifestyle', $data);
        $this->load->view('templates/footer');
    }
    public function desktop()
    {
        $data['desktop'] = $this->m_category->desktop_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('desktop', $data);
        $this->load->view('templates/footer');
    }
    public function advance()
    {
        $data['advance'] = $this->m_category->advance_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('advance', $data);
        $this->load->view('templates/footer');
    }







}