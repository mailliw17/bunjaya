<?php

class M_history extends CI_Model
{
    public function tampilhistory()
    {
        return $this->db->query("SELECT id_transaksi, transaction_date, produk, qty, harga_satuan, total, pelanggan FROM transaksi ORDER BY id DESC  ")->result_array();
    }

    // public function detailbelanja()
    // {
    //     return $this->db->query("SELECT log_transaksi.id_transaksi AS a, barang.nama_barang AS barang FROM log_transaksi INNER JOIN barang WHERE log_transaksi.id_barang = barang.id_barang GROUP BY log_transaksi.id_transaksi, barang.nama_barang;")->result_array();
    // }
}
