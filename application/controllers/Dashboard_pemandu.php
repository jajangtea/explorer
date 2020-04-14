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

class Dashboard_pemandu extends CI_Controller
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
       
        $this->load->model('Pemandu_model', 'pm');
        $this->load->model('Ahli_model');
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
                $jenis = "Pemandu Wisata Profesional";
            } else if ($q == 2) {
                $jenis = "Pemandu Wisata Profesional";
            }
        }

        $ahli = $this->Ahli_model->get_all($q);



        $pemandu = $this->pm->get_pemandu_profesional();
        $data = array(
            'ahli_data' => $ahli,
            'title' => $jenis,
            'pemandu' => $pemandu

        );

        $this->template->load('template_frontend/template_v', 'dashboard/pemandu_v', $data);
       // $this->template->load('template/template_v', 'ahli/tenaga_ahli_list', $data);
    }

    public function cari()
    {

        $q = 1;

        if ($q <> '') {
            $config['base_url'] = base_url() . 'travel_agent/index.html?q=' . urlencode($q);
            if ($q == 1) {
                $jenis = "Pemandu Wisata Profesional";
            } else if ($q == 2) {
                $jenis = "Pemandu Wisata Profesional";
            }
        }

        $ahli = $this->Ahli_model->get_all($q);
        $nama = $this->input->post('nama');

        if (isset($nama)) {
            $pemandu = $this->pm->get_pemandu_search($nama);
        } 

        $data = array(
            'ahli_data' => $ahli,
            'title' => $jenis,
            'pemandu' => $pemandu

        );

        $this->template->load('template_frontend/template_v', 'dashboard/pemandu_v', $data);
    }

    public function berbayar($id)
    {
        $wisata = $this->dm->get_wisata_search_jenis($id);
        $data = array(
            'title' => 'Home - Berbayar',
            'wisata' => $wisata

        );
        $this->template->load('template_frontend/template_v', 'dashboard/pemandu_v', $data);
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
            $this->session->set_flashdata('success', 'Data berhasil ditmpilkan');
            $this->template->load('template_frontend/template_v', 'ahli/tenaga_ahli_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dashboard_pemandu'));
        }
    }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
