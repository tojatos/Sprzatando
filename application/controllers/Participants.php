<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Participants extends MY_Controller
{
    public function ajax_participate()
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Aby zgłosić się do oferty musisz być zalogowany!');
            }

            $price = $this->input->post('price');
            $text = $this->input->post('text');
            $offer_id = $this->input->post('offer_id');
            $participant = $this->session->user_name;

            $this->validate_ajax_participate($price, $text, $offer_id);

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
    private function validate_ajax_participate($price, $text, $offer_id)
    {
        validateForm([
      'cena' => [$price, 50],
      'opis' => [$text, 255],
      ]);

        $this->load->model('Offers_model');
        $this->load->model('Participants_model');

        $activeState = $this->Offers_model->getActiveState($offer_id);
        if (!$activeState) {
            throw new Exception('Ta oferta jest już zakończona!');
        }
        $offerUser = $this->Offers_model->getOfferUser($offer_id);
        if ($offerUser == $participant) {
            throw new Exception('Nie możesz zgłosić się do własnej oferty!');
        }
        $confirmedState = $this->Participants_model->getConfirmedState($offer_id);
        if ($confirmedState) {
            throw new Exception('Wykonawca został już zatwierdzony!');
        }
    }
    public function showParticipants($offer_id)
    {
        try {
            if (!$this->session->isLogged) {
                $this->showView('404');
            } else {
                $this->load->model('Offers_model');
                $this->load->model('Participants_model');

                $offerUser = $this->Offers_model->getOfferUser($offer_id);
                if ($offerUser != $this->session->user_name) {
                    throw new Exception('Nie możesz przeglądać cudzych ofert!');
                }
                $participants = $this->Participants_model->getParticipantsByOffer($offer_id);
                if ($participants == null) {
                    throw new Exception('Jeszcze się nikt nie zgłosił do tej oferty.');
                }
                $data['title'] = 'Pokaż zgłoszenia';
                $data['mainNav'] = $this->loadMainNav();
                $data['content'] = $this->loadContent('Participants/showParticipants', ['participants' => $participants]);
                $this->showMainView($data);
            }
        } catch (Exception $e) {
            $this->showError($e->getMessage());
        }
    }
    public function ajax_acceptParticipant()
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Nie jesteś zalogowany!');
            }

            $this->load->model('Offers_model');
            $this->load->model('Participants_model');

            $currentUser = $this->session->user_name;
            $id = $this->input->post('id');
            $offer_id = $this->input->post('offer_id');
            $participant = $this->input->post('participant');

            $this->validate_ajax_acceptParticipant($currentUser, $id, $offer_id, $participant);

            $this->Participants_model->acceptParticipant($id);
            echo '<h2>Pomyślnie zaakceptowano ofertę użytkownika '.$participant.'.<h2><br>';
        } catch (Exception $e) {
            echo '<h2>Zaakceptowanie oferty nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    private function validate_ajax_acceptParticipant($currentUser, $id, $offer_id, $participant)
    {
        $activeState = $this->Offers_model->getActiveState($offer_id);
        if (!$activeState) {
            throw new Exception('Ta oferta jest już zakończona!');
        }
        $offerUser = $this->Offers_model->getOfferUser($offer_id);
        if ($offerUser != $currentUser) {
            throw new Exception('Nie możesz zarządzać cudzymi zgłoszeniami!');
        }
    }
    public function ajax_confirmParticipation()
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Nie jesteś zalogowany!');
            }

            $this->load->model('Offers_model');
            $this->load->model('Participants_model');

            $currentUser = $this->session->user_name;
            $id = $this->input->post('id');
            $offer_id = $this->input->post('offer_id');

            $this->validate_ajax_confirmParticipation($currentUser, $id, $offer_id);

            $this->Participants_model->confirmParticipation($id);
            $this->Participants_model->deleteUnconfirmedParticipants($offer_id);
            $this->Offers_model->setAsNotActive($offer_id);

            echo '<h2>Pomyślnie potwierdzono ofertę o id '.$id.'.<h2><br>';
        } catch (Exception $e) {
            echo '<h2>Potwierdzenie oferty nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    private function validate_ajax_confirmParticipation($currentUser, $id, $offer_id)
    {
        $par_user = $this->Participants_model->getParticipantUsername($id);
        if ($par_user != $currentUser) {
            throw new Exception('Nie możesz zarządzać cudzymi zgłoszeniami!');
        }
        $activeState = $this->Offers_model->getActiveState($offer_id);
        if (!$activeState) {
            throw new Exception('Ta oferta jest już zakończona!');
        }
    }
    public function ajax_finishOffer()
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Nie jesteś zalogowany!');
            }
            $this->load->model('Offers_model');
            $this->load->model('Participants_model');

            $currentUser = $this->session->user_name;
            $id = $this->input->post('id');
            $offer_id = $this->input->post('offer_id');

            $this->validate_ajax_finishOffer($currentUser, $id, $offer_id);

            $this->Participants_model->setAsCompleted($id);
            echo '<h2>Pomyślnie zakończono ofertę.<h2><br>';
        } catch (Exception $e) {
            echo '<h2>Zakończenie oferty nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    private function validate_ajax_finishOffer($currentUser, $id, $offer_id)
    {
        $finishedState = $this->Participants_model->getFinishedState($offer_id);
        if ($finishedState) {
            throw new Exception('Oferta została już ukończona!');
        }
        $offerUser = $this->Offers_model->getOfferUser($offer_id);
        if ($offerUser != $currentUser) {
            throw new Exception('Nie możesz zarządzać cudzymi zgłoszeniami!');
        }
    }
}
