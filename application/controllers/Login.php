<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends MY_Controller
{
    public function zaloguj()
    {
        try {
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            validateForm([
            'login' => [$login, 50],
            'hasło' => [$password, 50],
            ]);
            $this->load->model('Login_model');
            $try = $this->Login_model->login($login, $password);
            if ($try !== null) {
                throw new Exception($try);
            }
            echo '<h2>Pomyślnie zalogowano.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Logowanie nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    public function wyloguj()
    {
        $this->load->model('Login_model');
        $this->Login_model->logout();
    }
}
