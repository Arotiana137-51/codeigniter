<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageController extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('id_util') == false) {
			redirect("LoginController");
		}
		$this->load->model('MessageModel');
	}

	public function index(){
		$this->load->view('testMessage');
	}

	function envoyerMessage(){
		$contenu = $this->input->post('contenu');
		$env = $this->input->post('id_envoyeur');
		$recep = $this->input->post('id_recepteur');
		$this->load->model('MessageModel');
		$this->MessageModel->envoyerMessage($env,$recep,$contenu);
		
	}

	function showdisc()
        {
        	
        	if($posts = $this->MessageModel->getdisc($_GET['id_session'])){
				$data = array('responce' => 'success','posts' => $posts);
			}else{
				$data = array('responce' => 'error','posts' => "");
			}
			echo json_encode($data);
        }

        function showmessagec()
        {
        	
        	if($posts = $this->MessageModel->getdisc($_GET['id_session'])){
				$data = array('responce' => 'success','posts' => $posts);
			}else{
				$data = array('responce' => 'error','posts' => "");
			}
			echo json_encode($data);
        }

       function getmessage()
        {
        	if($posts = $this->MessageModel->getmessage($_GET['id_envoyeur'],$_GET['id_session'])){
				$data = array('responce' => 'success','posts' => $posts);
			}else{
				$data = array('responce' => 'error','posts' => "");
			}
			echo json_encode($data);
        }
}