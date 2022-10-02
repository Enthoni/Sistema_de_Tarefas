<?php
    session_start();

    if(isset($_SESSION['mensagem'])): 
?>
	
<script>
	alert("<?php echo $_SESSION['mensagem']; ?>");
</script>

<?php 	
    endif;
    session_unset(); 
?>