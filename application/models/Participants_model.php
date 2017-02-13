<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Participants_model extends MY_Model
{
    public function participate($offer_id, $price, $text, $participant)
    {
        try {
            $part_id = $this->getNextID('participants');
            $data = array(
            'id_participants' => $part_id,
            'offer_id' => $offer_id,
            'user' => $participant,
            'price' => $price,
            'text' => $text,
            'accepted' => false,
            'confirmed' => false,
            'finished' => false,
          );
            $this->db->insert('participants', $data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getParticipants($offer_id)
    {
        $query = $this->db->get_where('participants', ['offer_id' => $offer_id]);

        if ($query->result() == null) {
            return null;
        } else {
            return $query->result();
        }
    }
    public function getParticipantsByUser($username)
    {
      $query = $this->db->get_where('participants', ['user' => $username]);
      if ($query->result() == null) {
          return null;
      } else {
          return $query->result();
      }
    }
    public function getParticipantUsername($id)
    {
      return $this->db->get_where('participants', ['id_participants' => $id])->result()[0]->user;
    }
    public function acceptParticipant($id)
    {
        $this->db->where('id_participants', $id)->update('participants', ['accepted' => true]);
    }
    public function confirmParticipation($id, $offer_id)
    {
      $this->db->where('id_participants', $id)->update('participants', ['confirmed' => true]);
      $this->db->where('offer_id', $offer_id)->where('confirmed', false)->delete('participants');
    }
    // public function getOffersID($username)
    // {
    //     $query = $this->db->distinct()->select('offer_id')->get_where('participants', ['user' => $username]);
    //     $result = $query->result();
    //     if ($result == null) {
    //         return null;
    //     } else {
    //         $offers_ids = [];
    //         foreach ($result as $obj) {
    //             array_push($offers_ids, $obj->offer_id);
    //         }

    //         return $offers_ids;
    //     }
    // }
}
