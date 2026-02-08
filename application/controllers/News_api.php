<?php


class News_api extends MY_API_Controller
{
    public function headlines()
    {
        // Cek Otentikasi API Key
        $this->check_auth();
        $this->verify_request_method('GET');
        $headlines = $this->News_m->get_headlines();

        // Response JSON Berhasil
        $this->response(200, true, 'Berhasil mengambil data headline.', $headlines);

    }

    public function get_random_list()
    {
        // 1. Validasi Method (Opsional: memanfaatkan fitur MY_API_Controller)
        // Memastikan request hanya bisa dilakukan via GET
        $this->verify_request_method('GET');

        // 2. Cek Auth (Opsional: jika endpoint ini butuh API Key)
        // $this->check_auth();

        // 3. Ambil data dari model (Logic Random ada di Model)
        $news_data = $this->News_m->get_random_news(10);

        // 4. Set Header Anti-Cache (SANGAT PENTING untuk fitur Random)
        // Harus ditaruh SEBELUM $this->response() karena function response() melakukan 'exit'
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        // 5. Output menggunakan Helper $this->response
        if (!empty($news_data)) {
            // Parameter: (HTTP Code, Status Boolean, Message, Data)
            $this->response(200, true, 'Data berita random berhasil diambil', $news_data);
        } else {
            // Handle jika data kosong
            $this->response(404, false, 'Data berita tidak ditemukan', null);
        }
    }
}
