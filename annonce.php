<?php
	include("php/header.php");
?>

<script src="js/annonce.js" type="text/javascript"></script>

<div class="container">

	<ul id="annonce">
    	<?php
        	include ('gestionAnnonce.php');
    	?>
	</ul>

</div>


<?php
	include('chatbox.php');
	include("php/footer.php");
?>