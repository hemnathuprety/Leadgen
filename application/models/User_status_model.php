<?php

class User_status_model extends CI_model
{
    public $role_id;
    public $role_type;
    public $created_date;
    public $updated_date;

    public function get_status($slug = FALSE)
    {
        $this->db->select("*", $slug);
        if ($slug === FALSE) {
            $query = $this->db->get('status');
            return $query->result_array();
        }

        $query = $this->db->get_where('status', array('slug' => $slug));
        return $query->row_array();
    }

    public function get_role($id)
    {
        $query = $this->db->get('status', array('id' => $id));
        return $query->result();
    }
}
