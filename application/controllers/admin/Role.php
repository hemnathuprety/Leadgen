<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller
{
    public $segment;

    public function __construct()
    {
        parent::__construct();
        $this->segment = $this->uri->segment(2);
    }

    public function index($rowno = 0)
    {
        $search_text = "";
        if ($this->input->post('search') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));

        } else {
            if ($rowno != 0) {
                if ($this->session->userdata('search') != NULL) {
                    $search_text = $this->session->userdata('search');
                }
            } else {
                if ($this->session->userdata('search') != NULL) {
                    $this->session->unset_userdata('search');
                }
            }
        }
        $rowperpage = 10;
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $this->load->model('Role_model');

        $allcount = $this->Role_model->getRecordCount($search_text);
        $roles = $this->Role_model->get_all_roles($rowno, $rowperpage, $search_text);

        $data['user_permission'] = $this->Role_model->getPermissionByModule($this->session->userdata("role_id"), $this->segment);

        $this->pagination->initialize($this->get_config($this->uri->segment(2) . "/index", $allcount, $rowperpage));

        $data['pagination'] = $this->pagination->create_links();
        $data['roles'] = $roles;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->load->view('admin/role', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add()
    {
        $this->load->view('admin/role_form');
        $this->load->view('admin/templates/footer');
    }

    public function view_roles()
    {
        $this->segment = $this->uri->segment(3);
        $this->index();
    }

    public function role_delete($role_id)
    {
        $this->load->model('Role_model');
        $this->User_model->delete_role($role_id);
        $this->role_module_mapping_delete($role_id);
        $this->index();
    }

    public function role_module_mapping_delete($role_id)
    {
        $this->load->model('Module_model');
        $result = $this->Module_model->get_role_module_mapping_byRole($role_id);
        foreach ($result as $r):
            $this->Module_model->delete_permission_mapping_byMapId($r->id);
            $this->Module_model->delete_role_module_mapping($r->id);
        endforeach;
    }

    public function permission($rowno = 0)
    {
        $this->segment = $this->uri->segment(3);
        $search_text = "";
        if ($this->input->post('search') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));

        } else {
            if ($rowno != 0) {
                if ($this->session->userdata('search') != NULL) {
                    $search_text = $this->session->userdata('search');
                }
            } else {
                if ($this->session->userdata('search') != NULL) {
                    $this->session->unset_userdata('search');
                }
            }
        }
        $rowperpage = 5;
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $this->load->model('Module_model');
        $this->load->model('Role_model');

        $allcount = $this->Module_model->getRecordPermissionMapCount($search_text);
        $permission_maps = $this->Module_model->get_role_module_permission($rowno, $rowperpage, $search_text);

        $data['user_permission'] = $this->Role_model->getPermissionByModule($this->session->userdata("role_id"), $this->segment);
        $data['permissions'] = $this->Module_model->get_permission_map();

        $this->pagination->initialize($this->get_config($this->uri->segment(2) . "/permission", $allcount, $rowperpage));

        $data['pagination'] = $this->pagination->create_links();
        $data['permission_maps'] = $permission_maps;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->load->view('admin/permission', $data);
        $this->load->view('admin/templates/footer');
    }

    public function manage_permission()
    {
        $this->load->model('Role_model');
        $data['roles'] = $this->Role_model->get_roles();

        $this->load->model('Module_model');
        $data['modules'] = $this->Module_model->get_all_modules();
        $data['permissions'] = $this->Module_model->get_permission();

        $this->load->view('admin/permission_mapping', $data);
        $this->load->view('admin/templates/footer');
    }

    public function update_permission_mapping($role_module_map_id)
    {
        $this->load->model('Role_model');
        $data['roles'] = $this->Role_model->get_roles();

        $this->load->model('Module_model');
        $data['modules'] = $this->Module_model->get_all_modules();
        $data['permissions'] = $this->Module_model->get_permission();

        $data['mapping'] = $this->Module_model->get_role_module_permission_byId($role_module_map_id);
        $data['permission_mapping'] = $this->Module_model->get_permission_by_mapId($role_module_map_id);

        $this->load->view('admin/permission_mapping', $data);
        $this->load->view('admin/templates/footer');
    }

    public function permission_mapping_delete($id)
    {
        $this->load->model('Module_model');
        $this->Module_model->delete_permission_mapping_byMapId($id);
        $this->Module_model->delete_role_module_mapping($id);
    }

    public function permission_post()
    {
        $this->load->model('Module_model');
        $permissions = $this->Module_model->get_permission();

        $isPermission = false;
        foreach ($permissions as $permission):
            if (isset($_POST[$permission->name])) {
                $isPermission = true;
            }
        endforeach;

        if ($isPermission) {
            if ($_POST['mapping_id'] != null) {
                $this->load->model('Role_model');
                $this->Role_model->update_module_role_mapping();
                foreach ($permissions as $permission):
                    if (isset($_POST[$permission->name])) {
                        $resultP = $this->Role_model->get_permission_mapping($permission->permission_id, $_POST['mapping_id']);
                        if (!isset($resultP->id)) $this->Role_model->add_permission_mapping($permission->permission_id, $_POST['mapping_id']);
                    } else {
                        $resultP = $this->Role_model->get_permission_mapping($permission->permission_id, $_POST['mapping_id']);
                        if (isset($resultP->id)) $this->Role_model->delete_permission_mapping($resultP->id);
                    }
                endforeach;

                redirect(site_url("admin/role/permission"));
            } else {
                $this->load->model('Role_model');
                $resultMapping = $this->Role_model->get_module_role_mapping($_POST['system_module'], $_POST['user_role']);
                if (isset($resultMapping->id)) {
                    $this->load->model('Role_model');
                    $data['roles'] = $this->Role_model->get_roles(FALSE);

                    $this->load->model('Module_model');
                    $data['modules'] = $this->Module_model->get_modules(FALSE);
                    $data['permissions'] = $this->Module_model->get_permission();
                    $data['permission_check'] = "Role module permission already map!";

                    $this->load->view('admin/permission_mapping', $data);
                    $this->load->view('admin/templates/footer');
                } else {
                    $resultId = $this->Role_model->add_module_role_mapping();
                    foreach ($permissions as $permission):
                        if (isset($_POST[$permission->name])) {
                            $this->Role_model->add_permission_mapping($permission->permission_id, $resultId);
                        }
                    endforeach;
                    redirect(site_url("admin/role/permission"));
                }
            }
        } else {
            $this->load->model('Role_model');
            $data['roles'] = $this->Role_model->get_roles(FALSE);

            $this->load->model('Module_model');
            $data['modules'] = $this->Module_model->get_modules(FALSE);
            $data['permissions'] = $this->Module_model->get_permission();
            $data['permission_check'] = "Please Assign minimum one permission!";

            $this->load->view('admin/permission_mapping', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function edit($role_id)
    {
        $this->load->model('Role_model');
        $data['role'] = $this->Role_model->get_role($role_id);

        $this->load->view('admin/role_form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function post_data()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_type', 'role type', 'trim|required');

        if ($_POST['role_id'] != null) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->model('Role_model');
                $data['role'] = $this->Role_model->get_role($_POST['role_id']);

                $this->load->view('admin/role_form', $data);
                $this->load->view('admin/templates/footer');
            } else {
                $this->load->model('Role_model');
                $this->Role_model->update_role();
                redirect(site_url("admin/role"));
            }

        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/role_form');
                $this->load->view('admin/templates/footer');
            } else {
                $this->load->model('Role_model');
                $this->Role_model->insert_role();
                redirect(site_url("admin/role"));

            }
        }
    }


}

?>
