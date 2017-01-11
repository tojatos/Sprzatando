<?php
session_start();
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_model
{
    public function login($username, $password)
    {
        try {
            $username = htmlentities($username, ENT_QUOTES, 'UTF-8');
            $password = htmlentities($password, ENT_QUOTES, 'UTF-8');
            $this->load->database();
            $result = $this->db->get_where('users', array('username' => $username, 'password' => md5($password) ), 1);
            if ($result->result() == null) {
                throw new Exception('Nieprawidłowe dane logowania.<br>');
            }
            $_SESSION['logged'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function logout(){
      session_unset();
      echo '<h2>Pomyślnie wylogowano.</h2><br>';
      echo '<a href="'.base_url().'">Przejdź do strony głównej</a>';
    }
}
