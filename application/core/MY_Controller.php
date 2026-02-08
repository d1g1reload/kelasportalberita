<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 1. MY_Controller
 * Digunakan untuk Controller Web Admin (Butuh Login Session)
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Kecualikan controller 'login' agar tidak terjadi loop redirect
        if ($this->router->class != 'login') {
            if (!$this->session->userdata('is_loggedin')) {
                $this->session->set_flashdata('failed', 'Harap login terlebih dahulu.');
                redirect('login');
            }
        }
    }
}

/**
 * 2. MY_API_Controller
 * Digunakan untuk Controller API Android (Butuh API Key & Response JSON)
 */
class MY_API_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load Model Setting untuk mengambil API Key dari Database
        $this->load->model('Setting_m');

        // Set Header Standar JSON untuk semua response
        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    }

    /**
     * Fungsi Utama: Cek Otentikasi API Key
     * Membandingkan Header X-API-KEY dengan Database
     */
    protected function check_auth()
    {
        // 1. Ambil API Key dari Header Request Android
        $client_key = $this->input->get_request_header('X-API-KEY', true);

        // 2. Ambil API Key dari Database (Tabel app_settings)
        $server_key = $this->Setting_m->get_setting('X-API-KEY');

        // 3. Validasi
        if (empty($server_key) || $client_key != $server_key) {
            $this->response(401, false, 'Akses Ditolak. API Key tidak valid atau salah.');
        }

        // Jika berhasil, kode akan lanjut eksekusi di controller anak
    }

    /**
     * Helper: Validasi Method HTTP (GET, POST, dll)
     */
    protected function verify_request_method($allowed_methods)
    {
        $current_method = $this->input->method(true); // Return: POST, GET

        if (!is_array($allowed_methods)) {
            $allowed_methods = array($allowed_methods);
        }

        // Pastikan huruf besar semua
        $allowed_methods = array_map('strtoupper', $allowed_methods);

        if (!in_array($current_method, $allowed_methods)) {
            $allowed_string = implode(', ', $allowed_methods);
            $this->response(405, false, "Method HTTP Salah. Endpoint ini hanya menerima: $allowed_string");
        }
    }

    /**
     * Helper: Format Response JSON Standar
     */
    protected function response($status_code, $success, $message, $data = null)
    {
        // Set HTTP Status Code (200, 401, 404, dll)
        $this->output->set_status_header($status_code);

        $response = [
            'status'  => $success,
            'message' => $message,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit; // Matikan proses agar tidak ada output lain
    }
}
