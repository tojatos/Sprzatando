<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{
    public function showUser($username)
    {
        if (!$this->session->logged) {
            $this->showView('404');
        } else {
            $this->load->model('User_model');
            $user = $this->User_model->getUser($username);
            if ($user == null) {
                $this->showView('show_error', ['message' => 'Nie ma takiego użytkownika!']);
            } else {
                $data['mainNav'] = $this->load->view('mainNav', '', true);
                $data['offer'] = $offer;
                $this->showView('showOffer', $data);
            }
            $data['user'] = null;
            $data['mainNav'] = $this->load->view('mainNav', '', true);
            $this->showView('showUser', $data);
        }
    }
    private function showView($viewName, $data = null)
    {
        $this->load->view('inc/header');
        $this->load->view($viewName, $data);
        $this->load->view('inc/footer');
    }
}
