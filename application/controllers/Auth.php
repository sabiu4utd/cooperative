<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['Smcsapi_model', 'Member_model', 'Admin_model']);
	}
	public function index()
	{
		$this->load->view('login');
	}
     public function authentication()
	{
        //var_dump($_POST); exit;
	    
		if (isset($_POST['username'])) {
		    $username = $this->input->post('username'); 
			$password = md5($this->input->post('password')); 
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		} else {
			$username = $_SESSION['username'];
			$password = $_SESSION['password'];
		}

       
        $result = $this->Smcsapi_model->authentication($username, $password);
        //var_dump($result); exit;
        // $data = array('result'=>$result);
       // echo $result->fname; exit;
                
		
		if ($result) {

			$active_year = $this->Admin_model->get_active_year();
			$this->session->set_userdata("active_year", $active_year->year);

			//var_dump($active_year->year); exit;
			$this->session->set_userdata("fname", $result->fname);
			$this->session->set_userdata("sname", $result->sname);
			$this->session->set_userdata("oname", $result->oname);
			$this->session->set_userdata("membershipNo", $result->membershipNo);
			$this->session->set_userdata("user_hash", $result->user_hash);
			$this->session->set_userdata("role", $result->role);
			$this->session->set_userdata("username", $username);
			$this->session->set_userdata("password", $password);

			if ($result->role != 1) {
                  $this->session->set_userdata("page", $result->fname . " Profile");
				  $crs = $this->Member_model->get_crs($result->membershipNo);
                  $share = $this->Member_model->get_share($result->membershipNo);
                  $loan_status = $this->Member_model->loanStatus($result->membershipNo);
                  $upcoming_deduction = $this->Member_model->getUpcomingDeductionById($result->membershipNo);
                  $getmyloans = $this->Member_model->getMyLoans($result->membershipNo);
                  $memberloans = $this->Member_model->memberLoans($result->membershipNo);
                  $repayment = $this->Member_model->loanRepayment($result->membershipNo);
                  $special_cases = $this->Member_model->special_cases($result->membershipNo);
				  $special_cases_negative = $this->Member_model->special_cases_negative($result->membershipNo);
				

				$crs = [
					"saving" =>$crs,
					"share" =>$share,
					"status" =>$loan_status,
					"upcoming" => $upcoming_deduction,
					"myloans" =>$getmyloans,
					"collected_loans" =>$memberloans,
					"repayment"=>$repayment,
					"special_cases"=>$special_cases,
					"special_cases_negative"=>$special_cases_negative
					];
					//var_dump($crs); exit;
				
				return $this->load->view('member/profile', $crs);
			} else {
				$this->session->set_userdata("page", $result->fname . " Profile");

				$staff_stats = $this->Admin_model->staffStatistics();
				$request_stats = $this->Admin_model->requestStatistics();



				$data = [
					"staff_stats" => $staff_stats,
					'request_stats' => $request_stats,
				];
				//var_dump($data); exit;
				return $this->load->view('admin/profile', $data);
			}
		} else {
			$this->session->set_flashdata('msg', 'Invalid Password/Username, Please contact Admin');
			redirect("auth/index", 'refresh');
		}
	}
    public function logout()
	{
		// session_abort();
		// session_decode();
		session_destroy();
		//session_unset();
		$this->session->set_flashdata('msg', 'Logout Successfully, Bye.');
		redirect("auth/index", 'refresh');
	}


	public function changePassword()
	{
		$password = $this->input->post('password');
		$cpass = $this->input->post('cpass');
		if ($password == $cpass) {
			$this->Member_model->changePassword($password);
			$this->session->set_flashdata('msg', 'Password changed successfully');
			redirect("auth/index", 'refresh');
		}else{
			$this->session->set_flashdata('msg', 'Password does not match');
			redirect("auth/index", 'refresh');
		}
	}
}
