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

class Dashboard extends CI_Controller
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
       
        $this->load->model('Dashboard_model', 'dm');
        $this->load->model('Wisata_model');
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

    public function landing(){
        $dashboard_wisata = $this->dm->get_wisata();
        $data = array(
            'dashboard_wisata' => $dashboard_wisata,
            'title' => 'Data Tempat Wisata',

        );
        $this->load->view('dashboard/landing_v',$data);
    }
    public function index()
    {

        $q = urldecode($this->input->get('q', TRUE));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'wisata/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wisata/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Tempat Wisata Berbayar";
            } else if ($q == 2) {
                $jenis = "Tempat Wisata Gratis";
            }
        } else {
            $config['base_url'] = base_url() . 'wisata/index.html';
            $config['first_url'] = base_url() . 'wisata/index.html';
            $jenis = "Seluruh Tempat Wisata";
        }

        $wisata = $this->Wisata_model->get_data($q);
        $dashboard_wisata = $this->dm->get_wisata();
        $data = array(
            'wisata' => $wisata,
            'dashboard_wisata' => $dashboard_wisata,
            'jenis' => $jenis,
            'title' => 'Data Tempat Wisata',
            'q' => $q,

        );
        $this->session->set_flashdata('success', 'Data berhasil ditampilkan');
        $this->template->load('template_frontend/template_v', 'dashboard/dashboard_v', $data);
    }

    public function cari()
    {
        $q = urldecode($this->input->get('q', TRUE));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'wisata/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wisata/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Tempat Wisata Berbayar";
            } else if ($q == 2) {
                $jenis = "Tempat Wisata Gratis";
            }
        } else {
            $config['base_url'] = base_url() . 'wisata/index.html';
            $config['first_url'] = base_url() . 'wisata/index.html';
            $jenis = "Seluruh Tempat Wisata";
        }

        $wisata = $this->Wisata_model->get_data($q);


        $nama = $this->input->post('nama_tempat');
        $id_kota = $this->input->post('id_kota');
        $id_jenis_wisata = $this->input->post('id_jenis_wisata');

        if (isset($nama)) {
            $dashboard_wisata = $this->dm->get_wisata_search($nama);
        } elseif (isset($id_kota)) {
            $dashboard_wisata = $this->dm->get_wisata_search_kota($id_kota);
        } elseif (isset($id_jenis_wisata)) {
            $dashboard_wisata = $this->dm->get_wisata_search_jenis($id_jenis_wisata);
        }


        $data = array(
            'wisata' => $wisata,
            'dashboard_wisata' => $dashboard_wisata,
            'jenis' => $jenis,
            'title' => 'Data Tempat Wisata',
            'q' => $q,

        );
        $this->session->set_flashdata('success', 'Data berhasil ditampilkan');
        $this->template->load('template_frontend/template_v', 'dashboard/dashboard_v', $data);
    }

    public function berbayar($id)
    {
        $q = urldecode($this->input->get('q', TRUE));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'wisata/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'wisata/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Tempat Wisata Berbayar";
            } else if ($q == 2) {
                $jenis = "Tempat Wisata Gratis";
            }
        } else {
            $config['base_url'] = base_url() . 'wisata/index.html';
            $config['first_url'] = base_url() . 'wisata/index.html';
            $jenis = "Seluruh Tempat Wisata";
        }

        $wisata = $this->Wisata_model->get_data($q);

        $dashboard_wisata = $this->dm->get_wisata_search_jenis($id);
        $data = array(
            'wisata' => $wisata,
            'dashboard_wisata' => $dashboard_wisata,
            'jenis' => $jenis,
            'title' => 'Data Tempat Wisata',
            'q' => $q,

        );
        $this->session->set_flashdata('success', 'Data berhasil ditampilkan');
        $this->template->load('template_frontend/template_v', 'dashboard/dashboard_v', $data);
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
            $this->template->load('template_frontend/template_v', 'wisata/wisata_read', $data);
        } else {
            $this->session->set_flashdata('danger', 'Record Not Found');
            redirect('wisata');
        }
    }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
