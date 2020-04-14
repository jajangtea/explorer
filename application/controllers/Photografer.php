<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Photografer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        } 
        $this->load->model('Photografer_model');
        $this->load->model('Ahli_model');
        $this->load->model('V_photografer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $attradd = array('class' => 'btn  btn-gradient-success');
        // $tambahdata = anchor('photografer/create', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        // $q = urldecode($this->input->get('q', TRUE));
        // $start = intval($this->input->get('start'));

        // if ($q <> '') {
        //     $config['base_url'] = base_url() . 'photografer/index.html?q=' . urlencode($q);
        //     $config['first_url'] = base_url() . 'photografer/index.html?q=' . urlencode($q);
        // } else {
        //     $config['base_url'] = base_url() . 'photografer/index.html';
        //     $config['first_url'] = base_url() . 'photografer/index.html';
        // }

        // $config['per_page'] = 10;
        // $config['page_query_string'] = TRUE;
        // $config['total_rows'] = $this->Photografer_model->total_rows($q);
        // $photografer = $this->Photografer_model->get_limit_data($config['per_page'], $start, $q);

        // $this->load->library('pagination');
        // $this->pagination->initialize($config);

        // $data = array(
        //     'photografer_data' => $photografer,
        //     'title' => 'Data Mahasiswa',
        //     'btntambah' => $tambahdata,
        //     'q' => $q,
        //     'pagination' => $this->pagination->create_links(),
        //     'total_rows' => $config['total_rows'],
        //     'start' => $start,
        // );
        $attradd = array('class' => 'btn  btn-gradient-success');
        $tambahdata = anchor('ahli/create', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'ahli/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ahli/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ahli/index.html';
            $config['first_url'] = base_url() . 'ahli/index.html';
        }

        $config['per_page'] = 10;

        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ahli_model->total_rows($q);
        $ahli = $this->Ahli_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ahli_data' => $ahli,
            'title' => 'Data Tenaga Ahli',
            'btntambah' => $tambahdata,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/template_v', 'photografer/photografer_spesialisasi_list', $data);
    }

    public function read($id)
    {
        $row = $this->Photografer_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'id_tenaga_ahli' => $row->id_tenaga_ahli,
                'id_spesialisasi' => $row->id_spesialisasi,
                'job_status' => $row->job_status,
            );
            $this->template->load('template/template_v', 'photografer_spesialisasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('photografer'));
        }
    }

    public function create($id=null)
    {
       
        $data = array(
            
        );

        $q = urldecode($this->input->get('q', TRUE));
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
            'button' => 'Create',
            'title' => 'Tambah Data',
            'parent' => 'Data Photografer',
            'action' => site_url('photografer/create_action'),
            'id' => set_value('id'),
            'id_tenaga_ahli' => $id,
            'id_spesialisasi' => set_value('id_spesialisasi'),
            'job_status' => set_value('job_status'),
            'v_photografer_data' => $v_photografer,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );


        $this->template->load('template/template_v', 'photografer/photografer_spesialisasi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_tenaga_ahli' => $this->input->post('id_tenaga_ahli', TRUE),
                'id_spesialisasi' => $this->input->post('id_spesialisasi', TRUE),
                'job_status' => $this->input->post('job_status', TRUE),
            );

            $this->Photografer_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function update($id)
    {
        $row = $this->Photografer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('photografer/update_action'),
                'id' => set_value('id', $row->id),
                'id_tenaga_ahli' => set_value('id_tenaga_ahli', $row->id_tenaga_ahli),
                'id_spesialisasi' => set_value('id_spesialisasi', $row->id_spesialisasi),
                'job_status' => set_value('job_status', $row->job_status),
            );
            $this->template->load('template/template_v', 'photografer_spesialisasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('photografer'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
                'id' => $this->input->post('id', TRUE),
                'id_tenaga_ahli' => $this->input->post('id_tenaga_ahli', TRUE),
                'id_spesialisasi' => $this->input->post('id_spesialisasi', TRUE),
                'job_status' => $this->input->post('job_status', TRUE),
            );

            $this->Photografer_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('photografer'));
        }
    }

    public function delete($id)
    {
        $row = $this->Photografer_model->get_by_id($id);

        if ($row) {
            $this->Photografer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('photografer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('photografer'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_tenaga_ahli', 'id tenaga ahli', 'trim|required');
        $this->form_validation->set_rules('id_spesialisasi', 'id spesialisasi', 'trim|required');
        $this->form_validation->set_rules('job_status', 'job status', 'trim|required');

        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file photografer.php */
/* Location: ./application/controllers/photografer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-01 06:20:30 */
/* http://harviacode.com */
