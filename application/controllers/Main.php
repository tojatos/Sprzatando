<?php

class Main extends CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $this->load->view('main');
        $this->load->view('footer');
    }
    public function error404()
    {
        $this->load->view('header');
        $this->load->view('404');
        $this->load->view('footer');
    }
}
