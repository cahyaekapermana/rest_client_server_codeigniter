<?php 
use GuzzleHttp\Client;

class M_Film extends CI_model {
    
    // Semuanya di dapat dari rest-server file ci yang berbeda
    // cONSTRUCT
    private $_client;

    
    public function __construct()
    {
        // mahasiswa dari file direktori rest-server (rest-server/api/mahasiswa )
        // Get Server (Link lokasi rest server di file code igniter yang berbeda)
        $this->_client = new Client([
            // Source Rest-Server
            // mahasiswa adalah nama php dari rest servernya
            'base_uri' => 'http://localhost/ta_master_bismillah/rest-server/api/',
            'auth' => ['admin','1234']
        ]);
    }
    
    public function getAllFilm()
    {
        // mahasiswa dari file direktori rest-server (rest-server/api/mahasiswa )
        $response = $this->_client->request('GET','restServer_film',[
            // Autorization Postman
            'query' => [
                // Key dari rest.php dan database -> table key
                'cahya-api' => 'cahyaeka'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data']; 
        // Ambil ke database
        // return $this->db->get('mahasiswa')->result_array();
    }

    public function getFilmById($id)
    {

        $response = $this->_client->request('GET','restServer_film',[
            // Autorization Postman
            'query' => [
                // Key dari rest.php dan database -> table key
                'cahya-api' => 'cahyaeka',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data'][0];     
    }

    public function tambahDataFilm()
    {
        $data = [
            "judul" => $this->input->post('judul', true),
            "tahun" => $this->input->post('tahun', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "genre" => $this->input->post('genre', true),
            'cahya-api' => 'cahyaeka'
        ];

        $response = $this->_client->request('POST','restServer_film',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }

    public function hapusDataFilm($id)
    {
        $response = $this->_client->request('DELETE','restServer_film',[
            'form_params' => [
                'id' => $id,
                // dari rest.pho   dari kolom key di table key
                'cahya-api' => 'cahyaeka'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
        // // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa', ['id' => $id]);
    }

    public function ubahDataFilm()
    {
        $data = [
            "judul" => $this->input->post('judul', true),
            "tahun" => $this->input->post('tahun', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "genre" => $this->input->post('genre', true),
            "id" => $this->input->post('id', true),
            'cahya-api' => 'cahyaeka'

        ];

        $response = $this->_client->request('PUT','restServer_film',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('mahasiswa', $data);
    }

    // public function cariDataFilm()
    // {
    //     $keyword = $this->input->post('keyword', true);
    //     $this->db->like('nama', $keyword);
    //     $this->db->or_like('jurusan', $keyword);
    //     $this->db->or_like('nrp', $keyword);
    //     $this->db->or_like('email', $keyword);
    //     return $this->db->get('mahasiswa')->result_array();
    // }
}