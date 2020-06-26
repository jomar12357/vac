<?php
	/**
	 * 
	 */
	class db
	{
		function conect01(){
			$con1 = mysqli_connect("","","");
			mysqli_select_db($con1,"");
			return($con1);
		}
	}
?>