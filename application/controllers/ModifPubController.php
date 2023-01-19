<?php
    class ModifPubController extends CI_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model("ModifPubModel");
            $this->load->library('session');
        if ($this->session->userdata('id_util') == false) {
            redirect("LoginController/index");
        }
        }


        
        function ModifPost()
        {
            $id_pub = $_GET['id_pub'];
            $id_util = $_GET['id_util'];
            $contenu_pub=$_GET['contenu_pub'];
            $legend_pub=$_GET['legend_pub'];
            echo $this->ModifPubModel->modifPub($id_pub,$id_util,$legend_pub,$contenu_pub);

    }

    }


?>