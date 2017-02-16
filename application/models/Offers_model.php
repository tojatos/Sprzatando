<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Offers_model extends MY_Model
{
    public function createOffer($date, $time, $phone, $email, $place, $price, $rooms, $todos)
    {
        try {
            $datetime = $date.' '.$time;

            $rooms_id = $this->getNextID('rooms');
            $todos_id = $this->getNextID('todos');
            if ($rooms != null) {
                foreach ($rooms as $key => $value) {
                    $roomsData[$value] = true;
                }
            }
            $roomsData['id_rooms'] = $rooms_id;
            if ($todos != null) {
                foreach ($todos as $key => $value) {
                    $todosData[$value] = true;
                }
            }
            $todosData['id_todos'] = $todos_id;
            $offersData = array(
              'datetime' => $datetime,
              'phone' => $phone,
              'email' => $email,
              'place' => $place,
              'price' => $price,
              'rooms' => $rooms_id,
              'todos' => $todos_id,
              'user' => $this->session->user_name,
            );
            $this->db->insert('rooms', $roomsData);
            $this->db->insert('todos', $todosData);
            $this->db->insert('offers', $offersData);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOffers($user = null)
    {
        $this->db->select('offers.*, rooms.*, todos.*')->from('offers')->join('rooms', 'offers.rooms = rooms.id_rooms')->join('todos', 'offers.todos = todos.id_todos');
        if ($user != null) {
            $this->db->where('user', $user);
        }
        $query = $this->db->get();
        if ($query->result() == null) {
            return null;
        } else {
            return $query->result();
        }
    }
    public function getOffer($id)
    {
        $query = $this->db->select('offers.*, rooms.*, todos.*')->from('offers')->join('rooms', 'offers.rooms = rooms.id_rooms')->join('todos', 'offers.todos = todos.id_todos')->where('offers.id_offers', $id)->limit(1)->get();
        if ($query->result() == null) {
            return null;
        } else {
            return $query->result()[0];
        }
    }
    public function getOfferUser($id)
    {
        $offer_user = $this->db->get_where('offers', ['id_offers' => $id])->result()[0]->user;

        return $offer_user;
    }
    public function getActiveState($id)
    {
      $activeState = $this->db->get_where('offers', ['id_offers' => $id])->result()[0]->active;

      return $activeState;
    }
    public function setAsNotActive($id)
    {
        $this->db->where('id_offers', $id)->update('offers', ['active' => false]);
    }
}
