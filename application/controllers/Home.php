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

class Home extends CI_Controller
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
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        $this->load->model('Home_Model', 'home');
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
        $title = 'Home';
        $pemandu_wisata = anchor('pemandu_wisata', 'Data Pemandu Wisata');
        $photographer = anchor('photographer', 'Data Photographer');
        $wisata = anchor('wisata', 'Data Tempat Wisata');
        $box = $this->info_box();
        $data = array(
            'pemandu_wisata' => $pemandu_wisata,
            'photographer' => $photographer,
            'wisata' => $wisata,
            'title' => $title,
            'box' => $box,
        );
        $this->template->load('template/template_v', 'home/home_v', $data);
    }

    public function info_box()
    {
        $box = [
            [
                'color'         => 'facebook',
                'total'     =>0,// $this->home->total('pemandu_wisata'),
                'title'        => 'Total Pemandu Wisata',
                'icon'        => 'users'
            ],
            [
                'color'         => 'googleplus',
                'total'     =>0,// $this->home->total('travel_agent'),
                'title'        => 'Total Travel Agent',
                'icon'        => 'layer-group'
            ],
            [
                'color'         => 'success',
                'total'     =>0,// $this->home->total('photographer'),
                'title'        => 'Total Photographer',
                'icon'        => 'poll'
            ],
            [
                'color'         => 'warning',
                'total'     => $this->home->total('wisata'),
                'title'        => 'Total Tempat Wisata',
                'icon'        => 'book'
            ],

        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
