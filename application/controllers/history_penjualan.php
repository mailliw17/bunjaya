<?php
defined('BASEPATH') or exit('No direct script access allowed');

class history_penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            redirect('auth');
        }
    }

    public function index()
    {
        // $data['history'] = $this->M_history->detailbelanja();
        $data['history'] = $this->M_history->tampilhistory();
        $judul['page_title'] = 'History Penjualan';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_history_penjualan', $data);
        $this->load->view('templates/footer');
    }
}
