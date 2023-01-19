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

    //creation groupe
	function creerGroupe($data){

		$nom_groupe = $data["nom_groupe"];
		$desc_groupe = $data["desc_groupe"];
		$id_admin = $data["id_admin"];
		$query0 = "Insert into groupe(nom_groupe,desc_groupe,datecre_groupe,id_admin) values ('"
				.$nom_groupe."','".$desc_groupe."',CURRENT_TIMESTAMP,'".$id_admin."')";
		$this->db->query($query0);

		//inscrire l'admin auto dans le groupe
		//alaina aloha le id_groupe vao çréé
		$query1 = "select max(id_groupe) as idG from groupe;";
		$res = $this->db->query($query1);
		$row = $res->row();
		$id_groupe ;
		if(isset($row))
		{
			$id_groupe = $row-> idG;

		}

		$query2 = "Insert into groupe_utilisateur (id_groupe,id_util) values ('".$id_groupe."','".$id_admin."');";
		$this->db->query($query2);

	}
      //select groupe du session
	public function getGroupe($session)
	{
	
		$sql = "select nom_groupe,desc_groupe,groupe_utilisateur.id_groupe as id_groupe
				from groupe inner join groupe_utilisateur on groupe.id_groupe = groupe_utilisateur.id_groupe
		 		where groupe.id_groupe > 1 and groupe_utilisateur.id_util ='".$session."' ";

		$query = $this->db->query($sql);
		$resultat = $query->result();
			
		return $resultat;
	}
	public function getAllGroupe()
	{
	
		// $sql = "select nom_groupe,desc_groupe,groupe_utilisateur.id_groupe as id_groupe
		// 		from groupe inner join groupe_utilisateur on groupe.id_groupe = groupe_utilisateur.id_groupe
		//  		where groupe.id_groupe > 1 and groupe_utilisateur.id_util != '".$session."' ";

		$sql = "Select * from groupe where id_groupe>1";

		$query = $this->db->query($sql);
		$resultat = $query->result();
			
		return $resultat;
	}

	public function entrerGroupe($id_groupe,$id_util){
		$sql = "Insert into groupe_utilisateur (id_groupe,id_util) values('".$id_groupe."','".$id_util."');";

		$this->db->query($sql);



	}
	public function dernierIdPub()
	{
		$sql = "select max(id_pub) as id_pub from publication";
		$res = $this->db->query($sql);
		$row = $res->row();
		$nb;
		if(isset($row))
		{
			$nb = $row->id_pub;
		}

		return $nb;
	} 

	public function minigroupe($id_session)
	{
		$sql = "select groupe.id_groupe as id_groupe, nom_groupe from groupe inner join groupe_utilisateur 
		on groupe.id_groupe = groupe_utilisateur.id_groupe where groupe_utilisateur.id_util = '".$id_session."'";
		$query = $this->db->query($sql);

		$output ="<select id='ggroupe' name='ggroupe' required>";


		foreach($query->result() as $row){
			$output .= "
                       <option value='".$row->id_groupe."'>
                        ".$row->nom_groupe."
                       </option>";;
		}
		$output .= "</select>";

		return $output;
	} 
	public function plusAncienDatePub(){

		$sql = "Select min(date_pub) as date_pub from publication";
		$res = $res = $this->db->query($sql);
		$row = $res->row();
		$d;
		if(isset($row))
		{
			$d = $row->date_pub;
		}

		$date= new DateTime($d);
	     $date->modify("0 day");
	    $next=$date->format('Y-m-d');
	    return $next;

	}
	public function affichagePub($id,$next,$id_session,$j)//CARD PUBLICATION(id_publication, $daty , $id_session, $j)
	{
		$output = "";
		$p = "select publication.id_pub as id_pub, publication.legend_pub as legend_pub, publication.contenu_pub as contenu_pub, publication.date_pub as date_pub, publication.id_util as id_util, publication.id_groupe as id_groupe, media.id_media as id_media, media.type_media as type_media, media.contenue_media as contenue_media, media.id_pub, nom_util, prenom_util, img_util, nom_groupe FROM publication, media, utilisateur, groupe where publication.id_pub = media.id_pub and utilisateur.id_util = publication.id_util and groupe.id_groupe = publication.id_groupe and date_pub like '".$next."%' and publication.id_pub='".$id."';";
			$query2 = $this->db->query($p);


		$r = "select count(*) as nombre from publication, reagir where publication.id_pub=reagir.id_pub and publication.id_pub ='".$id."';";
		$query3 = $this->db->query($r);


		$rm = "select count(*) as nombre from publication, reagir where publication.id_pub=reagir.id_pub and publication.id_pub ='".$id."' and reagir.id_util='".$id_session."';";
		$query4 = $this->db->query($rm);


	foreach($query2->result() as $row2){

			
		$output .= "
				<div class='lehibe'>
								<div class='loha'>
									<div class='row'>
										<div class='col-8'>";
										$pdp = $row2->nom_util;
										if($pdp == ""){
											$pdp = "ab.png";
										}

										$output .="
												<img src='././assets/image/utilisateur/".$row2->img_util."' class='minipro'>
												".$row2->prenom_util." ".$row2->nom_util."
												<input type='hidden' value='".$row2->id_pub."'>
												<hr style='width: 500px; margin-left: -20px; margin-top: -5px;' color='white'>
										</div>
										<div class='col-1' align='left'></div>
										<div class='col-3' style='font-size: 13px;'' align='right'>".$row2->nom_groupe."
										<p>".$row2->date_pub."</p></div>
									</div>
										<div>
											<p>".$row2->legend_pub."</p>
										</div> 
								</div>
									<div class='vatany'>";
									if($row2->contenue_media != "texte"){
										$output .=
											"<img src='././assets/image/publication/".$row2->contenue_media."' class='sary'>";
										}else{
										$output .=
											"<h3>".$row2->contenu_pub."</h3>";
										}

									$output .="
									</div>
								<div class='tongony' align='center'>
									<div class='row'>
										<div class='col'>";
										$countiny = "0";
										foreach($query3->result() as $row3){
											 $countiny = $row3->nombre;
										}

										$active = "";

										foreach($query4->result() as $row4){
											 if($row4->nombre == "1"){
											 	$active = "active";
											 }
										}
										$output .= "
											<button class='btn-outline-light btnReaction jaime ".$active."' id='".$j."'>
												".$countiny."
												J'aime
											</button>
											<input type='hidden' id='reac".$j."' value='".$id."'>
										</div>
									<div class='col'>
							<button class='btnReaction'>
								Commentaire
							</button>
						</div>
						<div class='col'>
							<button class='btnReaction'>
								Partage
							</button>
						</div>
						</div>
					</div>
				</div><br>
						";
						}
			return $output;
	}

	function daty(){

		$dateQuery = $this->db->query("select CURRENT_TIMESTAMP as dateJ;");
		$row = $dateQuery->row();
		$androany = "";
		if(isset($row))
		{
			$androany = $row-> dateJ;
		}
		$date2= new DateTime($androany);
	     $date2->modify("0 day");
	    $next=$date2->format('Y-m-d');
	    return $next;
	}



}