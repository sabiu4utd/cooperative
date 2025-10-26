<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Smcsapi_model extends CI_Model
{
	public function getMembers(){
		return $this->db->get('profile')->result();
	}
	public function authentication($username, $password){
	    
	    $sql = "select * from auth join profile on auth.user_hash = profile.user_hash join states on profile.stateId = states.stateid join local_governments on profile.lgaId = local_governments.lgaId where username = '$username' and password = '$password'";
		return $this->db->query($sql)->row();
					
	}
	
}
?>