<?php
defined('BASEPATH') or exit('No direct script access allowed');

class historydatmin extends CI_Controller
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
        // $data['history'] = $this->M_mining->tampilhistory();
        $data["history"] = $this->M_mining->getHasil();
        $judul['page_title'] = 'History Data Mining';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_history_datamining', $data);
        $this->load->view('templates/footer');
    }

    public function hapushistory($id)
    {
        $this->M_mining->hapushistory($id);

        $this->session->set_flashdata('message_hapus', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('datamining/history');
    }

    // public function detailknowledge()
    // {
    //     $data['history'] = $this->M_mining->tampilhistory();
    //     $judul['page_title'] = 'History Data Mining';
    //     $this->load->view('templates/header', $judul);
    //     $this->load->view('V_detail_knowledge');
    //     $this->load->view('templates/footer');
    // }

    public function viewRule($id)
    {
        $data["ConfidenceItemset3"] = $this->M_mining->confidenceItemset3($id);
        $data["ConfidenceItemset2"] = $this->M_mining->confidenceItemset2($id);
        $data["RuleID"] = $this->M_mining->getRuleID($id);
        $data["ItemSet1"] = $this->M_mining->getItemset1($id);
        $data["ItemSet2"] = $this->M_mining->getItemset2($id);
        $data["ItemSet3"] = $this->M_mining->getItemset3($id);

        // $data['history'] = $this->M_mining->tampilhistory();
        $judul['page_title'] = 'History Data Mining';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_detail_knowledge', $data);
        $this->load->view('templates/footer');
    }
}
