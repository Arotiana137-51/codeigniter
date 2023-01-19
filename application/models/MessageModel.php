<?php
/**
 * 
 */
class MessageModel extends CI_Model
{
	
	function __construct()
	{
		$this->db = $this->load->database("default",TRUE);
	}

	function envoyerMessage($id_envoyeur,$id_recepteur,$contenu){
		$query = "Insert into message(id_util_envoyeur,id_util_recepteur,contenue,date_message) values ('".$id_envoyeur."','".$id_recepteur."','".$contenu."',CURRENT_TIMESTAMP)";
		$this->db->query($query);

	}

	public function getmessage($id_recepteur,$id_envoyeur)
	{
		$output = "ok";
		$key = "";
		$sql = "SELECT id_message,id_util_envoyeur,id_util_recepteur ,contenue,date_message FROM `message` WHERE (id_util_envoyeur='".$id_recepteur."' and id_util_recepteur='".$id_envoyeur."') or (id_util_envoyeur='".$id_envoyeur."' and id_util_recepteur='".$id_recepteur."') order by date_message asc;";

/*
		$sql = "select id_message,id_util_envoyeur,id_util_recepteur ,contenue,date_message from message where id_util_recepteur='".$id_recepteur."' and id_util_envoyeur='".$id_envoyeur."' ";*/

		$query = $this->db->query($sql);

		$resultat = $query->result();
	
		return $resultat;
	}

	function getdisc($id_session){

		$output = "tsy misy";
		/*
		$querySelect = "SELECT DISTINCT(id_util_recepteur) as envoyeur, utilisateur.nom_util as nom_util, utilisateur.prenom_util as prenom_util FROM message, utilisateur WHERE utilisateur.id_util = message.id_util_recepteur and id_util_envoyeur='".$id_session."';";*/

		/*$querySelect = "SELECT id_util_recepteur as envoyeur, utilisateur.nom_util as nom_util, utilisateur.prenom_util as prenom_util FROM message, utilisateur WHERE utilisateur.id_util = message.id_util_recepteur and id_util_envoyeur='".$id_session."' group by envoyeur;";*/

		$querySelect = "SELECT id_util as envoyeur, nom_util, prenom_util FROM utilisateur WHERE id_util !='".$id_session."' ;";
		$query = $this->db->query($querySelect);
		$resultat = $query->result();
		return $resultat;

    }
}