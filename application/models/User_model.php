<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_model
{
    public function createUser($login, $password, $email, $type = 'standard')
    {
        try {
            $this->load->database();
            $isEmail = $this->db->get_where('users', array('e-mail' => $email), 1);
            if ($isEmail->result() != null) {
                throw new Exception('Taki e-mail już istnieje! Wpisz inny.<br>');
            }
            $isLogin = $this->db->get_where('users', array('login' => $login), 1);
            if ($isLogin->result() != null) {
                throw new Exception('Taki login już istnieje! Wpisz inny.<br>');
            }
            $data = array(
          'login' => $login,
          'password' => md5($password),
          'e-mail' => $email,
          'type' => $type,
          'verifed' => false,
          'blocked' => false
        );
            $this->db->insert('users', $data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function verify($email)
    {
      
    }
}
