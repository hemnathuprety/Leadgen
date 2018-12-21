<?php

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->lang->load('eng_headers', 'english');
        $this->load->model('Module_model');

        if ($this->session->userdata("user_name") == "") {
            redirect(base_url());
            exit;
        }
        $data['header_modules'] = $this->Module_model->get_user_module($this->session->userdata("role_id"));
        $data['header_sub_modules'] = $this->Module_model->get_user_sub_module($this->session->userdata("role_id"));

        $this->load->view('admin/templates/header', $data);
    }

    public function get_config($segment, $allcount, $rowperpage)
    {

        $config['base_url'] = admin_url($segment );
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        $config['next_tag_open'] = '<span class="btn btn-secondary btn-sm">';
        $config['next_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span class="btn btn-secondary btn-sm" >';
        $config['prev_tag_close'] = '</span>';
        $config['first_tag_open'] = '<span class="btn btn-secondary btn-sm" style="margin-right: 5px" >';
        $config['first_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span class="btn btn-secondary btn-sm" style="margin-left: 5px" >';
        $config['last_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span class="btn btn-secondary btn-sm" style="margin-left: 5px; margin-right: 5px">';
        $config['num_tag_close'] = '</span>';

        return $config;
    }
}
