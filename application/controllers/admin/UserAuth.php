<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->session->userdata("user_name") != "") {
            redirect(admin_url("dashboard"));
        }
        $this->load->view('user_auth');
    }


    public function signup()
    {
        $this->load->view('user_signup');
    }

    public function process_login()
    {
        $user_name = $this->input->post("email");
        $password = $this->input->post("password");

        //validate login
        $this->load->model("User_model");
        $result = $this->User_model->Authenticate($user_name);
        $is_authenticated = $result != null && $result->user_id > 0;
        if ($result->password === $password) {
            if ($is_authenticated) {
                if ($result->status != 1) {
                    $this->session->set_flashdata("err_msg", "Access is denied. User is unauthorized or has limited rights. $user_name  $password");
                    redirect(base_url());
                } else {
                    $user_data = (array)$result;
                    unset($user_data["password"]);
                    $this->session->set_userdata($user_data);
                    $client_timezone = $this->input->post("client_timezone");
                    if (!strcasecmp($client_timezone, "Asia/Katmandu")) $client_timezone = "Asia/Kathmandu";
                    $this->session->set_userdata("client_timezone", $client_timezone);
                    redirect(admin_url("dashboard"));
                }
            } else {
                $this->session->set_flashdata("err_msg", "Access is denied. User is unauthorized or has limited rights.");
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata("err_msg", "Password incorrect. Please tyr again.");
            redirect(base_url());
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
