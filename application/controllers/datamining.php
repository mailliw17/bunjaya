<?php
defined('BASEPATH') or exit('No direct script access allowed');

class datamining extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (($this->session->userdata('login') != true) || ($this->session->userdata('role') == 'Kasir')) {
            $this->session->set_flashdata('penyusup', 'warning');
            redirect('auth');
        }
        $this->load->model('M_mining');
    }

    public function index()
    {
        $judul['page_title'] = 'Data Mining';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_datamining');
        $this->load->view('templates/footer');
    }

    public function prosesapriori()
    {
        echo 'sesuaikan data mu dulu';
    }
}
