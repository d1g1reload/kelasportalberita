<?php


class Dashboard extends MY_Controller
{
    public function index()
    {
        $data['total_news']      = $this->Dashboard_m->get_count('news');
        $data['total_category']  = $this->Dashboard_m->get_count('categories');
        $data['total_comment']   = $this->Dashboard_m->get_count('comments');
        $data['total_user']      = $this->Dashboard_m->get_count('users');

        // 2. Ambil Data Berita Terbaru
        $data['latest_news']     = $this->Dashboard_m->get_latest_news(5);

        // 3. Load View
        $data['content'] = "app/dashboard";
        $this->load->view('layouts/main', $data);
    }
}
