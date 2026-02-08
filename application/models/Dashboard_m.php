<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    // Fungsi Generik untuk menghitung jumlah baris di tabel apa saja
    // Cara pakai: $this->Dashboard_m->get_count('news');
    public function get_count($table)
    {
        return $this->db->count_all($table);
    }

    // Fungsi Khusus untuk mengambil Berita Terbaru beserta nama Kategori & Penulis
    public function get_latest_news($limit = 5)
    {
        // Select spesifik agar lebih optimal (opsional, pakai * juga boleh)
        $this->db->select('news.*, categories.category_name, users.full_name');

        $this->db->from('news');
        $this->db->join('categories', 'categories.id_category = news.id_category', 'left');
        $this->db->join('users', 'users.id_user = news.id_user', 'left');

        $this->db->order_by('news.created_at', 'DESC');
        $this->db->limit($limit);

        return $this->db->get()->result();
    }
}
