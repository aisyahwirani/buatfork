<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Model {

    protected $table = 'security';

    public function get_all()
    {
        return $this->db->get_where($this->table, ['is_deleted' => 0])->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // tes tes
    public function delete($id)
    {
        return $this->db->where('id', $id)->update($this->table, ['is_deleted' => 1]);
    }
    
    public function count_all_securities()
    {
        $this->db->where('is_deleted', 0);
        return $this->db->count_all_results($this->table);
    }
	
	public function verify_nik($id, $nik)
    {
        $security = $this->db->get_where($this->table, ['id' => $id])->row();
        if ($security->nik == (string) $nik) {
            return true;
        }
        return false;
    }
}
