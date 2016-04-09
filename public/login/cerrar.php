<?php

	session_start();
	session_unset();
	echo"<script>self.location='../../perfil.php';</script>";
	session_destroy();

?>