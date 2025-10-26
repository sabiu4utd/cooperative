<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
	public function get_crs($membershipNo)
	{
		return $this->db
			->select("*")
			->from("deductionss")
			->join("deductions_type", "deductionss.typeid = deductions_type.id")
			->order_by("month","asc")
			->where('memberId', $membershipNo)
			->get()
			->result();
	}
	public function authentication($username, $password)
	{
		return $this->db
			->select('*')
			->from('auth')
			->join('profile', 'auth.user_hash = profile.user_hash')
			->join('states', 'profile.stateId = states.stateid')
			->join('local_governments', 'profile.lgaId = local_governments.lgaId')
			->where('username', $username)
			->where('password', $password)
			->get()
			->row();
	}

	public function get_share($membershipNo)
	{
		return $this->db
			->select('*')
			->from('shareholders')
			->where('memberId', $membershipNo)
			->where('status', 'current')
			->get()
			->row();
	}

	public function LoanApplication($data)
	{
		return $this->db->insert("loan", $data);
	}
	public function supplyApplication($data)
	{
		return $this->db->insert("loan", $data);
	}

	public function loanStatus($membershipNo)
	{
		//$data = [];
		return $this->db
			->select('*')
			->from('loan')
			->where('memberId', $membershipNo)
			->where_in('approval_status', ['Fully Approved', 'Partially Approved', 'Pending', 'Unpaid'])
			->where_in('type', ['2','11'])
			->get()
			->result();
	}
	public function getMyLoans($memberId)
	{
		$sql = "SELECT deductions_type.id as typeid, deductions_type.type as dtype, loan.* from deductions_type join loan on loan.type = deductions_type.id where memberId ='$memberId'";
		return $this->db->query($sql)->result();
		//->select('deductions_type.id as typeid, type, loan.*')
		//->from('loan')
		//->join('deductions_type', 'typeid = loan.type')
		//->where('memberId', $memberId)
		//->get()
		//->result();
	}
	public function getLoanById($memberId, $id)
	{
		return $this->db
			->select('*')
			->from('loan')
			->where('memberId', $memberId)
			->where('id', $id)
			->get()
			->row();
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
	public function memberLoans($memberId){
		$sql = "SELECT * from loan where memberId ='$memberId' and approval_status='Unpaid'";
		return $this->db->query($sql)->result();
		
	}
	public function loanRepayment($memberId){
		$typeid = 11;
		return $this->db
				->where('memberId', $memberId)
				->where('typeid', $typeid)
				->get('deductionss')
				->result();
	}
	public function getAllDeduction($memberId){
		$sql = "SELECT * from deductionss join deductions_type on deductionss.typeid = deductions_type.id where memberId ='$memberId' order by month asc";
		return $this->db->query($sql)->result();
	}
	public function getAllCRS($memberId){
		$sql = "SELECT * from deductionss join deductions_type on deductionss.typeid = deductions_type.id where memberId ='$memberId' and deductionss.typeid ='1'";
		return $this->db->query($sql)->result();
	}
	public function special_cases($staffNo){
			return $this->db
			->where('memberId', $staffNo)
			->get('special_cases')
			->result();
	}
	public function load_ramdan_supply(){
		return $this->db
			->select('*')
			->from('loan')
			->where('memberId', $this->session->userdata('membershipNo'))
			->where('approval_status', 'Unpaid')
			->where('type', '2')
			->get()
			->result();
	}
	public function get_ramdan_supply_items(){
		return $this->db
			->select('*')
			->from('shop')
			->where('year', $this->session->userdata('active_year'))
			->where('type', 'Ramadan Supply')
			->get()
			->result();
	}

    public function save_ramadan_supply_order($data) {
        

        // Insert order items

            $order_item = [
                'staffno' => $data['staffNo'],
                'year' => $data['year'],
                'description' => $data['description'],
				'itemid' => $data['item_id'],
                'quantity' => $data['quantity'],
                'price' => $data['price']
            ];
           return $this->db->insert('ramadan_order_items', $order_item);
        }


		public function get_ramadan_orders($staffNo, $year) {
			
		return $this->db
			->select('*')
			->from('ramadan_order_items')
			->join('shop', 'shop.id = ramadan_order_items.itemid')
			->where('staffno', $staffNo)
			->where('description', 'Ramadan Supply')
			->where('ramadan_order_items.year', $year)
			->get()
			->result();

      
    }
	public function changePassword($password){
		return $this->db
		->where('username', $this->session->userdata('username'))
		->set('password', md5($password))
		->update('auth');
	}
	public function special_cases_negative($membershipNo){
		return $this->db
			->where('memberId', $membershipNo)
			->where_in('type', ['Withdrawal from Savings', 'Membership Withdrawal','Knock Up'])
			->get('special_cases')
			->result();
	}
}

