<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Home_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Jajang Nurjaman <za2ng2509@gmail.com>
 * @link      https://github.com/jajangtea/
 * @param     ...
 * @return    ...
 *
 */

class Home_model extends CI_Model
{

    public function total($table)
    {
        return $this->db->get($table)->num_rows();
    }
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */
