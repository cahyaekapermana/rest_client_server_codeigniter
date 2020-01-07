<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class RestFilm_model extends CI_Model {
    
        public function getFilm($id = null)
        {
            if ($id == null) {
                # code...
                return $this->db->get('server_film')->result_array();
            }else{
                return $this->db->get_where('server_film',['id' => $id])->result_array();

            }
            # code...
        }

        public function deleteFilm($id)
        {
            # code...
            $this->db->delete('server_film' , ['id'=> $id]);
            return $this->db->affected_rows();
        }

        public function createFilm($data)
        {
            # code...
            $this->db->insert('server_film',$data);
            return $this->db->affected_rows();
        }
    
        public function updateFilm($data, $id)
        {
            # code...
            $this->db->update('server_film', $data, ['id' => $id]);
            return $this->db->affected_rows();
        }
    }
    
    /* End of file Mahasiswa_model.php */
    