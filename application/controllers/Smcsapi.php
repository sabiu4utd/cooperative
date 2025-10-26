<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Smcsapi extends REST_Controller
{

   public function __construct() {
       parent::__construct();
       $this->load->model(['Smcsapi_model']);

   }  
   
   public function allmembers_get(){
       $data = $this->Smcsapi_model->getMembers();
       return $this->response($data, 200);
   } 

   public function member_post(){
    $data = $_POST;//$this->Smcsapi_model->authentication($username, $password);
    return $this->response($data, 200);
   } 

  

   
   public function lga_get(){
       $data = $this->Smcsapi_model->getLga();
       return $this->response($data, 200);
   } 
   
   public function forms_get(){
       $id = $this->uri->segment(3, false);
       
       if($id and is_numeric($id)){
            $data = $this->Smcsapi_model->getOrderedFormsByFormID($id);
            if(!$data) $this->response(["error" => "Invalid Form ID"], 400);
            return $this->response($data, 200);
       }else if($id and !is_numeric($id)) {
           $data = $this->Smcsapi_model->getOrderedFormsByHash($id);
           if(!$data) $this->response(["error" => "Invalid Form Hash"], 400);
           return $this->response($data, 200);
       }else{
           $data = $this->Smcsapi_model->getOrderedForms($id);
           return $this->response($data, 200);
       }
       return $this->response(["error" => "Something went wrong"], 400);
   }
   
   public function applicants_get(){
       $id = $this->uri->segment(3, false);
       
       if($id) {
           $data = $this->Smcsapi_model->getApplicantByHash($id);
           if(!$data) $this->response(["error" => "Invalid Applicant ID"], 400);
           return $this->response($data, 200);
       }else{
           $data = $this->Smcsapi_model->getAllapplicants();
           return $this->response($data, 200);
       }
       return $this->response(["error" => "Something went wrong"], 400);
   }
   
   public function formstats_get(){
       $data = $this->Smcsapi_model->getFormStats();
       return $this->response($data, 200);
   }
   
   public function details_get(){
       
       
       $hash = $this->uri->segment(3, false);
       
       if(!$hash) return $this->response(["error" => "Form Hash Missing"], 400);
     
       $form = $this->Smcsapi_model->getOrderedFormsByHash($hash);
      
       if(!$form) return $this->response(["error" => "Invalid Form"], 400);
        
        try{  
           $data = [
    			'applicant' => $this->Smcsapi_model->getApplicantByID($form->applicant_id),
    			'form' => $this->Smcsapi_model->getApplicantFormByHash($hash),
    			'olevels' => $this->Smcsapi_model->getApplicantOlevel($form->applicant_id),
    			'alevels' => $this->Smcsapi_model->getApplicantAlevel($form->applicant_id),
    			'uploads' => $this->Smcsapi_model->getApplicantUploads($form->applicant_id),
    			'referees' => $this->Smcsapi_model->getApplicantReferees($form->applicant_id),
    
    		];
           return $this->response($data, 200);
       }catch(Exception $e){
           return $this->response(["error" => $e->getMessage()], 400);
       }
   }
   public function referees_get(){
       $app_id = 143;
       $doc = $this->Smcsapi_model->getApplicantReferees($app_id);
       $data = ['doc'=>$doc];
       return $this->response($data, 200);
   }
   
   public function sbsforms_get(){
       
        /*
		    0 - pending
		    1 - admitted
		    2 - rejected
		    3 - all forms
		 */
		
		$prog = $this->uri->segment(3, 22);
		$form_status = $this->uri->segment(4, 0);
		
     
        $result = $this->Smcsapi_model->getSbsForms($prog, $form_status);
        $datas = [
            "result" => $result
        ];
        
        foreach($result as $r){
            $result  = $this->Smcsapi_model->getRegisteredOlevel($r->applicant_id);
            $subjects ="";
            foreach($result as $row){
               $subjects .=" ".$row->subject."(".$row->grade."), ";
            }
            
            $data[] = [
                'applicant_id' => $r->application_number,
                'fullname'=> trim(strtoupper($r->surname).", ".ucwords(strtolower($r->firstname." ".$r->middlename))),
                'gender' => $r->gender,
                'prog_abbr' => $r->prog_abbr,
                'state_name' =>$r->state_name,
                'lga_name' => $r->lga_name,
                'app_status' => $r->app_status,
                'admission_status' => $r->admission_status,
                'subject' => $subjects,
                'rrr' => $r->rrr,
                'order_hash' => $r->order_hash
            ];

        }
       return $this->response($data, 200);
   }
   
   
   
   public function process_get(){
       
        /*
		    1 - admitt
		    2 - reject
		 */
		
		$form_hash = $this->uri->segment(3, 0);
		$status = $this->uri->segment(4, 0);
		
		if($status == 1){
		    $admission_status = "admitted";
		}else if($status == 2){
		    $admission_status = "rejected";
		}else{
		    $admission_status = "pending";
		}
		
        $result = $this->Smcsapi_model->updateAdmissionStatus($form_hash, $admission_status);
        //$data = ['sql' => $this->db->last_query()];
        $data = [];
        return $this->response($data, 200);
   }
   
   

}