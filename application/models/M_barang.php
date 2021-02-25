<?php

class M_barang extends CI_Model
{
    public function tampilbarang()
    {
        return $this->db->query("SELECT * FROM barang ORDER BY id_barang DESC ");
        // ini utk format Rp di harga satuan, tp blm bisa terpanggil
        // return $this->db->query("SELECT CONCAT('Rp ', format( sum(harga_satuan), 0)s) from barang");
    }

    // public function tampilhargabarang() 
    // {
    //     return $this->db->query("SELECT CONCAT('Rp ', format( sum(harga_satuan), 0)) from barang");
    // }

    public function tambahbarang($data)
    {
        $this->db->insert('barang', $data);
    }

    public function hapusbarang($id_barang)
    {
        $this->db->query("DELETE FROM barang WHERE id_barang='$id_barang'");
    }

    public function ambildatabarang($id_barang)
    {
        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
    }

    public function editbarang()
    {
        //bersihkan format rupiah jadi int
        $harga_satuan = $this->input->post('harga_satuan', true);
        $harga_satuan = str_replace('Rp', '', $harga_satuan);
        $harga_satuan = str_replace('.', '', $harga_satuan);

        $data = [
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga_satuan" => $harga_satuan
        ];

        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('barang', $data);
    }
}
