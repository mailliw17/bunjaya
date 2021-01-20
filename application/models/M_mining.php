<?php

class M_mining extends CI_Model
{
    public function tampilhistory()
    {
        return $this->db->query("SELECT * FROM history_mining")->result_array();
    }

    public function hapushistory($id_history_mining)
    {
        $this->db->query("DELETE FROM history_mining WHERE id_history_mining='$id_history_mining'");
    }
}
