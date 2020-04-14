<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemandu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_pemandu_profesional()
    {
        $this->db->join('jenis_keahlian',  'jenis_keahlian.id = tenaga_ahli.id_jenis_keahlian', 'inner');
        $this->db->limit(8);
        $this->db->order_by('tenaga_ahli.id', 'desc');
        $this->db->like('id_jenis_keahlian', 1);
        return $this->db->get('tenaga_ahli')->result();
    }

    function get_pemandu_search($nama = NULL)
    {
        $this->db->join('jenis_keahlian',  'jenis_keahlian.id = tenaga_ahli.id_jenis_keahlian', 'inner');
        $this->db->order_by('tenaga_ahli.id', 'desc');
        $this->db->like('nama', $nama);
        $this->db->where('tenaga_ahli.id_jenis_keahlian', 1);
        return $this->db->get('tenaga_ahli')->result();
    }

   
}

/* End of file Dashboard_model.php */
