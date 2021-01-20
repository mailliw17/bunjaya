<?php

class M_nota extends CI_Model
{
    public function printnota1($id_transaksi)
    {
        return $this->db->query("SELECT l.id_transaksi, b.nama_barang, l.qty, l.harga_satuan, l.sub_total FROM log_transaksi l, barang b WHERE l.id_barang = b.id_barang HAVING l.id_transaksi ='$id_transaksi'")->result_array();
    }

    public function printnota2($id_transaksi)
    {
        return $this->db->query("SELECT l.id_transaksi AS id, l.tanggal,  WEEKDAY(l.tanggal) as hari, p.nama_pelanggan FROM log_transaksi l,pelanggan p WHERE l.id_pelanggan = p.id_pelanggan HAVING l.id_transaksi ='$id_transaksi'")->row();
    }

    public function totalharga($id_transaksi)
    {
        return $this->db->query("SELECT id_transaksi, sum(sub_total) as total FROM log_transaksi WHERE id_transaksi = '$id_transaksi' GROUP BY id_transaksi")->row_array();
    }
}
