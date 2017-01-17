<?php

defined('BASEPATH') or exit('No direct script access allowed');
if (!isset($_SESSION)) {
    session_start();
}
class Offers_model extends CI_model
{
    public function createOffer($date, $time, $phone, $email, $place, $price, $rooms, $todos)
    {
        try {
            $datetime = $date.' '.$time;
            $this->load->database();
            $rooms_id = $this->getNextID('rooms');
            $todos_id = $this->getNextID('todos');
            if ($rooms != null) {
                foreach ($rooms as $key => $value) {
                    $roomsData[$value] = true;
                }
            }
            $roomsData['id'] = $rooms_id;
            if ($todos != null) {
                foreach ($todos as $key => $value) {
                    $todosData[$value] = true;
                }
            }
            $todosData['id'] = $todos_id;
            $offersData = array(
              'datetime' => $datetime,
              'phone' => $phone,
              'email' => $email,
              'place' => $place,
              'price' => $price,
              'rooms' => $rooms_id,
              'todos' => $todos_id,
              'user' => $_SESSION['user_name'],
            );
            $this->db->insert('rooms', $roomsData);
            $this->db->insert('todos', $todosData);
            $this->db->insert('offers', $offersData);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function getNextID($table)
    {
        $this->load->database();
        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS maxid FROM '.$table)->row();
        if ($row) {
            $maxid = $row->maxid;
        }

        return $maxid + 1;
    }
    public function getOffers()
    {
        $this->load->database();
        $query = $this->db->query('select offers.id, datetime, place, price, bathroom, kitchen, living_room, bedroom, clean_car, clean_windows from offers join rooms on offers.rooms = rooms.id join todos on offers.todos = todos.id;');
        if ($query->result() == null) {
          return null;
        } else {
          return $query->result();
        }
    }
    public function getOffer($id)
    {
        $this->load->database();
        $query = $this->db->query('select offers.id, datetime, place, price, email, phone, bathroom, kitchen, living_room, bedroom, clean_car, clean_windows from offers join rooms on offers.rooms = rooms.id join todos on offers.todos = todos.id where offers.id = '.$id.' limit 1;');
        if ($query->result() == null) {
          return null;
        } else {
          return $query->result()[0];
        }
    }
}
