<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class bkm extends CI_Controller
    {

        public function index()
        {
            $this->load->view('backend/bkm/layout/header');
            $this->load->view('backend/bkm/layout/sidebar');
            $this->load->view('backend/bkm/dashboard');
            $this->load->view('backend/bkm/layout/footer');
        }
        public function dana()
        {
            $this->load->view('backend/bkm/layout/header');
            $this->load->view('backend/bkm/layout/sidebar');
            $this->load->view('backend/bkm/data/pendanaan');
            $this->load->view('backend/bkm/layout/footer');
        }

        public function proposal()
        {
            $this->load->view('backend/bkm/layout/header');
            $this->load->view('backend/bkm/layout/sidebar');
            $this->load->view('backend/bkm/data/proposal');
            $this->load->view('backend/bkm/layout/footer');
        }

    }