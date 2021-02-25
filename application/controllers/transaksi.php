<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            redirect('auth');
        }
        $this->load->model('M_transaksi');
    }

    public function index()
    {
        $data['pelanggan'] = $this->M_transaksi->getNamaPelanggan();

        $data['barang'] = $this->M_transaksi->getNamaBarang();

        $judul['page_title'] = 'Transaksi Penjualan';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function get_data_barang()
    {
        $nama_barang = $this->input->post('nama_barang');
        $data = $this->M_transaksi->getDataBarang($nama_barang);
        echo json_encode($data);
    }

    // public function get_data_pelanggan()
    // {
    //     $nama_pelanggan = $this->input->post('nama_pelanggan');
    //     $data = $this->M_transaksi->getIDPelanggan($nama_pelanggan);
    //     echo json_encode($data);
    // }

    // public function insert_transaksi()
    // {
    //     $count = $this->input->post('qty');
    //     $result = array();

    //     $kucing =  $_POST['id_transaksi'];

    //     foreach ($count as $key => $val) {
    //         $result[] = array(
    //             "id_transaksi"  => $_POST['id_transaksi'],
    //             "tanggal"  => date("Y-m-d", strtotime($_POST['tanggal'])),
    //             "id_barang"  => (int)$_POST['id_barang'][$key],
    //             "qty"  => (int)$_POST['qty'][$key],
    //             "harga_satuan"  => (int)$_POST['harga_satuan'][$key],
    //             "sub_total"  => (int)$_POST['sub_total'][$key],
    //             "pelanggan"  => $_POST['id_pelanggan'],
    //             // "total_harga"  => (int)$_POST['total_harga'] 
    //         );
    //     }

    //     $this->db->insert_batch('log_transaksi', $result);

    //     $this->session->set_flashdata('insert_multidata_berhasil', 'berhasil');

    //     redirect('history_penjualan');
    // }

    public function insert_transaksi()
    {
        // untuk konversi array ke string
        $produk = $this->input->post('nama_barang[]', true);
        $hasil_produk = implode(",", $produk);

        $qty = $this->input->post('qty[]', true);
        $hasil_qty = implode(",", $qty);

        $harga_satuan = $this->input->post('harga_satuan[]', true);
        $hasil_harga_satuan = implode(",", $harga_satuan);

        // mendapatkan nilai TOTAL harga
        for ($i = 0; $i < count($harga_satuan); $i++) {
            $sub_total[$i] = $harga_satuan[$i] * $qty[$i];
        }
        $total = array_sum($sub_total);

        $data = [
            "id_transaksi" => $this->input->post('id_transaksi', true),
            "transaction_date" => date("Y-m-d", strtotime($_POST['datepicker'])),
            "pelanggan" => $this->input->post('nama_pelanggan', true),
            "produk" => $hasil_produk,
            "qty" => $hasil_qty,
            "harga_satuan" => $hasil_harga_satuan,
            "total" => $total
        ];
        $this->db->insert('transaksi', $data);

        $this->session->set_flashdata('insert_multidata_berhasil', 'berhasil');

        // sementara history penjualan diperbaiki, jadi redirect kesini dulu
        redirect('dashboard');
    }
}
