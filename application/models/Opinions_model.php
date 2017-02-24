<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Opinions_model extends MY_Model
{
    public function addOpinion($stars, $description, $from_user, $to_user)
    {
        try {
            $opinions_id = $this->getNextID('opinions');
            $data = array(
            'id_opinions' => $opinions_id,
            'stars' => $stars,
            'description' => $description,
            'from_user' => $from_user,
            'to_user' => $to_user,
            );

            $opinion_exists = $this->db
              ->where('from_user', $from_user)
              ->where('to_user', $to_user)
              ->limit(1)
              ->count_all_results('opinions');

            if ($opinion_exists) {
                --$data['id_opinions'];
                $this->db
                  ->where('from_user', $from_user)
                  ->where('to_user', $to_user)
                  ->update('opinions', $data);
            } else {
                $this->db->insert('opinions', $data);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getOpinions($user)
    {
        $query = $this->db->select('*')
          ->from('opinions')
          ->where('opinions.to_user', $user)
          ->get();
          $opinions = $query->result();
        return $opinions;
    }
}
