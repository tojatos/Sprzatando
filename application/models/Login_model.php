<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_model
{
    public function login($login, $password)
    {
        try {
            $result = $this->db->get_where('users', array('login' => $login, 'password' => sha1($password.HASH_KEY)), 1);
            if ($result->result() == null) {
                throw new Exception('Nieprawidłowe dane logowania.<br>');
            }
            $row = $result->result()[0];
            if($row->verified == false) throw new Exception("Musisz zweryfikować swoje konto przed zalogowaniem!");
            session_unset();
            $this->session->isLogged = true;
            $this->session->user_name = $row->login;
            $this->session->user_type = $row->type;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function logout()
    {
        session_unset();
        echo '<h2>Pomyślnie wylogowano.</h2><br>';
        echo '<a href="'.base_url().'">Powrót do strony głównej</a><br>';
    }
}
