<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ahli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        } 
        $this->load->model('Ahli_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'travel_agent/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Pemandu Wisata Profesional";
            } else if ($q == 2) {
                $jenis = "Pemandu Wisata Profesional";
            }
        }

        $attradd = array('class' => 'btn  btn-gradient-success');
        $tambahdata = anchor('ahli/create?q=' . $q, '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $ahli = $this->Ahli_model->get_all($q);
        $data = array(
            'ahli_data' => $ahli,
            'title' => $jenis,
            'btntambah' => $tambahdata,

        );
        $this->template->load('template/template_v', 'ahli/tenaga_ahli_list', $data);
    }

    public function read($id)
    {
        $row = $this->Ahli_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'parent' => ($row->id_jenis_keahlian) == 1 ? 'Pemandu Wisata Profesional' : 'Photographer Profesional',
                'title' => ($row->id_jenis_keahlian) == 1 ? 'Detil Pemandu Wisata Profesional' : 'Detil Photographer Profesional',
                'nama' => $row->nama,
                'keterangan' => $row->keterangan,
                'umur' => $row->umur,
                'hp' => $row->hp,
                'profil' => $row->profil,
                'alamat' => $row->alamat,
            );

            $this->template->load('template/template_v', 'ahli/tenaga_ahli_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahli'));
        }
    }

    public function create()
    {
        $q = urldecode($this->input->get('q', TRUE));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'ahli/create?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Pemandu Profesional";
            } else if ($q == 2) {
                $jenis = "Photographer Profesional";
            }
        }


        $data = array(
            'button' => 'Create',
            'action' => site_url('ahli/create_action'),
            'id' => set_value('id'),
            'title' => 'Tambah ' . $jenis,
            'parent' => 'Data ' . $jenis,
            'nama' => set_value('nama'),
            'keterangan' => set_value('keterangan'),
            'umur' => set_value('umur'),
            'id_jenis_keahlian'=>$q,
            'hp' => set_value('hp'),
            'profil' => set_value('profil'),
            'alamat' => set_value('alamat'),
        );
        $this->template->load('template/template_v', 'ahli/tenaga_ahli_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'umur' => $this->input->post('umur', TRUE),
                'hp' => $this->input->post('hp', TRUE),
                'id_jenis_keahlian'=> $this->input->post('id_jenis_keahlian', TRUE),
                'profil' => $foto['file_name'],
                'alamat' => $this->input->post('alamat', TRUE),
            );

            $this->Ahli_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('ahli/index?q='.$this->input->post('id_jenis_keahlian', TRUE)));
        }
    }

    public function update($id)
    {
        $row = $this->Ahli_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'parent' => ($row->id_jenis_keahlian) == 1 ? 'Pemandu Wisata Profesional' : 'Photographer Profesional',
                'title' => ($row->id_jenis_keahlian) == 1 ? 'Edit Pemandu Wisata Profesional' : 'Edit Photographer Profesional',
                'action' => site_url('ahli/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'umur' => set_value('umur', $row->umur),
                'id_jenis_keahlian' => set_value('id_jenis_keahlian', $row->id_jenis_keahlian),
                'hp' => set_value('hp', $row->hp),
                'profil' => set_value('profil', $row->profil),
                'alamat' => set_value('alamat', $row->alamat),
            );
            $this->template->load('template/template_v', 'ahli/tenaga_ahli_form', $data);
        } else {
            $this->session->set_flashdata('success', 'Record Not Found');
            redirect(site_url('ahli/index?q='.$row->id_jenis_keahlian));
        }
    }

    public function update_action()
    {
        $post = $this->input->post();
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (!empty($_FILES["profil"]["name"])) {
                $foto = $this->upload_foto();
            } else {
                $foto = $post["old_image"];
            }
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'umur' => $this->input->post('umur', TRUE),
                'id_jenis_keahlian' => $this->input->post('id_jenis_keahlian', TRUE),
                'hp' => $this->input->post('hp', TRUE),
                'profil'        =>  $foto['file_name'],
                'alamat' => $this->input->post('alamat', TRUE),
            );

            $this->Ahli_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('ahli/index?q='.$this->input->post('id_jenis_keahlian', TRUE)));
        }
    }

    public function delete($id)
    {
        $row = $this->Ahli_model->get_by_id($id);

        if ($row) {
            $this->Ahli_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('ahli'));
        } else {
            $this->session->set_flashdata('success', 'Record Not Found');
            redirect(site_url('ahli'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('umur', 'umur', 'trim|required');
        $this->form_validation->set_rules('hp', 'hp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function upload_foto()
    {
        $config['upload_path']   = FCPATH . '/uploads/ahli/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1000';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('profil')) {
            $this->session->set_flashdata('warning', $this->upload->display_errors());
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            return $this->upload->data();
        }
    }
}

/* End of file Ahli.php */
/* Location: ./application/controllers/Ahli.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-31 18:38:29 */
/* http://harviacode.com */
