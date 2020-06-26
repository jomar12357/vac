<?php
	/**
	 * 
	 */
	class db
	{
		function conect01(){
			$con1 = mysqli_connect("localhost","root","");
			mysqli_select_db($con1,"");
			return($con1);
		}
	}
?>