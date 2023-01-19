<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		
	}
	//load view

	public function index(){
		$this->load->view("login");
	}

	public function login(){
		$phone_util = $this->input->post('phone_util');
		$mdp_util = $this->input->post('mdp_util');
		$this->load->model('UtilisateurModel');
		$util_check = $this->UtilisateurModel->verifierSiExiste($phone_util);
		if(count($util_check)>0){
			$util_info = $this->UtilisateurModel->verifierUtil($phone_util,$mdp_util);
			
			if(count($util_info)>0){
				$this->session->set_userdata('id_util',$util_info[0]->id_util);
				$this->session->set_userdata('nom_util',$util_info[0]->nom_util);
				echo json_encode("valide");
			} else {
				echo json_encode("incorrect");
			}
		} else {
			echo json_encode("inexistant");
		}
	}

	public function login1(){
		$soratra ="";
		$soratra=$soratra."
		<form style='padding-top:20px;'>
		<div style='overflow-y: auto; min-height: 220px;'>
			<div class='form-group'>
			  <label for='phone_util' class='soratra'>Téléphone:</label>
			  <input type='text' class='form-control' id='phone_util'>
			</div>
			<div class='form-group'>
			  <label for='mdp_util' class='soratra'>Mot de passe:</label>
			  <input type='password' class='form-control' id='mdp_util'>
			</div>
			<div align='center'>
				<button type='button' class='btn btn-outline-light' id='btn_login'>Connexion</button>
			</div>
		</div>
		</form>
		<script>
			$('#phone_util').keyup(function(){
				var phone = $(this).val();
				if(isNaN(phone.charAt(phone.length-1))){
					var str = $(this).val();
					$(this).val(str.replace(str.charAt(str.length-1),''));
				}
			});

			$('#phone_util').change(function(){
				if(isNaN($(this).val()) || $(this).val().length!=10){
					$(this).val('');
					Swal.fire({
					  	type: 'error',
					  	title: 'Oops...',
					  	text: 'Numero invalide',
					})
				}
			});

			$('#btn_login').click(function(){
				var phone_util = $('#phone_util').val();
				var mdp_util = $('#mdp_util').val();
				if(phone_util=='' || mdp_util == ''){
					Swal.fire({
					  	type: 'error',
					  	title: 'Oops...',
					  	text: 'Veuillez remplir tous les champs',
					})
				}else {
					$.ajax({
						type : 'ajax',
						method : 'post',
						url : 'LoginController/login',
						data : {
							phone_util : phone_util,
							mdp_util : mdp_util
						},
						datatype : JSON,
						async : false,
						success : function(data){
							// alert(data);
							//les valeurs de 'data' => 'incorrect' si mot de passe incorrect , 'inexistant'  si l'utilisateur n'existe pas , 
							// 								'valide' si validé
							var obj = jQuery.parseJSON(data);
							if(obj==='valide'){
								document.location = 'Welcome';
							}
							if(obj==='incorrect'){
								Swal.fire({
								  type: 'error',
								  title: 'Oops...',
								  text: 'Mot de passe incorrect!',
								  // footer: '<a href=''>Why do I have this issue?</a>'
								})
							}
							if(obj==='inexistant'){
								Swal.fire({
								  type: 'error',
								  title: 'Oops...',
								  text: 'Utilisateur inexistant',
								  footer: '<div onclick=\'load_data1()\' style=\'cursor:pointer\'><u>S\'inscrire<u></div>'
								})
							}
						},
						error : function(){
							alert('Pas OK');
						}
					});	
				}
			});

			function load_data1()
		    {
		    	Swal.close();
		        $.ajax({
		            url:'LoginController/login2',
		            method:'POST',
		            success:function(donne)
		            {
		                $('#formContent').html(donne);
		            }
		        });
		    }
		</script>";
		echo $soratra;
	}

	public function login2(){
		$soratra ="";
		$soratra=$soratra."
		<form>
		<div style='overflow-y: auto; max-height: 240px;'>
			<div class='form-group'>
			  <label for='id_util' class='soratra'>Numero matricule ou identifiant:</label>
			  <input type='text' class='form-control' id='id_util'>
			</div>
			<div class='form-group'>
			  <label for='nom_util' class='soratra'>Nom :</label>
			  <input type='text' class='form-control' id='nom_util'>
			</div>
			<div class='form-group'>
			  <label for='prenom_util' class='soratra'>Prénoms :</label>
			  <input type='text' class='form-control' id='prenom_util'>
			</div>
			<div class='form-group'>
			  <label for='datenaiss_util' class='soratra'>Date de naissance :</label>
			  <input type='date' class='form-control' id='datenaiss_util'>
			</div>
			<div class='form-group'>
			  <label for='sex_util' class='soratra'>Sexe :</label><br>
			  <input type='radio' name='sexe_util' value='male' checked class='sexe_util'> Male
  			  <input type='radio'  name='sexe_util' value='female' class='sexe_util'> Female<br>
			</div>
			<div class='form-group'>
			  <label for='phone_util' class='soratra'>Téléphone:</label>
			  <input type='text' class='form-control' id='phone_util'>
			</div>
			<div class='form-group'>
			  <label for='mail_util' class='soratra'>Adresse mail:</label>
			  <input type='text' class='form-control' id='mail_util'>
			</div>
			<div class='form-group'>
			  <label for='mdp_util' class='soratra'>Mot de passe:</label>
			  <input type='password' class='form-control' id='mdp_util'>
			</div>
			<div class='form-group'>
			  <label for='confirm_mdp' class='soratra'>Confirmation:</label>
			  <input type='password' class='form-control' id='confirm_mdp'>
			</div>
			<div align='center'>
				<button type='button' class='btn btn-outline-light' id='btn_inscription'>Suivant</button>
			</div>
		</div>
		</form>
		<script>
			$('#id_util').change(function(){
				var id_util = $(this).val();
				$.ajax({
					type : 'ajax',
					method : 'POST',
					url : 'UtilisateurController/verifierId',
					data : {
						id_util : id_util
					},
					success : function(data){
						var obj = jQuery.parseJSON(data);
						if(obj=='1'){
							Swal.fire({
								type: 'error',
							  	title: 'Oops...',
								text: 'Cet utilisateur existe déjà',
							}).then(function(){
								$('#id_util').val('');
							})
						}
					}
				});	
			});

			$('#phone_util').change(function(){
				var phone_util = $(this).val();
				$.ajax({
					type : 'ajax',
					method : 'POST',
					url : 'UtilisateurController/verifierNum',
					data : {
						phone_util : phone_util
					},
					success : function(data){
						var obj = jQuery.parseJSON(data);
						if(obj=='1'){
							Swal.fire({
								type: 'error',
							  	title: 'Oops...',
								text: 'Ce numéro est déjà associé à un utilisateur',
							}).then(function(){
								$('#phone_util').val('');
							})
						}
					}
				});
			});

			$('#mail_util').change(function(){
				var mail = $(this).val();
				$.ajax({
					type : 'ajax',
					method : 'POST',
					url : 'UtilisateurController/verifierMail',
					data : {
						mail_util : mail
					},
					success : function(data){
						var obj = jQuery.parseJSON(data);
						if(obj=='1'){
							Swal.fire({
								type: 'error',
							  	title: 'Oops...',
								text: 'Cet adresse mail est déjà associé à un utilisateur',
							}).then(function(){
								$('#mail_util').val('');
							})
						}
					}
				});
			});

			$('#confirm_mdp').keyup(function(){
					var conf = $(this).val();
					var ind = conf.length-1;
					if($('#mdp_util').val().charAt(ind) != conf.charAt(ind)){
						alert('mots de passe non similaire');
					}
				});
			
			$('#btn_inscription').click(function(){

				var id_util = $('#id_util').val();
				var nom_util = $('#nom_util').val();
				var prenom_util = $('#prenom_util').val();
				var datenaiss_util = $('#datenaiss_util').val();
				var sexe_util = $('.sexe_util:checked').val();
				var phone_util = $('#phone_util').val();
				var mail_util = $('#mail_util').val();
				var mdp_util = $('#mdp_util').val();

				if(id_util != '' && nom_util != '' && datenaiss_util != '' && phone_util != '' && mail_util != '' &mdp_util != ''){
					// Confirmation des informations
					Swal.fire({
					  title: 'Enregistrer ces informations?',
					  showCancelButton: true,
					  type : 'question',
					}).then(result=>{
						if(result.value){

							// Inscription
							$.ajax({
								type : 'ajax',
								url : 'UtilisateurController/insererUtilisateur',
								method : 'POST',
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
									$.ajax({
					            		url:'LoginController/login3?id_util='+id_util,
					            		method:'POST',
					            		success:function(donne)
					            		{
					                		$('#formContent').html(donne);
					            		}
					        		});
								}
							});	
							// fin inscription

						} 
					})
				} else {
					Swal.fire({
						type: 'error',
						title: 'Champs vides',
						text: 'Veuillez remplir les champs',
					})
				}
			});

		</script>";
		echo $soratra;
	}

	public function login3(){
		$id = $this->input->get('id_util');
		$soratra = "";
		$soratra .= "
		<form enctype='multipart/form-data' action='".base_url()."UtilisateurController/insererPdp' method='post' style='padding-top:80px;'>
			<div  style='min-height: 180px;'>
	    		<input type='hidden' name='id_util' value='".$id."'>
	    		<input type='file' id='img' name='img' accept='image/png, image/jpeg' class='fileToUpload' style='margin:10px; display:none; opacity :0;font-size: 12px;'>
	    		<label for='img' class='btn btn-light' style='width: 190px;'>
	    			Ajouter photo de profil
	    		</label>
	    		<br>
	    		<input type='submit' value='enregistrer' class=' btn btn-outline-light' onsubmit='successInscri()'>
	    	</div>
    	</form>
    	<script>
    		function successInscri(){
    			Swal.fire(
				  'Félicitations',
				  'Inscription réussite',
				  'success'
				).then(function(){
					load_data();
					Swal.close();
				});
    		}

    		function load_data()
		    {
		        $.ajax({
		            url:'LoginController/login1',
		            method:'POST',
		            success:function(donne)
		            {
		                $('#formContent').html(donne);
		            }
		        });
		    }
    	</script>
		";
		echo $soratra;
	}

	public function logOut()
	{
		// $this->session->userdata('id_util');
		// $this->session->userdata('id_util');
		$this->session->sess_destroy();
		redirect('LoginController');
	}
}

?>