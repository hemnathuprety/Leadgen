<?php

/**
 * Created by PhpStorm.
 * User: Hem
 * Date: 11/30/2018
 * Time: 10:40 AM
 */
class Delivery_man_model extends CI_model
{

    public function get_delivery_man($rowno, $rowperpage, $search = '')
    {
        $this->db->select('*');
        $this->db->from('delivery_man');
        $this->db->join('personal_detail', 'personal_detail.id = delivery_man.personal_detail_id');
        $this->db->join('address', 'address.id = personal_detail.permanent_address_id');

        if ($search != '') {
            $this->db->like('delivery_man.username', $search);
            $this->db->or_like('personal_detail.full_name', $search);
            $this->db->or_like('personal_detail.email', $search);
        }
        $this->db->limit($rowperpage, $rowno);

        $query = $this->db->get();
        return $query->result();
    }

    public function getRecordCount($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('delivery_man');
        $this->db->join('personal_detail', 'personal_detail.id = delivery_man.personal_detail_id');

        if ($search != '') {
            $this->db->like('delivery_man.username', $search);
            $this->db->or_like('personal_detail.full_name', $search);
            $this->db->or_like('personal_detail.email', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }
}