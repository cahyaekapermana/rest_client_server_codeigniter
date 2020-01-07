<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class C_Login extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            //Do your magic here
            $this->load->helper('url');
            $this->load->model('M_Login');
        }
        
        public function index()
        {
            $this->load->view('templates/header');
            $this->load->view('Login/V_Login');
            $this->load->view('templates/footer');
        }

        public function c_proses_login()
        {
            # code...
            // $this->input->post('name dari input type datanya')
            $varUsername = $this->input->post('username');
            $varPassword = $this->input->post('password');
            // Cek ke Model
            $checkMethod = $this->M_Login->m_proses_login($varUsername, $varPassword);

            if ($checkMethod) {
                # code...
                foreach ($checkMethod as $row) {
                    # code...
                    // cek di kolom table
                    $this->session->set_userdata('session_user',$row->username);
                    $this->session->set_userdata('session_level',$row->level);

                    if ($this->session->userdata('session_level')=="user") {
                
                        redirect('C_User/index');
       
                    }elseif ($this->session->userdata('session_level')=="admin") {
                        
                        redirect('C_Film/index');
                    }
                
                }
            }else{
                $this->session->set_flashdata('category_error', 'Cek Kembali Username dan Password');
                redirect('C_Login/index');
            }
        }

    
    }
    
    /* End of file C_Login.php */
    