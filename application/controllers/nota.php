<?php defined('BASEPATH') or exit('No direct script access allowed');

class nota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            redirect('auth');
        }
        $this->load->model('M_nota');
    }

    public function print($id_transaksi)
    {
        $data['nota1'] = $this->M_nota->printnota1($id_transaksi);
        $data['nota2'] = $this->M_nota->printnota2($id_transaksi);
        $data['nota3'] = $this->M_nota->totalharga($id_transaksi);

        $this->load->view('V_nota', $data);

        // Get output html
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment" => 0));
    }
}
