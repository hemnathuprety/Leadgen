<?php
/**
 * Created by PhpStorm.
 * User: Hem
 * Date: 12/13/2018
 * Time: 11:12 AM
 */

class Leadgen extends MY_Controller
{
    public $segment;
    public $image_field;

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

        $this->load->model('Leadgen_model');
        $allcount = $this->Leadgen_model->getRecordCount($search_text);
        $leadgens_record = $this->Leadgen_model->get_leadgens($rowno, $rowperpage, $search_text);

        $this->load->model('Role_model');
        $data['user_permission'] = $this->Role_model->getPermissionByModule($this->session->userdata("role_id"), $this->segment);

        $this->pagination->initialize($this->get_config($this->uri->segment(2) . "/index", $allcount, $rowperpage));


        $data['pagination'] = $this->pagination->create_links();
        $data['leadgens'] = $leadgens_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $this->load->view('admin/leadgen', $data);
        $this->load->view('admin/templates/footer');
    }

    public function view_leadgens()
    {
        $this->segment = $this->uri->segment(3);
        $this->index();
    }

    public function add_leadgen()
    {
        $this->load->view('admin/leadgen_form');
        $this->load->view('admin/templates/footer');
    }

    public function edit($id)
    {
        $this->load->model('Leadgen_model');
        $data['leadgen'] = $this->Leadgen_model->get_leadgen($id);

        $this->load->view('admin/leadgen_form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function leadGenPost()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_rules('organization_name', 'Organization Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact No.', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('color', 'Color', 'trim|required');
        $this->form_validation->set_rules('disclosure', 'Disclosure', 'trim|required');
        $this->form_validation->set_rules('disclosure_link', 'Disclosure Link', 'trim|required');
        $this->form_validation->set_rules('privacy_policy', 'Privacy Policy', 'trim|required');
        $this->form_validation->set_rules('terms_of_use', 'Terms of Use', 'trim|required');
        $this->form_validation->set_rules('licens_disclosure', 'License Disclosure', 'trim|required');

        if ($_POST['id'] != null) {
            if (!empty($_FILES['logo']['name'])) {
                $logo_name = $this->uploadImage_post('logo');
            } else {
                $logo_name = '';
            }
        } else {
            $logo_name = $this->uploadImage_post('logo');
        }

        if (!empty($_FILES['fab_icon']['name'])) {
            $fab_icon = $this->uploadImage_post('fab_icon');
        } else {
            $fab_icon = '';
        }

        if ($this->form_validation->run() == FALSE) {
            $this->add_leadgen();
        } else {
            $this->load->model('Leadgen_model');
            $this->Leadgen_model->save_leadgen($logo_name, $fab_icon);
            $this->index();
        }
    }

    public function uploadImage_post($name)
    {
        $this->image_field = $name;
        $filename = $name . '_' . date("Ymd_His") . '.' . 'png';
        $config = array(
            'upload_path' => "./uploads/",
            'file_name' => $filename,
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000",
            'max_height' => "2420",
            'max_width' => "2420"
        );
        $this->load->library('upload', $config);

        $this->form_validation->set_rules($name, $name, 'trim|callback_uploads_check');

        return $filename;

    }

    public function uploads_check()
    {
        if (!$this->upload->do_upload($this->image_field)) {
            $this->form_validation->set_message('uploads_check', $this->upload->display_errors());
            return FALSE;
        } else {
            return TRUE;
        }
    }

}