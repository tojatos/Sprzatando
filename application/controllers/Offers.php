<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Offers extends MY_Controller
{
    public function ajax_addOffer()
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Aby dodać ofertę musisz być zalogowany!');
            }

            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $place = $this->input->post('place');
            $price = $this->input->post('price');
            $rooms[] = $this->input->post('rooms');
            $todos[] = $this->input->post('todos');
            $rooms = $rooms[0];
            $todos = $todos[0];

            $this->validate_ajax_addOffer($date, $time, $phone, $email, $place, $price, $rooms, $todos);

            $this->load->model('Offers_model');
            $try = $this->Offers_model->createOffer($date, $time, $phone, $email, $place, $price, $rooms, $todos);
            if ($try != null) {
                throw new Exception($try);
            }

            echo '<h2>Pomyślnie dodano ofertę.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Dodanie oferty nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    private function validate_ajax_addOffer($date, $time, $phone, $email, $place, $price, $rooms, $todos)
    {
        validateForm([
                'data' => [$date, 50],
                'czas' => [$time, 50],
                'telefon' => [$phone, 50],
                'miejsce' => [$place, 255],
                'cena' => [$price, 50],
                'e-mail' => [$email, 50],
                ]);
        if ($rooms == null && $todos == null) {
            throw new Exception('Musisz wybrać przynajmniej jeden pokój lub czynność!');
        }
    }
    public function showOffers()
    {
        if (!$this->session->isLogged) {
            $this->showView('404');
        } else {
            $this->load->model('Offers_model');
            $offers = $this->Offers_model->getOffers();
            $showOffersContent = $this->loadContent('Offers/showOffers', ['offers' => $offers]);

            $data['title'] = 'Pokaż oferty';
            $data['mainNav'] = $this->loadMainNav();
            $data['content'] = $this->loadContent('Offers/index', ['showOffersContent' => $showOffersContent]);
            $this->showMainView($data);
        }
    }
    public function showOffer($id)
    {
        try {
            if (!$this->session->isLogged) {
                $this->showView('404');
            } else {
                $this->load->model('Offers_model');
                $this->load->model('Participants_model');
                if ($id != intval($id)) {
                    throw new Exception('Nie ma takiej oferty w bazie');
                }
                $offer = $this->Offers_model->getOffer($id);
                if ($offer == null) {
                    throw new Exception('Nie ma takiej oferty w bazie');
                }

                $confirmedState = $this->Participants_model->getConfirmedState($id);
                $data['title'] = 'Pokaż ofertę';
                $data['mainNav'] = $this->loadMainNav();
                $data['content'] = $this->loadContent('Offers/showOffer', ['offer' => $offer, 'confirmedState' => $confirmedState]);
                $this->showMainView($data);
            }
        } catch (Exception $e) {
            $this->showError($e->getMessage());
        }
    }
    public function showAddOfferForm()
    {
        if (!$this->session->isLogged) {
            $this->showView('404');
        } else {
            $data['title'] = 'Dodaj ofertę';
            $data['mainNav'] = $this->loadMainNav();
            $data['content'] = $this->loadContent('Offers/addOfferForm');
            $this->showMainView($data);
        }
    }
}
