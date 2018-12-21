<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller
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

        $this->load->model('User_model');
        $allcount = $this->User_model->getRecordCount($search_text);
        $users_record = $this->User_model->get_users($rowno, $rowperpage, $search_text);

        $this->load->model('Role_model');
        $data['roles'] = $this->Role_model->get_roles(FALSE);

        $data['user_permission'] = $this->Role_model->getPermissionByModule($this->session->userdata("role_id"), $this->segment);

        $this->pagination->initialize($this->get_config($this->uri->segment(2) . "/index", $allcount, $rowperpage));


        $data['pagination'] = $this->pagination->create_links();
        $data['users'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->load->view('admin/user', $data);
        $this->load->view('admin/templates/footer');
    }

    public function view_users()
    {
        $this->segment = $this->uri->segment(3);
        $this->index();
    }

    public function add_user()
    {
        $this->load->model('Role_model');
        $data['roles'] = $this->Role_model->get_roles(FALSE);

        $this->load->model('User_status_model');
        $data['status'] = $this->User_status_model->get_status(FALSE);

        $this->load->view('admin/user_form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function update($user_id)
    {
        $this->load->model('User_model');
        $data['user'] = $this->User_model->get_user($user_id);

        $this->load->model('Role_model');
        $data['roles'] = $this->Role_model->get_roles(FALSE);

        $this->load->view('admin/user_form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function user_delete($user_id)
    {
        $this->load->model('User_model');
        $this->User_model->delete_user($user_id);
        $this->index();
    }

    public function changeStatus($status, $user_id)
    {
        $this->load->model('User_model');
        if ($status == 1) {
            $status = 2;
        } else {
            $status = 1;
        }
        $this->User_model->changeStatus($status, $user_id);
        redirect(site_url("admin/user"));
    }

    public function userSuspend($user_id)
    {
        $this->load->model('User_model');
        $status = 3;
        $this->User_model->changeStatus($status, $user_id);
        redirect(site_url("admin/user"));
    }

    public function userPost()
    {
        $this->load->library('form_validation');
        if ($_POST['user_id'] != null) {
            $this->form_validation->set_rules('user_name', 'Username', 'trim|required');
            $this->form_validation->set_rules('full_name', 'full_name', 'trim|required');
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');

            if ($this->form_validation->run() == FALSE) {

                $this->load->model('User_model');
                $data['user'] = $this->User_model->get_user($_POST['user_id']);

                $this->load->model('Role_model');
                $data['roles'] = $this->Role_model->get_roles(FALSE);

                $this->load->view('admin/user_form', $data);
                $this->load->view('admin/templates/footer');

            } else {
                $this->load->model('User_model');
                $this->User_model->update_user();
                redirect(site_url("admin/user"));
            }
        } else {
            $this->form_validation->set_rules(
                'user_name', 'Username',
                'required|is_unique[db_user.user_name]',
                array(
                    'required' => 'You have not provided %s.',
                    'is_unique' => 'This %s already exists.'
                )
            );

            $this->form_validation->set_rules('full_name', 'full_name', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $this->load->model('Role_model');
                $data['roles'] = $this->Role_model->get_roles(FALSE);

                $this->load->model('User_status_model');
                $data['status'] = $this->User_status_model->get_status(FALSE);

                $this->load->view('admin/user_form', $data);
                $this->load->view('admin/templates/footer');
            } else {
                $this->load->model('User_model');
                $result = $this->User_model->insert_user();
                redirect(site_url("admin/user"));
            }
        }
    }
}
