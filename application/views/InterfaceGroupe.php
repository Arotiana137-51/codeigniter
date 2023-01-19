<htm>
    <head>
        <title>testeGRoupe</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/styleAmbany.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/styletabs.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.min-1.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">

        
        <script src="<?php echo base_url();?>/assets/js/jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/sweetalert2.all.min.js"></script>

    </head>
    <body>
        <div class="container-fluid">
            <div style="margin-top:10px;" ><input id="nom_groupe" style="width: 300px;" type="text" class="form-control" placeholder="Nom du groupe" id="nom_groupe"></div>
            <div style="margin-top:10px;"><textarea id="desc_groupe" style="width: 300px;" class="form-control" placeholder="A propos du groupe"></textarea><div>
            <div style="margin-top:10px;"><button id="btnCreerGroupe" class="btn btn-info">Créer un groupe</button></div>
        </div>
        <br>
        <div id="liste"></div>


        <script>
                $(document).ready(function(){
                    affichageGroupe();
                })
                $("#btnCreerGroupe").click(function(){
                   deconnexion();

                })

                var id_session =<?php echo $this->session->userdata('id_util'); ?>;
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
                        
                        

                        },
                        error: function(result){
                            alert(result);
                        }    


                    });


                }
                 function affichageGroupe(){
                    $.ajax({
                        url:"GroupeController/afficherGroupeSuggere",
                        method:"POST",
                        data : {
                                session : id_session
                        },
                        success: function(data){
                            alert("mety");
                           
                            $("#liste").html(data);
                        }
                        


                    })


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
                          text: "Voulez-vous vraiment déconnecter?!",
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
                function supprimer(){
                    const swalWithBootstrapButtons = Swal.mixin({
                          customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                          },
                          buttonsStyling: false
                        })

                        swalWithBootstrapButtons.fire({
                          title: 'Suppression d\' une publication',
                          text: "Voulez-vous vraiment la supprimer?!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonText: 'Accepter',
                          cancelButtonText: 'Annuler',
                          reverseButtons: true
                        }).then((result) => {
                          if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire(
                              'Publication supprimée!',
                              '',
                              'success'
                            )
                          } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                          ) {
                            swalWithBootstrapButtons.fire(
                              'Suppression annulée',
                              '',
                              'error'
                            )
                          }
                        })
                }
              function entrerGroupe(id_groupe){
                alert("groupe "+id_groupe)
                alert("id_session "+id_session);
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
                                    alert("ok");

                                    Swal.fire(
                                      'Bienvenue!',
                                      'Vous êtes un nouveau membre!',
                                      'success'
                                    )
                                    affichageGroupe();
                                },

                                error: function(data){
                                    alert(data);
                                }    


                })

                          }
                        })


                
              }   


        </script>
    </body>



</html>