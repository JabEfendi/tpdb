<?php
    defined('BASEPATH') or exit('No direct script access allowed');
// ipin kontol
    class admin extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('mDashboard');
            $this->session;
        }

        public function index()
        {
            $this->load->view('backend/login');
        }

        public function form_upload()
        {
            $this->load->view('backend/admin/layout/header');
            $this->load->view('backend/admin/layout/sidebar');
            $this->load->view('backend/admin/form/form_upload');
            $this->load->view('backend/admin/layout/footer');
        }
        public function isi_form()
        {
            $this->load->view('backend/admin/layout/header');
            $this->load->view('backend/admin/layout/sidebar');
            $this->load->view('backend/admin/form/form');
            $this->load->view('backend/admin/layout/footer');
        }

        public function login()
        {
                $u = $this->input->post('username');
                $p = $this->input->post('password');
                $auth = $this->db->get_where('admin', ['username' => $u])->row_array();
                if ($auth == FALSE) {
                    $this->index();
                } else {
                    if (password_verify($p, $auth['password'])) {
                        $data_session = [
                            'id' => $auth['id'],
                            'username' => $auth['username']
                        ];
                        $this->session->set_userdata($data_session);
                        $this->dashboard();
                    } else {
                        $this->index();
                    }
                }

        }
        public function logout()
        {
            $this->session->sess_destroy();
            redirect('admin');

        }

        public function register()
        {
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                $datareg = array(
                    'username' => $username,
                    'password' => $password

                );
                $this->mDashboard->insert('admin', $datareg);
                $this->index();
        }

}
?>