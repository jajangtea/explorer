<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Photografer_model extends CI_Model
{

    public $table = 'photografer_spesialisasi';
    public $vtable = 'v_photografer';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('id_tenaga_ahli', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('umur', $q);
        $this->db->or_like('hp', $q);
        $this->db->or_like('profil', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('nama_spesialisasi', $q);
        $this->db->or_like('biaya', $q);
        $this->db->or_like('spesialiasasi_keterangan', $q);
        $this->db->or_like('job_status', $q);
        $this->db->from($this->vtable);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('id_tenaga_ahli', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('umur', $q);
        $this->db->or_like('hp', $q);
        $this->db->or_like('profil', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('nama_spesialisasi', $q);
        $this->db->or_like('biaya', $q);
        $this->db->or_like('spesialiasasi_keterangan', $q);
        $this->db->or_like('job_status', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->vtable)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
