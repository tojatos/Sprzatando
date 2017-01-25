<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Offers extends MY_Controller
{
    public function addOffer()
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
            validateForm([
              'Nie zapomnij o dacie!' => $date,
              'Nie zapomnij o czasie!' => $time,
              'Nie zapomnij o telefonie!' => $phone,
              'Nie zapomnij o miejscu!' => $place,
              'Nie zapomnij o cenie!' => $price,
              'Nie zapomnij o e-mail\'u!' => $email,
            ]);
            if ($rooms[0] == null && $todos[0] == null) {
                throw new Exception('Musisz wybrać przynajmniej jeden pokój lub czynność!');
            }

            $this->load->model('Offers_model');
            $try = $this->Offers_model->createOffer($date, $time, $phone, $email, $place, $price, $rooms[0], $todos[0]);
            if ($try != null) {
                throw new Exception($try);
            }
            echo '<h2>Pomyślnie dodano ofertę.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Dodanie oferty nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    public function showOffers()
    {
        if (!$this->session->isLogged) {
            $this->showView('404');
        } else {
            $this->load->model('Offers_model');
            $offers = $this->Offers_model->getOffers();
            $data['offers'] = $offers;
            $this->showMainNavView('showOffers', $data);
        }
    }
    public function showOffer($id)
    {
        if (!$this->session->isLogged) {
            $this->showView('404');
        } elseif ($id != intval($id)) {
            $this->showError('Nie ma takiej oferty w bazie');
        } else {
            $this->load->model('Offers_model');
            $offer = $this->Offers_model->getOffer($id);
            if($offer == null){
              $this->showError('Nie ma takiej oferty w bazie');
            } else{
              $data['offer'] = $offer;
              $this->showMainNavView('showOffer', $data);
            }
        }
    }
}
