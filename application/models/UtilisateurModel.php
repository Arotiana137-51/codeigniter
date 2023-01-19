<?php
/**
 * 
 */
class UtilisateurModel extends CI_Model
{
	
	function __construct()
	{
		$this->db = $this->load->database("default",TRUE);
	}
	
	

	public function insererUtilisateur($data){
		$this->db->insert("utilisateur",$data);
	}

	public function insererDansPublic($id){
		$this->db->query("insert into groupe_utilisateur(id_util,id_groupe) values('".$id."','1');");
	}

	public function insererPdp($id,$thefile = array()){
            
				$output = $thefile['filename'];
				
				$fileName = $thefile['filename'];
				$fileTmpName = $thefile['filetmpname'];
				$fileSize = $thefile['filesize'];
				$fileError = $thefile['fileerror'];
				$fileType = $thefile['filetype'];
				
				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));
				$allowed = array('jpg','jpeg', 'png', 'pdf');
				
				
				
				if (in_array($fileActualExt, $allowed)){
					if ($fileError == 0){
						if ($fileSize < 1000000000 ){

							//$original = imagecreatefromjpeg("images/ev009.jpg");


							$fileNameNew = "img".$id.".".$fileActualExt;
							$fileDestination = "assets/image/utilisateur/".$fileNameNew;
							move_uploaded_file($fileTmpName, $fileDestination);
							$output = $fileNameNew;
							//header("Location: ../index.php?uploadsuccess");

							//$output = $this->resize($fileDestination,368,520);
							//$original = imagecreatefromjpeg($fileDestination);
							$this->db->query("update utilisateur set img_util='".$fileNameNew."' where id_util='".$id."'");
						}else{
							$output= "Your file is too big! profile picture";
							$erreur=true;
						}
					}else {
						$output= "There was an error uploading your file!!profile picture ";
						$erreur= true;
					}
				} else {
					$output= "You cannot upload files of this types! profile picture";
					$erreur= true;
				}

				return $output;


    }
    public function verifierId($id){
    	$query = $this->db->query("Select * from utilisateur where id_util='".$id."'");
    	return $query->result();
    }

    public function verifierMail($mail){
    	$query = $this->db->query("Select * from utilisateur where mail_util='".$mail."'");
    	return $query->result();
    }

	public function verifierSiExiste($phone_util){
		$query = $this->db->query("Select * from utilisateur where phone_util='".$phone_util."'");
		return $query->result();
	}

	public function verifierUtil($phone_util,$mdp_util){  //verifier si l'utilisateur existe et recevoir les infos
		$query = $this->db->query("Select * from utilisateur where phone_util = '".$phone_util."' and mdp_util='".$mdp_util."'");
		return $query->result();
	}
	/*
	public function fetchUser($id_util, $field_value) {
        $this->db->query("SELECT * FROM utilisateur WHERE $id_util = ?", array($field_value));

        // Here we need to check first if we get a user with the given id before starting assigning values to its properties
        if($this->db->count() > 0) {
            $fetchedUser = $this->db->results()[0];

            $this->id = $fetchedUser->id_util;
            $this->email = $fetchedUser->mail_util;
            $this->password = $fetchedUser->mdp_util;
            $this->sexe = $fetchedUser->sexe_util;
            $this->firstname = $fetchedUser->nom_util;
            $this->lastname = $fetchedUser->prenom_util;
            $this->date_naiss = $fetchedUser->datenaiss_util;
            $this->phone= $fetchedUser->phone_util;
        
            return $this;
        }

        return false;
    }
	*/
	
	function afficheUtilisateur($id_session){

		$output = "tsy misy";

		$querySelect = "select * from utilisateur where id_util ='".$id_session."';";
		$query = $this->db->query($querySelect);
		$resultat = $query->result();
		return $resultat;

    }
	
}