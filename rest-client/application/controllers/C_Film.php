
<!-- Admin Control -->

<?php

class C_Film extends CI_Controller
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
        $this->load->view('Frontend/Admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Film';

        $this->form_validation->set_rules('judul', 'Film', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Rilis', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Frontend/Admin/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->M_Film->tambahDataFilm();
            redirect('C_Film');
        }
    }

    public function hapus($id)
    {
        $this->M_Film->hapusDataFilm($id);
        redirect('C_Film');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Film';
        $data['film'] = $this->M_Film->getFilmById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('Frontend/Admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Film';
        $data['film'] = $this->M_Film->getFilmById($id);
        $data['genre'] = ['Action', 'Horor', 'Fantasy', 'Adventure', 'Drama'];

        $this->form_validation->set_rules('judul', 'Film', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Rilis', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('Frontend/Admin/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_Film->ubahDataFilm();
            redirect('C_Film');
        }
    }

}
