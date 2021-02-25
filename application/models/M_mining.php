<?php

class M_mining extends CI_Model
{
    public function tampilhistory()
    {
        return $this->db->query("SELECT * FROM process_log")->result_array();
    }

    public function hapushistory($id)
    {
        $this->db->query("DELETE FROM process_log WHERE id='$id'");
    }
}
