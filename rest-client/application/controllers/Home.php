<?php 

class Home extends CI_Controller {
    public function index($nama = '')
    {
        $data['judul'] = 'Halaman Home';
        $data['nama'] = $nama;
        $this->load->view('templates/header', $data);
        $this->load->view('Frontend/Home/index', $data);
        $this->load->view('templates/footer');
    }
}