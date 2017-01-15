<?php

defined('BASEPATH') or exit('No direct script access allowed');
if (!isset($_SESSION)) {
    session_start();
}
class Login_model extends CI_model
{
    public function login($login, $password)
    {
        try {
            $this->load->database();
            $result = $this->db->get_where('users', array('login' => $login, 'password' => md5($password)), 1);
            if ($result->result() == null) {
                throw new Exception('Nieprawidłowe dane logowania.<br>');
            }
            $row = $result->result()[0];
            if($row->verified == false) throw new Exception("Musisz zweryfikować swoje konto przed zalogowaniem!");
            $_SESSION['logged'] = true;
            $_SESSION['user_type'] = $row->type;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function logout()
    {
        session_unset();
        echo '<h2>Pomyślnie wylogowano.</h2><br>';
    }
}
