<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bem extends CI_Controller
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
        $data['session_user'] = $this->db->get_where('bem_senat', ['ID_BS' => $this->session->userdata('id')])->row();
        $this->load->view('backend/bem/layout/header');
        $this->load->view('backend/bem/layout/sidebar', $data);
        $this->load->view('backend/bem/dashboard');
        $this->load->view('backend/bem/layout/footer');
    }
    public function jadwal_kegiatan()
    {
        $tanggal = $this->input->post('pelaksanaan');
        $data['hasil'] = $this->mDashboard->selectJudul($tanggal);
        $data['status'] = $this->mDashboard->selectStatus('Y');
        $data['session_user'] = $this->db->get_where('bem_senat', ['ID_BS' => $this->session->userdata('id')])->row();
        $data['pkp'] = $this->mDashboard->get_all_data('proposal_kegiatan_dan_pendanaan')->result();
        $data['judul'] = $this->db->get_where('proposal_kegiatan_dan_pendanaan', ['TANGGAL' => $this->input->post('pelaksanaan')])->row();
        $this->load->view('backend/bem/layout/header');
        $this->load->view('backend/bem/layout/sidebar', $data);
        $this->load->view('backend/bem/data/jk/jadwal_kegiatan', $data);
        $this->load->view('backend/bem/layout/footer');
    }

    public function proposal()
    {
        $status = $this->input->post('status');
        $data['hasil'] = $this->mDashboard->selectStatus($status);
        $data['session_user'] = $this->db->get_where('bem_senat', ['ID_BS' => $this->session->userdata('id')])->row();
        $data['pkp'] = $this->mDashboard->get_all_data('proposal_kegiatan_dan_pendanaan')->result();
        $this->load->view('backend/bem/layout/header');
        $this->load->view('backend/bem/layout/sidebar', $data);
        $this->load->view('backend/bem/data/proposal', $data);
        $this->load->view('backend/bem/layout/footer');
    }

    public function save_kegiatan()
    {
        $judul = $this->input->post('judul');
        $pengesahan = $this->input->post('pengesahan');
        $pelaksanaan = $this->input->post('pelaksanaan');
        $idbem = $this->input->post('id_bs');
        $idpkp = $this->input->post('id_pkp');
        $datareg = array(
            'JUDUL' => $judul,
            'STAT' => 'ON GOING',
            'TANGGAL_PENGESAHAN' => $pengesahan,
            'TANGGAL_PELAKSANAAN' => $pelaksanaan,
            'ID_BS' => $idbem,
            'ID_PKP' => $idpkp

        );
        $this->db->insert('jadwal_kegiatan', $datareg);
        redirect('bem/jadwal_kegiatan');
    }

    public function add_jk($id)
    {
        $dataWhere = array('ID_PKP' => $id);
        $data['session_user'] = $this->db->get_where('bem_senat', ['ID_BS' => $this->session->userdata('id')])->row();
        $data['pkp'] = $this->mDashboard->get_by_id('proposal_kegiatan_dan_pendanaan', $dataWhere)->row_object();
        $data['jk'] = $this->mDashboard->get_all_data('jadwal_kegiatan')->result();
        $this->load->view('backend/bem/layout/header');
        $this->load->view('backend/bem/layout/sidebar', $data);
        $this->load->view('backend/bem/data/jk/add_jk', $data);
        $this->load->view('backend/bem/layout/footer');
    }

    public function acc($id)
    {
        $id_bs = $this->session->ID_BS;
        $dataWhere = array('ID_PKP' => $id);
        $result = $this->mDashboard->get_by_id('proposal_kegiatan_dan_pendanaan', $dataWhere)->row_object();
        $status = $result->STAT;

        // if (is_null($id_bs)) {
        //     // Mengisi id_bs dengan nilai yang diinginkan jika NULL
        //     $id_bs_value = $id_bs; // Isi dengan nilai yang diinginkan
        //     $dataUpdate = array('ID_BS' => $id_bs_value);
        //     $this->mDashboard->update('proposal_kegiatan_dan_pendanaan', $dataUpdate, 'ID_PKP', $id);
        // }

        if ($status == "X") {
            $dataUpdate = array('STAT' => "Z");
        } else {
            $dataUpdate = array('STAT' => "Y");
        }
        $this->mDashboard->update('proposal_kegiatan_dan_pendanaan', $dataUpdate, 'ID_PKP', $id);
        $this->proposal();
    }

    public function reject($id)
    {
        $dataWhere = array('ID_PKP' => $id);
        $result = $this->mDashboard->get_by_id('proposal_kegiatan_dan_pendanaan', $dataWhere)->row_object();
        $status = $result->STAT;
        if ($status == "X") {
            $dataUpdate = array('STAT' => "Y");
        } else {
            $dataUpdate = array('STAT' => "Z");
        }
        $this->mDashboard->update('proposal_kegiatan_dan_pendanaan', $dataUpdate, 'ID_PKP', $id);
        $this->proposal();
    }

    // public function cari_data()
    // {
    //     // $tanggal = $this->input->post('pelaksanaan');

    //     // $data['hasil'] = $this->mDashboard->selectJudul($tanggal);
    //     // $data['session_user'] = $this->db->get_where('bem_senat', ['ID_BS' => $this->session->userdata('id')])->row();
    //     $this->jadwal_kegiatan();
    // }
}
