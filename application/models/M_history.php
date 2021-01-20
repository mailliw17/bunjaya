<?php

class M_history extends CI_Model
{
    public function tampilhistory()
    {
        return $this->db->query("SELECT log_transaksi.id_transaksi, log_transaksi.tanggal, pelanggan.nama_pelanggan, SUM(log_transaksi.sub_total) AS total FROM log_transaksi
          INNER JOIN pelanggan 
         ON log_transaksi.id_pelanggan = pelanggan.id_pelanggan
          GROUP BY log_transaksi.id_transaksi, log_transaksi.tanggal, pelanggan.nama_pelanggan
          ORDER BY log_transaksi.id_transaksi DESC")->result_array();
    }

    // public function detailbelanja()
    // {
    //     return $this->db->query("SELECT log_transaksi.id_transaksi AS a, barang.nama_barang AS barang FROM log_transaksi INNER JOIN barang WHERE log_transaksi.id_barang = barang.id_barang GROUP BY log_transaksi.id_transaksi, barang.nama_barang;")->result_array();
    // }
}
