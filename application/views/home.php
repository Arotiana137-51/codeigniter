<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-FANDRAY</title>

	<link rel="stylesheet" type="text/css" href="././assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="././assets/css/styleAmbany.css">
	<link rel="stylesheet" type="text/css" href="././assets/css/styletabs.css">
	<link rel="stylesheet" type="text/css" href="././assets/css/styleReaction.css">
	<link rel="stylesheet" type="text/css" href="././assets/css/bootstrap.min-1.css">
	<link rel="stylesheet" type="text/css" href="././assets/css/bootstrap.min.css">

	<script src="././assets/js/jquery-3.4.1.min.js"></script>
	<script src="././assets/js/popper.min.js"></script>
	<script src="././assets/js/bootstrap.min.js"></script>
	 <script src="././assets/js/sweetalert2.all.min.js"></script>

	 <script src="<?php echo base_url() ?>/assets/emojilib/js/config.js"></script>
    <script src="<?php echo base_url() ?>/assets/emojilib/js/util.js"></script>
    <script src="<?php echo base_url() ?>/assets/emojilib/js/jquery.emojiarea.js"></script>
    <script src="<?php echo base_url() ?>/assets/emojilib/js/emoji-picker.js"></script>
	
</head>
<body>

	<div class="all">
				<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>-->
	<!-- BACKGROUND START -->
	<div class="back">

	</div>
	<!-- BACKGROUND END -->


	<!-- MENU START -->
	<div class="navigation">
		<img src="././assets/image/logo e-bitsika.png" class="logo">
		<img src="././assets/image/emit.png" class="logo2">
		<ul class="list">


			<li class="liste1 active">
				<a href="#" class="tablink" onclick="openPage('Home', this)">
					<span class="text"><b>Accueil</b></span>
					<span class="icon">
						<img src="././assets/image/home.png">
					</span>
				</a>
			</li>
			<li class="liste1">
				<a href="#" class="tablink" onclick="openPage('News', this)">
					<span class="text"><b>Messages</b></span>
					<span class="icon">
						<img src="././assets/image/message.png">
					</span>
				</a>
			</li>
			<li class="liste1">
				<a href="#" class="tablink" onclick="openPage('Groupe', this)">
					<span class="text"><b>Groupes</b></span>
					<span class="icon">
						<img src="././assets/image/groupe.png">
					</span>
				</a>
			</li>
			<li class="liste1">
				<a href="#" class="tablink" onclick="openPage('setting', this)">
					<span class="text"><b>Parametres</b></span>
					<span class="icon">
						<img src="././assets/image/setting.png">
					</span>
				</a>
			</li>
			<div class="indicator"></div>
		</ul>
	</div>

	<!-- MENU END -->


	<!-- MAIN START -->
		<div class="anatiny">
			<div id="Home" class="tabcontent" style="display: block;">
				<div class="kely">
					<!-- <?php echo $this->session->userdata('id_util') ?> -->
				             

						<button class="button0"  type="button" data-toggle="modal" data-target="#modalPublier">Publier</button>
					
			  	</div><br>

			  
			  <br>
			  <div id="actu">
			  	
			  </div>
			  <div><button class="button0" id="afficheplus"> afficher plus</button></div>

			</div>

			<div id="News" class="tabcontent">
				<input type="hidden" id="iresahana">
				<input type="hidden" id="nomiresahana">
				<input type="hidden" id="prenomiresahana">
			  <div class="lehibe">
			  	<div id="mesazy">
						<h3>Liste voalohany ataon tsika</h3>
						<div style="overflow-y: auto; max-height: 360px;">
							<div class="liste" style="overflow-y: auto;min-height: 100px;">
								<div class="messageEnvoyeur">
									<img src="">
									<p>Message envoyeur</p>
								</div>
							</div>
							<div class="liste" style="overflow-y: auto;min-height: 100px;">
								<div class="messageRecepteur">
									<p>Message recepteur</p>
								</div>
							</div>
							<div class="liste" style="overflow-y: auto;min-height: 100px;">
								<div class="messageEnvoyeur">
									<p>Message envoyeur</p>
								</div>
							</div>
							<div class="liste" style="overflow-y: auto;min-height: 100px;">
								<div class="messageRecepteur">
									<p>Message recepteur</p>
								</div>
							</div>
							<div class="liste" style="overflow-y: auto;min-height: 100px;">
								<div class="messageEnvoyeur">
									<p>Message envoyeur</p>
								</div>
							</div>
							<div class="liste" style="overflow-y: auto;min-height: 100px;">
								<div class="messageRecepteur">
									<p>Message recepteur</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="asinaAzy" class="asinaAzy">
					
				</div>
			</div>

			<div id="Groupe" class="tabcontent" style="display: none;">

						<div style="margin-bottom:10px;width: 520px;" align="center">
							<div class="form-group">
							  <input type="text" id="rechercheGp" name="recherche" placeholder="Rechercher..."  class='form-control' style='width:150px;height:30px;'>
							</div>
						</div>
					<div class="kely" style="overflow-x:auto; max-width: 520px;">
						<p id="recherchevide1"></p>
						<div class="d-flex " id="listeGroupe">
							
						</div>
			 		</div><br>
			 		<div class="kely" style="overflow-x:auto; max-width: 520px;">
						<p id="recherchevide2"></p>
						<div class="d-flex " id="listeGroupeSuggere">
							
						  <!-- <div class="p-2 groupeAnarana" >
						  	<p>Anarana groupe</p>
						   </div>-->
						  
						</div>
			 		</div><br>
			  <div class="kely">
			  	<div class="row">
			  		<div class="col">
			  			<button class="button0" type="button" data-toggle="modal" data-target="#modalCreerGroupe">Creer groupe</button>
			  		</div>
			  		<div class="col">
			  			<button class="button0" type="button" data-toggle="modal" data-target="#modalPublier">Publier groupe</button>
			  		</div>
			  	</div>
			  </div><br>

			  <div class="lehibe">
				<div class="loha">
					<div class="row">
						<div class="col-8">
								<img src="././assets/image/001.jpg" class="minipro">
								Vitsika manao Hackathon
						</div>
						<div class="col-1" align="left"></div>
						<div class="col-3" style="font-size: 13px;" align="right">anarana groupe</div>
					</div>
					<div>
						<p>Ato ny legende no atao</p>
					</div>
				</div>
				<div class="vatany">
					<img src="././assets/image/team vitsika.jpg" class="sary">
				</div>
				<div class="tongony" align="center">
					<div class="row">
						<div class="col">
						</div>
						<div class="col">Commentaire</div>
						<div class="col">Partage</div>
					</div>
				</div>
			  </div>
			  <div id="actu2">
			  	
			  </div>


			</div>
			<!-- Farany groupe -->
				<!--Fanombohan ny Setting -->

			<div id="setting" class="tabcontent" style="display: none;">
				<div class="kelySetting" id="fenoinaNyAnarana">
					<!--<div class="row">
						<div class="col-8">
								<img src="././assets/image/001.jpg" class="minipro">
								Vitsika manao Hackathon
						</div>
						<div class="col-4" align="left"></div>
					</div>-->
			  </div><br>
			  <div class="lehibe2">
			  	<div align="center">
			  		<p><b>Infos sur l'utilisateur</b></p>
			  	</div>
			  	<div style="padding-bottom: 10px;" id="fenoina" class="fenoina">
			  		<!--<p>Matricule : 3874</p>
			  		<p>Date naissance : 22/10/1999</p>
			  		<p>téléphone : 03400000000</p>
			  		<p>Classe : DA2IL3</p>-->
			  	</div>
	  			<button class="button0" type="button">Modifier profil</button><br><br><br>
	  			<button class="button0" id="modifmdp" type="button" data-toggle="modal" data-target="#modalPassword">Modifier mot de passe</button>
			  </div><br>

			  <div class="lehibe1">
			  	<div align="center">
			  		<p><b>Les photos partages par l'Utilisateur</b></p>
			  	</div>
			  	<div>
				  	<div class="row">
						  <div class="col saryOlona"  align="center">
						  	<img src="././assets/image/001.jpg"  style="width:100px;height:100px;">
						  </div>
						  <div class="col saryOlona"  align="center">
						  	<img src="././assets/image/001.jpg"  style="width:100px;height:100px;">
						  </div>
						  <div class="col saryOlona"  align="center">
						  	<img src="././assets/image/001.jpg"  style="width:100px;height:100px;">
						  </div>
						</div><br>
						<div class="row">
						  <div class="col saryOlona"  align="center">
						  	<img src="././assets/image/001.jpg"  style="width:100px;height:100px;">
						  </div>
						  <div class="col saryOlona" align="center">
						  	<img src="././assets/image/001.jpg"  style="width:100px;height:100px;">
						  </div>
						  <div class="col saryOlona"  align="center">
						  	<img src="././assets/image/001.jpg"  style="width:100px;height:100px;">
						  </div>
						</div>
					</div>
			  </div><br>
			  <div class="lehibe">
			  	<div class="" style="overflow-y: auto;min-height: 100px;">
			  		<div>
			  			<p>Mode nocturne</p>
			  		</div>
					</div>
					<div class="" style="overflow-y: auto;min-height: 100px;">
			  		<div>
			  			<p>Languages</p>
			  		</div>
					</div>
					<div class="" style="overflow-y: auto;min-height: 100px;">
			  		<div>
			  			<p>Apropos de l'application</p>
			  		</div>
					</div>
					<div class="" style="overflow-y: auto;min-height: 100px;">
			  		<button class="btn btn-danger" onclick="deconnexion()"><img src="././assets/image/logOut.png">Déconexion</button>
					</div>
			  </div>
			</div>

			<!--farany setting-->
		</div>
		<!-- MAIN END -->
	</div>
	

	<!-- Modals Modif mot de passe -->
    	<!-- The Modal -->
  <div class="modal fade" id="modalPassword">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modification mots de passe</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
				<div style="margin-top: 10px;">
					<form method="POST"  name="form1" id="form1" enctype="">
						<div class="form-group">
						  <!--<label for="usr">Name:</label>-->
						  <input type="text" class="form-control" placeholder="Ancien mots de passe">
						</div>
						<div class="form-group">
						  <!--<label for="usr">Name:</label>-->
						  <input type="text" class="form-control" placeholder="Nouveau mots de passe">
						</div>
						<div class="form-group">
						  <!--<label for="usr">Name:</label>-->
						  <input type="text" class="form-control" placeholder="Confirmation mots de passe">
						</div>
					</form>
				</div>
			</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		  <button type="button" id="" class="btn btn-info" data-dismiss="modal">Modifer</button>  		
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
        
      </div>
    </div>
  </div>

    <!--Fin modal -->

    <!-- Modals Steeve -->
    	<!-- The Modal -->
  <div class="modal fade" id="modalPublier">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Publication</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
				<div>
					<input type="text" id="legend_pub" class="form-control" placeholder="Ecrire une légende...">
				</div>
				<div style="margin-top: 10px; ">
					<textarea style="resize:none; height: 100px;" id="contenu_pub" class="form-control"  placeholder="Contenu pub..."></textarea>
				</div>

				<div style="margin-top: 10px;">
					<div class="row">
						<div class="col-6">
							<form method="POST"  name="form1" id="form1" enctype="multipart/form-data">
								<input type="file" id="media" name="media" accept="image/png, image/jpeg" style="font-size: 12px; display: none;" class="fileToUpload" required>
								<label for="media" class="btn btn-light" id="name_profile" style="width: 150px;">Ajouter une photo</label>

							</form>
							<form method="POST"  name="form1" id="form2" enctype="multipart/form-data">
								<input type="file" id="media2" name="media" accept="video/mp4" style="font-size: 12px; display: none;" class="fileToUpload" required>
								<label for="media2" class="btn btn-light" id="name_profile2" style="width: 150px;">Ajouter une video</label>

							</form>
							<form method="POST"  name="form3" id="form3" enctype="multipart/form-data">
								<input type="file" id="media3" name="media3" accept="application/pdf" style="font-size: 12px; display: none;" class="fileToUpload" required>
								<label for="media3" class="btn btn-light" id="name_profile3" style="width: 150px;">Ajouter un document</label>

							</form>
						</div>
						<div class="col-6">
							<div id="minigroupee">
								
							</div>
						</div>
					</div>
				</div>
			</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		  <button type="button" id="btnPartager" class="btn btn-info" data-dismiss="modal">Partager</button>  		
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
        
      </div>
    </div>
  </div>

    <!--Fin modal -->
    <!-- The Modal pour créer une groupe -->
  <div class="modal fade" id="modalCreerGroupe">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Création d'un groupe</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<div style="margin-top:10px;" ><input id="nom_groupe" style="" type="text" class="form-control" placeholder="Nommer le groupe" id="nom_groupe"></div>
            <div style="margin-top:10px;"><textarea id="desc_groupe" style="resize:none; height: 100px;" class="form-control" placeholder="Dire des intérêts du groupe"></textarea></div>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		
		  <button id="btnCreerGroupe" class="btn btn-info">Créer</button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
			<!-- MODALS END-->

			<!-- MODALS -->


			<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
			<!-- MODALS END-->

	<script>
		// $(document).ready(function(){
		// 	alert('<?php echo $this->session->userdata('nom_util') ?>');
		// });
		var inter = 100000000;
		

		const list = document.querySelectorAll('.liste1');
		function activeLink() {
			list.forEach((item)=>
			item.classList.remove('active'));
			this.classList.add('active');
		}
		list.forEach((item)=>
		item.addEventListener('click',activeLink));
	</script>


	<script>
		function openPage(pageName,elmnt,color) {
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
		    tabcontent[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablink");
		  for (i = 0; i < tablinks.length; i++) {
		    tablinks[i].style.backgroundColor = "";
		  }
		  document.getElementById(pageName).style.display = "block";
		  elmnt.style.backgroundColor = color;
		}

// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();
	</script>

	<script>

		var id_session = <?php echo $this->session->userdata('id_util') ?>;


		// if(document.getElementById("id_session").value != ""){
		// 	id_session = document.getElementById("id_session").value;
		// }
		
		var id_recep;

			function listDisc() {


		         $.ajax({
		            url: "MessageController/showdisc?id_session="+id_session,
		            method:"POST",

		            success:function(data)
		            {
		            	ob = JSON.parse(data);

						var isany = ob.posts.length;
						output = "";
						output=output+"<div align='center'>"
															+"<p>Liste discussions</p>"
														+"</div>"
														+"<div class='row'>"
															+"<div class='col-6'>"
															+"</div>"
															+"<div class='col-3'>"
																+"<div class='form-group' align='left'>"
																  +"<input type='text' class='form-control'id='rechercheMessage' style='width:140px;height:30px;' placeholder='Recherche'>"
																+"</div>"
															+"</div>"
															+"<div class='col-3'>"
																+"<div class='form-group' align='right'>"
																	  +"<button class='btnReaction' id='btnRechercheMessage' style='width:80px;height:30px;'>recherche</button>"
																	+"</div>"
															+"</div>"
														+"</div>";
						output=output+"<p id='recherchediscvide'></p><div id='listeDisc'  style=' overflow-y:auto; max-height : 360px;'> ";
						for (var i = 0; i < isany; i++) {
						try{
							output = output+
							"<div class='liste' onclick='messageDe("+ob.posts[i].envoyeur+","+id_session+",\""+ob.posts[i].nom_util+"\",\""+ob.posts[i].prenom_util+"\");' id='"+ob.posts[i].envoyeur+"'>"+ob.posts[i].envoyeur+" - "+ob.posts[i].prenom_util+" "+ob.posts[i].nom_util+"</div>";
							//ob.posts[i].title
							//output += "<div class='btn btn-primary'>hello</div>";
						}catch(e){
							alert(e);

						}

						}
						output=output+"</div>";
						output=output+"<Script> $('#btnRechercheMessage').on('click',function(){"
	        	//alert(123);

	         			+"var value = $('#rechercheMessage').val().toLowerCase();"
				    	+" $('#listeDisc *').filter(function() {"
				     	
				    	+"$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);"

				    	+"if(!$('#listeDisc *').is(':visible')){"
				      		+"$('#recherchediscvide').html('Aucun résultat n a été trouvé!');"
						+"}"
				     	+"else{"
				     		+"$('#recherchediscvide').html('');"
				     	+"}"
				  + " });});";

						$('#mesazy').html(output);
		            }
		        });
	        }
	        listDisc();


	       //  $('#btnRechercheMessage').on('click',function(){
	       //  	//alert(123);

	       //   		var value = $('#RechercheMessage').val().toLowerCase();
				    //  $('#listeDisc ').filter(function() {
				     	
				    // 	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

				    // 	if(!$(this).is(':visible')){
				    //   		$('#recherchedisc').html('Aucun résultat n\'a été trouvé!')
				    //         //alert("oups")
				    //  }
				    //  	else{
				    //  		$('#recherchedisc').html('');
				    //  	}
				    // });


	       //  })
	       function nouveauMessage() {
	       		id_envoyeur = document.getElementById("iresahana").value;
	       		prenom_util = document.getElementById("prenomiresahana").value;
	       		nom_util = document.getElementById("nomiresahana").value;
	       		$.ajax({
		            url: "MessageController/getmessage?id_envoyeur="+id_envoyeur+"&id_session="+id_session,
		            method:"GET",
		            success:function(data)
		            {
		            	id_recep = id_envoyeur;

		            	ob = JSON.parse(data);
						var isany = ob.posts.length;
						output = "";
						output = output
															+"<div class='divImage' >"
																	+"<img src='././assets/image/001.jpg' class='minipro'>"
																	+prenom_util+" "+nom_util
															+"</div>"
						+" <div style=' overflow-y:auto; max-height : 360px;'  id='messcr'>";
						for (var i = 0; i < isany; i++) {
						try{
							if(ob.posts[i].id_util_envoyeur == id_session){
								output = output+
								"<div class='liste1'  style='min-height : 100px;' >"
									+"<div class='messageRecepteur' style='overflow-y:auto;'><p>"
										+ob.posts[i].contenue
									+"</p></div>"
								+"</div>";
							}else{
								output = output+
								"<div class='liste1'  style='min-height : 100px;' >"
									+"<div class='messageEnvoyeur'  style='overflow-y:auto;'><p>"
										+ob.posts[i].contenue
									+"</p></div>"
								+"</div>";
							}
							//ob.posts[i].title
							//output += "<div class='btn btn-primary'>hello</div>";
						}catch(e){
							alert(e);
						}

						}
						output+=" </div>";
						$('#mesazy').html(output);
						var myDiv = document.getElementById("messcr");
    					myDiv.scrollTop = myDiv.scrollHeight;
		            }
		        });
	       }





	        function messageDe(id_envoyeur, id_session, nom_util, prenom_util) {
	        	document.getElementById("iresahana").value = id_envoyeur;
	        	document.getElementById("nomiresahana").value = nom_util;
	        	document.getElementById("prenomiresahana").value = prenom_util;
	        	var myInterval = setInterval(thread2,4000);

	        	$('#asinaAzy').html(envoieMessage());

		         $.ajax({
		            url: "MessageController/getmessage?id_envoyeur="+id_envoyeur+"&id_session="+id_session,
		            method:"GET",


		            success:function(data)
		            {
		            	id_recep = id_envoyeur;

		            	ob = JSON.parse(data);
						var isany = ob.posts.length;
						output = "";
						output = output+"<div class='divImage' >"
											+"<img src='././assets/image/001.jpg' class='minipro'>"
											+prenom_util+" "+nom_util
										+"</div>"
						+" <div style=' overflow-y:auto; max-height : 360px;'  id='messcr'>";
						for (var i = 0; i < isany; i++) {
						try{
							if(ob.posts[i].id_util_envoyeur == id_session){
								output = output+
								"<div class='liste1'  style='min-height : 100px;' >"
									+"<div class='messageRecepteur' style='overflow-y:auto;'><p>"
										+ob.posts[i].contenue
									+"</p></div>"
								+"</div>";
							}else{
								output = output+
								"<div class='liste1'  style='min-height : 100px;' >"
									+"<div class='messageEnvoyeur'  style='overflow-y:auto;'><p>"
										+ob.posts[i].contenue
									+"</p></div>"
								+"</div>";
							}
							//ob.posts[i].title
							//output += "<div class='btn btn-primary'>hello</div>";
						}catch(e){
							alert(e);

						}

						}
						output+=" </div>";
						$('#mesazy').html(output);
						var myDiv = document.getElementById("messcr");
    					myDiv.scrollTop = myDiv.scrollHeight;
		            }
		        });


		    }

		    function envoieMessage()
		    {
		    	output = "";
		    	output=output+"<div class='kely'>"
									+"<div style='max-height: 50px;'>"
											+"<input type='hidden' name='id_session' id='id_session' value='<?php echo $this->session->userdata('id_util') ?>'>"
											+"<input type='hidden' id='id_session2' value='1'>"
											+"<button id='retouro' class='btnVoalohany'>Retour</button>"
											+"<textarea class='message'></textarea>"
										+"<button id='btn_envoyer' class='btnVoalohany'>Send</button>"
									+"</div>"
								+"</div>";

					output+="<script>"
					+"$(function() { "
					+	"	window.emojiPicker = new EmojiPicker({ "
					+"		  emojiable_selector: '[data-emojiable=true]',"
					+"		  assetsPath: '<?php echo base_url() ?>/assets/emojilib/img/',"
					+"		  popupButtonClasses: 'fa fa-smile-o' "
					+"		}); "
					+"		window.emojiPicker.discover(); "
					+"	});"
					+" $('#btn_envoyer').click(function(){"
			        	+"$.ajax({"
			        		+"type : 'ajax',"
			        		+"method : 'post',"
			        		+"url : 'MessageController/envoyerMessage',"
			        		+"data : {"
			        			+"id_envoyeur : id_session,"
			        			+"id_recepteur : id_recep,"
			        			+"contenu : $('.message').val()"
			        		+"},"
			        		
			        		+"success : function(data){"
			        			+"messageDe(id_recep, id_session);"
			        			
			        		+"},"
			        		+"error : function(data){"
			        		+"}"
			        	+"});"
			        +"});"
			        +" $('#retouro').click(function(){"
	        	+"listDisc();"
	        	+"clearInterval(myinterval);"
	        +"});"
	        		+"" ;
								return output;
		    }

	        $("#btn_envoyer").click(function(){
	        	$.ajax({
	        		type : 'ajax',
	        		method : 'post',
	        		url : 'MessageController/envoyerMessage',
	        		data : {
	        			id_envoyeur : id_session,
	        			id_recepteur : id_recep,
	        			contenu : $(".message").val()
	        		},
	        		
	        		success : function(data){
	        			messageDe(id_recep, id_session);
	        			
	        		},
	        		error : function(data){
	        		}
	        	});
	        });




	        $("#afficheplus").click(function(){

	        	//const list1 = document.querySelectorAll('.reacpub');

				list1 = document.getElementsByClassName('reacpub');
				//alert(list1[0].value);
				var alefa = 'PublicationController/home?';
				alefa += 'id_session='+id_session;
				alefa += '&lastindex='+list1.length;

				for (var i = 0; i < list1.length; i++) {
					alefa += '&id'+i+'='+list1[i].value;
				}
	        	$.ajax({
	        		
	        		url : alefa,
	        		method : 'get',
	        		
	        		success : function(data){
	        			$('#actu').append(data);
	        		},
	        		error : function(data){
	        		}
	        	});
	        });




	        $("#btn_setuser").click(function(){
	        	id_session = document.getElementById("id_session").value;
	        	listDisc();
	        	alert("mety ve ny ato?");
	        	$('#asinaAzy').html(envoieMessage());
	        });

	       

	        $("#btn_setuser").click(function(){
	        	id_session = document.getElementById("id_session").value;
	        	listDisc();
	        	$('#asinaAzy').html(envoieMessage());
	        });

			$("#btnPartager").click(function(){

				publier();

			});
            //modif mdp parametre
			$("#modifmdp").click(function(){
				
				$.ajax({
		            url: "UtlisateurController/modifMdp?&id_session="+id_session+"&mdp_util="+mdp_util,
		            method:"GET",

		            success:function(data)
		            {

		            	alert(data);
		            }
		        });
               

               });

			function actualite() {
		         $.ajax({
		            url: "PublicationController/home?&id_session="+id_session,
		            method:"GET",

		            success:function(data)
		            {

		            	$('#actu').html(data);
		            }
		        });

		    }

		    /*function actualitepriv() {
		         $.ajax({
		            url: "PublicationController/home2?&id_session="+id_session,
		            method:"GET",

		            success:function(data)
		            {

		            	$('#actu2').html(data);
		            }
		        });
		    }*/

		    function setindex() {
		    	$.ajax({
		            url: "PublicationController/getindex?&id_session="+id_session,
		            method:"GET",

		            success:function(data)
		            {
		            	document.getElementById("lastindex").value = data;
		            }
		        });
		    }
		    actualite();
		    //actualitepriv();

			function publier(){
				var fd = new FormData();
				var file = $("#media")[0].files[0];
				var file2 = $("#media2")[0].files[0];
				var file3 = $("#media3")[0].files[0];
				fd.append("media",file);
				fd.append("media2",file2);
				fd.append("media3",file2);
				fd.append('legend_pub', document.getElementById("legend_pub").value);
				fd.append("contenu_pub", document.getElementById("contenu_pub").value);
				fd.append("id_util", id_session);
				fd.append("id_groupe", document.getElementById("ggroupe").value);


				$.ajax({
		            url: "PublicationController/publier",
		            method:"POST",
		            data: fd,
		            contentType: false,
	            	processData: false,

		            success:function(data)
		            {
		            	Swal.fire(
							  ''
							  ,
							  'Votre publication a été partagée!',
							  'success'
	
							)
		            },
		            error:function(data){
		            	alert(data);		            
		            }
		        });

			}

			$(document).on('click', '.jaime', function(){
		        var id = $(this).attr("id");

		        $.ajax({
		            url: "ReagirController/jaime?id_util="+id_session+"&id_pub="+document.getElementById("reac"+id).value,
		            method:"GET",

		            success:function(data)
		            {
		            	if(data == "added"){
		            		$("#"+id).addClass("active");
		            		ka = document.getElementById("count"+id).textContent;
		            		document.getElementById("count"+id).textContent= (Number(ka)+1);
		            	}else{
		            		$("#"+id).removeClass("active");
		            		ka = document.getElementById("count"+id).textContent;
		            		document.getElementById("count"+id).textContent= (Number(ka)-1);
		            	}
		            },
		            error:function(data){
		            	alert(data);		            
		            }
		        });

		    });

		    $(document).on('click', '.supp', function(){
		        var id = $(this).attr("id");
		        //alert(document.getElementById(id+"p").value);
		          const swalWithBootstrapButtons = Swal.mixin({
                          customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                          },
                          buttonsStyling: false
                        })

                        swalWithBootstrapButtons.fire({
                          title: 'Suppression',
                          text: "Voulez-vous vraiment supprimer cette publication?",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonText: 'Accepter',
                          cancelButtonText: 'Annuler',
                          reverseButtons: true
                        }).then((result) => {
                          if (result.value) {
                          	$.ajax({
						            url: "PublicationController/Supprimer?id_pub="+document.getElementById(id+"p").value,
						            method:"GET",

						            success:function(data)
						            {
						            	swalWithBootstrapButtons.fire(
				                              'Publication supprimée!',
				                              '',
				                              'success'
				                            )
						            	
						            },
						            error:function(data){
						            	alert(data);		            
						            }
						        });

						    };
                    })
                });
                            
                          

		        
		
	</script>

	<!-- Script reaction -->
	<script>
	let reaction = document.querySelector('.btnReaction');
	reaction.onclick = function() {
			navigation.classList.toggle('active');
	}
	function reagir() {
		if($('#reaction').attr('class') == "btnReaction")
		{
			alert("mitovy");
		}else{
			alert("tsy mitovy");
		}
	}
	</script>

	<!-- Script pour le menu groupe -->
	<script>
		$("#btnCreerGroupe").click(function(){
                    creerGroupe();
					affichageGroupe();
					affichageGroupeSuggerer();
					

                })
                var session = 1;
                function creerGroupe(){
                    $.ajax({
                        url : "GroupeController/creerGroupe",
                        method:"POST",
                        data : {
                                    nom_groupe : $("#nom_groupe").val(),
                                    desc_groupe : $("#desc_groupe").val(),
                                    id_admin : id_session

                                },
                        success : function (result)
                        {   
                            $("#nom_groupe").val("");
                            $("#desc_groupe").val("");
                        	alert("creation ok");
                        

                        },
                        error: function(result){
                            alert(result);
                        }    


                    });


                }
                 function affichageGroupe(){
                    $.ajax({
                        url:"GroupeController/afficherGroupes",
                        method:"POST",
                        data : {
                        	session : id_session
                        } ,
                        success: function(data){
                            $("#listeGroupe").html(data);
                        }
                        


                    })


                 }
                 function affichageGroupeSuggerer(){
                    $.ajax({
                        url:"GroupeController/afficherGroupeSuggere",
                        method:"POST",
                        data : {
                        	session : id_session
                        } ,
                        success: function(data){
                            $("#listeGroupeSuggere").html(data);
                        }
                        


                    })


                 }

				affichageGroupe();
				affichageGroupeSuggerer();

				function entrerGroupe(id_groupe){
                // alert("groupe "+id_groupe)
                // alert("id_session "+id_session);
               		 Swal.fire({
                          title: 'Intégrer au groupe',
                          text: "Voulez-vous devenir un membre du groupe?",
                          type: 'info',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Accepter',
                          cancelButtonText : 'Annuler'
                        }).then((result) => {
                          if (result.value) {

                            
                           

                            $.ajax({
                                url : "GroupeController/entrerGroupe",
                                method:"POST",
                                data : {

                                        id_util : id_session,
                                        id_groupe : id_groupe 
                                    },
                                success: function(){
                                   // alert("ok");
                                   affichageGroupe();
                                   
                                    Swal.fire(
                                      'Bienvenue!',
                                      'Vous êtes un nouveau membre!',
                                      'success'
                                    )
                                    affichageGroupeSuggerer();
                                },

                                error: function(data){
                                    alert(data);
                                }    


                })

                          }
                        })


                
              }   



			$("#rechercheGp").on("keyup", function() {
				//alert("123");
			     var value = $(this).val().toLowerCase();
			     $("#listeGroupe button").filter(function() {
			     	
			    	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    	if(!$("#listeGroupe button").is(':visible')){
				      $("#recherchevide1").html("Aucun résultat n'a été trouvé!")
				            //alert("oups")
				      
				      }
				      else{
				      	$("#recherchevide1").html("")
				      }
			    });

			     $("#listeGroupeSuggere button").filter(function() {
			    	 
			    	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    	if(!$("#listeGroupeSuggere button").is(':visible')){
				      $("#recherchevide2").html("Aucun résultat n'a été trouvé!")
				            //alert("oups")
				      
				      }
				      else{
				      	$("#recherchevide2").html("")
				      }
			    });

 	})

 	
			


	</script>	


<script>
	
		function thread(){
		 //messageDe(id_recep,id_session);
		 actujaime();
	 }
	 
	setInterval(thread,4000);

	
	
		function thread2(){
		 	nouveauMessage();

		}
			function deconnexion(){
                    const swalWithBootstrapButtons = Swal.mixin({
                          customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                          },
                          buttonsStyling: false
                        })

                        swalWithBootstrapButtons.fire({
                          title: 'Déconnexion?',
                          text: "Voulez-vous vraiment déconnecter?",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonText: 'Confirmer',
                          cancelButtonText: 'Annuler',
                          reverseButtons: true
                        }).then((result) => {
                          if (result.value) {

                            
                                    
                                     document.location = "<?php echo base_url() ;?>/LoginController/logOut";   
                                }                   
                                

                        
                       
                        })
                } 
	//clearInterval(myInterval);

	//Information sur L'utilisateur

	function listUtilisateur() 
	{
	   $.ajax({
	      url: "UtilisateurController/afficheUtil?id_session="+id_session,
	      method:"POST",

	      success:function(data)
	      {
	      	ob = JSON.parse(data);

		output = "";
		output = output+"<p>Matricule : "+ob.posts[0].id_util+"</p>"
							  		+"<p>Date naissance : "+ob.posts[0].datenaiss_util+"</p>"
							  		+"<p>téléphone : "+ob.posts[0].phone_util+"</p>"
							  		+"<p>Classe : DA2IL3</p>";

		$('#fenoina').html(output);
	      }
	  });
	}
	listUtilisateur();

	function nomUtilisateur() 
	{
	   $.ajax({
	      url: "UtilisateurController/afficheUtil?id_session="+id_session,
	      method:"POST",

	      success:function(data)
	      {
	      	ob = JSON.parse(data);

		output = "";
		output = output+"<div class='row'>"
						+"<div class='col-8'>"
								+"<img src='././assets/image/utilisateur/"+ob.posts[0].img_util+"' class='minipro'>"
								+""+ob.posts[0].nom_util+" "+ob.posts[0].prenom_util+""
						+"</div>"
						+"<div class='col-4' align='left'></div>"
					+"</div>";

		$('#fenoinaNyAnarana').html(output);
	      }
	  });
	}
	nomUtilisateur();

	function minigroupe() {
	        	$.ajax({
		            url: "GroupeController/minigroupe?id_session="+id_session,
		            method:"GET",

		            success:function(data)
		            {
						$('#minigroupee').html(data);
		            }
		        });
	}
	minigroupe();

</script>
	
</body>
</html>