
<!-- Guest Control -->

<?php

class C_Guest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Film');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Film';
        $data['film'] = $this->M_Film->getAllFilm();
        
        $this->load->view('templates/header', $data);
        $this->load->view('Frontend/Guest/index', $data);
        $this->load->view('templates/footer');
    }


}
