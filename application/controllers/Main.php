<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Main extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Sprzątando';
        $data['mainNav'] = $this->loadMainNav();
        $data['content'] = $this->loadContent('main');
        $this->showMainView($data);
    }
    public function error404()
    {
        $this->showView('404');
    }
    public function register()
    {
        $this->showView('Register/register');
    }
    public function login()
    {
        $this->showView('Login/login');
    }
    public function addOffer()
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
