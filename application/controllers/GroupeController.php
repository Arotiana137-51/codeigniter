<?php 
    class GroupeController extends CI_Controller{

        function __construct(){

            parent::__construct();
            $this->load->model("GroupeModel");

        }

        function index(){

            $this->load->view("interfaceGroupe");

        }
        function creerGroupe()
        {

            $data = array(
                    "nom_groupe"  => $this->input->post("nom_groupe"),
                    "desc_groupe" => $this->input->post("desc_groupe"),
                    "id_admin"    => $this->input->post("id_admin")

            );

            $this->GroupeModel->creerGroupe($data);
            


        }

        function afficherGroupes(){
            $session = $this->input->post("session");
            
            $res = $this->GroupeModel->getGroupe($session);
            $listeGroupes ="" ;
            foreach($res as $row )
            {
                $listeGroupes .=  "<button style='min-width:120px;display:block;'
                                      class='p-2 groupeAnarana'>
                                     ".$row->nom_groupe."
                                   </button>";

            }
            
            
            echo $listeGroupes;



        }

        function afficherGroupeSuggere(){
            $session = $this->input->post("session");
           
            $listeTsyIZy = array();
            
            $res1 = $this->GroupeModel->getAllGroupe();
            $listeGroupes ="";
            $res2 = $this->GroupeModel->getGroupe($session);

            //On affiche tous les groupes dont l'user n'est pas encore membre
                //angonona aby zay ef groupe ef misy an le util
                $i = 0;
                foreach($res2 as $row2)
                  {  

                    $listeTsyIZy[$i]= $row2->id_groupe;
                    $i++;
                                                    
                  }
                                 
                foreach($res1 as $row1)
                {
                    if(!in_array($row1->id_groupe, $listeTsyIZy))   
                            {
                                $listeGroupes .=  "<button style='width:120px;display:block;' onclick='entrerGroupe(".$row1->id_groupe.")'
                                                          class='p-2 groupeAnarana'>
                                                        ".$row1->nom_groupe."
                                                    </button>";
                        }


                }
            
            //echo count($listeTsyIZy);
            echo $listeGroupes ;
        }

        function entrerGroupe(){

            $id_groupe = $this->input->post("id_groupe");
            $id_util = $this->input->post("id_util");

            $this->GroupeModel->entrerGroupe($id_groupe,$id_util);




        }

        function minigroupe()
        {
            /*$output ="
            <select id='ggroupe' name='ggroupe' required>";


            $req0=$this->$db->query("select id_groupe, nom_groupe from groupe;");
                    while ($resultat=$req0->fetch()) {
                        $output .="
                       <option>
                        ".$resultat['name_distributor']."
                       </option>";
                }
            $output .="</select>";*/

            $output = $this->GroupeModel->minigroupe($_GET['id_session']);
            echo $output;
               
        }


        function afficherPubGroupe(){
          $id_session = $this->input->post("id_session");  
          $id_pub = 1;
          $daty = $this->GroupeModel->daty();  
          $datyAncien = $this->GroupeModel->plusAncienDatePub();
          $output ="";
          $nbPub = $this->GroupeModel->dernierIdPub();
          $j = 0;

          for($daty; $daty > $datyAncien ; $daty->modify("-1 day") ){
              for($id_pub ; $id_pub < $nbPub; $id_pub++)
                {  
                        
                      $res = $this->GroupeModel->affichagePub($id_pub,$daty,$id_session,$j);
                        if($res != null)
                        {
                            $output = $output."".$res;
                            $j++;
                        }

                    
                }
            }
            echo $output;

        }









    }









?>