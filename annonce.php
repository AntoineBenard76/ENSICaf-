<?php
	include("php/header.php");
?>

<script src="js/annonce.js" type="text/javascript"></script>

<div class="container">
	<div class="col-md-10 col-lg-offset-1">
		<ul id="annonce">
	    	<?php
	        	include ('gestionAnnonce.php');
	    	?>
		</ul>
	</div>
</div>


<?php
	include('chatbox.php');
	include("php/footer.php");
?>