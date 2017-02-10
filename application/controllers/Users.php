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
                  $data['user_offers'] = $this->loadContent('Offers/showOffers', ['offers' => $user_offers]);
                  $data['user_fin_offers'] = $this->loadContent('Offers/showFinishedOffers', ['offers' => $user_offers]);
                  $data['user_par'] = $this->loadContent('Participants/showUserParticipations', ['participants' => $participant_offers]);
                  $data['user_fin_par'] = $this->loadContent('Participants/showUserFinishedParticipations', ['participants' => $participant_offers]);
                }
                $data['user'] = $user;
                $data['mainNav'] = $this->loadMainNav();
                $data['title'] = 'Profil użytkownika '.$user->login;
                $data['content'] = $this->loadContent('Users/showUser', $data);
                $this->showMainView($data);
            }
        } catch (Exception $e) {
            $this->showError($e->getMessage());
        }
    }
}
