<?php


class Setting extends MY_Controller
{
    public function api()
    {
        $data['api_key'] = $this->Setting_m->get_setting('API_KEY');
        $data['content'] = "app/setting/api";
        $this->load->view('layouts/main', $data);
    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('login');
    }
}
