<?php

class M_transaksi extends CI_Model
{
    public function getNamaPelanggan()
    {
        return $this->db->query("SELECT * FROM pelanggan")->result();
    }

    public function getNamaBarang()
    {
        return $this->db->query("SELECT * FROM barang")->result();
    }

    public function getDataBarang($nama_barang)
    {
        return $this->db->query("SELECT * FROM barang WHERE nama_barang='$nama_barang'")->result();
    }

    public function getIDPelanggan($nama_pelanggan)
    {
        return $this->db->query("SELECT * FROM pelanggan WHERE nama_pelanggan='$nama_pelanggan'")->result();
    }
}
