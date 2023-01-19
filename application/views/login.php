<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-FANDRAY</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/styleAmbany.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/styletabs.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min-1.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">


	
	<script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
</head>
<body>

	<div class="all">

	<!-- BACKGROUND START -->
	<div class="back">
	</div>
	<!-- BACKGROUND END -->

	<!-- MENU END -->


	<!-- MAIN START -->
		<div class="anatinyLogin">
			<div id="Home" style="display: block; overflow: hidden;" class="home">
				<img src="././assets/image/login head.png" style="width: 250px; position: absolute; right: 40px;
				z-index: 1000; transform: translate(0px , -80px);">
			  <div class="lehibelog">
				<div class="row">
					<div class="col-6 imlog">
						<img src="././assets/image/login.png" class="imlog" style="border-radius: 15px;width: 122%; position: absolute; 
						left: -7px; top: -22px; margin-top: -19px; margin-left: -40px; z-index: 1000000;
						">
					</div>
					<div class="col-6" align="center">

						<div id="formContent">
							
						</div>
						<hr>
						<div align='center'>
							<a class='soratra' id='forgot' style="color:white;">mot de passe oublié?</a><br>
							<a class='soratra' id='compte'  style="color:white;">Creér compte</a><br>
							<a class='soratra' id='retour'  style="color:white;">Retour</a>
						</div>
					</div>
				</div>
			  </div>
			</div>
		</div>
		<!-- MAIN END -->
	</div>

	<script>
		<?php if($this->uri->segment(4)=='insererPdp'){ ?>
			alert("réussi");
		<?php } ?>
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

		// Pour le login
		
		var playSound = (function beep() {
			var snd = new Audio("././assets/audio/not.mp3");
			return function(){
				snd.play();
			}
			snd.play();
		})();
		playSound();

			// $("#btn_login").click(function(){
				
				
			// 	var phone_util = $("#phone_util").val();
			// 	var mdp_util = $("#mdp_util").val();
			// 	$.ajax({
			// 		type : 'ajax',
			// 		method : 'post',
			// 		url : 'LoginController/login',
			// 		data : {
			// 			phone_util : phone_util,
			// 			mdp_util : mdp_util
			// 		},
			// 		datatype : JSON,
			// 		async : false,
			// 		success : function(data){
			// 			alert(data);
			// 			//les valeurs de "data" => "incorrect" si mot de passe incorrect , "inexistant" si l'utilisateur n'existe pas , 
			// 			// 								"valide" si validé
			// 		},
			// 		error : function(){
			// 			alert("Pas OK");
			// 		}
			// 	});	
			// });
		// Fin pour le login
	</script>
	<script>
		<?php if($this->input->get('act')!= null){ ?>
			Swal.fire(
				  'Félicitations',
				  'Inscription réussite',
				  'success'
				);
		<?php } ?>
		$(document).ready(function(){
		    load_data();

		    $("#retour").click(function(){
		    	load_data();
		    });

		    $('#compte').click(function(){
                load_data1();
            });

		    //load login
		    function load_data()
		    {
		        $.ajax({
		            url:'LoginController/login1',
		            method:"POST",
		            success:function(donne)
		            {
		                $('#formContent').html(donne);
		            }
		        });
		    }

		    //load creer compte
		    function load_data1()
		    {
		        $.ajax({
		            url:'LoginController/login2',
		            method:"POST",
		            success:function(donne)
		            {
		                $('#formContent').html(donne);
		            }
		        });
		    }

		    function loadInsertImage(){
		    	$.ajax({
		            url:'LoginController/login3',
		            method:"POST",
		            success:function(donne)
		            {
		                $('#formContent').html(donne);
		            }
		        });
		    }

		    
	    });
	</script>
</body>
</html>