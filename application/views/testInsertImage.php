<html>
    <head>
    	<title>inertion image</title>
    	<meta charset="utf-8">
		<script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
    </head>

    <body>
    	<form enctype="multipart/form-data" action="<?php echo base_url() ?>UtilisateurController/insererPdp" method="post">
    		<input type="hidden" name="id_util" value="<?php echo $id ?>">
    		<input type="file" id="img" name="img" accept="image/png, image/jpeg" style="font-size: 12px;" class="fileToUpload" required>
    		<br>
    		<input type="submit" value="enregistrer">
    	</form>
    </body>



</html>