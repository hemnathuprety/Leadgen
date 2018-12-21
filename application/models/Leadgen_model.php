<?php
/**
 * Created by PhpStorm.
 * User: Hem
 * Date: 12/13/2018
 * Time: 11:13 AM
 */

class Leadgen_model extends CI_model
{
    public function get_time()
    {
        return date("Y-m-d H:i:s");
    }

    public function get_leadgens($rowno, $rowperpage, $search)
    {
        $this->db->select('*');
        $this->db->from('leadgen');

        if ($search != '') {
            $this->db->like('leadgen.organization_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        return $query->result();
    }

    public function getRecordCount($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('leadgen');

        if ($search != '') {
            $this->db->like('leadgen.organization_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function get_leadgen($id)
    {
        $this->db->select('*');
        $this->db->from('leadgen');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save_leadgen($logo, $fab_icon)
    {
        $this->db->set('organization_name', $_POST['organization_name']);
        $this->db->set('address', $_POST['address']);
        $this->db->set('contact_no', $_POST['contact_no']);
        $this->db->set('email', $_POST['email']);
        $this->db->set('color', $_POST['color']);
        $this->db->set('disclosure', $_POST['disclosure']);
        $this->db->set('disclosure_link', $_POST['disclosure_link']);
        $this->db->set('privacy_policy', $_POST['privacy_policy']);
        $this->db->set('terms_of_use', $_POST['terms_of_use']);
        $this->db->set('licens_disclosure', $_POST['licens_disclosure']);

        if ($_POST['id'] != null) {
            if ($logo != '')
                $this->db->set('logo', $logo);
            if ($fab_icon != '')
                $this->db->set('fab_icon', $fab_icon);

            $this->db->set('updated_at', $this->get_time());
            $this->db->set('updated_by', $this->session->userdata("user_id"));
            $this->db->where('id', $_POST['id']);
            $this->db->update('leadgen');
        } else {

            $this->db->set('logo', $logo);
            $this->db->set('fab_icon', $fab_icon);

            $this->db->set('created_at', $this->get_time());
            $this->db->set('created_by', $this->session->userdata("user_id"));
            $this->db->insert('leadgen');
        }
    }

    public function delete_leadgen($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('leadgen');
    }

}