<?php
/**
 * Created by PhpStorm.
 * User: Hem
 * Date: 11/22/2018
 * Time: 10:44 AM
 */

class Module extends MY_Controller
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
            }else{
        if ($this->session->userdata('search') != NULL) {
            $this->session->unset_userdata('search');
        }
    }
        }
        $rowperpage = 10;
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $this->load->model('Module_model');
        $this->load->model('Role_model');

        $allcount = $this->Module_model->getRecordCount($search_text);
        $modules = $this->Module_model->get_modules($rowno, $rowperpage, $search_text);

        $data['user_permission'] = $this->Role_model->getPermissionByModule($this->session->userdata("role_id"), $this->segment);

        $this->pagination->initialize($this->get_config($this->uri->segment(2) . "/index", $allcount, $rowperpage));

        $data['pagination'] = $this->pagination->create_links();
        $data['modules'] = $modules;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->load->view('admin/system_module', $data);
        $this->load->view('admin/templates/footer');
    }

    public function view_modules()
    {
        $this->segment = $this->uri->segment(3);
        $this->index();
    }

    public function add_module()
    {
        $this->load->model('Module_model');
        $data['modules'] = $this->Module_model->get_main_modules();

        $this->load->view('admin/module_form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit_module($module_id)
    {
        $this->load->model('Module_model');
        $data['modules'] = $this->Module_model->get_main_modules();
        $data['module'] = $this->Module_model->get_module($module_id);

        $this->load->view('admin/module_form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function module_delete($module_id)
    {
        $this->load->model('Module_model');
        $result = $this->Module_model->get_role_module_mapping_byModule($module_id);
        foreach ($result as $r):
            $this->delete_sub_module($r->id);
        endforeach;
        $this->Module_model->delete_module($module_id);
        $this->role_module_mapping_delete($module_id);
        $this->index();
    }

    public function delete_sub_module($module_id)
    {
        $this->Module_model->delete_module($module_id);
        $this->role_module_mapping_delete($module_id);
    }

    public function role_module_mapping_delete($module_id)
    {
        $this->load->model('Module_model');
        $result = $this->Module_model->get_role_module_mapping_byModule($module_id);
        foreach ($result as $r):
            $this->Module_model->delete_permission_mapping_byMapId($r->id);
            $this->Module_model->delete_role_module_mapping($r->id);
        endforeach;
    }

    public function module_post()
    {
        $this->load->library('form_validation');
        if ($_POST['module_id'] != null) {

            if ($_POST['module_old_name'] != $_POST['module_old_name']) {
                $this->form_validation->set_rules('module_name', 'module name', 'trim|required|is_unique[system_module.module_name]');
                $this->form_validation->set_rules('display_name', 'display name', 'trim|required');
            } else {
                $this->form_validation->set_rules('display_name', 'display name', 'trim|required');
            }

            if ($this->form_validation->run() == FALSE) {
                $this->load->model('Module_model');
                $data['modules'] = $this->Module_model->get_main_modules();
                $data['module'] = $this->Module_model->get_module($_POST['module_id']);

                $this->load->view('admin/module_form', $data);
                $this->load->view('admin/templates/footer');
            } else {
                $this->load->model('Module_model');
                $this->Module_model->update_module();
                redirect(site_url("admin/module"));
            }

        } else {

            $this->form_validation->set_rules('module_name', 'module name', 'trim|required|is_unique[system_module.module_name]');
            $this->form_validation->set_rules('display_name', 'display name', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->model('Module_model');
                $data['modules'] = $this->Module_model->get_main_modules();

                $this->load->view('admin/module_form');
                $this->load->view('admin/templates/footer');
            } else {
                $this->load->model('Module_model');
                $this->Module_model->insert_module();
                redirect(site_url("admin/module"));
            }
        }

    }

}