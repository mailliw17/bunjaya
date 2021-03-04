<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('login') != true) || ($this->session->userdata('role') == 'Kasir')) {
            $this->session->set_flashdata('penyusup', 'warning');
            redirect('auth');
        }
        $this->load->model('M_dashboard');
    }

    public function index()
    {
        $data['pelanggan'] = $this->M_dashboard->countPelanggan()->num_rows();
        $data['barang'] = $this->M_dashboard->countBarang()->num_rows();
        $data['transaksi'] = $this->M_dashboard->countTransaksi()->num_rows();
        $data["history"] = $this->M_mining->getHasil();
        $judul['page_title'] = 'Dashboard';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_dashboard', $data);
        $this->load->view('templates/footer');
    }
}
