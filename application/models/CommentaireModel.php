<?php
/**
 * 
 */
class GroupeModel extends CI_Model
{
	
	function __construct()
	{
		$this->db = $this->load->database("default",TRUE);
	}

    //creation commentaire
	function AjoutCommentaire($id_util,$id_pub,$contenue_com){
		$query = "Insert into commentaire(id_util,id_pub,contenue_com,date_com) values ('".$id_util."','".$id_pub."','".$contenue_com."',CURRENT_TIMESTAMP)";
		$this->db->query($query);

	}
      //select getCommentaire
	public function getCommentaire($id_pub)
	{
	
		$sql = "select (utilisateur.nom_util,commentaire.id_pub,commentaire.contenue_com,) from commentaire,utilisateur,publication where utilisateur.id_util=commentaire.id_util and publication.id_pub=commentaire.id_pub where publication.id_pub='".$id_pub."' ";

		$query = $this->db->query($sql);

		$resultat = $query->result();
	
		return $resultat;
	}
	public function supprCommentaire($id_commentaire){
           
	}
}