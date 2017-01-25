<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends MY_Controller
{
    public function index()
    {
        $this->showMainNavView('main');
    }
    public function error404()
    {
        $this->showView('404');
    }
    public function register()
    {
        $this->showView('register');
    }
    public function login()
    {
        $this->showView('login');
    }
    public function addOffer()
    {
        if (!$this->session->isLogged) {
            $this->showView('404');
        } else {
            $this->showMainNavView('addOffer');
        }
    }
}
