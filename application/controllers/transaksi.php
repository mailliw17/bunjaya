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

    public function get_data_pelanggan()
    {
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $data = $this->M_transaksi->getIDPelanggan($nama_pelanggan);
        echo json_encode($data);
    }

    public function insert_multidata()
    {
        $count = $this->input->post('qty');
        $result = array();

        $kucing =  $_POST['id_transaksi'];

        foreach ($count as $key => $val) {
            $result[] = array(
                "id_transaksi"  => $_POST['id_transaksi'],
                "tanggal"  => date("Y-m-d", strtotime($_POST['tanggal'])),
                "id_barang"  => (int)$_POST['id_barang'][$key],
                "qty"  => (int)$_POST['qty'][$key],
                "harga_satuan"  => (int)$_POST['harga_satuan'][$key],
                "sub_total"  => (int)$_POST['sub_total'][$key],
                "id_pelanggan"  => (int) $_POST['id_pelanggan'],
                // "total_harga"  => (int)$_POST['total_harga'] 
            );
        }

        $this->db->insert_batch('log_transaksi', $result);

        $this->session->set_flashdata('insert_multidata_berhasil', 'berhasil');

        redirect('history_penjualan');
    }
}
