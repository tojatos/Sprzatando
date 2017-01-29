<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Participants extends MY_Controller
{
    public function participate()
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Aby zgłosić się do oferty musisz być zalogowany!');
            }

            $price = $this->input->post('price');
            $text = $this->input->post('text');
            $offer_id = $this->input->post('offer_id');
            $participant = $this->session->user_name;

            validateForm([
            'Nie zapomnij o cenie!' => $price,
            'Nie zapomnij o opisie!' => $text,
          ]);

            $this->load->model('Offers_model');
            $offer_user = $this->Offers_model->getOfferUser($offer_id);
            if ($offer_user == $participant) {
                throw new Exception('Nie możesz zgłosić się do własnej oferty!');
            }
            $this->load->model('Participants_model');
            $try = $this->Participants_model->participate($offer_id, $price, $text, $participant);
            if ($try != null) {
                throw new Exception($try);
            }
            echo '<h2>Pomyślnie dodano zgłoszenie.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Dodanie zgłoszenia nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    public function showParticipants($offer_id)
    {
        try {
            if (!$this->session->isLogged) {
                $this->showView('404');
            } else {
                $this->load->model('Offers_model');
                $offer_user = $this->Offers_model->getOfferUser($offer_id);
                if ($offer_user != $this->session->user_name) {
                    throw new Exception('Nie możesz przeglądać cudzych ofert!');
                }
                $this->load->model('Participants_model');
                $participants = $this->Participants_model->getParticipants($offer_id);
                if ($participants == null) {
                    throw new Exception('Jeszcze się nikt nie zgłosił do tej oferty.');
                }
                $this->showMainNavView('showParticipants', ['participants' => $participants]);
            }
        } catch (Exception $e) {
            $this->showError($e->getMessage());
        }
    }
}
