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
        $this->load->helper('bulan_helper');
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4096M');
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
        $awal = microtime(true);
        $post = $this->input->post();
        $min_support = $_POST['support'];
        $min_confidence = $_POST['confidence'];

        $tgl = explode(" - ", $_POST['range_tanggal']);
        $start = format_date($tgl[0]);
        $end = format_date($tgl[1]);



        $mining = $this->M_mining->miningProcess($min_support, $min_confidence, $start, $end);
        $lastId = $this->M_mining->getLastIdProcessLog();
        $last = $lastId->last;
        $akhir = microtime(true);

        $hasil = $akhir - $awal;

        if ($mining) {
            $this->session->set_flashdata('success', 'Mining Berhasil ' . $hasil . 'detik');
            // $this->session->set_flashdata('success', );

            // redirect(site_url('historydatmin/viewRule/' . $last));
            redirect('historydatmin/viewRule/' . $last);
        } else {
            $this->session->set_flashdata('error', 'Mining Gagal');
            redirect('datamining');
        }
    }
}
