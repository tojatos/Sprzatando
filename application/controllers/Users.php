<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!isset($_SESSION)) {
    session_start();
}
class Users extends CI_Controller
{
    public function showUser($username)
    {
        if (!isset($_SESSION['logged'])) {
            $this->showView('404');
        } else {
            $data['user'] = null;
            $data['mainNav'] = $this->load->view('mainNav', '', true);
            $this->showView('showUser', $data);
            // $this->load->model('User_model');
            // $user = $this->Offers_model->getUser($username);
            // if ($user == null) {
            //     $data['message'] = 'Nie ma takiego użytkownika!';
            //     $this->showView('show_error', $data);
            // } else {
            //     $data['mainNav'] = $this->load->view('mainNav', '', true);
            //     $data['offer'] = $offer;
            //     $this->showView('showOffer', $data);
            // }
        }
    }
    private function showView($viewName, $data = null)
    {
        $this->load->view('inc/header');
        $this->load->view($viewName, $data);
        $this->load->view('inc/footer');
    }
}
