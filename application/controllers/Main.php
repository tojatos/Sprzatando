<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
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
        if (!$this->session->logged) {
            $this->showView('404');
        } else {
            $this->showMainNavView('addOffer');
        }
    }
    private function showView($viewName, $data = null)
    {
        $this->load->view('inc/header');
        $this->load->view($viewName, $data);
        $this->load->view('inc/footer');
    }
    private function showMainNavView($viewName)
    {
      $data['mainNav'] = $this->load->view('mainNav','',true);
      $this->showView($viewName, $data);
    }
}
