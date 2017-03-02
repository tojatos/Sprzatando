<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_model
{

    public function createUser($login, $password, $email, $type = 'standard')
    {
        try {
            $isEmail = $this->db->get_where('users', array('email' => $email), 1);
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
              'email' => $email,
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
        $messages = $query->result();
        if ($messages == null) {
            return null;
        }
        else {
          return $messages[0]->message;
        }
    }
    public function addPasswordChangeRequest($email, $code)
    {
      try {
          $isEmail = $this->db->get_where('password_change_requests', ['email' => $email], 1);
          if ($isEmail->result() != null) {
              throw new Exception('Na ten e-mail już wysłano prośbę o zmianę hasła.<br>');
          }
          $data = array(
            'email' => $email,
            'code' => $code
      );
          $this->db->insert('password_change_requests', $data);
      } catch (Exception $e) {
          return $e->getMessage();
      }
    }
    public function changePassword($code, $newPassword)
    {
      $email = $this->db->get_where('password_change_requests', ['code' => $code], 1)->result()[0]->email;
      $this->db->where('email', $email)->update('users', ['password' => sha1($newPassword.HASH_KEY)]);
    }
    public function validateCode($code)
    {
      $isCode = $this->db->where('code', $code)->get('password_change_requests')->result();
      if($isCode==null){
        return false;
      } else {
        return true;
      }
    }
    public function removeRequest($code)
    {
      $this->db->where('code', $code)->delete('password_change_requests');
    }
}
