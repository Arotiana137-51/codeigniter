<?php 
class PublicationModel extends CI_Model{
    function __construct(){

        parent::__construct();
        

    }
    //fonction insertion image
    function insertImage($id,$thefile = array()){
            

				$output = $thefile['filename'];
				
				$fileName = $thefile['filename'];
				$fileTmpName = $thefile['filetmpname'];
				$fileSize = $thefile['filesize'];
				$fileError = $thefile['fileerror'];
				$fileType = $thefile['filetype'];
				
				$fileExt = explode('.', $fileName);
				$fileActualExt = strtolower(end($fileExt));
				$allowed = array('jpg','jpeg', 'png', 'pdf','mp4', '3gp', 'mkv');
				
				
				
				if (in_array($fileActualExt, $allowed)){
					if ($fileError == 0){
						if ($fileSize < 1000000000 ){

							//$original = imagecreatefromjpeg("images/ev009.jpg");


							$fileNameNew = "img".$id.".".$fileActualExt;
							$fileDestination = "assets/image/publication/".$fileNameNew;
							move_uploaded_file($fileTmpName, $fileDestination);
							$output = $fileNameNew;
							//header("Location: ../index.php?uploadsuccess");

							//$output = $this->resize($fileDestination,368,520);
							//$original = imagecreatefromjpeg($fileDestination);

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
    //insertion media dans la BD
    function insertMediaBD ($data){

    	$type_media = "photo";
    	$fileName = "";

    	$fileName = $data['media']['filename'];
    	$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg','jpeg', 'png');
		$allowed2 = array('mp4','mkv', '3gp');
		$allowed3 = array('pdf','docs', 'xls');
		$output = "";

				
				
		if (in_array($fileActualExt, $allowed)){
			$type_media = "photo";
		}else if(in_array($fileActualExt, $allowed2)){
			$type_media = "video";
		}else if(in_array($fileActualExt, $allowed3)){
			$type_media = "pdf";
		}else if($data['media']['filename'] == "texte"){
			$type_media = "texte";
		}else{
			$type_media = "autre";
		}
    
        
        $id_pub ;
		
		//requete pour avoir l'ID de la derniere pub
		$querySelect = "Select max(id_pub) as id_pub from publication;";
		 $query = $this->db->query($querySelect);

		 

		 $row = $query->row();
		 if(isset($row))
		 {
		 	$id_pub = $row->id_pub;
		 }

		$contenue_media = "";
	 	if($data['media']['filename'] == "texte"){
	 		$contenue_media = "texte";
    	}else{
    		$contenue_media = "img".$id_pub.".".$fileActualExt;
    	}
		 
		
        $sql = "insert into media (type_media,contenue_media,id_pub) values(
            '".$type_media."',
            '".$contenue_media."','".$id_pub."');";

        if($contenue_media != "texte"){
        	$output = $this->insertImage($id_pub , $data['media']);
       	}
        
        if($this->db->query($sql)){
        	//$output = $fileName;
        } 
        return $output;  

    }


    function deletePublication($id_pub){
        $sql = "delete from media where id_pub='".$id_pub."';";
/*
        if($contenue_media != "texte"){
        	$output = $this->insertImage($id_pub , $data['media']);
       	}*/
        
        $this->db->query($sql);
        	//$output = $fileName;

        $sql1 = "delete from reagir where id_pub='".$id_pub."';";
        $this->db->query($sql1);

        $sql2 = "delete from publication where id_pub='".$id_pub."';";
        $this->db->query($sql2);

        return "supprime";  

    }


	//insertion publication 
	function insertPublication($data){
		
		
		$legend_pub = $data["legend_pub"];
		$date_pub ;
		$dateQuery = $this->db->query("select CURRENT_TIMESTAMP as dateJ;");
		$row = $dateQuery->row();

		if(isset($row))
		{
			$date_pub = $row->dateJ;
		}
		$contenu_pub = $data["contenu_pub"];
		$id_util = $data["id_util"];
		$id_groupe = $data["id_groupe"];

		$sql = "insert into publication (legend_pub,date_pub,contenu_pub,id_util,id_groupe) values(
			'".$legend_pub."','".$date_pub."','".$contenu_pub."','".$id_util."','".$id_groupe."');";
		$this->db->query($sql);


	}


	function selectActualite($id_sess, $liste = array())
	{
		$test = "0";

		if(isset($liste[0])){
			$test = "1";
		}

		$id_session = $id_sess;
		$dateQuery = $this->db->query("select CURRENT_TIMESTAMP as dateJ;");
		$row = $dateQuery->row();
		$androany = "";
		if(isset($row))
		{
			$androany = $row-> dateJ;
		}
		$date2= new DateTime($androany);
	    $date2->modify("-40 day");
	    $next=$date2->format('Y-m-d');
	    $next .= " 00:00:00";
	    $output = "";

	    $publication = array();
	    $i = 0;
	    $j = 0;
	    $isa = 0;
	    if($test == "1"){
	    	$publication = $liste;
	    	$i = count($publication)-1;
	    	$isa = $i+1;
	    }

	   

		//DE TOI DATY NOW+0 (ANDROANY) PUBLICATION PUBLIQUE ET PRIVE
		$detoidate1 = "select publication.id_pub as id_pub FROM publication, media where publication.id_pub = media.id_pub and date_pub >= '".$next."%' and publication.id_util ='".$id_session."' order by date_pub desc;";

		$query = $this->db->query($detoidate1);
		foreach ($query->result() as $row)
			{
				if(!in_array($row->id_pub, $publication)){
					$publication[$i] = $row->id_pub;
					$i++;
				}
			}


		//PRIVE DATE NOW+0 (ANDROANY) PUBLICATION PRIVE
		$prive1 = "select publication.id_pub as id_pub FROM publication, media, groupe_utilisateur where publication.id_pub = media.id_pub and groupe_utilisateur.id_groupe = publication.id_groupe and date_pub >= '".$next."%' and not publication.id_groupe='1' order by date_pub desc;";

		$query = $this->db->query($prive1);
		foreach ($query->result() as $row)
			{
				if(!in_array($row->id_pub, $publication)){
					$publication[$i] = $row->id_pub;
					$i++;
				}
			}
		//PUBLIQUE DATE NOW+0 (Androany) PUBLICATION PUBLIQUE
		$public1 = "select publication.id_pub as id_pub FROM publication, media where publication.id_pub = media.id_pub and date_pub >= '".$next."%' and id_groupe='1' order by date_pub desc;";

		$query = $this->db->query($public1);
		foreach ($query->result() as $row)
			{
				if(!in_array($row->id_pub, $publication)){
					$publication[$i] = $row->id_pub;
					$i++;
				}
			}

		/////////////// OOOOOOOOMMMMMMMMMMAAAAAAAAALLLLLLLLLLLYYYYYYYYYYYYY////////////////
			
		/*$date3= new DateTime($androany);
	    $date3->modify("-1 day");
	    $next=$date3->format('Y-m-d');*/
			//DE TOI DATY NOW+0 (ANDROANY) PUBLICATION PUBLIQUE ET PRIVE
		$detoidate1 = "select publication.id_pub as id_pub FROM publication, media where publication.id_pub = media.id_pub and date_pub >= '".$next."%' and publication.id_util ='".$id_session."' order by date_pub desc;";

		$query = $this->db->query($detoidate1);
		foreach ($query->result() as $row)
			{
				if(!in_array($row->id_pub, $publication)){
					$publication[$i] = $row->id_pub;
					$i++;
				}
			}



		//AFFICHAGE
		$ka = $isa+3;//

		for ($isa; $isa < $ka; $isa++) { //count($publication)
			if(isset($publication[$isa])){
				$output .= $this->affichage($publication[$isa],$next,$id_session,$isa);
							//$output .= "<div>".$isa." - ".$publication[$isa]."</div>";
			}else{
				break;
			}
			
				


		}


			$output .= "

			<script>

				actujaime();
				function actujaime() {
					//const list1 = document.querySelectorAll('.reacpub');

					list1 = document.getElementsByClassName('reacpub');
					//alert(list1[0].value);
					var alefa = 'ReagirController/actujaime?';
					alefa += 'length='+list1.length;

					for (var i = 0; i < list1.length; i++) {
						alefa += '&id'+i+'='+list1[i].value;
					}

					 $.ajax({
			            url: alefa,
			            method:'GET',
			            success: function(data){
			                ob = JSON.parse(data);
							var isany = ob.length;

							for (var i = 0; i < list1.length; i++) {
								//alert(document.getElementById('count'+i).textContent);
								document.getElementById('count'+i).textContent = ob[i];

							}



			            },
			            error: function(data) {
			            	alert('erreur'+data);
			            }
			        });

				}
				
			</script>
			
			";

			
				
			

		echo $output;

	}



	public function affichage($id,$next,$id_session,$j)//CARD PUBLICATION(id_publication, $daty , $id_session, $j)
	{
		$output = "";
		$p = "select publication.id_pub as id_pub, publication.legend_pub as legend_pub, publication.contenu_pub as contenu_pub, publication.date_pub as date_pub, publication.id_util as id_util, publication.id_groupe as id_groupe, media.id_media as id_media, media.type_media as type_media, media.contenue_media as contenue_media, media.id_pub, nom_util, prenom_util, img_util, nom_groupe FROM publication, media, utilisateur, groupe where publication.id_pub = media.id_pub and utilisateur.id_util = publication.id_util and groupe.id_groupe = publication.id_groupe and date_pub >= '".$next."%' and publication.id_pub='".$id."';";
			$query2 = $this->db->query($p);


		$r = "select count(*) as nombre from publication, reagir where publication.id_pub=reagir.id_pub and publication.id_pub ='".$id."';";
		$query3 = $this->db->query($r);


		$rm = "select count(*) as nombre from publication, reagir where publication.id_pub=reagir.id_pub and publication.id_pub ='".$id."' and reagir.id_util='".$id_session."';";
		$query4 = $this->db->query($rm);

		$ru = "select count(*) as nombre from publication where id_pub='".$id."' and id_util='".$id_session."';";
		$query5 = $this->db->query($ru);


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
												<input type='hidden' id='su".$j."p' value='".$row2->id_pub."'>
												<br>
												<hr style='width: 400px; margin-left: -20px; margin-top: -5px;' color='white'>
															</div>
															<div class='col-1' align='left'></div>
															<div class='col-3' style='font-size: 13px;' align='right'>";

															$aove = "0";
															foreach($query5->result() as $row5){
																 $aove = $row5->nombre;
															}
															if($aove == "1"){
															$output .="
																<div class='dropdown dropleft float-right'>
																    <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>
																      <img src='././assets/image/sup.png' style='width:20px;height: 20px;'>
																    </button>
																    <div class='dropdown-menu'>
																      <a class='dropdown-item supp' id='su".$j."' name='".$row2->id_pub."'>Supprimer publication</a>
																      <a class='dropdown-item'>Modifier publication</a>
																    </div>
															  	</div>";
															  }

																$output .="<div style='padding-top:20px;'>
																    ".$row2->nom_groupe."";

																	$date3= new DateTime($row2->date_pub);
	                                                                $date3->modify("-0 day");
	                                                                $next3=$date3->format('Y-m-d');
	                                                                 $output .= "

																	
																	 <P>".$next3."</p>
																</div>
															</div>
													</div>
												<div>
													<p>".$row2->legend_pub."</p>
												</div> 
										</div>
									<div class='vatany'>";
									if($row2->type_media == "photo"){
										$output .=
											"<img src='././assets/image/publication/".$row2->contenue_media."' class='sary'>";
										}else if ($row2->type_media == "video"){
											$output .= "<video width='100%' controls>
											<source src='././assets/image/publication/".$row2->contenue_media."'' type='video/mp4' style='width: 100%;''>
											</video>";

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
												<span id='count".$j."'>".$countiny."</span>
												J'aime
											</button>
											<input type='hidden' class='reacpub' id='reac".$j."' value='".$id."'>
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


	



}

