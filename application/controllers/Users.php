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
                $this->load->model('Participants_model');
                $this->load->model('Offers_model');
                $this->load->model('Opinions_model');

                $user = $this->User_model->getUser($username);
                if ($user == null) {
                    throw new Exception('Nie ma takiego użytkownika!');
                }
                $data['user'] = $user;
                if ($this->session->user_name == $username) {
                    $data += $this->loadUserAndParticipantOffers($username);
                } else {
                    $data['haveFinishedTransaction'] = $this->Participants_model->haveFinishedTransaction($username, $this->session->user_name);
                }
                $this->showUserPage($username, $data);
            }
        } catch (Exception $e) {
            $this->showError($e->getMessage());
        }
    }
    private function loadUserAndParticipantOffers($username)
    {
        $user_offers = $this->Offers_model->getOffers($username);
        $participant_offers = $this->Participants_model->getParticipantsByUser($username);
        $data['user_offers'] = $this->loadContent('Offers/showOffers', ['offers' => $user_offers]);
        $data['user_fin_offers'] = $this->loadContent('Offers/showFinishedOffers', ['offers' => $user_offers]);
        $data['user_par'] = $this->loadContent('Participants/showUserParticipations', ['participants' => $participant_offers]);
        $data['user_fin_par'] = $this->loadContent('Participants/showUserFinishedParticipations', ['participants' => $participant_offers]);

        return $data;
    }
    private function showUserPage($username, $data){
      $data['addOpinionForm'] = $this->loadContent('Opinions/addOpinionForm', ['username' => $username]);
      $user_opinions = $this->Opinions_model->getOpinions($username);
      $data['user_opinions'] = $this->loadContent('Opinions/showOpinions', ['opinions' => $user_opinions]);
      $data['user_message'] = $this->getUserMessage($username);
      $data['mainNav'] = $this->loadMainNav();
      $data['title'] = 'Profil użytkownika '.$username;
      $data['content'] = $this->loadContent('Users/showUser', $data);
      $this->showMainView($data);
    }
    public function ajax_changeUserMessage()
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Nie jesteś zalogowany!');
            } else {
                $user = $this->session->user_name;
                $message = $this->input->post('message');
                validateForm(['opis' => [$message, 255]]);
                $this->load->model('User_model');
                $this->User_model->changeUserMessage($user, $message);
                echo 'Opis pomyślnie zmieniony na:<br>'.$message;
            }
        } catch (Exception $e) {
            echo 'Zmiana opisu nie powiodła się:<br>';
            echo $e->getMessage();
        }
    }
    public function getUserMessage($user)
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Nie jesteś zalogowany!');
            } else {
                $this->load->model('User_model');
                $message = $this->User_model->getUserMessage($user);

                return $message;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
