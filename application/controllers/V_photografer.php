<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_photografer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('V_photografer_model');
        $this->load->library('form_validation');
    }

    public function index($id)
    {
        
        $q = $id;
        $start = intval($this->input->get('start'));
       
        if ($q <> '') {
            $config['base_url'] = base_url() . 'v_photografer/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'v_photografer/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'v_photografer/index.html';
            $config['first_url'] = base_url() . 'v_photografer/index.html';
        }
       
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->V_photografer_model->total_rows($q);
        $v_photografer = $this->V_photografer_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

       
        $data = array(
            'title' => 'Data Paket Foto',
            'parent' => 'Data Photografer',
            'v_photografer_data' => $v_photografer,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/template_v', 'v_photografer/v_photografer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->V_photografer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tenaga_ahli' => $row->id_tenaga_ahli,
		'nama' => $row->nama,
		'umur' => $row->umur,
		'hp' => $row->hp,
		'profil' => $row->profil,
		'alamat' => $row->alamat,
		'keterangan' => $row->keterangan,
		'nama_spesialisasi' => $row->nama_spesialisasi,
		'biaya' => $row->biaya,
		'spesialiasasi_keterangan' => $row->spesialiasasi_keterangan,
		'job_status' => $row->job_status,
	    );
            $this->load->view('v_photografer/v_photografer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_photografer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('v_photografer/create_action'),
	    'id_tenaga_ahli' => set_value('id_tenaga_ahli'),
	    'nama' => set_value('nama'),
	    'umur' => set_value('umur'),
	    'hp' => set_value('hp'),
	    'profil' => set_value('profil'),
	    'alamat' => set_value('alamat'),
	    'keterangan' => set_value('keterangan'),
	    'nama_spesialisasi' => set_value('nama_spesialisasi'),
	    'biaya' => set_value('biaya'),
	    'spesialiasasi_keterangan' => set_value('spesialiasasi_keterangan'),
	    'job_status' => set_value('job_status'),
	);
        $this->load->view('v_photografer/v_photografer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tenaga_ahli' => $this->input->post('id_tenaga_ahli',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'umur' => $this->input->post('umur',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'profil' => $this->input->post('profil',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'nama_spesialisasi' => $this->input->post('nama_spesialisasi',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
		'spesialiasasi_keterangan' => $this->input->post('spesialiasasi_keterangan',TRUE),
		'job_status' => $this->input->post('job_status',TRUE),
	    );

            $this->V_photografer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('v_photografer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->V_photografer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('v_photografer/update_action'),
		'id_tenaga_ahli' => set_value('id_tenaga_ahli', $row->id_tenaga_ahli),
		'nama' => set_value('nama', $row->nama),
		'umur' => set_value('umur', $row->umur),
		'hp' => set_value('hp', $row->hp),
		'profil' => set_value('profil', $row->profil),
		'alamat' => set_value('alamat', $row->alamat),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'nama_spesialisasi' => set_value('nama_spesialisasi', $row->nama_spesialisasi),
		'biaya' => set_value('biaya', $row->biaya),
		'spesialiasasi_keterangan' => set_value('spesialiasasi_keterangan', $row->spesialiasasi_keterangan),
		'job_status' => set_value('job_status', $row->job_status),
	    );
            $this->load->view('v_photografer/v_photografer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_photografer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_tenaga_ahli' => $this->input->post('id_tenaga_ahli',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'umur' => $this->input->post('umur',TRUE),
		'hp' => $this->input->post('hp',TRUE),
		'profil' => $this->input->post('profil',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'nama_spesialisasi' => $this->input->post('nama_spesialisasi',TRUE),
		'biaya' => $this->input->post('biaya',TRUE),
		'spesialiasasi_keterangan' => $this->input->post('spesialiasasi_keterangan',TRUE),
		'job_status' => $this->input->post('job_status',TRUE),
	    );

            $this->V_photografer_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('v_photografer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->V_photografer_model->get_by_id($id);

        if ($row) {
            $this->V_photografer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('v_photografer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_photografer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_tenaga_ahli', 'id tenaga ahli', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('umur', 'umur', 'trim|required');
	$this->form_validation->set_rules('hp', 'hp', 'trim|required');
	$this->form_validation->set_rules('profil', 'profil', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('nama_spesialisasi', 'nama spesialisasi', 'trim|required');
	$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
	$this->form_validation->set_rules('spesialiasasi_keterangan', 'spesialiasasi keterangan', 'trim|required');
	$this->form_validation->set_rules('job_status', 'job status', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file V_photografer.php */
/* Location: ./application/controllers/V_photografer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-01 07:16:44 */
/* http://harviacode.com */