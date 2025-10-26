<?php
defined('BASEPATH') or exit('No direct script access allowed');
class member extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //if(!isset($_SESSION['userid'])){
    //redirect('auth/logout', 'refresh');
    //}
    $this->load->library('upload');
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Admin_model');
    $this->load->model('Member_model');
  }
  public function landingPage()
  {
    $this->load->view("member/landingPage");
    //redirect("auth/authentication", "refresh");
  }
  public function myloans()
  {
    $memberId = $this->session->userdata('membershipNo');
    $data = $this->Member_model->getMyLoans($memberId);
    // var_dump($response); exit;
    //$loans = json_decode($response);
    $loans = ["loan" => $data];
    // var_dump($loans); exit;
    $this->load->view("member/myloans", $loans);
  }

  public function get_my_crs()
  {
    $_SESSION['pageTitle'] = 'My CRS .::. FUBK-SMCS';

    $curl = curl_init();
    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.fubksmcs.org/api/member/crst",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => [],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $crs = ['crsdata' => json_decode($response)];

    return $this->load->view('member/crs', $data);
  }

//   public function view()
//   {
//     $_SESSION['pageTitle'] = 'Applicant Forms .::. University Portal';

//     $curl = curl_init();
//     curl_setopt_array($curl, [
//       CURLOPT_URL => "https://eforms.fubk.edu.ng/formapi/details/" . $this->uri->segment(3),
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_ENCODING => "",
//       CURLOPT_MAXREDIRS => 10,
//       CURLOPT_TIMEOUT => 30,
//       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//       CURLOPT_CUSTOMREQUEST => "GET",
//       CURLOPT_HTTPHEADER => [],
//     ]);

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);
//     $data = ['applicant_data' => json_decode($response)];
//     return $this->load->view('pgs/applicant_info', $data);
//   }

  public function loan_application()
  {

    //var_dump($_POST); exit;

    $data = [
            'memberId' => $this->input->post('membershipNo'),
            'amount' => $this->input->post('amount'),
            'type' => 11
        ];
        $result = $this->Member_model->LoanApplication($data);
    
    if ($result) {
      $this->session->set_flashdata("success", "Loan Application submitted Successful, Please be patient while awaiting for approval");
      redirect("member/landingPage", "refresh");
    } else {
      $this->session->set_flashdata("failure", "Loan Application submitted fails, please contact Admin");
      redirect("member/landingPage", "refresh");
    }
  }
 
 public function supply_application(){
  $data = [
            'memberId' => $this->input->post('membershipNo'),
            'amount' => $this->input->post('amount'),
            'supply_description' => $this->input->post('supply_description'),
            'type'=> 2
        ];
        $result = $this->Member_model->supplyApplication($data);
    //var_dump($response); exit;
    
    if ($result) {
      $this->session->set_flashdata("success", "Application submitted Successful, Please be patient while awaiting for approval");
      redirect("member/landingPage", "refresh");
    } else {
      $this->session->set_flashdata("failure", "Application submitted fails, please contact Admin");
      redirect("member/landingPage", "refresh");
    }
  }
 
 
 
 
  public function upload()
  {
    $data = ['type' => $this->uri->segment(3), 'loanId' => $this->uri->segment(4)];
    $this->load->view("member/upload", $data);
  }
  public function uploadDocument()
  {
    $filename = $_FILES['filetoupload']['name'];
    $type = $this->input->post('type');
    $loanId = $this->input->post('loanId');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $uploads = hash("MD5", date('YYmmddHHiiss') . "" . $filename) . "." . $ext;
    $config = array(
      'upload_path' => './assets/uploads/', 'max_size' => 2000000, 'allowed_types' => 'pdf|jpg|png', 'file_name' => $uploads
    );

    $this->upload->initialize($config);
    $this->upload->do_upload('filetoupload');

    if ($this->upload->display_errors()) {
      $this->session->set_flashdata('failure', $this->upload->display_errors());
      redirect("member/landingPage", "refresh");
    } else {
      $data = [
        'loanId' => $loanId,
        'doctype' => $type,
        'docname' => $uploads
      ];
      $result =$this->Admin_model->uploadDoc($data);
      if($result){
        $result2 =$this->Admin_model->updateLoanStatus($type, $loanId, $uploads);
        if($result2){
          $this->session->set_flashdata('success', $type." uploaded successfully");
          redirect("member/landingPage", "refresh");
        }
      }
    }
  }
  public function approvalLetter(){
    $memberId = $this->session->userdata('membershipNo');
    $id = $this->uri->segment(3);
    $result = $this->Admin_model->getLoanById($memberId);
    
    $data = array("loan" => $result);
    
        
    $this->load->view("member/approvalLetter", $data);
  }
  public function deductions()
  {
    $memberId = $this->session->userdata('membershipNo');
    $deduction = $this->Member_model->getAllDeduction($memberId);
    
    
   
    $loans = ["alldeductions" => $deduction];
   
    $this->load->view("member/alldeductions", $loans);
  }
  public function crs()
  {
    $memberId = $this->session->userdata('membershipNo');
    $data = $this->Member_model->getAllCRS($memberId); 
    $allcrs = ["allcrs" => $data];
    $this->load->view("member/crs", $allcrs);
  }
  public function load_ramdan_supply(){
    $ramdan_items = $this->Member_model->get_ramdan_supply_items();
   
   $staffNo = $this->session->userdata('membershipNo');
   $year = $this->session->userdata('active_year');
   $orders = $this->Member_model->get_ramadan_orders($staffNo, $year);
   //var_dump($orders); exit;
  $data = ["ramdan_items" => $ramdan_items, "orders" => $orders];
    
    $this->load->view("member/load_ramdan_supply", $data);
  }

  public function save_ramadan_supply() {
    // Get the form data

    //var_dump($_POST); exit;
    $selected_items = $this->input->post('selected_items');
    $quantities = $this->input->post('quantity');
    $totals = $this->input->post('total');
    $item_names = $this->input->post('item_names');

    // Calculate total amount
    $total_amount = array_sum(array_map('floatval', $totals));

    // Prepare order details
    $items_list = [];
    $order_details = [];
    
    foreach ($selected_items as $key => $item_id) {
        if ($quantities[$key] > 0) {
            $data =[
                'staffNo' => $_SESSION['membershipNo'],
                'year' => $_SESSION['active_year'],
                'description' => 'Ramadan Supply',
                'item_id' => $item_id,
                'quantity' => $quantities[$key],
                //'unit_price' => $totals[$key] / $quantities[$key],
                'price' => $totals[$key]
            ];
            $result = $this->Member_model->save_ramadan_supply_order($data);
           // $order_details[] = $item_names[$key] . ' (' . $quantities[$key] . ' units)';
          
        }

    }

   

    // Save the order
    

    if ($result) {
        $this->session->set_flashdata('success', 'Your Ramadan supply order has been submitted successfully');
    } else {
        $this->session->set_flashdata('failure', 'Failed to submit your order. Please try again or contact admin');
    }

    redirect('member/load_ramdan_supply');
  }

}
