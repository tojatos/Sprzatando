<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_model
{

    public function createUser($login, $password, $email, $type = 'standard')
    {
        try {
            $isEmail = $this->db->get_where('users', array('e-mail' => $email), 1);
            if ($isEmail->result() != null) {
                throw new Exception('Taki e-mail już istnieje! Wpisz inny.<br>');
            }
            $isLogin = $this->db->get_where('users', array('login' => $login), 1);
            if ($isLogin->result() != null) {
                throw new Exception('Taki login już istnieje! Wpisz inny.<br>');
            }
            $data = array(
          'login' => $login,
          'password' => sha1($password.HASH_KEY),
          'e-mail' => $email,
          'type' => $type,
          'verified' => false,
          'blocked' => false
        );
            $this->db->insert('users', $data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getUser($login)
    {
      $userData = $this->db->get_where('users', array('login' => $login), 1);
      if ($userData->result() != null) {
        return $userData->result()[0];
      } else {
        return null;
      }
    }
    public function changeUserMessage($user, $message)
    {
      $isSetMessage = $this->db->get_where('user_messages', array('user' => $user), 1);
      if ($isSetMessage->result() == null) {
          $this->db->insert('user_messages', ['user'=>$user, 'message'=>$message]);
      } else {
          $this->db->where('user',$user)->update('user_messages', ['message'=>$message]);
      }
    }
    public function getUserMessage($user)
    {
        $query = $this->db->get_where('user_messages', array('user' => $user), 1);
        if ($query->result() == null) {
            return null;
        }
        else {
          return $query->result()[0]->message;
        }
    }
}
