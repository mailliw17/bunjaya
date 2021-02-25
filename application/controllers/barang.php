<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('login') != true) || ($this->session->userdata('role') == 'Kasir')) {
            $this->session->set_flashdata('penyusup', 'warning');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_barang');
    }

    public function index()
    {
        $data['barang'] = $this->M_barang->tampilbarang();
        $judul['page_title'] = 'Daftar Barang';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambahbarangbaru()
    {
    
        $data['barang'] = $this->M_transaksi->getNamaBarang();

        $this->form_validation->set_rules(
            'nama_barang',
            'Nama_barang',
            'trim|required|is_unique[barang.nama_barang]',
            array(
                'is_unique' => 'Barang sudah terdaftar'
            )
        );

        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Data Barang';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_tambahbarangbaru', $data);
            $this->load->view('templates/footer');
        } else {
            //bersihkan format rupiah jadi int
            $harga_satuan = $this->input->post('harga_satuan', true);
            $harga_satuan = str_replace('Rp', '', $harga_satuan);
            $harga_satuan = str_replace('.', '', $harga_satuan);

            $data = [
                "nama_barang" => $this->input->post('nama_barang', true),

                "harga_satuan" => (int)$harga_satuan
            ];

            $this->M_barang->tambahbarang($data);

            //pindah ke halaman landingpage
            $this->session->set_flashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('barang');
        }
    }

    public function hapusbarang($id_barang)
    {
        $this->M_barang->hapusbarang($id_barang);

        $this->session->set_flashdata('message_hapus', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('barang');
    }

    public function editbarang($id_barang)
    {
        $data['barang'] = $this->M_barang->ambildatabarang($id_barang);

        $this->form_validation->set_rules(
            'nama_barang',
            'Nama_barang',
            'trim|required'
        );

        if ($this->form_validation->run() == false) {
            //load tampilannya
            $judul['page_title'] = 'Ganti password';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_editbarang', $data);
            $this->load->view('templates/footer');
        } else {

            $this->M_barang->editbarang();

            $this->session->set_flashdata('message_edit', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('barang');
        }
    }
}
