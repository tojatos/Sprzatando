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
    private function showUserPage($username, $data)
    {
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
    public function showForgottenPasswordForm()
    {
        $this->showView('Users/forgottenPasswordForm');
    }
    public function showChangePasswordForm($code)
    {
        $this->load->model('User_model');
        $isValid = $this->User_model->validateCode($code);
        if (!$isValid) {
            $this->showError('Ten kod jest nieprawidłowy!');
        } else{
          $this->showView('Users/changePasswordForm', ['code' => $code]);
        }
    }
    public function ajax_forgottenPassword()
    {
        try {
            $email = $this->input->post('email');

            validateForm([
              'e-mail' => [$email, 50],
            ]);
            if (!valid_email($email)) {
                throw new Exception('Wprowadzony e-mail jest nieprawidłowy!');
            }
            $code = substr(str_shuffle(md5(microtime())), 0, 25);
            $this->load->model('User_model');
            $try = $this->User_model->addPasswordChangeRequest($email, $code);
            if ($try != null) {
                throw new Exception($try);
            }

            $this->sendForgottenPasswordMail($email, $code);

            echo '<h2>Pomyślnie wysłano mail.<br></h2>';
        } catch (Exception $e) {
            echo '<h2>Wysłanie maila nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    private function sendForgottenPasswordMail($email, $code)
    {
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('noreply@sprzatando', 'Password changer');
        $this->email->to($email);
        $this->email->subject('Sprzątando - Prośba o zmianę hasła');
        $this->email->message('
        <h1>Zmiana hasła</h1>
        Możesz zmienić swoje hasło klikając w <a href="'.site_url('ChangePassword/').$code.'">ten link</a>.<br><br>
        Jeżeli nie chciałeś zmienić hasła na '.base_url().' zignoruj tę wiadomość.
        ');
        $this->email->send();
    }
    public function ajax_changePassword()
    {
        try {
            $code = $this->input->post('code');
            $password = $this->input->post('password');

            validateForm(['hasło' => [$password, 255]]);

            $this->load->model('User_model');
            $isValid = $this->User_model->validateCode($code);
            if (!$isValid) {
                throw new Exception('Ten kod jest nieprawidłowy!');
            }
            $this->User_model->changePassword($code, $password);
            $this->User_model->removeRequest($code);
            echo 'Pomyślnie zmieniono hasło.';
        } catch (Exception $e) {
            echo 'Zmiana hasła nie powiodła się:<br>';
            echo $e->getMessage();
        }
    }
}
