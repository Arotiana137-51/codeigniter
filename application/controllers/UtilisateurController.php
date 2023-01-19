<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurController extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		$this->load->model("UtilisateurModel");
		$this->load->library('session');
		if ($this->session->userdata('id_util') == false) {
			redirect("LoginController/index");
		}
	}
	//load view

	public function index(){
		$this->load->view("test_insert_util");
	}


	public function insererUtilisateur(){
		

		$data = array(
			'id_util' => $this->input->post("id_util"),
			'nom_util' => $this->input->post("nom_util"),
			'prenom_util' => $this->input->post("prenom_util"),
			'datenaiss_util' => $this->input->post("datenaiss_util"),
			'sexe_util' => $this->input->post("sexe_util"),
			'phone_util' => $this->input->post("phone_util"),
			'mail_util' => $this->input->post("mail_util"),
			'mdp_util' => $this->input->post("mdp_util"),
			'img_util' => ""
		);

		$this->load->model("UtilisateurModel");
		$this->UtilisateurModel->insererUtilisateur($data);
		
	}


	public function insererDansPublic($id){
		$this->load->model('UtilisateurModel');
		$this->UtilisateurModel->insererDansPublic($id);
	}

	public function insererPdp(){
		$this->load->model("UtilisateurModel");
		$id = $this->input->post("id_util");
		$file = array(
			'filename' =>  $_FILES['img']['name'], 
			'filetmpname' => $_FILES['img']['tmp_name'],
			'filesize' => $_FILES['img']['size'],
			'fileerror' => $_FILES['img']['error'],
			'filetype' => $_FILES['img']['type']
						
		);

		$this->UtilisateurModel->insererPdp($id,$file);
		$this->insererDansPublic($id);
		redirect("LoginController?act=retour");
	}

	public function loadImageInsert(){
		$data['id'] = $this->input->get("id_util");
		$this->load->view("testInsertImage",$data);
	}
	

	//ho an parametre  ,modif mot de passe les e
	public function modifMdp($id_util,$mdp_util)
	{
		$id_util = $_GET['id_util'];
		$mdp_util = $_GET['mdp_util'];
		
		echo $this->UtilisateurModel->modifMdp($id_util,$mdp_util);
		

	}



	//tapitra  ny parametre



	// Pour les contrôles champ
	public function verifierId(){
		$id = $this->input->post('id_util');
		$this->load->model('UtilisateurModel');
		$resp = $this->UtilisateurModel->verifierId($id);
		if (count($resp)>0){
			echo json_encode('1');
		} else {
			echo json_encode('0');
		}
	}

	public function verifierNum(){
		$phone = $this->input->post('phone_util');
		$this->load->model('UtilisateurModel');
		$resp = $this->UtilisateurModel->verifierSiExiste($phone);
		if (count($resp)>0){
			echo json_encode('1');
		} else {
			echo json_encode('0');
		}
	}

	public function verifierMail(){
		$mail = $this->input->post('mail_util');
		$this->load->model('UtilisateurModel');
		$resp = $this->UtilisateurModel->verifierMail($mail);
		if (count($resp)>0){
			echo json_encode('1');
		} else {
			echo json_encode('0');
		}
	}

	function afficheUtil()
    {
    	
    	if($posts = $this->UtilisateurModel->afficheUtilisateur($_GET['id_session'])){
			$data = array('responce' => 'success','posts' => $posts);
		}else{
			$data = array('responce' => 'error','posts' => "");
		}
		echo json_encode($data);
    }
}