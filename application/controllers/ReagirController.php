<?php 

 defined('BASEPATH')OR exit("NO direct script access allowed");

    class ReagirController extends CI_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model("ReagirModel");
            $this->load->library('session');
        if ($this->session->userdata('id_util') == false) {
            redirect("LoginController/index");
        }
        }



        function jaime(){
            $id_session = $_GET['id_util'];
            $id_pub = $_GET['id_pub'];
            
            echo $this->ReagirModel->add($id_session,$id_pub);

    }

    function actujaime()
    {
        $liste = array();
        $size = $_GET['length'];
        for ($i=0; $i < $size; $i++) { 
            $liste[$i] = $_GET['id'.$i];
        }

        echo $this->ReagirModel->act($liste);
        //echo $size;
    }

/*
 use models\{UtilisateurModel, ReagirModel};

    
 

  if(!isset($_POST["id_pub"])) {
    echo json_encode(array(
        "message"=>"post id required !",
        "success"=>false
    ));
}

if(!isset($_POST["id_util"])) {
    echo json_encode(array(
        "message"=>"Current user id required !",
        "success"=>false
    ));
}
$ReagirModel=new ReagirModel();
$ReagirModel->setData(array(
	 "id_pub"=>$id_pub,
	 "id_util"=>$id_util,

));

$valiny=$ReagirModel->add();

//.vit ny ajout 
//vit nyy delete



if($valiny == 1)
{
	echo 1;
}
else if($valiny == -1)
{
	if($ReagirModel->delete()){
		echo 2;
	}
}

else{
	echo -1;
}

*/




}
?>