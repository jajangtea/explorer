<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Agent_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_agent()
    {
        $this->db->limit(8);
        $this->db->order_by('id', 'desc');
        $this->db->like('id_jenis', 1);
        return $this->db->get('travel_agent_studio')->result();
    }

    function get_agent_search($nama = NULL)
    {
        $this->db->order_by('nama_travel', 'asc');
        $this->db->like('nama_travel', $nama);
        $this->db->where('id_jenis', 1);
        return $this->db->get('travel_agent_studio')->result();
    }

   
}

/* End of file Dashboard_model.php */
