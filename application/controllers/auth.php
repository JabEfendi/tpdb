<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class auth extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('mDashboard');
            $this->session;
        }
        
        public function admin()
        {
            $this->load->view('backend/admin/layout/header');
            $this->load->view('backend/admin/layout/sidebar');
            $this->load->view('backend/admin/dashboard');
            $this->load->view('backend/admin/layout/footer');
        }

        public function bem()
        {
            if (empty($this->session->userdata('USERNAME'))) {
                redirect('admin/index');
            }
            $data['session_user'] = $this->db->get_where('bem_senat', ['ID_BS' => $this->session->userdata('id')])->row();
            $this->load->view('backend/bem/layout/header');
            $this->load->view('backend/bem/layout/sidebar', $data);
            $this->load->view('backend/bem/dashboard');
            $this->load->view('backend/bem/layout/footer');
        }

        public function bkm()
        {
            if (empty($this->session->userdata('USERNAME'))) {
                redirect('admin/index');
            }
            $this->load->view('backend/bkm/layout/header');
            $this->load->view('backend/bkm/layout/sidebar');
            $this->load->view('backend/bkm/dashboard');
            $this->load->view('backend/bkm/layout/footer');
        }

        public function ukm()
        {
            if (empty($this->session->userdata('USERNAME'))) {
                redirect('admin/index');
            }
            $this->load->view('backend/ukm/layout/header');
            $this->load->view('backend/ukm/layout/sidebar');
            $this->load->view('backend/ukm/dashboard');
            $this->load->view('backend/ukm/layout/footer');
        }


        public function login()
            {
                $u = $this->input->post('username');
                $p = $this->input->post('password');
                $opsi = $this->input->post('opsi');

                if ($opsi==1) {
                    $auth = $this->db->get_where('admin', ['username' => $u])->row_array();
                    if ($auth == FALSE) {
                        redirect('admin');
                    } else {
                        if (password_verify($p, $auth['password'])) {
                            $data_session = [
                                'id' => $auth['id'],
                                'username' => $auth['username']
                            ];
                            $this->session->set_userdata($data_session);
                            $this->admin();
                        } else {
                            echo "gagal";
                        }
                    }
                }
                else if ($opsi==2) {
                    $auth = $this->db->get_where('bem_senat', ['username' => $u])->row_array();
                    if ($auth == FALSE) {
                        redirect('admin');
                    } else {
                        if (password_verify($p, $auth['PASS'])) {
                            $data_session = [
                                'id' => $auth['ID_BS'],
                                'USERNAME' => $auth['USERNAME']
                            ];
                            $this->session->set_userdata($data_session);
                            $this->bem();
                        } else {
                            echo "gagal";
                        }
                    }
                }
                else if ($opsi==3) {
                    $auth = $this->db->get_where('bkm', ['username' => $u])->row_array();
                    if ($auth == FALSE) {
                        redirect('admin');
                    } else {
                        if (password_verify($p, $auth['PASS'])) {
                            $data_session = [
                                'id' => $auth['ID_BKM'],
                                'USERNAME' => $auth['USERNAME']
                            ];
                            $this->session->set_userdata($data_session);
                            $this->bkm();
                        } else {
                            echo "gagal";
                        }
                    }
                }
                else if ($opsi==4) {
                    $auth = $this->db->get_where('ukm', ['username' => $u])->row_array();
                    if ($auth == FALSE) {
                        redirect('admin');
                    } else {
                        if (password_verify($p, $auth['PASS'])) {
                            $data_session = [
                                'id' => $auth['ID_UKM'],
                                'USERNAME' => $auth['USERNAME']
                            ];
                            $this->session->set_userdata($data_session);
                            redirect('ukm');
                        } else {
                            echo "gagal";
                        }
                    }
                }
                else {
                    echo "Pilihan tidak ada";
                }

            }

            public function logout()
            {
                $this->session->sess_destroy();
                redirect('admin');
    
            }


    }