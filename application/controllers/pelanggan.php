<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('login') != true) || ($this->session->userdata('role') == 'Kasir')) {
            $this->session->set_flashdata('penyusup', 'warning');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data['pelanggan'] = $this->M_pelanggan->tampilpelanggan();
        $judul['page_title'] = 'Data Pelanggan';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_pelanggan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpelangganbaru()
    {
        $data['pelanggan'] = $this->M_transaksi->getNamaPelanggan();

        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama_pelanggan',
            'trim|required|is_unique[pelanggan.nama_pelanggan]',
            array(
                'is_unique' => 'Pelanggan sudah terdaftar'
            )
        );

        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Data Pelanggan';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_tambahpelangganbaru', $data);
            $this->load->view('templates/footer');
        } else {
            //insert ke database
            $this->M_pelanggan->tambahpelanggan();

            //pindah ke halaman landingpage
            $this->session->set_flashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('pelanggan');
        }
    }

    public function hapuspelanggan($id_pelanggan)
    {
        $this->M_pelanggan->hapuspelanggan($id_pelanggan);

        $this->session->set_flashdata('message_hapus', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('pelanggan');
    }
}
