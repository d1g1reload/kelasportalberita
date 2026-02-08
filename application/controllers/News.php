<?php


class News extends MY_Controller
{
    public function index()
    {

        $data['news'] = $this->News_m->get_all_news();
        $data['content'] = "app/news/index";
        $this->load->view('layouts/main', $data);
    }

    public function create()
    {
        $data['categories'] = $this->Category_m->get_all_categories();
        $data['content'] = "app/news/add";
        $this->load->view('layouts/main', $data);
    }

    public function submit()
    {

        $this->form_validation->set_rules('title', 'Judul Berita', 'required|trim');
        $this->form_validation->set_rules('content', 'Isi Berita', 'required');
        $this->form_validation->set_rules('id_category', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {

            $this->create();
        } else {
            $image_name = 'default.jpg';

            if (!empty($_FILES['image']['name'])) {

                $config['upload_path']   = './cloud/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
                $config['max_size']      = 10240;
                $config['encrypt_name']  = true;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $uploadData = $this->upload->data();
                    $image_name = $uploadData['file_name'];
                } else {
                    $this->session->set_flashdata('failed', $this->upload->display_errors());
                    redirect('news/create');
                    return;
                }
            }

            $headline_status = $this->input->post('is_headline') ? 1 : 0;

            $data = [
                'title'       => $this->input->post('title', true),
                'content'     => $this->input->post('content', false),
                'id_category' => $this->input->post('id_category'),
                'id_user'     => $this->session->userdata('id_user'),
                'news_status' => $this->input->post('news_status'),
                'is_headline' => $headline_status,
                'image'       => $image_name,
                'created_at'  => date('Y-m-d H:i:s'),
            ];

            $insert = $this->News_m->insert_news($data);

            if ($insert) {
                $this->session->set_flashdata('success', 'Berita berhasil diterbitkan!');
                redirect('news');
            } else {
                $this->session->set_flashdata('failed', 'Terjadi kesalahan sistem, gagal menyimpan.');
                redirect('news/create');
            }
        }
    }

    public function edit($id)
    {
        $data['categories'] = $this->Category_m->get_all_categories();
        $data['news'] = $this->News_m->get_news_by_id($id);
        $data['content'] = "app/news/edit";
        $this->load->view('layouts/main', $data);
    }

    public function update()
    {
        // 1. Cek ID News
        $id_news = $this->input->post('id_news');
        if (!$id_news) {
            redirect('news');
        }

        $this->load->library('form_validation');
        $this->load->library('upload');


        // 2. Validasi
        $this->form_validation->set_rules('title', 'Judul Berita', 'required|trim');
        $this->form_validation->set_rules('content', 'Isi Berita', 'required');

        if ($this->form_validation->run() == false) {
            $this->edit($id_news); // Balik ke form edit jika error
        } else {

            // 3. Logika Gambar
            $image_name = $this->input->post('old_image'); // Default: Pakai gambar lama

            // Cek jika ada gambar BARU yang diupload
            if (!empty($_FILES['image']['name'])) {
                $config['upload_path']   = './cloud/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
                $config['max_size']      = 10240; // 10MB
                $config['encrypt_name']  = true;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    // Upload Berhasil
                    $uploadData = $this->upload->data();
                    $image_name = $uploadData['file_name'];

                    // HAPUS GAMBAR LAMA (Opsional: agar server tidak penuh)
                    $old_file = './cloud/' . $this->input->post('old_image');
                    if ($this->input->post('old_image') != 'default.jpg' && file_exists($old_file)) {
                        unlink($old_file);
                    }
                } else {
                    // Gagal Upload
                    $this->session->set_flashdata('failed', $this->upload->display_errors());
                    redirect('news/edit/'.$id_news);
                    return;
                }
            }

            // 4. Update Database
            $headline_status = $this->input->post('is_headline') ? 1 : 0;

            $data = [
                'title'       => $this->input->post('title', true),
                'content'     => $this->input->post('content', false),
                'id_category' => $this->input->post('id_category'),
                'news_status' => $this->input->post('news_status'),
                'is_headline' => $headline_status,
                'image'       => $image_name,
                'updated_at'  => date('Y-m-d H:i:s'),
            ];


            $update = $this->News_m->update_news($id_news, $data);

            if ($update) {
                $this->session->set_flashdata('success', 'Berita berhasil diperbarui!');
                redirect('news');
            } else {
                $this->session->set_flashdata('failed', 'Gagal memperbarui data.');
                redirect('news/edit/'.$id_news);
            }
        }
    }

    public function delete($id_news)
    {
        // 1. Ambil data berita berdasarkan ID untuk mendapatkan nama filenya
        $this->db->where('id_news', $id_news);
        $query = $this->db->get('news');
        $row = $query->row();

        // Cek apakah data ada?
        if ($row) {
            // 2. Hapus File Gambar dari Folder 'cloud'
            // Syarat: Gambar bukan 'default.jpg' DAN file-nya benar-benar ada di folder
            $file_path = './cloud/' . $row->image;

            if ($row->image != 'default.jpg' && file_exists($file_path)) {
                unlink($file_path); // Fungsi PHP untuk menghapus file
            }

            // 3. Hapus Data dari Database
            $this->db->where('id_news', $id_news);
            $this->db->delete('news');

            $this->session->set_flashdata('success', 'Berita dan file gambar berhasil dihapus.');
        } else {
            $this->session->set_flashdata('failed', 'Data berita tidak ditemukan.');
        }

        redirect('news');
    }
}
