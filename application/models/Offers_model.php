<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Offers_model extends MY_Model
{
    public function createOffer($date, $time, $phone, $email, $place, $price, $rooms, $todos)
    {
        try {
            $rooms_id = $this->getNextID('rooms');
            $todos_id = $this->getNextID('todos');

            $roomsData['id_rooms'] = $rooms_id;
            $todosData['id_todos'] = $todos_id;

            if ($rooms != null) {
                foreach ($rooms as $key => $value) {
                    $roomsData[$value] = true;
                }
            }
            if ($todos != null) {
                foreach ($todos as $key => $value) {
                    $todosData[$value] = true;
                }
            }

            $datetime = $date.' '.$time;
            $user = $this->session->user_name;

            $offersData = array(
              'datetime' => $datetime,
              'phone' => $phone,
              'email' => $email,
              'place' => $place,
              'price' => $price,
              'rooms' => $rooms_id,
              'todos' => $todos_id,
              'user' => $user,
            );

            $this->db->insert('rooms', $roomsData);
            $this->db->insert('todos', $todosData);
            $this->db->insert('offers', $offersData);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
/**
 * getOffers() - get all offers
 * getOffers($username) - get all offers of user $username
 */
    public function getOffers($username = null)
    {
        $this->db->select('offers.*, rooms.*, todos.*')
        ->from('offers')
        ->join('rooms', 'offers.rooms = rooms.id_rooms')
        ->join('todos', 'offers.todos = todos.id_todos');
        if ($username != null) {
            $this->db->where('user', $username);
        }
        $query = $this->db->get();
        $offers = $query->result();
        if ($offers == null) {
            return null;
        } else {
            return $offers;
        }
    }
    public function getOffer($id)
    {
        $this->db->select('offers.*, rooms.*, todos.*')
        ->from('offers')->join('rooms', 'offers.rooms = rooms.id_rooms')
        ->join('todos', 'offers.todos = todos.id_todos')
        ->where('offers.id_offers', $id)
        ->limit(1);
        $query = $this->db->get();
        $offers = $query->result();
        if ($offers == null) {
            return null;
        } else {
            return $offers[0];
        }
    }
    public function getOfferUser($id)
    {
        $offerUser = $this->db->get_where('offers', ['id_offers' => $id])->result()[0]->user;

        return $offerUser;
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
