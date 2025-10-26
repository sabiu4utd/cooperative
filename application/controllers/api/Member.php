<?php
defined('BASEPATH') or exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');
class Member extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Member_model']);
    }

    public function crst_post()
    {
        $membershipNo = $this->input->post('membershipNo');
        $data = $this->Member_model->get_crs($membershipNo);
        return $this->response($data, 200);
    }
    public function getshare_post()
    {
        $membershipNo = $this->input->post('membershipNo');
        $data1 = $this->Member_model->get_share($membershipNo);
        return $this->response($data1, 200);
    }


    public function member_post()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->Smcsapi_model->authentication($username, $password);
        //$data = array('result'=>$result);
        return $this->response($result, 200);
    }

    public function lga_get()
    {
        $data = $this->Smcsapi_model->getLga();
        return $this->response($data, 200);
    }


    public function loanApplication_post()
    {

        $data = [
            'memberId' => $this->input->post('membershipNo'),
            'amount' => $this->input->post('amount'),
            'type' => 11
        ];
        $result = $this->Member_model->LoanApplication($data);
        return $this->response($result, 200);
    }
 public function supplyApplication_post()
    {

        $data = [
            'memberId' => $this->input->post('membershipNo'),
            'amount' => $this->input->post('amount'),
            'supply_description' => $this->input->post('supply_description'),
            'type'=> 2
        ];
        $result = $this->Member_model->supplyApplication($data);
        return $this->response($result, 200);
    }



    public function loanStatus_post()
    {
        $memberId = $this->input->post('memberId');
        $data = $this->Member_model->loanStatus($memberId);
        return $this->response($data, 200);
    }
    public function getMyLoans_post()
    {
        $memberId = $this->input->post('memberId');
        $data = $this->Member_model->getMyLoans($memberId);
        return $this->response($data, 200);
    }
    public function getLoanById_post()
    {
        $memberId = $this->input->post('memberId');
        $id = $this->input->post('id');
        $data = $this->Member_model->getLoanById($memberId, $id);
        return $this->response($data, 200);
    }
    public function getUpcomingDeduction_post()
    {
        $memberId = $this->input->post('memberId');
        $data = $this->Member_model->getUpcomingDeductionById($memberId);
        return $this->response($data, 200);
    }
    public function memberLoans_post()
    {
        $memberId = $this->input->post('memberId');
        $data = $this->Member_model->memberLoans($memberId);
        return $this->response($data, 200);
    } 
    public function loanRepayment_post()
    {
        $memberId = $this->input->post('memberId');
        $data = $this->Member_model->loanRepayment($memberId);
        return $this->response($data, 200);
    }
    public function getAllDeduction_post()
    {
        $memberId = $this->input->post('memberId');
        $data = $this->Member_model->getAllDeduction($memberId);
        return $this->response($data, 200);
    } 
    public function getAllCRS_post()
    {
        $memberId = $this->input->post('memberId');
        $data = $this->Member_model->getAllCRS($memberId);
        return $this->response($data, 200);
    }
}
