<?php


class Category_m extends CI_Model
{
    public function get_all_categories()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function insert_category($data)
    {
        return $this->db->insert('categories', $data);
    }
    public function get_category_by_id($id)
    {
        $query = $this->db->get_where('categories', array('id_category' => $id));
        return $query->row();
    }
    public function update_category($id, $data)
    {
        $this->db->where('id_category', $id);
        return $this->db->update('categories', $data);
    }
    public function delete_category($id)
    {
        $this->db->where('id_category', $id);
        return $this->db->delete('categories');
    }

}
