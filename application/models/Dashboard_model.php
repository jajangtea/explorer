<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_wisata()
    {
        $this->db->select('*,wisata.id AS id_wisata');
        $this->db->join('kota','kota.id = wisata.id_kota', 'inner');
        $this->db->limit(4);
        $this->db->order_by('wisata.id', 'desc');
        return $this->db->get('wisata')->result();
    }

    function get_wisata_search($nama = NULL)
    {
        $this->db->select('*,wisata.id AS id_wisata');
        $this->db->join('kota','kota.id = wisata.id_kota', 'inner');
        $this->db->limit(4);
        $this->db->order_by('wisata.id', 'desc');
        $this->db->like('nama_tempat', $nama);

        return $this->db->get('wisata')->result();
    }

    function get_wisata_search_kota($id_kota = NULL)
    {
        $this->db->select('*,wisata.id AS id_wisata');
        $this->db->join('kota',  'kota.id = wisata.id_kota', 'inner');
        $this->db->limit(4);
        $this->db->order_by('wisata.id', 'desc');
        $this->db->or_like('id_kota', $id_kota);
        return $this->db->get('wisata')->result();
    }

    function get_wisata_search_jenis($id_jenis_wisata = NULL)
    {
        $this->db->select('*,wisata.id AS id_wisata');
        $this->db->join('kota',  'kota.id = wisata.id_kota', 'inner');
        $this->db->limit(4);
        $this->db->order_by('wisata.id', 'desc');
        $this->db->or_like('id_jenis_wisata', $id_jenis_wisata);
        return $this->db->get('wisata')->result();
    }

    function get_by_id($id)
    { 
        $this->db->select('*,wisata.id AS id_wisata');
        $this->db->join('kota',  'kota.id = wisata.id_kota', 'inner');
        $this->db->where('wisata.id', $id);
        $data= $this->db->get('kota')->row();
        return $data->nama_kota;
    }
}

/* End of file Dashboard_model.php */
