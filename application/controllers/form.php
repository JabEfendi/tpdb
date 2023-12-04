<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class form extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('mDashboard');
        }

        public function index()
        {
            $this->load->view('backend/admin/layout/header');
            $this->load->view('backend/admin/layout/sidebar');
            $this->load->view('backend/admin/form/form');
            $this->load->view('backend/admin/layout/footer');
        }

        public function save_bem()
        {
                $nama = $this->input->post('nama_bem');
                $bagian = $this->input->post('bagian');
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('username'), PASSWORD_DEFAULT);
                $deskripsi = $this->input->post('deskripsi');
    
                $datareg = array(
                    'NAMA' => $nama,
                    'BAGIAN' => $bagian,
                    'USERNAME' => $username,
                    'PASS' => $password,
                    'DESKRIPSI' => $deskripsi
    
                );
                $this->mDashboard->insert('bem_senat', $datareg);
                redirect('form');
        }

        public function save_bkm()
        {
                $nama = $this->input->post('nama_bkm');
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('username'), PASSWORD_DEFAULT);
                $telp = $this->input->post('telp');
                $email = $this->input->post('email');
    
                $datareg = array(
                    'NAMA' => $nama,
                    'USERNAME' => $username,
                    'PASS' => $password,
                    'TELP' => $telp,
                    'EMAIL' => $email
    
                );
                $this->mDashboard->insert('bkm', $datareg);
                redirect('form');
        }

        public function save_ukm()
        {
                $nama = $this->input->post('nama_ukm');
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('username'), PASSWORD_DEFAULT);
                $deskripsi = $this->input->post('deskripsi');
                $tanggal_pembuatan = date("Y-m-d H:i:s");
    
                $datareg = array(
                    'NAMA_UKM' => $nama,
                    'USERNAME' => $username,
                    'PASS' => $password,
                    'DESKRIPSI' => $deskripsi,
                    'TANGGAL_PEMBUATAN' => $tanggal_pembuatan
    
                );
                $this->mDashboard->insert('ukm', $datareg);
                redirect('form');
        }
    }