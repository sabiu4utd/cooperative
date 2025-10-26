<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Admin extends REST_Controller
{

   public function __construct() {
       parent::__construct();
       $this->load->model(['Admin_model']);

   }  
   
 
   public function register_post(){
	  
	$membershipNo = $this->input->post('membershipNo');
    $staffId = $this->input->post('staffId');
    $fname = $this->input->post('fname');
    $sname = $this->input->post('sname');
    $oname = $this->input->post('oname');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');
    $crs = $this->input->post('crs');
	
	$data = array(
		'membershipNo'=>$membershipNo,
		'staffId'=>$staffId,
		'fname'=>$fname,
		'sname'=>$sname,
		'oname'=>$oname,
		'phone'=>$phone,
		'email'=>$email,
		'crs'=>$crs
	);
	  $result = $this->Admin_model->register($data);
      return $this->response($result, 200);
   } 
   
   public function getLastMemeberRegistered_get(){
	   $data = $this->Admin_model->getLastMemeberRegistered();
       return $this->response($data, 200);
   }
   public function getMemberById_post(){
	   try {
		  $user_hash = $this->input->post('user_hash'); 
		  $profile = $this->Admin_model->getMemberById($user_hash);
		  $membershipNo = $profile->membershipNo;
		  $rcs = $this->Admin_model->getRcsById($membershipNo);
		  $loan = $this->Admin_model->getLoanById($membershipNo);
		  $upcoming_deductions = $this->Admin_model->getUpcomingDeductionById($membershipNo);
		  $supply = $this->Admin_model->getSupplyDeductionById($membershipNo);
		  $shares = $this->Admin_model->getShareById($membershipNo);
		  $repayment = $this->Admin_model->loanRepayment($membershipNo);
		  $data = array('repayment'=>$repayment, 'shares'=>$shares, 'profile'=>$profile, 'rcs'=>$rcs, 'loan'=>$loan, 'supply'=>$supply, 'upcoming_deductions'=>$upcoming_deductions);
		  return $this->response($data, 200);
	   } catch(Exception $e){
		  return $this->response($e->getMessage(), 400);
	   }
   }
   
    public function special_case_post(){
		
	$membershipNo = $this->input->post('membershipNo');
    $amount = $this->input->post('amount');
    $type = $this->input->post('type');
    $purpose = $this->input->post('purpose');
	$data = array('memberId' => $membershipNo, 'amount' => $amount, 'type' => $type, 'purpose' => $purpose);
	$result = $this->Admin_model->save_special_cases($data);
      return $this->response($result, 200);
   } 
   public function upcoming_deductions_post(){   
	   	    
	  $filetoupload = $_FILES['file'];
	 	$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$upcoming_deductions = hash("MD5", date('YYmmddHHiiss') . "" . $filename) . "." . $ext;
		$config = array(
			'upload_path' => './assets/uploads/', 'max_size' => 2000000, 'allowed_types' => 'csv|CSV', 'file_name' => $upcoming_deductions
		);

		$this->upload->initialize($config);
		$this->upload->do_upload('filetoupload');

		if ($this->upload->display_errors()) {
			$this->session->set_flashdata('msg', $this->upload->display_errors());
			redirect('admin/index/1', 'refresh');
		} else {
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
							
				$this->Admin_model->upcoming_deductions($data);
				$records++;
				
   }
		}
   }
   public function deductionByMonth_get(){
	   $data = $this->Admin_model->deductionByMonth();
       return $this->response($data, 200);
   }
    public function getLoanApplicant_post(){
		$status = $this->input->post('status');
	   $data = $this->Admin_model->getLoanApplicant($status);
       return $this->response($data, 200);
   }
   
   public function loan_approval_post(){
	$id = $this->input->post('id');
    $approval = $this->input->post('approval');
	$amount = $this->input->post('amount');
	$repayment_period = $this->input->post('repayment_period');
	$result = $this->Admin_model->loan_approval($id, $approval, $amount, $repayment_period);
    return $this->response($result, 200);
   }
   
   public function save_item_post(){
	  $result = $this->Admin_model->save_item($_POST);
      return $this->response($result, 200);
   } 
   
   public function manage_season_get(){
	 $data = $this->Admin_model->getSeason();
     return $this->response($data, 200);
}
public function updateSeason_get(){
	$id = $this->uri->segment(4);
	$status = $this->uri->segment(5);
	$data = $this->Admin_model->updateSeason($id, $status);
     return $this->response($data, 200);
}
public function getItemsByYear_get(){
	 $data = $this->Admin_model->getItemsByYear();
     return $this->response($data, 200);
}
public function getItemById_get(){
	$data = $this->Admin_model->getItemById($this->uri->segment(4));
     return $this->response($data, 200);
}
   

public function update_item_post(){
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
      return $this->response($result, 200);
   } 
   
   public function deleteItemById_get(){
	   $id = $this->uri->segment(4);
	   $result = $this->Admin_model->deleteItemById($id);
   }

   public function dropDeductions_post(){
	$month = $_POST['month'];
	$year = $_POST['year'];
	$data = $this->Admin_model->dropDeductions($month, $year);
     return $this->response($data, 200);
}

}
?>