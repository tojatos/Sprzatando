<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Opinions extends MY_Controller
{
    public function addOpinion()
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Aby stworzyć opinię musisz być zalogowany!');
            }

            $stars = $this->input->post('stars');
            $description = $this->input->post('description');
            $target_user = $this->input->post('target_user');
            $creator = $this->session->user_name;

            validateForm([
            'stars' => [$stars, 1],
            'description' => [$description, 255],
          ]);

            $this->load->model('Opinions_model');
            $this->load->model('Participants_model');

            if ($target_user == $creator) {
                throw new Exception('Nie możesz wystawić sobie opinii!');
            }
            $haveFinishedTransaction = $this->Participants_model->haveFinishedTransaction($creator, $target_user);
            if(!$haveFinishedTransaction){
                throw new Exception('Nie możesz wystawić opinii użytkownikowi, z którym nie handlowałeś!');
            }
            $try = $this->Opinions_model->addOpinion($stars, $description, $creator, $target_user);
            if ($try != null) {
                throw new Exception($try);
            }
            echo '<h2>Pomyślnie dodano opinię.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Dodanie opinii nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
}
