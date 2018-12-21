<?php
/**
 * Created by PhpStorm.
 * User: LiNS
 * Date: 12/18/2018
 * Time: 10:57 AM
 */

class Leadgen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id = 1)
    {
        $this->session->set_userdata("id", $id);

        $this->load->model('Leadgen_model');
        $data['leadgen'] = $this->Leadgen_model->get_leadgen($id);

        $this->load->view('leadgen/leadgen_header', $data);
        $this->load->view('leadgen/leadgen_main');
        $this->load->view('leadgen/leadgen_footer', $data);
    }

    public function property_type()
    {
        if (!empty($_POST['submitForm'])) {
            $id = $this->session->userdata('id');
            $data['id'] = $id;
            $this->load->model('Leadgen_model');
            $data['leadgen'] = $this->Leadgen_model->get_leadgen($id);

            $purchase_type = $_POST['submitForm'];
            $this->session->set_userdata("purchase_type", $purchase_type);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/property_type');
            $this->load->view('leadgen/leadgen_footer', $data);
        }
    }

    public function property_used()
    {

        $id = $this->session->userdata('id');
        $this->load->model('Leadgen_model');
        $data['leadgen'] = $this->Leadgen_model->get_leadgen($id);

        $property_type = $_POST['submitForm'];
        $this->session->set_userdata("property_type", $property_type);

        $this->load->view('leadgen/leadgen_header', $data);
        $this->load->view('leadgen/property_used');
        $this->load->view('leadgen/leadgen_footer', $data);

    }

    public function purchase()
    {

        $id = $this->session->userdata('id');
        $this->load->model('Leadgen_model');
        $data['leadgen'] = $this->Leadgen_model->get_leadgen($id);

        $num = $_POST['form_page'];
        if ($num === '0') {
            $property_used = $_POST['submitForm'];
            $this->session->set_userdata("property_used", $property_used);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form1');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num === '1') {
            $already_found = $_POST['submitForm'];
            $this->session->set_userdata("already_found", $already_found);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form2');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num === '2') {
            $working_with_real_state = $_POST['submitForm'];
            $this->session->set_userdata("working_with_real_state", $working_with_real_state);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form3');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num === '3') {
            $plan_to_buy = $_POST['submitForm'];
            $this->session->set_userdata("plan_to_buy", $plan_to_buy);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form4');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '4') {
            $price_range = $_POST['price_range'];
            $this->session->set_userdata("price_range", $price_range);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form5');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '5') {
            $percentage_range = $_POST['percentage_range'];
            $this->session->set_userdata("percentage_range", $percentage_range);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form6');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '6') {
            $first_time = $_POST['submitForm'];
            $this->session->set_userdata("first_time_buying_home", $first_time);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form7');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '7') {
            $have_coBorrower = $_POST['submitForm'];
            $this->session->set_userdata("have_coBorrower", $have_coBorrower);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form8');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '8') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('income', 'income', 'trim|required');
            if ($this->form_validation->run() !== FALSE) {
                $annual_income = $_POST['income'];
                $this->session->set_userdata("annual_income", $annual_income);

                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form9');
                $this->load->view('leadgen/leadgen_footer', $data);
            } else {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form8');
                $this->load->view('leadgen/leadgen_footer', $data);
            }
        } else if ($num == '9') {
            $currently_employed = $_POST['submitForm'];
            $this->session->set_userdata("currently_employed", $currently_employed);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form10');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '10') {
            $credit_score = $_POST['submitForm'];
            $this->session->set_userdata("credit_score", $credit_score);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form11');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '11') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('birth_day', 'date of birth', 'trim|required');
            if ($this->form_validation->run() !== FALSE) {
                $birth_day = $_POST['birth_day'];
                $this->session->set_userdata("birth_day", $birth_day);

                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form12');
                $this->load->view('leadgen/leadgen_footer', $data);
            } else {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form11');
                $this->load->view('leadgen/leadgen_footer', $data);
            }
        } else if ($num == '12') {
            $served_military = $_POST['submitForm'];
            $this->session->set_userdata("served_military", $served_military);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form13');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '13') {
            $bankruptcy_foreclosure = $_POST['submitForm'];
            $this->session->set_userdata("bankruptcy_foreclosure", $bankruptcy_foreclosure);

            if ($bankruptcy_foreclosure === 'no') {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form15');
                $this->load->view('leadgen/leadgen_footer', $data);
            } else {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form14');
                $this->load->view('leadgen/leadgen_footer', $data);
            }
        } else if ($num == '14') {
            $bankruptcy_foreclosure = $this->session->userdata('bankruptcy_foreclosure');
            if ($bankruptcy_foreclosure == 'bankruptcy' || $bankruptcy_foreclosure == 'both') {
                $bankruptcy_year = $_POST['bankruptcy'];
                $this->session->set_userdata("bankruptcy_year", $bankruptcy_year);
            }
            if ($bankruptcy_foreclosure == 'foreclosure' || $bankruptcy_foreclosure == 'both') {
                $foreclosure_year = $_POST['foreclosure'];
                $this->session->set_userdata("foreclosure_year", $foreclosure_year);
            }
            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form15');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '15') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('street_address', 'street address', 'trim|required');
            $this->form_validation->set_rules('zip', 'zip', 'trim|required');
            $this->form_validation->set_rules('city', 'city', 'trim|required');
            $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('mobile_number', 'mobile number', 'trim|required');
            $this->form_validation->set_rules('home_number', 'home number', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {
                $street_address = $_POST['street_address'];
                $zip = $_POST['zip'];
                $city = $_POST['city'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $mobile_number = $_POST['mobile_number'];
                $home_number = $_POST['home_number'];

                $this->sendEmail($email, $first_name . ' ' . $last_name);
            } else {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form15');
                $this->load->view('leadgen/leadgen_footer', $data);
            }
        }

    }

    public function refinance()
    {
        $id = $this->session->userdata('id');
        $this->load->model('Leadgen_model');
        $data['leadgen'] = $this->Leadgen_model->get_leadgen($id);

        $num = $_POST['form_page'];
        if ($num === '0') {
            $property_used = $_POST['submitForm'];
            $this->session->set_userdata("property_used", $property_used);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/refinance_form1');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num === '1') {
            $why_refinance = $_POST['submitForm'];
            $this->session->set_userdata("why_refinance", $why_refinance);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/refinance_form2');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num === '2') {
            $working_with_real_state = $_POST['submitForm'];
            $this->session->set_userdata("working_with_real_state", $working_with_real_state);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/refinance_form3');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num === '3') {
            $value_of_property = $_POST['value_property'];
            $this->session->set_userdata("value_of_property", $value_of_property);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/refinance_form4');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '4') {
            $mortgage_balance = $_POST['mortgage_balance'];
            $this->session->set_userdata("mortgage_balance_first", $mortgage_balance);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/refinance_form5');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '5') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('interest_rate', 'interest rate', 'trim|required');
            if ($this->form_validation->run() !== FALSE) {
                $interest_rate = $_POST['interest_rate'];
                $this->session->set_userdata("percentage_range", $interest_rate);

                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/refinance_form6');
                $this->load->view('leadgen/leadgen_footer', $data);
            } else {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/refinance_form5');
                $this->load->view('leadgen/leadgen_footer', $data);
            }
        } else if ($num == '6') {
            $second_mortgage = $_POST['submitForm'];
            $this->session->set_userdata("second_mortgage", $second_mortgage);

            $this->load->view('leadgen/leadgen_header', $data);
            if ($second_mortgage == 'yes')
                $this->load->view('leadgen/refinance_form7_1');
            else
                $this->load->view('leadgen/refinance_form7');

            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '71') {
            $balance_second_mortgage = $_POST['balance_second_mortgage'];
            $this->session->set_userdata("balance_second_mortgage", $balance_second_mortgage);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/refinance_form7');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '7') {
            $borrow_additional_cash = $_POST['borrow_additional_cash'];
            $this->session->set_userdata("borrow_additional_cash", $borrow_additional_cash);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/refinance_form8');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '8') {
            $credit_score = $_POST['submitForm'];
            $this->session->set_userdata("credit_score", $credit_score);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form12');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '12') {
            $served_military = $_POST['submitForm'];
            $this->session->set_userdata("served_military", $served_military);

            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form13');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '13') {
            $bankruptcy_foreclosure = $_POST['submitForm'];
            $this->session->set_userdata("bankruptcy_foreclosure", $bankruptcy_foreclosure);

            if ($bankruptcy_foreclosure === 'no') {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form15');
                $this->load->view('leadgen/leadgen_footer', $data);
            } else {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form14');
                $this->load->view('leadgen/leadgen_footer', $data);
            }
        } else if ($num == '14') {
            $bankruptcy_foreclosure = $this->session->userdata('bankruptcy_foreclosure');
            if ($bankruptcy_foreclosure == 'bankruptcy' || $bankruptcy_foreclosure == 'both') {
                $bankruptcy_year = $_POST['bankruptcy'];
                $this->session->set_userdata("bankruptcy_year", $bankruptcy_year);
            }
            if ($bankruptcy_foreclosure == 'foreclosure' || $bankruptcy_foreclosure == 'both') {
                $foreclosure_year = $_POST['foreclosure'];
                $this->session->set_userdata("foreclosure_year", $foreclosure_year);
            }
            $this->load->view('leadgen/leadgen_header', $data);
            $this->load->view('leadgen/purchase_form15');
            $this->load->view('leadgen/leadgen_footer', $data);
        } else if ($num == '15') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('street_address', 'street address', 'trim|required');
            $this->form_validation->set_rules('zip', 'zip', 'trim|required');
            $this->form_validation->set_rules('city', 'city', 'trim|required');
            $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
            $this->form_validation->set_rules('mobile_number', 'mobile number', 'trim|required');
            $this->form_validation->set_rules('home_number', 'home number', 'trim|required');

            if ($this->form_validation->run() !== FALSE) {
                $street_address = $_POST['street_address'];
                $zip = $_POST['zip'];
                $city = $_POST['city'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $mobile_number = $_POST['mobile_number'];
                $home_number = $_POST['home_number'];

                $this->sendEmail($email, $first_name . ' ' . $last_name);

            } else {
                $this->load->view('leadgen/leadgen_header', $data);
                $this->load->view('leadgen/purchase_form15');
                $this->load->view('leadgen/leadgen_footer', $data);
            }
        }
    }

    public function sendEmail($email, $name)
    {
        $this->load->library('email');

        $this->email->from('saymehem@gmail.com', 'FlawsomeTech Pvt. Ltd');
        $this->email->to($email);
        $this->email->cc('flawsometech@gmail.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Survey successfully completed');
        $this->email->message('Thank you for your time and consideration' . $name);

        $this->email->send();
        $id = $this->session->userdata('id');

        $this->load->model('Leadgen_model');
        $data['leadgen'] = $this->Leadgen_model->get_leadgen($id);
        $data['name'] = $name;

        $this->load->view('leadgen/leadgen_header', $data);
        $this->load->view('leadgen/success_page', $data);
        $this->load->view('leadgen/leadgen_footer', $data);
    }

}