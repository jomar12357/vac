<?php
	/**
		* COPYRIGTH ©® 2018
		* DESARROLLADO POR FRANK MORENO A.
		* PARA LA SEGURIDAD EN LOS FORMULARIOS DE ENVÍO DE INFORMACIÓN
		* Para informes: admin@frankmorenoalburqueque.com o al teléfono: 924741703
		* Favor de no borrar el Copyright
		* Para acceder a más contenidos: https://frankmorenoalburqueque.com
		* Generador de códigos aleatorios alfanuméricos de 8 dígitos: https://frankmorenoalburqueque.com/generador/
	*/
	class Seguridad
	{
		function getBrowser($user_agent){
			if(strpos($user_agent, 'Maxthon') !== FALSE)
				return "Maxthon";
			elseif(strpos($user_agent, 'SeaMonkey') !== FALSE)
				return "SeaMonkey";
			elseif(strpos($user_agent, 'Vivaldi') !== FALSE)
				return "Vivaldi";
			elseif(strpos($user_agent, 'Arora') !== FALSE)
				return "Arora";
			elseif(strpos($user_agent, 'Avant Browser') !== FALSE)
				return "Avant Browser";
			elseif(strpos($user_agent, 'Beamrise') !== FALSE)
				return "Beamrise";
			elseif(strpos($user_agent, 'Epiphany') !== FALSE)
				return 'Epiphany';
			elseif(strpos($user_agent, 'Chromium') !== FALSE)
				return 'Chromium';
			elseif(strpos($user_agent, 'Iceweasel') !== FALSE)
				return 'Iceweasel';
			elseif(strpos($user_agent, 'Galeon') !== FALSE)
				return 'Galeon';
			elseif(strpos($user_agent, 'Edge') !== FALSE)
				return 'Microsoft Edge';
			elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
				return 'Internet Explorer';
			elseif(strpos($user_agent, 'MSIE') !== FALSE)
				return 'Internet Explorer';
			elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
				return "Opera Mini";
			elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
				return "Opera";
			elseif(strpos($user_agent, 'Firefox') !== FALSE)
				return 'Mozilla Firefox';
			elseif(strpos($user_agent, 'Chrome') !== FALSE)
				return 'Google Chrome';
			elseif(strpos($user_agent, 'Safari') !== FALSE)
				return "Safari";
			elseif(strpos($user_agent, 'iTunes') !== FALSE)
				return 'iTunes';
			elseif(strpos($user_agent, 'Konqueror') !== FALSE)
				return 'Konqueror';
			elseif(strpos($user_agent, 'Dillo') !== FALSE)
				return 'Dillo';
			elseif(strpos($user_agent, 'Netscape') !== FALSE)
				return 'Netscape';
			elseif(strpos($user_agent, 'Midori') !== FALSE)
				return 'Midori';
			elseif(strpos($user_agent, 'ELinks') !== FALSE)
				return 'ELinks';
			elseif(strpos($user_agent, 'Links') !== FALSE)
				return 'Links';
			elseif(strpos($user_agent, 'Lynx') !== FALSE)
				return 'Lynx';
			elseif(strpos($user_agent, 'w3m') !== FALSE)
				return 'w3m';
			else
				return 'No hemos podido detectar su navegador';
		}
		function getPlatform($user_agent){
			if(strpos($user_agent, 'Windows NT 10.0') !== FALSE)
				return "Windows 10";
			elseif(strpos($user_agent, 'Windows NT 6.3') !== FALSE)
				return "Windows 8.1";
			elseif(strpos($user_agent, 'Windows NT 6.2') !== FALSE)
				return "Windows 8";
			elseif(strpos($user_agent, 'Windows NT 6.1') !== FALSE)
				return "Windows 7";
			elseif(strpos($user_agent, 'Windows NT 6.0') !== FALSE)
				return "Windows Vista";
			elseif(strpos($user_agent, 'Windows NT 5.1') !== FALSE)
				return "Windows XP";
			elseif(strpos($user_agent, 'Windows NT 5.2') !== FALSE)
				return 'Windows 2003';
			elseif(strpos($user_agent, 'Windows NT 5.0') !== FALSE)
				return 'Windows 2000';
			elseif(strpos($user_agent, 'Windows ME') !== FALSE)
				return 'Windows ME';
			elseif(strpos($user_agent, 'Win98') !== FALSE)
				return 'Windows 98';
			elseif(strpos($user_agent, 'Win95') !== FALSE)
				return 'Windows 95';
			elseif(strpos($user_agent, 'WinNT4.0') !== FALSE)
				return 'Windows NT 4.0';
			elseif(strpos($user_agent, 'Windows Phone') !== FALSE)
				return 'Windows Phone';
			elseif(strpos($user_agent, 'Windows') !== FALSE)
				return 'Windows';
			elseif(strpos($user_agent, 'iPhone') !== FALSE)
				return 'iPhone';
			elseif(strpos($user_agent, 'iPad') !== FALSE)
				return 'iPad';
			elseif(strpos($user_agent, 'Debian') !== FALSE)
				return 'Debian';
			elseif(strpos($user_agent, 'Ubuntu') !== FALSE)
				return 'Ubuntu';
			elseif(strpos($user_agent, 'Slackware') !== FALSE)
				return 'Slackware';
			elseif(strpos($user_agent, 'Linux Mint') !== FALSE)
				return 'Linux Mint';
			elseif(strpos($user_agent, 'Gentoo') !== FALSE)
				return 'Gentoo';
			elseif(strpos($user_agent, 'Elementary OS') !== FALSE)
				return 'ELementary OS';
			elseif(strpos($user_agent, 'Fedora') !== FALSE)
				return 'Fedora';
			elseif(strpos($user_agent, 'Kubuntu') !== FALSE)
				return 'Kubuntu';
			elseif(strpos($user_agent, 'Linux') !== FALSE)
				return 'Linux';
			elseif(strpos($user_agent, 'FreeBSD') !== FALSE)
				return 'FreeBSD';
			elseif(strpos($user_agent, 'OpenBSD') !== FALSE)
				return 'OpenBSD';
			elseif(strpos($user_agent, 'NetBSD') !== FALSE)
				return 'NetBSD';
			elseif(strpos($user_agent, 'SunOS') !== FALSE)
				return 'Solaris';
			elseif(strpos($user_agent, 'BlackBerry') !== FALSE)
				return 'BlackBerry';
			elseif(strpos($user_agent, 'Android') !== FALSE)
				return 'Android';
			elseif(strpos($user_agent, 'Mobile') !== FALSE)
				return 'Firefox OS';
			elseif(strpos($user_agent, 'Mac OS X+') || strpos($user_agent, 'CFNetwork+') !== FALSE)
				return 'Mac OS X';
			elseif(strpos($user_agent, 'Macintosh') !== FALSE)
				return 'Mac OS Classic';
			elseif(strpos($user_agent, 'OS/2') !== FALSE)
				return 'OS/2';
			elseif(strpos($user_agent, 'BeOS') !== FALSE)
				return 'BeOS';
			elseif(strpos($user_agent, 'Nintendo') !== FALSE)
				return 'Nintendo';
			else
				return 'Unknown Platform';
		}
	}