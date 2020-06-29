<p align="center">
  <img src="https://frankmorenoalburqueque.com/images/ico490x458.png" height="320px" title="Icono">
</p>

[![Canal de GitHub](https://img.shields.io/badge/Canal-GitHub-black)](https://github.com/fmorenoadmin)
[![Sígueme en Twitter](https://img.shields.io/twitter/follow/sendgrid.svg?style=social&label=Sígueme)](https://twitter.com/FrankMartinMor1)
[![Sígueme en Facebook](https://img.shields.io/badge/Sígueme-@FrankMartinMA-blue)](https://facebook.com/FrankMartinMA)
[![Sígueme en Facebook](https://img.shields.io/badge/Sígueme-@frankmartinmoreno-ff69b4)](https://instagram.com/frankmartinmoreno)
[![Escríbeme en Facebook](https://img.shields.io/badge/Escríbeme-@FrankMartinMA-blue)](https://m.me/FrankMartinMA)
[![Escríbeme en WhatsApp](https://img.shields.io/badge/Escríbeme-WhathApp-green)](https://wa.me/51924741703)
[![Mi Web](https://img.shields.io/badge/Mi_Página-Web-blueviolet)](https://frankmorenoalburqueque.com)

## Metodología de Programación VAC-PHP:

### ¿Por qué VAC?

<ul>
	<li>
		VAC solo es una abreviatura de:
		<ul>
			<li>V => Vistas</li>
			<li>A => Acciones</li>
			<li>C => Clases</li>
		</ul>
	</li>
</ul>

### ¿Por qué usarla?

<ul>
	<li>Por que es muy fácil de entender, desarrollar e implementar.</li>
	<li>Por que se puede reutilizar el código.</li>
	<li>Por que no demora mucho tiempo en cargar.</li>
	<li>Por que no haces trabajos en la vista. Solo muestras la información.</li>
	<li>Por que es práctica.</li>
	<li>Por que aún puede mejorar muchísimo más.</li>
</ul>

### VAC utiliza:

<ul>
	<li>Constantes.</li>
	<li>Sessiones.</li>
	<li>Variables.</li>
	<li>Funciones.</li>
	<li>Clases.</li>
	<li>Instanciamientos de Clases.</li>
</ul>

### Estructura:

<ul>
	<li>
		dominio.ejm/ (Carpeta donde de alojará todo el proyecto)
		<ul>
			<li>
				ACTIONJF/ (Nombre de Carpeta de Acciones)
				<ul>
					<li>contacto.php (Acción: De la Vista contacto de la web)</li>
					<li>cursos.php (Acción: De la Vista Cursos del sistema)</li>
					<li>index.php (Acción: De la Vista Principal de la web)</li>
				</ul>
			</li>
			<li>
				contacto/ (Nombre de Carpeta del formulario d eocntacto de la web)
				<ul>
					<li>index.php (vista del formulario de contato)</li>
				</ul>
			</li>
			<li>css/* (Nombre de carpeta que contiene los archivos CSS del Tema de la Web)</li>
			<li>
				excel/ (Nombre de carpeta que contiene los archivos de exportación a EXCEL)
				<ul>
					<li>contacto.php (Exportar: De la Vista contacto)</li>
					<li>cursos.php (Exportar: De la Vista Cursos)</li>
				</ul>
			</li>
			<li>fonts/* (Nombre de carpeta que contiene los archivos de fuentes del Tema de la Web)</li>
			<li>img/* (Nombre de carpeta que contiene las imágenes del proyecto)</li>
			<li>js/* (Nombre de carpeta que contiene los archivos JS del Tema de la Web)</li>
			<li>
				MORENOCL/ (Nombre de Carpeta de Clases)
				<ul>
					<li>db.php (Clase: DataBase para la cadena de conexión)</li>
					<li>contacto.php (Clase: Cursos Para nuestro ejemplo Contacto)</li>
					<li>cursos.php (Clase: Cursos Para nuestro ejemplo Cursos)</li>
					<li>function.php (Funciones para llamar en Clases que ejecutan sentencias dentro de un FOR o WHILE)</li>
				</ul>
			</li>
			<li>
				pdf/ (Nombre de carpeta que contiene los archivos de exportación a PDF)
				<ul>
					<li>contacto.php (Exportar: De la Vista contacto)</li>
					<li>cursos.php (Exportar: De la Vista Cursos)</li>
				</ul>
			</li>
			<li>
				plugins/ (Nombre de carpeta que contiene las librerias adicionales que se estan ocupando)
				<ul>
					<li>ckeditor/* (Convierte textarea en mini-word)</li>
					<li>dompdf/* (Exportar documentos PDF)</li>
					<li>toastr/* (Mensaje flotantes)</li>
				</ul>
			</li>
			<li>sass/* (Nombre de carpeta que contiene los archivos SCSS del Tema de la Web)</li>
			<li>
				sistem/ Carpeta del sistema administrativo
				<ul>
					<li>
						contacto/ (Carpeta de nuestra Vista: Contacto)
						<ul>
							<li>index.php (Vista: Contacto)</li>
							<li>detalle.php (vista: Contacto Detalle)</li>
						</ul>
					</li>
					<li>
						cursos/ (Carpeta de nuestra Vista: Curso)
						<ul>
							<li>index.php (Vista: Curso)</li>
							<li>detalle.php (vista: Curso Detalle)</li>
						</ul>
					</li>
					<li>0code.php (Archivo de configuración. Requerido en todas las vistas)</li>
					<li>0mens.php (Archivo de Mensajes. Este archivo se configurarán los mensajes que se mostrarán cuando se complete un CRUD)</li>
					<li>0error.php (Archivo donde se muestra los mensajes de alerts en las vistas. Requerido en todas las vistas)</li>
					<li>1styles.php (Archivo que contendrá los <link /> a estilos CSS . Requerido en todas las vistas)</li>
					<li>2java.php (Archivo que contendrá los <scritp></scritp> a los JavaScript . Requerido en todas las vistas)</li>
					<li>3toastr.php (Archivo que contendrá el muestreo de mesajes . Requerido en todas las vistas)</li>
				</ul>
			</li>			
			<li>0code.php (Archivo de configuración. Requerido en todas las vistas)</li>
			<li>1styles.php (Archivo que contendrá los <link /> a estilos CSS . Requerido en todas las vistas)</li>
			<li>2nav.php (Archivo que contendrá la cabecera de la web. Requerido en todas las vistas)</li>
			<li>3footer.php (Archivo que contendrá el pie de página de la web. Requerido en todas las vistas)</li>
			<li>4java.php (Archivo que contendrá los <scritp></scritp> a los JavaScript . Requerido en todas las vistas)</li>
			<li>constant.php (Archivo donde definiremos nuestras constantes . Requerido en todas las vistas)</li>
			<li>script.sql (Archivo que contendrá las estructuras de nuestras tablas de la base de datos)</li>
		</ul>
	</li>
</ul>
	

<p align="center">
	<label>Moreno Alburqueque Frank Martin</label><br>
	<label>WebMaster - Programador Web PHP</label><br>
	<label><a href="mailto:admin@frankmorenoalburqueque.com">admin@frankmorenoalburqueque.com</a></label><br>
	<label><a href="https://frankmorenoalburqueque.com" target="_blank">https://frankmorenoalburqueque.com</a></label><br>
	<label><a href="tel:924741703">+51 924 741 703</a></label><br>
  <img src="https://frankmorenoalburqueque.com/images/logo480x240.png" width="auto" title="Logo">
</p>
