<?php


class News_m extends CI_Model
{
    public function get_all_news()
    {
        $this->db->select('news.*, categories.category_name as category_name');
        $this->db->from('news');
        $this->db->join('categories', 'news.id_category = categories.id_category', 'left');
        $this->db->join('users', 'news.id_user = users.id_user', 'left');
        $this->db->order_by('news.id_news', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_news($data)
    {
        return $this->db->insert('news', $data);
    }

    public function get_news_by_id($id)
    {
        $this->db->where('id_news', $id);
        $query = $this->db->get('news');
        return $query->row();
    }

    public function update_news($id, $data)
    {
        $this->db->where('id_news', $id);
        return $this->db->update('news', $data);
    }

    /**
     * API
     */

    public function get_headlines()
    {
        $this->db->select('news.id_news, news.title, news.content, news.image, categories.category_name, users.username, news.created_at');
        $this->db->from('news');
        $this->db->join('categories', 'news.id_category = categories.id_category', 'left');
        $this->db->join('users', 'news.id_user = users.id_user', 'left');
        $this->db->where('news.is_headline', 1);
        $this->db->order_by('news.created_at', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_random_news()
    {
        $this->db->select('news.*, categories.category_name as category_name');
        $this->db->from('news');
        $this->db->join('categories', 'news.id_category = categories.id_category', 'left');
        $this->db->join('users', 'news.id_user = users.id_user', 'left');
        $this->db->order_by('RAND()');
        $query = $this->db->get();
        return $query->result();

    }

}
