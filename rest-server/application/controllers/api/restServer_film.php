<?php 

    
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');
        
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';

    class restServer_film extends REST_Controller {
    
        public function __construct(){
            parent::__construct();
            $this->load->model('RestFilm_model','server_film');
        }

        // Ambil data menggunakan id
        public function index_get(){
            
            $id = $this->get('id');
            
            if ($id == null) {
                # code...
                $server_film = $this->server_film->getFilm();
            }else{
                $server_film = $this->server_film->getFilm($id);

            }
            // penamaan  pengganti nama model = mahasiswa
            
            // Jika id tidak dipilih

            if($server_film){
                $this->response([
                    'status' => true,
                    'data' => $server_film
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code

            }else{
                $this->response([
                    'status' => false,
                    'message' => 'Ngga ada'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }

        }

        // Hapus data
        
        public function index_delete(){
            $id = $this->delete('id');

            // Jika id tidak dipilih
            if ($id == null) {
                # code...
                $this->response([
                    'status' => false,
                    'message' => 'id belum dipilih'
                ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
            
            // cek id di database
            }else{
                
                if ($this->server_film->deleteFilm($id) > 0) {
                    # code...
                    // kondisi id terhapus
                    $this->response([
                        'status' => true,
                        'id' => $id,
                        'message' => 'id yang dipilih berhasil dihapus'
                    ], REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (404) being the HTTP response code
    
                }else{
                    $this->response([
                        'status' => false,
                        'message' => 'id tidak ada'
                    ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code
    
                }
            }
        }

        // tambah Data
        public function index_post(){
            $data = [
                'tahun' => $this->post('tahun'),
                'judul' => $this->post('judul'),
                'deskripsi' => $this->post('deskripsi'),
                'genre' => $this->post('genre')
                
            ];

            if ($this->server_film->createFilm($data) > 0) {

                $this->response([
                    'status' => TRUE,
                    'message' => 'data film ditambah'
                ], REST_Controller::HTTP_CREATED); // NOT_FOUND (404) being the HTTP response code

            }else{
                $this->response([
                    'status' => false,
                    'message' => 'data gagal ditambah'
                ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code

            }
        }

        // Edit Data
        public function index_put()
        {
            # code...
            $id = $this->put('id');
            
            $data = [
                'tahun' => $this->put('tahun'),
                'judul' => $this->put('judul'),
                'deskripsi' => $this->put('deskripsi'),
                'genre' => $this->put('genre')
                
            ];

            if ($this->server_film->updateFilm($data, $id) > 0) {

                $this->response([
                    'status' => TRUE,
                    'message' => 'data film diubah'
                ], REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (404) being the HTTP response code

            }else{
                $this->response([
                    'status' => false,
                    'message' => 'data gagal diubah'
                ], REST_Controller::HTTP_BAD_REQUEST); // NOT_FOUND (404) being the HTTP response code

            }
        }
    
    }
    
    /* End of file Mahasiswa.php */
    