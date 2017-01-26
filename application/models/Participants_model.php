<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Participants_model extends MY_Model
{
    public function participate($offer_id, $price, $text, $participant)
    {
      try {
          $part_id = $this->getNextID('participants');
          $data = array(
            'id' => $part_id,
            'offer_id' => $offer_id,
            'user' => $participant,
            'price' => $price,
            'text' => $text,
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
}
