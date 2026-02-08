<?php


class Setting_m extends CI_Model
{
    public function get_setting($key)
    {
        $this->db->where('setting_key', $key);
        $query = $this->db->get('app_settings');
        $result = $query->row();
        return $result ? $result->setting_value : null;
    }
}
