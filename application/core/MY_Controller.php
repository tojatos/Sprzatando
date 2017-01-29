<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    protected function showView($viewName, $data = null)
    {
        $this->load->view('inc/header');
        $this->load->view($viewName, $data);
        $this->load->view('inc/footer');
    }
    protected function showMainNavView($viewName, $data = null)
    {
      $data['mainNav'] = $this->load->view('mainNav','',true);
      $this->showView($viewName, $data);
    }
    protected function showError($message)
    {
      $this->showMainNavView('show_error', ['message' => $message]);
    }

}
