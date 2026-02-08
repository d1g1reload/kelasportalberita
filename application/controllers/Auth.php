<?php


class Auth extends CI_Controller
{
    public function login()
    {
        if ($this->session->userdata('is_loggedin')) {
            redirect('dashboard');
        } else {

            $this->load->view('layouts/login');
        }
    }

    public function submit_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data_user = $this->User_m->login($email, $password);

        $check_account = $this->User_m->check_email($email);
        if ($check_account <= 0) {
            $this->session->set_flashdata('failed', 'Akun anda belum terdaftar.');
            redirect('login');
        }

        if (!$data_user) {
            $this->session->set_flashdata('failed', 'Email dan Password tidak sesuai');
            redirect('login');
        }


        if ($data_user->is_active == 1) {

            $user_data = array(
                'id_user'       => $data_user->id_user,
                'username'      => $data_user->username,
                'email'         => $data_user->email,
                'full_name'     => $data_user->full_name,
                'is_loggedin'   => true
            );
            $this->session->set_userdata($user_data);
            redirect('dashboard');
        } elseif ($data_user->is_active == 0) {
            $this->session->set_flashdata('failed', 'Akun anda belum di aktivasi.');
            redirect('login');
        } else {
            $this->session->set_flashdata('failed', 'Email dan Password tidak sesuai');
            redirect('login');

        }

    }

}
