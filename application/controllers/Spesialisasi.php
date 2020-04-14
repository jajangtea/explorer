<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spesialisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Spesialisasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $attradd = array('class' => 'btn  btn-gradient-success');
        $tambahdata = anchor('spesialisasi/create', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = base_url() . 'spesialisasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'spesialisasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'spesialisasi/index.html';
            $config['first_url'] = base_url() . 'spesialisasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Spesialisasi_model->total_rows($q);
        $spesialisasi = $this->Spesialisasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(

            'spesialisasi_data' => $spesialisasi,
            'title' => 'Data Jenis',
            'btntambah' => $tambahdata,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/template_v', 'spesialisasi/spesialisasi_list', $data);
    }

    public function read($id)
    {
        $row = $this->Spesialisasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_spesialisasi' => $row->nama_spesialisasi,
                'biaya' => $row->biaya,
                'keterangan' => $row->keterangan,
            );
            $this->load->view('spesialisasi/spesialisasi_read', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spesialisasi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'title' => 'Tambah Data',
            'parent' => 'Data Jenis Foto',
            'action' => site_url('spesialisasi/create_action'),
            'id' => set_value('id'),
            'nama_spesialisasi' => set_value('nama_spesialisasi'),
            'biaya' => set_value('biaya'),
            'keterangan' => set_value('keterangan'),
        );
        $this->template->load('template/template_v', 'spesialisasi/spesialisasi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_spesialisasi' => $this->input->post('nama_spesialisasi', TRUE),
                'biaya' => $this->input->post('biaya', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Spesialisasi_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('spesialisasi'));
        }
    }

    public function update($id)
    {
        $row = $this->Spesialisasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'parent' => 'Data Jenis Foto',
                'title' => 'Update Jenis Foto',
                'action' => site_url('spesialisasi/update_action'),
                'id' => set_value('id', $row->id),
                'nama_spesialisasi' => set_value('nama_spesialisasi', $row->nama_spesialisasi),
                'biaya' => set_value('biaya', $row->biaya),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $this->template->load('template/template_v', 'spesialisasi/spesialisasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spesialisasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_spesialisasi' => $this->input->post('nama_spesialisasi', TRUE),
                'biaya' => $this->input->post('biaya', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Spesialisasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spesialisasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Spesialisasi_model->get_by_id($id);

        if ($row) {
            $this->Spesialisasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('spesialisasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spesialisasi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_spesialisasi', 'nama spesialisasi', 'trim|required');
        $this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Spesialisasi.php */
/* Location: ./application/controllers/Spesialisasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-01 05:41:01 */
/* http://harviacode.com */
