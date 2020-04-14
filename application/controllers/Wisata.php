<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Wisata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        } 
        $this->load->model('Wisata_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $attradd = array('class' => 'btn  btn-gradient-success');
        $tambahdata = anchor('wisata/create', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $q = urldecode($this->input->get('q', TRUE));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'wisata/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wisata/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Tempat Wisata Berbayar";
            } else if ($q==2){
                $jenis = "Tempat Wisata Gratis";
            }
        } else {
            $config['base_url'] = base_url() . 'wisata/index.html';
            $config['first_url'] = base_url() . 'wisata/index.html';
            $jenis = "Seluruh Tempat Wisata";
        }

        $wisata = $this->Wisata_model->get_data($q);

        $data = array(
            'wisata' => $wisata,
            'jenis'=>$jenis,
            'title' => 'Data Tempat Wisata',
            'btntambah' => $tambahdata,
            'q' => $q,
        );
        $this->template->load('template/template_v', 'wisata/wisata_v', $data);
    }

    public function read($id)
    {
        $row = $this->Wisata_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_tempat' => $row->nama_tempat,
                'parent' => 'Tempat Wisata',
                'title' => 'Detil Tempat Wisata',
                'alamat' => $row->alamat,
                'id_kota' => $row->id_kota,
                'id_jenis_wisata' => $row->id_jenis_wisata,
                'images' => $row->images,
                'keterangan' => $row->keterangan,
            );

        $this->template->load('template/template_v', 'wisata/wisata_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('wisata');
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'title' => 'Tambah Data',
            'parent' => 'Data Tempat Wisata',
            'action' => site_url('wisata/create_action'),
            'id' => set_value('id'),
            'nama_tempat' => set_value('nama_tempat'),
            'images' => set_value('images'),
            'alamat' => set_value('alamat'),
            'id_kota' => set_value('id_kota'),
            'id_jenis_wisata' => set_value('id_jenis_wisata'),
            'keterangan' => set_value('keterangan'),
        );
        $this->template->load('template/template_v', 'wisata/wisata_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_tempat' => $this->input->post('nama_tempat', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'id_kota' => $this->input->post('id_kota', TRUE),
                'id_jenis_wisata' => $this->input->post('id_jenis_wisata', TRUE),
                'images'        =>  $foto['file_name'],
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Wisata_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect('wisata', 'refresh');
        }
    }

    public function update($id)
    {

        $row = $this->Wisata_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'parent' => 'Data Tempat Wisata',
                'title' => 'Update Tempat Wisata',
                'action' => site_url('wisata/update_action'),
                'id' => set_value('id', $row->id),
                'nama_tempat' => set_value('nama_tempat', $row->nama_tempat),
                'id_kota' => set_value('alamat', $row->id_kota),
                'id_jenis_wisata' => set_value('alamat', $row->id_jenis_wisata),
                'alamat' => set_value('alamat', $row->alamat),
                'images' => set_value('images', $row->images),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );

            $this->template->load('template/template_v', 'wisata/wisata_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('wisata');
        }
    }

    public function update_action()
    {
        $post = $this->input->post();
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (!empty($_FILES["images"]["name"])) {
                $foto = $this->upload_foto();
            } else {
                $foto = $post["old_image"];
            }

            $data = array(
                'nama_tempat' => $this->input->post('nama_tempat', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'id_kota' => $this->input->post('id_kota', TRUE),
                'id_jenis_wisata' => $this->input->post('id_jenis_wisata', TRUE),
                'images'        =>  $foto['file_name'],
                'keterangan' => $this->input->post('keterangan', TRUE),
            );



            $this->Wisata_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('wisata'));
        }
    }

    public function delete($id)
    {
        $row = $this->Wisata_model->get_by_id($id);

        if ($row) {
            $this->Wisata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('wisata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wisata'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_tempat', 'nama tempat', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=wisata.doc");

        $data = array(
            'wisata_data' => $this->Wisata_model->get_all(),
            'start' => 0
        );

        $this->load->view('wisata/wisata_doc', $data);
    }

    function upload_foto()
    {
        $config['upload_path']   = FCPATH . '/uploads/poster/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1000';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('images')) {
            $this->session->set_flashdata('warning', $this->upload->display_errors());
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            return $this->upload->data();
        }
    }
}

/* End of file Wisata.php */
/* Location: ./application/controllers/Wisata.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-31 10:08:59 */
/* http://harviacode.com */
