<?php

class Main extends CI_Controller
{
    public function index()
    {
      $this->showView('main');
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
    private function showView($viewName)
    {
      $this->load->view('header');
      $this->load->view($viewName);
      $this->load->view('footer');
    }
}
