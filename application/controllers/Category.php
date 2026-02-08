<?php

class Category extends MY_Controller
{
    public function index()
    {
        $data['categories'] = $this->Category_m->get_all_categories();
        $data['content'] = "app/category";
        $this->load->view('layouts/main', $data);
    }

    public function submit()
    {
        $category_name = $this->input->post('category_name');

        $data = array(
            'category_name' => $category_name,
        );

        $save = $this->Category_m->insert_category($data);
        if ($save) {
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('failed', 'Terjadi kesalahan saat menambahkan kategori.');
        }
        redirect('category');
    }

    public function update()
    {
        $id = $this->input->post('id_category');
        $category_name = $this->input->post('category_name');

        $data = array(
            'category_name' => $category_name,
        );

        $update = $this->Category_m->update_category($id, $data);
        if ($update) {
            $this->session->set_flashdata('success', 'Kategori berhasil diupdate.');
        } else {
            $this->session->set_flashdata('failed', 'Terjadi kesalahan saat mengupdate kategori.');
        }
        redirect('category');
    }

    public function delete($id)
    {
        $delete = $this->Category_m->delete_category($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        } else {
            $this->session->set_flashdata('failed', 'Terjadi kesalahan saat menghapus kategori.');
        }
        redirect('category');
    }
}
