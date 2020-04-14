<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Travel_agent extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        } 
        $this->load->model('Travel_agent_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'travel_agent/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Travel Agent";
            } else if ($q == 2) {
                $jenis = "Photo Studio";
            }
        }
        $attradd = array('class' => 'btn  btn-gradient-success');
        $tambahdata = anchor('travel_agent/create?q='.$q, '<i class="feather icon-map-pin"></i>Tambah Data', $attradd);
        $travel_agent = $this->Travel_agent_model->get_data($q);
        $data = array(
            'title' => $jenis,
            'btntambah' => $tambahdata,
            'travel_agent_data' => $travel_agent,

        );
        $this->template->load('template/template_v', 'travel_agent/travel_agent_v', $data);
    }

    public function read($id)
    {
        $row = $this->Travel_agent_model->get_by_id($id);
        if ($row) {
            $data = array(
               
                'id' => $row->id,
                'parent' =>  ($row->id_jenis)==1?'Travel Agent':'Photo Studio',
                'title' => ($row->id_jenis)==1?'Detil Travel Agent':'Detil Photo Studio',
                'nama_travel' => $row->nama_travel,
                'tlp' => $row->tlp,
                'gambar' => $row->gambar,
                'alamat' => $row->alamat,
                'deskripsi' => $row->deskripsi,
            );
            $this->template->load('template/template_v', 'travel_agent/travel_agent_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('travel_agent'));
        }
    }

    public function create()
    {
        $q = urldecode($this->input->get('q', TRUE));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'travel_agent/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Travel Agent";
            } else if ($q == 2) {
                $jenis = "Photo Studio";
            }
        }

        $data = array(
            'button' => 'Create',
            'title' => 'Tambah '.$jenis,
            'parent' => 'Data '.$jenis,
            'action' => site_url('travel_agent/create_action'),
            'id' => set_value('id'),
            'nama_travel' => set_value('nama_travel'),
            'tlp' => set_value('tlp'),
            'gambar' => set_value('gambar'),
            'alamat' => set_value('alamat'),
            'deskripsi' => set_value('deskripsi'),
            'id_jenis' =>$q,
        );
        $this->template->load('template/template_v', 'travel_agent/travel_agent_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $foto = $this->upload_foto();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_travel' => $this->input->post('nama_travel', TRUE),
                'tlp' => $this->input->post('tlp', TRUE),
                'gambar' => $foto['file_name'],
                'id_jenis' =>$this->input->post('id_jenis', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
            );

            $this->Travel_agent_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('travel_agent/index?q='.$this->input->post('id_jenis', TRUE)));
        }
    }

    public function update($id)
    {
        $row = $this->Travel_agent_model->get_by_id($id);

        if ($row) {

            $data = array(
                'button' => 'Update',
                'parent' =>  ($row->id_jenis)==1?'Travel Agent':'Photo Studio',
                'title' => ($row->id_jenis)==1?'Edit Travel Agent':'Edit Photo Studio',
                'action' => site_url('travel_agent/update_action'),
                'id' => set_value('id', $row->id),
                'nama_travel' => set_value('nama_travel', $row->nama_travel),
                'tlp' => set_value('tlp', $row->tlp),
                'gambar' => set_value('gambar', $row->gambar),
                'alamat' => set_value('alamat', $row->alamat),
                'id_jenis'=>set_value('id_jenis', $row->id_jenis),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
            );
            $this->template->load('template/template_v', 'travel_agent/travel_agent_form', $data);
        } else {
            $this->session->set_flashdata('success', 'Record Not Found');
            redirect(site_url('travel_agent/index?q='.$row->id_jenis));
        }
    }

    public function update_action()
    {
        $post = $this->input->post();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if (!empty($_FILES["gambar"]["name"])) {
                $foto = $this->upload_foto();
            } else {
                $foto = $post["old_image"];
            }
            $data = array(
                'nama_travel' => $this->input->post('nama_travel', TRUE),
                'tlp' => $this->input->post('tlp', TRUE),
                'gambar' =>  $foto['file_name'],
                'id_jenis'=>$this->input->post('id_jenis', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
            );

            $this->Travel_agent_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('travel_agent/index?q='.$this->input->post('id_jenis', TRUE)));
        }
    }

    public function delete($id)
    {
        $row = $this->Travel_agent_model->get_by_id($id);

        if ($row) {
            $this->Travel_agent_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('success', 'Record Not Found');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_travel', 'nama travel', 'trim|required');
        $this->form_validation->set_rules('tlp', 'tlp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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
        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('warning', $this->upload->display_errors());
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            return $this->upload->data();
        }
    }
}

/* End of file Travel_agent.php */
/* Location: ./application/controllers/Travel_agent.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-06 05:42:37 */
/* http://harviacode.com */
