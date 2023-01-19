<?php
    defined('BASEPATH')OR exit("NO direct script access allowed");

    class PublicationController extends CI_Controller{

        function __construct(){

            parent::__construct();
			$this->load->model("PublicationModel");
			$this->load->library('session');
		if ($this->session->userdata('id_util') == false) {
			redirect("LoginController/index");
		}
        }

		function index(){
			$this->load->view("testInsertImage"); 

		}

        function publier(){
        	$file;
        	if(isset($_FILES['media']['name'])){
	        	$file = array('filename' =>  $_FILES['media']['name'], 
							'filetmpname' => $_FILES['media']['tmp_name'],
							'filesize' => $_FILES['media']['size'],
							'fileerror' => $_FILES['media']['error'],
							'filetype' => $_FILES['media']['type']
							
				);
        	}else if (isset($_FILES['media2']['name'])){
        		$file = array('filename' =>  $_FILES['media2']['name'], 
							'filetmpname' => $_FILES['media2']['tmp_name'],
							'filesize' => $_FILES['media2']['size'],
							'fileerror' => $_FILES['media2']['error'],
							'filetype' => $_FILES['media2']['type']
							
				);
        	}else{
        		$file = array('filename' => "texte");
        	}
			
            
            
        	$data = array('responce' => 'success',
			'media' => $file,
			 'legend_pub' => $this->input->post('legend_pub'),
			 'contenu_pub' => $this->input->post('contenu_pub'),
			 'id_util' => $this->input->post('id_util'),
			 'id_groupe' => $this->input->post('id_groupe')
			);

			$this->PublicationModel->insertPublication($data);
			$this->PublicationModel->insertMediaBD($data);
			//redirect("PublicationController/afficherPub");*/

			
        }    

        function afficherPub(){

			$this->load->view("testInsertImage");


		}

		function supprimer(){


			echo $this->PublicationModel->deletePublication($_GET['id_pub']);


		}

		function home()
		{

			$liste = array();
			if(isset($_GET['lastindex'])){
		        $size = $_GET['lastindex'];
		        for ($i=0; $i < $size; $i++) { 
		            $liste[$i] = $_GET['id'.$i];
		        }
		    }

			$out =  $this->PublicationModel->selectActualite($_GET['id_session'],$liste);

			echo $out;
		}

		function home2()
		{

			$liste = array();
			if(isset($_GET['lastindex'])){
		        $size = $_GET['lastindex'];
		        for ($i=0; $i < $size; $i++) { 
		            $liste[$i] = $_GET['id'.$i];
		        }
		    }

			$out =  $this->PublicationModel->selectActualite2($_GET['id_session'],$liste);

			echo $out;
		}

		function getindex()
		{
			$out =  $this->PublicationModel->getindex($_GET['id_session']);
			echo $out;
		}


    }





?>