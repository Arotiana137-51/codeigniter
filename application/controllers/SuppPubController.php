<?php
    class ActionPubModel extends CI_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model("ActionPubModel");
            $this->load->library('session');
        if ($this->session->userdata('id_util') == false) {
            redirect("LoginController/index");
        }
        }


        
        function DelPost(){
            $id_pub = $_GET['id_pub'];
            $id_util = $_GET['id_util'];
            
            echo $this->SuppPubModel->supprPub($id_pub,$id_util);

    }

    }


?>