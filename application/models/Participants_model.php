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
    public function getParticipantsByOffer($offer_id)
    {
        $query = $this->db->get_where('participants', ['offer_id' => $offer_id]);
        $participants = $query->result();
        if ($participants == null) {
            return null;
        } else {
            return $participants;
        }
    }
    public function getParticipantsByUser($username)
    {
        $query = $this->db->get_where('participants', ['user' => $username]);
        $participants = $query->result();
        if ($participants == null) {
            return null;
        } else {
            return $participants;
        }
    }
    public function getParticipantUsername($id)
    {
        $query = $this->db->get_where('participants', ['id_participants' => $id]);
        $participants = $query->result();
        if ($participants == null) {
            return null;
        } else {
            return $participants[0]->user;
        }
    }
    public function getConfirmedState($offer_id)
    {
        $query = $this->db->get_where('participants', ['offer_id' => $offer_id]);
        if ($query->result() == null) {
            return null;
        } else {
            return $query->result()[0]->confirmed;
        }
    }
    public function getFinishedState($offer_id)
    {
        $query = $this->db->get_where('participants', ['offer_id' => $offer_id]);
        if ($query->result() == null) {
            return null;
        } else {
            return $query->result()[0]->finished;
        }
    }
    public function acceptParticipant($id)
    {
        $this->db->where('id_participants', $id)->update('participants', ['accepted' => true]);
    }
    public function confirmParticipation($id)
    {
        $this->db->where('id_participants', $id)->update('participants', ['confirmed' => true]);
    }
    public function deleteUnconfirmedParticipants($offer_id)
    {
        $this->db->where('offer_id', $offer_id)->where('confirmed', false)->delete('participants');
    }

    public function setAsCompleted($id)
    {
        $this->db->where('id_participants', $id)->update('participants', ['finished' => true]);
    }
    public function haveFinishedTransaction($user1, $user2)
    {
        $this->db->select('participants.finished')
        ->from('participants')
        ->join('offers', 'participants.offer_id = offers.id_offers')
        ->where('finished', true)
          ->group_start()
            ->where('participants.user', $user1)
            ->where('offers.user', $user2)
            ->or_where('participants.user', $user2)
            ->where('offers.user', $user1)
          ->group_end()
          ->limit(1);
        $query = $this->db->get();
        if ($query->result() == null) {
            return null;
        } else {
            return $query->result()[0]->finished;
        }
    }
}
