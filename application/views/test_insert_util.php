<!DOCTYPE html>
<html>
<head>
	<title>Test insertion</title>
	<meta charset="utf-8">
	<script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
</head>
<body>
	
	<form method="post">
		<!-- <input type="file" id="img" name="img" accept="image/png, image/jpeg" style="font-size: 12px;" class="fileToUpload" required><br> -->
		<input type="text" name="id_util" placeholder="numero matricule" id="id_util"><br>
		<input type="text" name="nom_util" placeholder="nom " id="nom_util"><br>
		<input type="text" name="prenom_util"placeholder="prénom" id="prenom_util"><br>
		<input type="date" name="datenaiss_util" placeholder="date de naissance" id="datenaiss_util"><br>
		<input type="text" name="sexe_util" placeholder="sexe" id="sexe_util"><br>
		<input type="text" name="phone_util" placeholder="Numero telephone" id="phone_util"><br>
		<input type="mail" name="mail_util" placeholder="email" id="mail_util"><br>
		<input type="password" name="mdp_util" placeholder="numero de telephone" id="mdp_util"><br>
		<input type="button" value="Enregistrer" id="btnEnreg">
	</form>
</body>
<script type="text/javascript">
	// function insererUtil(){
		$("#btnEnreg").click(function(){
			var id_util = $("#id_util").val();
			var nom_util = $("#nom_util").val();
			var prenom_util = $("#prenom_util").val();
			var datenaiss_util = $("#datenaiss_util").val();
			var sexe_util = $("#sexe_util").val();
			var phone_util = $("#phone_util").val();
			var mail_util = $("#mail_util").val();
			var mdp_util = $("#mdp_util").val();
			$.ajax({
				type : 'ajax',
				url : 'UtilisateurController/insererUtilisateur',
				method : 'post',
				data : {
					id_util : id_util,
					nom_util : nom_util,
					prenom_util : prenom_util,
					datenaiss_util : datenaiss_util,
					sexe_util : sexe_util,
					phone_util : phone_util,
					mail_util : mail_util,
					mdp_util : mdp_util
				},
				success : function(data){
					document.location = "UtilisateurController/loadImageInsert?id_util="+id_util;
				}
			});		
		});
	// }

		
	

	

			function publier(){
				var form = $("#myForm")[0];
				var fd = new FormData(form);
				// var file = $("#img")[0].files[0];
				
				// fd.append("img",file);
				// fd.append('id_util', document.getElementById("id_util").value);
				// fd.append("nom_util", document.getElementById("nom_util").value);
				// fd.append("prenom_util", document.getElementById("prenom_util").value);
				// fd.append("datenaiss_util", document.getElementById("datenaiss_util").value);
				// fd.append("sexe_util", document.getElementById("sexe_util").value);
				// fd.append("phone_util", document.getElementById("phone_util").value);
				// fd.append("mail_util", document.getElementById("mail_util").value);
				// fd.append("mdp_util", document.getElementById("mdp_util").value);
				
				// alert(file);
				$.ajax({
		            url: "UtilisateurController/insererUtilisateur",
		            method:"POST",
		            enctype : "multipart/form-data",
		            
		            data: {
		            	// img : file,
		            	data : fd
		            },
		            contentType: false,
	            	processData: false,

		            success:function(data)
		            {
		            	alert("dlksjf");
		            	alert(data);
		            },
		            error:function(data){
		            	alert("erreur");		            
		            }
		        });

		    }
</script>

</html>