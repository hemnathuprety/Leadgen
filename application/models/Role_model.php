<?php

class Role_model extends CI_model
{
    public $role_id;
    public $role_type;
    public $created_date;
    public $updated_date;

    public function get_time()
    {
        return date("Y-m-d H:i:s");
    }

    public function get_roles($slag = false)
    {
        $this->db->select('*');
        $this->db->from('Role');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_roles($rowno, $rowperpage, $search)
    {
        $this->db->select('*');
        $this->db->from('Role');

        if ($search != '') {
            $this->db->like('Role.role_type', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        return $query->result();
    }


    public function getRecordCount($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('Role');

        if ($search != '') {
            $this->db->like('Role.role_type', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function get_role($role_id)
    {
        $this->db->where('role_id', $role_id);
        $query = $this->db->get('Role');
        return $query->row();
    }

    public function insert_role()
    {
        $this->role_type = $_POST['role_type'];
        $this->created_date = $this->get_time();
        $this->updated_date = $this->get_time();

        $this->db->insert('Role', $this);
    }

    public function update_role()
    {
        $this->db->set('role_type', $_POST['role_type']);
        $this->db->set('updated_date', $this->get_time());
        $this->db->where('role_id', $_POST['role_id']);
        $result = $this->db->update('Role');
        return $result;
    }

    public function delete_role($role_id)
    {
        $this->db->where('role_id', $role_id);
        $this->db->delete('Role');
    }

    public function getPermissionByModule($roleId, $segment)
    {
        $moduleId = $this->get_module_Id($segment);
        $this->db->select('*');
        $this->db->from('role_module_mapping');
        $this->db->join('permission_mapping', 'permission_mapping.module_mapping_id = role_module_mapping.id');
        $this->db->where('role_id', $roleId);
        $this->db->where('module_id', $moduleId);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_module_Id($module_name)
    {
        $this->db->select('module_id');
        $this->db->from('system_module');
        $this->db->where('module_name', $module_name);
        $query = $this->db->get();
        $result = $query->row();
        return $result->module_id;
    }

    public function add_module_role_mapping()
    {
        $this->db->set('role_id', $_POST['user_role']);
        $this->db->set('module_id', $_POST['system_module']);
        $this->db->insert('role_module_mapping');
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_module_role_mapping()
    {
        $this->db->set('role_id', $_POST['user_role']);
        $this->db->set('module_id', $_POST['system_module']);
        $this->db->where('id', $_POST['mapping_id']);
        $result = $this->db->update('role_module_mapping');
        return $result;
    }

    public function delete_role_module_mapping_byModule($module_id)
    {
        $this->db->where('module_id', $module_id);
        $this->db->delete('role_module_mapping');
    }

    public function add_permission_mapping($permission_id, $role_module_map_id)
    {
        $this->db->set('module_mapping_id', $role_module_map_id);
        $this->db->set('permission_id', $permission_id);
        $this->db->insert('permission_mapping');
    }

    public function get_permission_mapping($permission_id, $role_module_map_id)
    {
        $this->db->where('module_mapping_id', $role_module_map_id);
        $this->db->where('permission_id', $permission_id);
        $query = $this->db->get('permission_mapping');
        return $query->row();
    }

    public function delete_permission_mapping($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('permission_mapping');
    }

    public function get_module_role_mapping($module_id, $role_id)
    {
        $this->db->where('module_id', $module_id);
        $this->db->where('role_id', $role_id);
        $query = $this->db->get('role_module_mapping');
        return $query->row();
    }
}
