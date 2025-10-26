<?php

defined('BASEPATH') or exit('No direct script access allowed');
//require 'vendor/autoload.php';
//require_once 'HTTP/Request2.php';
class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('upload');
    $this->load->model('Admin_model');
    $this->load->model('Member_model');
    $this->load->model('Smcsapi_model');
  }

  public function landingPage()
  {
    $this->load->view("admin/landing");
  }
  public function special_cases()
  {
    $this->load->view("admin/special_cases");
  }
  public function manage_upload()
  {
    $this->load->view("admin/manage_upload");
  }
  public function regItem()
  {
    $result = $this->Admin_model->getItemsByYear();
    $data = ['items' => $result];
    return $this->load->view("admin/regItem", $data);
  }


  public function registration()
  {

    $result = $this->Admin_model->getLastMemeberRegistered();
    $data = ['lastMember' => $result];
    return $this->load->view('admin/registration_form', $data);
  }
  public function members()
  {
    $result = $this->Smcsapi_model->getMembers();
    $data = ['members' => $result];
    return $this->load->view('admin/members', $data);
  }
  public function registration_data()
  {
    $membershipNo = $this->input->post('membershipNo');
    $staffId = $this->input->post('staffId');
    $fname = $this->input->post('fname');
    $sname = $this->input->post('sname');
    $oname = $this->input->post('oname');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');
    $crs = $this->input->post('crs');



    $data = array(
      'membershipNo' => $membershipNo,
      'staffId' => $staffId,
      'fname' => $fname,
      'sname' => $sname,
      'oname' => $oname,
      'phone' => $phone,
      'email' => $email,
      'crs' => $crs
    );
    $result = $this->Admin_model->register($data);
    if ($result) {
      $this->session->set_flashdata("msg", "Registration Successful");
      redirect("admin/registration", "refresh");
    }
  }



  public function view_user()
  {
    $user_hash = $this->uri->segment(3, false);
    $profile = $this->Admin_model->getMemberById($user_hash);
    $membershipNo = $profile->membershipNo;
    $rcs = $this->Admin_model->getRcsById($membershipNo);
    $loan = $this->Admin_model->getLoanById($membershipNo);
    $upcoming_deductions = $this->Admin_model->getUpcomingDeductionById($membershipNo);
    $supply = $this->Admin_model->getSupplyDeductionById($membershipNo);
    $shares = $this->Admin_model->getShareById($membershipNo);
    $repayment = $this->Admin_model->loanRepayment($membershipNo);
    $special_cases = $this->Member_model->special_cases($membershipNo);
    $data = array('special_cases' => $special_cases, 'repayment' => $repayment, 'shares' => $shares, 'profile' => $profile, 'rcs' => $rcs, 'loan' => $loan, 'supply' => $supply, 'upcoming_deductions' => $upcoming_deductions);



    $res = ["user" => $data];
    //var_dump($res); exit; 
    return $this->load->view('admin/singleMember', $res);
  }

  public function save_special_case()
  {
    $membershipNo = $this->input->post('membershipNo');
    $amount = $this->input->post('amount');
    $type = $this->input->post('type');
    $purpose = $this->input->post('purpose');


    $result = $this->Admin_model->validateStaffNo($membershipNo);
    if (!$result) {
      echo "<script>alert('Invalid Membership Number');</script>";
      $this->session->set_flashdata("msg", "Invalid Membership Number");
      redirect("admin/special_cases", "refresh");
    }


    $data = array('memberId' => $membershipNo, 'amount' => $amount, 'type' => $type, 'purpose' => $purpose);
    $result = $this->Admin_model->save_special_cases($data);
    if ($result) {
      $this->session->set_flashdata("msg", $type . " Successful");
      redirect("admin/landingPage", "refresh");
    }
  }

  public function upcoming_deductions()
  {
    $filename = $_FILES['filetoupload']['name'];
    //$csid = $this->input->post('csid');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $upcoming_deductions = hash("MD5", date('YYmmddHHiiss') . "" . $filename) . "." . $ext;
    $config = array(
      'upload_path' => './assets/uploads/',
      'max_size' => 2000000,
      'allowed_types' => 'csv|CSV',
      'file_name' => $upcoming_deductions
    );

    $this->upload->initialize($config);
    $this->upload->do_upload('filetoupload');
    $file_path = './assets/uploads/' . $upcoming_deductions;


    if ($this->upload->display_errors()) {
      $this->session->set_flashdata('msg', $this->upload->display_errors());
      redirect('admin/registration/', 'refresh');
    } else {
      $this->Admin_model->initialize_uploads(); // initialize table
      $file = fopen(base_url() . "/assets/uploads/" . $upcoming_deductions, "r");
      fgets($file);
      $records = 0;
      while (($res = fgetcsv($file, 10000, ",")) !== FALSE) {
        $data = array(
          'memberId' => $res[0],
          'first_month' => $res[1],
          'first_month_amount' => $res[2],
          'second_month' => $res[3],
          'second_month_amount' => $res[4],
          'third_month' => $res[5],
          'third_month_amount' => $res[6]
        );

        $result = $this->Admin_model->upcoming_deductions($data);
        $records++;
      }
      if ($result) {
        $this->session->set_flashdata('msg', $records + 1 . " Records of upcoming deduction uploaded successfully");
        redirect('admin/landingPage/', 'refresh');
      }
    }
  }
  public function monthly_deductions()
  {
    $filename = $_FILES['filetoupload']['name'];
    //$csid = $this->input->post('csid');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $upcoming_deductions = hash("MD5", date('YYmmddHHiiss') . "" . $filename) . "." . $ext;
    $config = array(
      'upload_path' => './assets/uploads/',
      'max_size' => 2000000,
      'allowed_types' => 'csv|CSV',
      'file_name' => $upcoming_deductions
    );

    $this->upload->initialize($config);
    $this->upload->do_upload('filetoupload');
    $file_path = './assets/uploads/' . $upcoming_deductions;


    if ($this->upload->display_errors()) {
      $this->session->set_flashdata('msg', $this->upload->display_errors());
      redirect('admin/registration/', 'refresh');
    } else {
      //$this->Admin_model->initialize_uploads(); // initialize table
      $file = fopen(base_url() . "/assets/uploads/" . $upcoming_deductions, "r");
      fgets($file);
      $records = 0;
      while (($res = fgetcsv($file, 10000, ",")) !== FALSE) {
        $data = array(
          'memberId' => $res[0],
          'amount_requested' => $res[1],
          'typeid' => $res[2],
          'month' => $res[3],
          'year' => $res[4]
        );

        $result = $this->Admin_model->monthly_deductions($data);
        $records++;
      }
      if ($result) {
        $this->session->set_flashdata('msg', $records + 1 . " Records of monthly deduction uploaded successfully");
        redirect('admin/landingPage/', 'refresh');
      }
    }
  }


  public function manageUpload()
  {

    $result = $this->Admin_model->deductionByMonth();
    $data = ['uploadbyMonth' => $result];
    return $this->load->view('admin/manage_upload', $data);
  }


  public function getLoanApplicant()
  {
    $status = $this->uri->segment(3);

    if (strpos($status, '%') > 0) {
      $result = explode("%20", $status);
      $status = $result[0] . " " . $result[1];
    }
    //echo $status; exit;
    //$status = $this->input->post('status');
    $result = $this->Admin_model->getLoanApplicant($status);
    $data = ['loan' => $result];
    return $this->load->view('admin/manage_loans', $data);
  }

  public function loan_approval()
  {
    //var_dump($_POST); exit;
    $id = $this->input->post('id');
    $approval = $this->input->post('approval');
    $amount = $this->input->post('amount');
    $repayment_period = $this->input->post('repayment_period');
    $result = $this->Admin_model->loan_approval($id, $approval, $amount, $repayment_period);
    if ($result) {
      $this->session->set_flashdata('msg', $approval  . " given");
      redirect('admin/landingPage/', 'refresh');
    }
  }

  public function save_item()
  {
    $result = $this->Admin_model->save_item($_POST);

    //$res = ["user" => json_decode($response)];

    if ($result) {
      $this->session->set_flashdata('msg', $_POST['qty'] . " " . $_POST['unit'] . " of " . $_POST['item'] . " Added successful");
      redirect('admin/regItem', 'refresh');
    }
  }

  public function manage_season()
  {
    $result = $this->Admin_model->getSeason();
    $data = ['season' => $result];
    return $this->load->view("admin/manage_season", $data);
  }

  public function updateSeason()
  {
    $id = $this->uri->segment(3);
    $status = $this->uri->segment(4);
    $data = $this->Admin_model->updateSeason($id, $status);
    if ($data) {
      $this->session->set_flashdata('msg', "New Season is activated");
      redirect('admin/landingPage/', 'refresh');
    }
  }
  public function getItemById()
  {
    $id = $this->uri->segment(3);
    $result = $this->Admin_model->getItemById($id);
    $results = $this->Admin_model->getItemsByYear();
    //var_dump($results); exit;
    //$data = ['items' => $results];
    $data = ['item' => $result, 'items' => $results];
    return $this->load->view("admin/update_item", $data);
  }

  public function update_item()
  {

    $data = array(
      'item' => $_POST['item'],
      'qty' => $_POST['qty'],
      'unit' => $_POST['unit'],
      'unit_price' => $_POST['unit_price'],
      'type' => $_POST['type'],
      'year' => $_POST['year'],
      'id' => $_POST['id'],
    );
    $result = $this->Admin_model->update_item($data);
    $results = $this->Admin_model->getItemsByYear();
    //var_dump($results); exit;
    $data = ['items' => $results];

    if ($result) {
      return $this->load->view("admin/regItem", $data);
    }
  }
  public function deleteItemById()
  {
    $id = $this->uri->segment(3);
    $result = $this->Admin_model->deleteItemById($id);

    if ($result) {
      $this->session->set_flashdata('msg', "Item deleted successful");
      redirect('admin/regItem', 'refresh');
    }
  }
  public function dropDeductions()
  {
    $month = $this->uri->segment(3);
    $year = $this->uri->segment(4);
    $data = $this->Admin_model->dropDeductions($month, $year);
    if ($data) {
      $this->session->set_flashdata('msg', "Upload cancelled successful");
      redirect('admin/landingPage', 'refresh');
    }
  }



  public function view_user2()
  {

    //var_dump($this->uri); die;
    $membershipNo = $this->uri->segment(3, false);
    if (!$membershipNo) {
      $this->session->set_flashdata("msg", "Missing Memebership Number");
      redirect("admin/members", "refresh");
    }
    $url = "http://localhost/capi/api/admin/getMemberById";
    $data = array('membershipNo' => $membershipNo);
    $request = new HTTP_Request2();
    $request->setUrl($url);
    $request->setMethod(HTTP_Request2::METHOD_POST);
    // $request->setHeader(array(
    //   'Content-Type' => 'application/json',
    //   'Cookie' => 'ci_session=bbif21r6pgh1mf742ako1e3bfqt1jmqp'
    // ));
    $request->setBody(json_encode($data));
    try {
      $response = $request->send();
      var_dump($response);
      die;
      if ($response->getStatus() == 200) {
        echo $response->getBody();
      } else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
          $response->getReasonPhrase();
      }
    } catch (HTTP_Request2_Exception $e) {
      echo 'Error: ' . $e->getMessage();
    }
    die;
    $res = ["user" => json_decode($response)];
    return $this->load->view('admin/singleMember', $res);
  }


  public function share_uploads()
  {
    $filename = $_FILES['filetoupload']['name'];
    //$csid = $this->input->post('csid');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $upcoming_deductions = hash("MD5", date('YYmmddHHiiss') . "" . $filename) . "." . $ext;
    $config = array(
      'upload_path' => './assets/uploads/',
      'max_size' => 2000000,
      'allowed_types' => 'csv|CSV',
      'file_name' => $upcoming_deductions
    );

    $this->upload->initialize($config);
    $this->upload->do_upload('filetoupload');
    $file_path = './assets/uploads/' . $upcoming_deductions;


    if ($this->upload->display_errors()) {
      $this->session->set_flashdata('msg', $this->upload->display_errors());
      redirect('admin/registration/', 'refresh');
    } else {
      //$this->Admin_model->initialize_uploads(); // initialize table
      $file = fopen(base_url() . "/assets/uploads/" . $upcoming_deductions, "r");
      fgets($file);
      $records = 0;
      while (($res = fgetcsv($file, 10000, ",")) !== FALSE) {
        $data = array(
          'memberId' => $res[0],
          'share' => $res[1],
          'year' => $res[2],
          'percentage' => $res[3]
        );

        $result = $this->Admin_model->share_uploads($data);
        $records++;
      }
      if ($result) {
        $this->session->set_flashdata('msg', $records + 1 . " Records of monthly deduction uploaded successfully");
        redirect('admin/landingPage/', 'refresh');
      }
    }
  }

  public function getFestivitySupplyRequest()
  {
    $result = $this->Admin_model->getFestivitySupplyRequest();
    //var_dump($result); die;
    $data = ['festivity_supply' => $result];
    return $this->load->view('admin/manage_festivity_supply', $data);
  }

  public function view_festivity_request()
  {
   $staffNo = $this->uri->segment(3); 
   $description = $this->uri->segment(4);
    $year = $this->uri->segment(5);
    $des = explode("%20", $description);
  $description = $des[0] . " " . $des[1];

    $result = $this->Admin_model->view_festivity_request($staffNo, $description, $year);
    //var_dump($result); die;
    $data = ['festivity_supply' => $result];
    return $this->load->view('admin/view_festivity_request', $data);
  }
}
