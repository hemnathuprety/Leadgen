<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($rowno = 0)
    {
        $search_text = "";
        if ($this->input->post('search') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));

        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }
        $rowperpage = 15;
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $this->load->model('User_model');
        $allcount = $this->User_model->getRecordCount($search_text);
        $users_record = $this->User_model->get_users($rowno, $rowperpage, $search_text);

        $this->load->model('Role_model');
        $data['roles'] = $this->Role_model->get_roles(FALSE);

        $config['base_url'] = admin_url("User/index");
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $config['next_tag_open'] = '<span class="btn btn-secondary btn-sm">';
        $config['next_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span class="btn btn-secondary btn-sm" >';
        $config['prev_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span class="btn btn-secondary btn-sm" style="margin-left: 5px; margin-right: 5px">';
        $config['num_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['users'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->load->view('admin/user', $data);
        $this->load->view('admin/templates/footer');
    }
}
