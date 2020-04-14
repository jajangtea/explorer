<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Template
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Jefri Maruli <jefrimaruli@gmail.com>
 * @link      https://github.com/jajangtea
 * @param     ...
 * @return    ...
 *
 */

class Template extends CI_Controller
{
    /**
     * index.
     *
     * @author	Jajang Nurjaman <za2ng2509@gmail.com>
     * @since	v0.0.1s
     * @version	v1.0.0	Tuesday, November 19th, 2019.
     * @access	public
     * @return	void
     */
    public function index()
    {
        // 
        $this->load->view('template_vx');
    }
}


/* End of file Template.php */
/* Location: ./application/controllers/Templaet.php */
