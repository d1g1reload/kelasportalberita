<?php


class User_m extends CI_Model
{
    public function check_email($email)
    {
        return $this->db->where('email', $email)->get('users')->num_rows();
    }

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $account = $this->db->get('users')->row();
        if ($account != null) {
            if (password_verify($password, $account->password)) {
                return $account;
            }
        }
    }
}
