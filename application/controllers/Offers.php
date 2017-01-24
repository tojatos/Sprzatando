<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!isset($_SESSION)) {
    session_start();
}
class Offers extends CI_Controller
{
    public function addOffer()
    {
        try {
            if (!isset($_SESSION['logged'])) {
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

            //dump(date_create($date.' '.$time));
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
    // public function sendVerifyEmail($email)
    // {
    //   $this->load->library('email');
    //   $this->email->from('noreply@'.base_url(), 'Verifier');
    //   $this->email->to($email);
    //   $this->email->subject('Sprzątando - Weryfikacja');
    //   $this->email->message('Potwierdź swoją rejestrację klikając w <a href="'.base_url().md5("hash13".$email).'">ten link</a>');
    //   $this->email->send();
    // }
    // public function test()
    // {
    //   $this->sendVerifyEmail("tojatos@gmail.com");
    // }
    public function showOffers()
    {
        if (!isset($_SESSION['logged'])) {
            $this->showView('404');
        } else {
            $this->load->model('Offers_model');
            $offers = $this->Offers_model->getOffers();
            $data['mainNav'] = $this->load->view('mainNav', '', true);
            $data['offers'] = $offers;
            $this->showView('showOffers', $data);
        }
    }
    public function showOffer($id)
    {
      if($id!=intval($id)) {
        $data['message'] = "Nie ma takiej oferty w bazie";
        $this->showView('show_error', $data);
      }
      else if (!isset($_SESSION['logged'])) {
          $this->showView('404');
      } else {
          $this->load->model('Offers_model');
          $offer = $this->Offers_model->getOffer($id);
          $data['mainNav'] = $this->load->view('mainNav', '', true);
          $data['offer'] = $offer;
          $this->showView('showOffer', $data);
      }
    }
    private function showView($viewName, $data = null)
    {
        $this->load->view('inc/header');
        $this->load->view($viewName, $data);
        $this->load->view('inc/footer');
    }
}
