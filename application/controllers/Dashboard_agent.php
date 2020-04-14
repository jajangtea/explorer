<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Controller Home
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Jajang Nurjaman <za2ng2509@gmail.com>
 * @link      https://github.com/jajangtea/
 * @param     ...
 * @return    ...
 *
 */

class Dashboard_agent extends CI_Controller
{

    /**
     * __construct.
     *
     * @author	Jajang Nurjaman <za2ng2509@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.0	Monday, November 18th, 2019.	
     * @version	v1.0.1	Monday, November 25th, 2019.
     * @access	public
     * @return	void
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Agent_model', 'am');
        $this->load->model('Travel_agent_model');
        $this->load->library('form_validation');
    }

    /**
     * index.
     *
     * @author	Jajang Nurjaman <za2ng2509@gmail.com>
     * @since	v0.0.1
     * @version	v1.0.1	Monday, November 18th, 2019.	
     * @version	v1.0.2	Thursday, November 21st, 2019.
     * @access	public
     * @return	void
     */
    public function index()
    {

        $q = 1;

        if ($q <> '') {
            $config['base_url'] = base_url() . 'travel_agent/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Travel Agent";
            } else if ($q == 2) {
                $jenis = "Photo Studio";
            }
        }
        $travel_agent = $this->Travel_agent_model->get_data($q);

        $agent = $this->am->get_agent();
        $data = array(
            'title' => $jenis,
            'travel_agent_data' => $travel_agent,
            'agent' => $agent
        );

        $this->template->load('template_frontend/template_v', 'dashboard/agent_v', $data);
        // $this->template->load('template/template_v', 'ahli/tenaga_ahli_list', $data);
    }

    public function cari()
    {
        $q = 1;

        if ($q <> '') {
            $config['base_url'] = base_url() . 'travel_agent/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Travel Agent";
            } else if ($q == 2) {
                $jenis = "Photo Studio";
            }
        }
        $travel_agent = $this->Travel_agent_model->get_data($q);
        $nama = $this->input->post('nama_travel');

        $agent = $this->am->get_agent_search($nama);
        $data = array(
            'title' => $jenis,
            'travel_agent_data' => $travel_agent,
            'agent' => $agent
        );
        $this->template->load('template_frontend/template_v', 'dashboard/agent_v', $data);
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
            $this->session->set_flashdata('success', 'Data berhasil ditampilkan');
            $this->template->load('template_frontend/template_v', 'travel_agent/travel_agent_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('travel_agent'));
        }
    }
}


