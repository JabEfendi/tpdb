<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ukm extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
        if (empty($this->session->userdata('USERNAME'))) {
            redirect('admin');
        }
    }

    public function index()
    {
        $data['session_user'] = $this->db->get_where('ukm', ['ID_UKM' => $this->session->userdata('id')])->row();
        $this->load->view('backend/ukm/layout/header');
        $this->load->view('backend/ukm/layout/sidebar', $data);
        $this->load->view('backend/ukm/dashboard');
        $this->load->view('backend/ukm/layout/footer');
    }
    public function keuangan()
    {
        $data['session_user'] = $this->db->get_where('ukm', ['ID_UKM' => $this->session->userdata('id')])->row();
        $this->load->view('backend/ukm/layout/header');
        $this->load->view('backend/ukm/layout/sidebar', $data);
        $this->load->view('backend/ukm/data/keuangan');
        $this->load->view('backend/ukm/layout/footer');
    }

    public function pkp()
    {
        $data['session_user'] = $this->db->get_where('ukm', ['ID_UKM' => $this->session->userdata('id')])->row();
        $data['pkp'] = $this->mDashboard->get_all_data('proposal_kegiatan_dan_pendanaan')->result();
        $data['bem'] = $this->mDashboard->get_all_data('bem_senat')->result();
        $this->load->view('backend/ukm/layout/header');
        $this->load->view('backend/ukm/layout/sidebar', $data);
        $this->load->view('backend/ukm/data/pkp/proposal', $data);
        $this->load->view('backend/ukm/layout/footer');
    }

    public function lihat_pkp()
    {
        $data['session_user'] = $this->db->get_where('ukm', ['ID_UKM' => $this->session->userdata('id')])->row();
        $this->load->view('backend/ukm/layout/header');
        $this->load->view('backend/ukm/layout/sidebar', $data);
        $this->load->view('backend/ukm/data/pkp/proposal', $data);
        $this->load->view('backend/ukm/layout/footer');
    }

    public function save_proposal()
    {
        $judul = $this->input->post('judul');
        $id_ukm = $this->input->post('id_ukm');
        $config['upload_path'] = './assets/proposal/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 6000;
        $tgl = date("Y-m-d H:i:s");
        $id_bs = $this->input->post('id_bs');
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('proposal')) {
            $data_file = $this->upload->data();
            $data_insert = array(
                'JUDUL' => $judul,
                'PROPOSAL' => $data_file['file_name'],
                'STAT' => 'X',
                'TANGGAL' => $tgl,
                'ID_UKM' => $id_ukm,
                'ID_BS' => $id_bs,
                'ID_BKM' => NULL
            );
            $this->db->insert('proposal_kegiatan_dan_pendanaan', $data_insert);
            $this->pkp();
        } else {
            echo "Gagal";
        }
    }
}
