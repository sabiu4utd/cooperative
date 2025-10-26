<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
	public function register($data)
	{
		$user = array(
			'username' => $data['membershipNo'],
			'password' => md5($data['membershipNo']),
			'role' => 2,
			'user_hash' => md5($data['membershipNo'])
		);
		$this->db->insert('auth', $user); // insert login details 
		$pid = $this->db->insert_id(); // get last insert id 
		$this->db->where('id', $pid);
		$this->db->set('user_hash', md5($pid));
		$this->db->update('auth'); // update auth table change user_hash to take md5 of id
		$profile = array(
			'user_hash' => md5($pid),
			'membershipNo' => $data['membershipNo'],
			'staffId' => $data['staffId'],
			'fname' => $data['fname'],
			'sname' => $data['sname'],
			'oname' => $data['oname'],
			'phone' => $data['phone'],
			'email' => $data['email'],
			'crs' => $data['crs']
		);
		return $this->db->insert('profile', $profile);
	}

	public function getLastMemeberRegistered()
	{
		$sql = "SELECT * FROM profile order by pid desc LIMIT 1";
		return $this->db->query($sql)->row();
	}
	public function getMemberById($user_hash)
	{
		return $this->db
			->select("*")
			->from("profile")
			->join("states", "profile.stateId = states.stateid")
			->join("local_governments", "local_governments.stateid = profile.stateId")
			->where('user_hash', $user_hash)
			->get()
			->row();
	}

	public function getRcsById($membershipNo)
	{
		return $this->db
			->select("*")
			->from("deductionss")
			->where("memberId", $membershipNo)
			->where("typeid", 1)
			->order_by("id", "desc")
			->limit(6)
			->get()
			->result();
	}

	public function getLoanById($membershipNo)
	{
		return $this->db
			->select("*")
			->from("loan")
			->where("memberId", $membershipNo)
			->order_by("id", "desc")
			->limit(6)
			->get()
			->result();
	}
	public function save_special_cases($data)
	{
		return $this->db->insert("special_cases", $data);
	}

	public function getSupplyDeductionById($membershipNo)
	{
		return $this->db
			->select("*")
			->from("deductionss")
			->where("memberId", $membershipNo)
			->where("typeid != ", 1)
			->order_by("id", "desc")
			->limit(6)
			->get()
			->result();
	}
	public function getUpcomingDeductionById($membershipNo)
	{
		return $this->db
			->select("*")
			->from("upcoming_deductions")
			->where("memberId", $membershipNo)
			->get()
			->row();
	}

	public function deductionByMonth()
	{
		//$sql ="SELECT DISTINCT deductions.month, months.month, year FROM `deductions` join months on deductionss.month = months.id";
		//$sql ="SELECT year FROM `deductions`";
		//$this->db->query($sql);
		//return $this->db->get()->result();

		$this->db->distinct();
		$this->db->select('month, year');
		$this->db->from('deductionss');
		$this->db->order_by('month');
		return $this->db->get()->result();
	}
	public function getLoanApplicant($status)
	{
		return $this->db
			->select("*")
			->from("loan")
			->join("profile", "profile.membershipNo = loan.memberId")
			->where("approval_status", $status)
			->order_by("date_applied", "asc")
			->get()
			->result();
	}
	public function loan_approval($id, $approval, $amount, $repayment_period)
	{
		return $this->db
			->where('id', $id)
			->set('approval_status', $approval)
			->set('amount', $amount)
			->set('repayment_period', $repayment_period)
			->update('loan');
	}

	public function save_item($data)
	{
		return $this->db->insert("shop", $data);
	}

	public function getSeason()
	{
		return $this->db->get("years")->result();
	}
	public function updateSeason($id, $status)
	{


		if ($status == "Active") {
			$this->db->where('id', $id);
			$this->db->set("status", "Inactive");
			return $this->db->update("years");
		} else {
			$this->db->where('id', $id);
			$this->db->set("status", "Active");
			return $this->db->update("years");
		}
	}
	public function getItemsByYear()
	{
		return $this->db
			->select('*')
			->from('years')
			->join('shop', 'shop.year = years.year')
			->where('years.status', 'Active')
			->order_by('supply', 'asc')
			->get()
			->result();
	}


	public function getItemById($id)
	{
		return $this->db
			->select('*')
			->from('shop')
			->where('id', $id)
			->get()
			->row();
	}
	public function update_item($data)
	{
		return $this->db->replace("shop", $data);
	}
	public function deleteItemById($id)
	{
		return $this->db->delete('shop', array('id' => $id));
	}
	public function dropDeductions($month, $year)
	{
		return $this->db
			->where('month', $month)
			->where('year', $year)
			->delete('deductionss');
	}
	public function getShareById($memberId)
	{
		return $this->db
			->where('memberId', $memberId)
			->where('status', 'current')
			->get('shareholders')
			->row();
	}
	public function loanRepayment($memberId)
	{
		$typeid = 11;
		return $this->db
			->where('memberId', $memberId)
			->where('typeid', $typeid)
			->get('deductionss')
			->result();
	}
	public function change_password($memberId, $password, $cpass)
	{
		return $this->db
			->set('password', $password)
			->where('username', $memberId)
			->update('auth');
	}

	public function uploadDoc($data)
	{
		return $this->db->insert('uploads', $data);
	}

	public function updateLoanStatus($type, $loanId, $uploads)
	{
		if ($type == 'payslip') {
			return $this->db
				->where('id', $loanId)
				->set('payslip_status', 'Yes')
				->set('payslip', $uploads)
				->update('loan');
		} else {
			return $this->db
				->where('id', $loanId)
				->set('surety_status', 'Yes')
				->set('surety', $uploads)
				->update('loan');
		}
	}
	public function initialize_uploads()
	{
		return $this->db->where("id > ", 0)->delete('upcoming_deductions');
	}
	public function monthly_deductions($data)
	{
		return $this->db->insert('deductionss', $data);
	}
	public function share_uploads($data)
	{
		return $this->db->insert('shareholders', $data);
	}
	public function upcoming_deductions($data)
	{
		return $this->db->insert('upcoming_deductions', $data);
	}
	public function validateStaffNo($staffNo)
	{
		return $this->db
			->where('membershipNo', $staffNo)
			->get('profile')
			->row();
	}
	public function staffStatistics()
	{
		$sql = "SELECT COUNT(*) as total, SUM(CASE WHEN username like 'SP_%' THEN 1 ELSE 0 END) AS senior, SUM(CASE WHEN username like 'JP_%' THEN 1 ELSE 0 END) AS junior FROM auth";
		return $this->db->query($sql)->row();
	}
	public function requestStatistics()
	{
		$sql = "SELECT COUNT(*) as total, 
			SUM(CASE WHEN approval_status = 'pending' THEN 1 ELSE 0 END) AS pending, 
			SUM(CASE WHEN approval_status = 'partially approved' THEN 1 ELSE 0 END) AS partially_approved, 
			SUM(CASE WHEN approval_status = 'fully approved' THEN 1 ELSE 0 END) AS fully_approved 
			FROM loan";
		return $this->db->query($sql)->row();
	}
	public function get_active_year()
	{
		return $this->db
			->where('status', 'Active')
			->get('years')
			->row();
	}
	public function getFestivitySupplyRequest()
	{
		return $this->db
			->distinct()
			->select('staffNo, year, description, fname, sname, oname')
			->from('ramadan_order_items')
			->join('profile', 'profile.membershipNo = ramadan_order_items.staffNo')
			->get()
			->result();
	}
	public function view_festivity_request($staffNo, $description, $year)
	{
		return $this->db
			->select('*')
			->from('ramadan_order_items')
			->join('shop', 'shop.id = ramadan_order_items.itemid')
			->where('staffNo', $staffNo)
			->where('description', $description)
			->where('ramadan_order_items.year', $year)
			->get()
			->result();
	}
}
