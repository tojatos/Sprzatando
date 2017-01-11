<?php

class Login extends CI_Controller
{
    public function zaloguj()
    {
        try {
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            if ($login == null) {
                throw new Exception('Nie zapomnij o loginie!');
            }
            if ($password == null) {
                throw new Exception('Nie zapomnij o haśle!');
            }
            $login = htmlentities($login, ENT_QUOTES, 'UTF-8');
            $password = htmlentities($password, ENT_QUOTES, 'UTF-8');
            $this->load->model('Login_model');
            $try = $this->Login_model->login($login, $password);
            if($try !== null) throw new Exception($try);
            echo '<h2>Pomyślnie zalogowano.</h2><br>';
            echo '<a href="'.base_url().'admin">Przejdź do widoku administratora</a>';
        } catch (Exception $e) {
            echo '<h2>Logowanie nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    public function wyloguj(){
      $this->load->model('Login_model');
      $this->Login_model->logout();
    }
}
