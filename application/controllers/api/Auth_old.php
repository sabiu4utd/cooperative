k.<?php
defined('BASEPATH') or exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');
class Auth extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Smcsapi_model', 'Admin_model']);
          
    }

    public function allmembers_get()
    {
        $data = $this->Smcsapi_model->getMembers();
        return $this->response($data, 200);
    }
    public function member_post()
    {
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->Smcsapi_model->authentication($username, $password);
        $data = array('result'=>$result);
        return $this->response($data, 200);
    }
    public function lga_get()
    {
        $data = $this->Smcsapi_model->getLga();
        return $this->response($data, 200);
    }
     public function changePassword_post()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $memberId = $this->input->post('memberId');
        $result = $this->Admin_model->change_password($memberId, $npass, $cpass);
        return $this->response($result, 200);
    }
    







































    public function forms_get()
    {
        $id = $this->uri->segment(3, false);

        if ($id and is_numeric($id)) {
            $data = $this->Smcsapi_model->getOrderedFormsByFormID($id);
            if (!$data) $this->response(["error" => "Invalid Form ID"], 400);
            return $this->response($data, 200);
        } else if ($id and !is_numeric($id)) {
            $data = $this->Smcsapi_model->getOrderedFormsByHash($id);
            if (!$data) $this->response(["error" => "Invalid Form Hash"], 400);
            return $this->response($data, 200);
        } else {
            $data = $this->Smcsapi_model->getOrderedForms($id);
            return $this->response($data, 200);
        }
        return $this->response(["error" => "Something went wrong"], 400);
    }

    public function applicants_get()
    {
        $id = $this->uri->segment(3, false);

        if ($id) {
            $data = $this->Smcsapi_model->getApplicantByHash($id);
            if (!$data) $this->response(["error" => "Invalid Applicant ID"], 400);
            return $this->response($data, 200);
        } else {
            $data = $this->Smcsapi_model->getAllapplicants();
            return $this->response($data, 200);
        }
        return $this->response(["error" => "Something went wrong"], 400);
    }

    public function formstats_get()
    {
        $data = $this->Smcsapi_model->getFormStats();
        return $this->response($data, 200);
    }
}
