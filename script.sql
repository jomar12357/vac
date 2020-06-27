/*----------------------------VAC---------------------------*/
/*-----------------------tabla-cursos-----------------------*/
	CREATE TABLE cursos(
		id INT PRIMARY KEY AUTO_INCREMENT,
		nombre VARCHAR(250) NULL DEFAULT NULL,
		descrip TEXT NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT NULL,
		id_created INT NULL DEFAULT '1',
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT '0',
		drop_at DATETIME NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT '0',
		status INT NULL DEFAULT '1'
	);
	INSERT INTO cursos (nombre) VALUES 
		('Comuncaion'),
		('Ingles'),
		('Religion'),
		('Arte'),
		('Ciencia y Ambiente')
	;
	SELECT * FROM cursos WHERE status=1;
/*-----------------------tabla-cursos-----------------------*/