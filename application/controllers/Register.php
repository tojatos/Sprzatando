<?php

class Register extends CI_Controller
{
    public function zarejestruj()
    {
        try {
            $email = $this->input->post('email');
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $password_repeat = $this->input->post('password_repeat');
            validateForm([
              'Nie zapomnij o e-mail\'u!' => $email,
              'Nie zapomnij o loginie!' => $login,
              'Nie zapomnij o haśle!' => $password,
              'Nie zapomnij potwierdzić hasła!' => $password_repeat,
          ]);
            if ($password != $password_repeat) {
                throw new Exception('Hasło różni się od hasła powtórzonego!');
            }
            echo '<h2>Pomyślnie zarejestrowano.</h2><br>';
            echo 'Po potwierdzeniu wiadomości wysłanej na e-mail będzie można się <a href="'.base_url().'Login">zalogować</a>.';
        } catch (Exception $e) {
            echo '<h2>Rejestracja nie powiodła się:</h2><br>';
            echo $e->getMessage();
        }
    }
}
