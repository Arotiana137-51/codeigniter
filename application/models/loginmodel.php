<?php

class GroupeModel extends CI_Model
{
	
	function __construct()
	{
		$this->db = $this->load->database("default",TRUE);
	}

    //test login
	function login($phone,$password){
	    
		$sql = "SELECT phone_util,mdp_util FROM `utilisateur` WHERE phone_util='".$phone."' ";


		$query = $this->db->query($sql);

		$resultat = $query->result();
	
		return $resultat;

	}
      

	
}