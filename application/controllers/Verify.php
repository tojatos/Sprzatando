<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Verify extends CI_Controller
{
    public function zweryfikuj()
    {
        try {

            // $this->load->model('User_model');
            // $try = $this->User_model->createUser($login, $password, $email);
            // if ($try != null) throw new Exception($try);
            // echo '<h2>Pomyślnie zarejestrowano.</h2><br>';
            // echo 'Po potwierdzeniu wiadomości wysłanej na e-mail będzie można się <a href="'.base_url().'Login">zalogować</a>.';
        } catch (Exception $e) {
            echo '<h2>Weryfikacja nie powiodła się:</h2><br>';
            echo $e->getMessage();
        }
    }
}
