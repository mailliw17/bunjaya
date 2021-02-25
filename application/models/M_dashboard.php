<?php

class M_dashboard extends CI_Model
{
    public function countPelanggan()
    {
        return $this->db->query("SELECT * FROM pelanggan");
    }

    public function countBarang()
    {
        return $this->db->query("SELECT * FROM barang");
    }

    public function countTransaksi()
    {
        return $this->db->query("SELECT * FROM transaksi");
    }
}
