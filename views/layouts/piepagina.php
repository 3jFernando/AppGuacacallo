<?php

	session_start();
	extract($_SESSION);
	if(!isset($_SESSION['SESSION']))
		header("location:inicio.html");
	
?>
<footer>
    <div class="col-lg-12">          
        <div class="text-center">
     	   CopyRight | WebMaster 2015
        </div>
    </div>
</footer>