<?php

class User_model extends CI_model
{
    public $user_name;
    public $email;
    public $full_name;
    public $password;
    public $status;
    public $role_id;
    public $created_date;
    public $updated_date;

    function Authenticate($username)
    {
        $this->db->select('user.user_id, user.user_name, user.full_name, user.email, user.password, user.status, user.role_id, user.created_date, role.role_type as role_name');
        $this->db->from('User');
        $this->db->where("email", $username);
        $this->db->or_where("user_name", $username);
        $this->db->join('Role', 'user.role_id = role.role_id');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function get_users($rowno, $rowperpage, $search = '')
    {
        $this->db->select('user.user_id, user.user_name, user.full_name, user.email, user.password, user.status, user.role_id, user.created_date, role.role_type, status.name as user_status');
        $this->db->from('User');
        $this->db->join('Role', 'user.role_id = role.role_id');
        $this->db->join('status', 'user.status = status.id');

        if ($search != '') {
            $this->db->like('user.user_name', $search);
            $this->db->or_like('user.full_name', $search);
            $this->db->or_like('user.email', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }


    public function getRecordCount($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('User');
        $this->db->join('Role', 'user.role_id = role.role_id');
        $this->db->join('status', 'user.status = status.id');

        if ($search != '') {
            $this->db->like('user.user_name', $search);
            $this->db->or_like('user.full_name', $search);
            $this->db->or_like('user.email', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function get_time()
    {
        return date("Y-m-d H:i:s");
    }

    public function get_user($user_id)
    {
        $this->db->select('user.user_id, user.user_name, user.full_name, user.email, user.password, user.status, user.role_id, user.created_date, role.role_type, status.name as user_status');
        $this->db->from('User');
        $this->db->join('Role', 'user.role_id = role.role_id');
        $this->db->join('status', 'user.status = status.id');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_user()
    {
        $this->user_name = $_POST['user_name'];
        $this->password = $_POST['password'];
        $this->full_name = $_POST['full_name'];
        $this->email = $_POST['user_email'];
        $this->role_id = $_POST['user_role'];
        $this->status = $_POST['user_status'];
        $this->created_date = $this->get_time();
        $this->updated_date = $this->get_time();

        $this->db->insert('User', $this);
    }

    public function update_user()
    {
        $user_id = $_POST['user_id'];
        $this->db->set('full_name', $_POST['full_name']);
        $this->db->set('email', $_POST['user_email']);
        $this->db->set('role_id', $_POST['user_role']);

        $this->db->set('updated_date', $this->get_time());
        $this->db->where('user_id', $user_id);

        $result = $this->db->update('User');
        return $result;
    }

    public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');
    }

    public function changeStatus($value, $user_id)
    {
        $this->db->set('status', $value);
        $this->db->set('updated_date', $this->get_time());
        $this->db->where('user_id', $user_id);
        $this->db->update('User');
    }
}
