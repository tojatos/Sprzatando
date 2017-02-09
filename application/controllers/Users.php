<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Users extends MY_Controller
{
    public function showUser($username)
    {
        try {
            if (!$this->session->isLogged) {
                $this->showView('404');
            } else {
              $this->load->model('User_model');
              $user = $this->User_model->getUser($username);
              if ($user == null) {
                  throw new Exception('Nie ma takiego użytkownika!');
              }
                if ($this->session->user_name == $username) {
                  $this->load->model('Offers_model');
                  $user_offers = $this->Offers_model->getOffers($username);
                  $this->load->model('Participants_model');
                  $participant_offers = $this->Participants_model->getParticipantsByUser($username);
                  $data['user_offers'] = $user_offers;
                  $data['participant_offers'] = $participant_offers;
                }
                $data['user'] = $user;
                $data['mainNav'] = $this->load->view('mainNav', '', true);
                $this->showView('showUser', $data);
            }
        } catch (Exception $e) {
            $this->showError($e->getMessage());
        }
    }
}
