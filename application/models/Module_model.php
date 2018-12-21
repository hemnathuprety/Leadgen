<?php
/**
 * Created by PhpStorm.
 * User: Hem
 * Date: 11/22/2018
 * Time: 10:48 AM
 */

class Module_model extends CI_model
{

    public function get_time()
    {
        return date("Y-m-d H:i:s");
    }

    public function get_modules($rowno, $rowperpage, $search)
    {
        $this->db->select('*');
        $this->db->from('system_module');

        if ($search != '') {
            $this->db->like('system_module.module_name', $search);
            $this->db->or_like('system_module.display_name', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_modules()
    {
        $this->db->select('*');
        $this->db->from('system_module');
        $query = $this->db->get();
        return $query->result();
    }


    public function getRecordCount($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('system_module');

        if ($search != '') {
            $this->db->like('system_module.module_name', $search);
            $this->db->or_like('system_module.display_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function get_module($module_id)
    {
        $this->db->where('module_id', $module_id);
        $query = $this->db->get('system_module');
        return $query->row();
    }

    public function get_main_modules()
    {
        $this->db->where('is_submodule', false);
        $query = $this->db->get('system_module');
        return $query->result();
    }

    public function get_sub_module($parent_id)
    {
        $this->db->select('id');
        $this->db->from('system_module');
        $this->db->where('parent_module', $parent_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_module()
    {
        $this->db->set('module_name', $_POST['module_name']);
        $this->db->set('display_name', $_POST['display_name']);
        $this->db->set('order_no', $_POST['order_no']);
        $this->db->set('icon', $_POST['icon']);
        if ($_POST['parent_module'] == '0') {
            $this->db->set('is_submodule', false);
            $this->db->set('parent_module', null);
        } else {
            $this->db->set('is_submodule', true);
            $this->db->set('parent_module', $_POST['parent_module']);
        }
        $this->db->set('created_date', $this->get_time());
        $this->db->set('updated_date', $this->get_time());

        $this->db->insert('system_module');
    }

    public function update_module()
    {
        $this->db->set('module_name', $_POST['module_name']);
        $this->db->set('display_name', $_POST['display_name']);
        $this->db->set('order_no', $_POST['order_no']);
        $this->db->set('icon', $_POST['icon']);
        if ($_POST['parent_module'] == '0') {
            $this->db->set('is_submodule', false);
            $this->db->set('parent_module', null);
        } else {
            $this->db->set('is_submodule', true);
            $this->db->set('parent_module', $_POST['parent_module']);
        }
        $this->db->set('updated_date', $this->get_time());
        $this->db->where('module_id', $_POST['module_id']);
        $result = $this->db->update('system_module');
        return $result;
    }

    public function delete_module($module_id)
    {
        $this->db->where('module_id', $module_id);
        $this->db->delete('system_module');
    }

    public function get_permission()
    {
        $this->db->select('*');
        $this->db->from('permission');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_permission_map()
    {
        $this->db->select('*');
        $this->db->from('permission_mapping');
        $this->db->join('permission', 'permission_mapping.permission_id = permission.permission_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_permission_by_mapId($role_module_map_id)
    {
        $this->db->select('*');
        $this->db->from('permission_mapping');
        $this->db->where('permission_mapping.module_mapping_id', $role_module_map_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_role_module_permission($rowno, $rowperpage, $search)
    {
        $this->db->select('*');
        $this->db->from('role_module_mapping');
        $this->db->join('role', 'role_module_mapping.role_id = role.role_id');
        $this->db->join('system_module', 'role_module_mapping.module_id = system_module.module_id');

        if ($search != '') {
            $this->db->like('role.role_type', $search);
            $this->db->or_like('system_module.module_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        return $query->result();
    }

    public function getRecordPermissionMapCount($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('role_module_mapping');

        $this->db->join('role', 'role_module_mapping.role_id = role.role_id');
        $this->db->join('system_module', 'role_module_mapping.module_id = system_module.module_id');

        if ($search != '') {
            $this->db->like('role.role_type', $search);
            $this->db->like('system_module.module_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function get_role_module_permission_byId($role_module_map_id)
    {
        $this->db->select('*');
        $this->db->from('role_module_mapping');
        $this->db->join('role', 'role_module_mapping.role_id = role.role_id');
        $this->db->join('system_module', 'role_module_mapping.module_id = system_module.module_id');
        $this->db->where('role_module_mapping.id', $role_module_map_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_role_module_mapping($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('role_module_mapping');
    }

    public function get_role_module_mapping_byModule($module_id)
    {
        $this->db->select('id');
        $this->db->from('role_module_mapping');
        $this->db->where('module_id', $module_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_permission_mapping_byMapId($id)
    {
        $this->db->where('module_mapping_id', $id);
        $this->db->delete('permission_mapping');
    }

    public function get_role_module_mapping_byRole($role_id)
    {
        $this->db->select('id');
        $this->db->from('role_module_mapping');
        $this->db->where('role_id', $role_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_module($role_id)
    {
        $this->db->select('*');
        $this->db->from('role_module_mapping');
        $this->db->join('system_module', 'role_module_mapping.module_id = system_module.module_id');
        $this->db->where('role_module_mapping.role_id', $role_id);
        $this->db->where('system_module.is_submodule', false);
        $this->db->order_by("order_no", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_sub_module($role_id)
    {
        $this->db->select('*');
        $this->db->from('role_module_mapping');
        $this->db->join('system_module', 'role_module_mapping.module_id = system_module.module_id');
        $this->db->where('role_module_mapping.role_id', $role_id);
        $this->db->where('system_module.is_submodule', true);
        $this->db->order_by("order_no", "asc");
        $query = $this->db->get();
        return $query->result();
    }

}