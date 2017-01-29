<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Users extends MY_Controller
{
    public function showUser($username)
    {
        if (!$this->session->isLogged) {
            $this->showView('404');
        } else {
            $this->load->model('User_model');
            $user = $this->User_model->getUser($username);
            if ($user == null) {
                $this->showError('Nie ma takiego użytkownika!');
            } else {
              $data['user'] = $user;
              $data['mainNav'] = $this->load->view('mainNav', '', true);
              $this->showView('showUser', $data);
            }

        }
    }
}
