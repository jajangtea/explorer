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

    public function total_pemandu_profesional()
    {
        $this->db->where(array('id_jenis_keahlian'=>1));
        return $this->db->get('tenaga_ahli')->num_rows();
    }

    public function total_photographer_profesional()
    {
        $this->db->where(array('id_jenis_keahlian'=>2));
        return $this->db->get('tenaga_ahli')->num_rows();
    }

    public function total_travel_agent()
    {
        $this->db->where(array('id_jenis'=>1));
        return $this->db->get('travel_agent_studio')->num_rows();
    }
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */
