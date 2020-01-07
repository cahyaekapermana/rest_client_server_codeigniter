<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_Login extends CI_Model {
    
        public function m_proses_login($varUsername, $varPassword)
        {
            # code...
            $data = array(
                // Dari table   Dari variable
                'username' => $varUsername,
                'password' => $varPassword
            );

            $query = $this->db->get_where('user',$data);
            return $query->result();
        }
    
    }
    
    /* End of file M_Login.php */
    