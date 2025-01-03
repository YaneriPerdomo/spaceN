
CREATE DATABASE spaceN CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USER spaceN
create table roles (
id_rol int(10) PRIMARY KEY not null AUTO_INCREMENT,
rol varchar(18)
);

insert into roles (id_rol, rol) values (1, 'Profesional');
insert into roles (id_rol, rol) values (2, 'Niño');

create table usuarios (
id_usuario int(10) PRIMARY key not null AUTO_INCREMENT,
id_rol int(10) not null , 
usuario varchar(10) UNIQUE not null, 
clave  	varchar(8) not null , 
estado bit DEFAULT 1,
fecha_hora_creacion datetime,
FOREIGN key (id_rol) REFERENCES roles (id_rol)
);

create table generos (
id_genero int(10) PRIMARY key not null AUTO_INCREMENT, 
genero text );

INSERT into generos (id_genero, genero) VALUES (1, 'Masculino');
INSERT into generos (id_genero, genero) VALUES (2, 'Femenino');

create table niveles_acceso (
id_nivel_acceso int(10) PRIMARY key not null AUTO_INCREMENT,
nivel_acceso varchar(30) );

insert into niveles_acceso (id_nivel_acceso, nivel_acceso) VALUES (1, 'pre_numerico');
insert into niveles_acceso (id_nivel_acceso, nivel_acceso) VALUES (2, 'numerico_emergente');
insert into niveles_acceso (id_nivel_acceso, nivel_acceso) VALUES (3, 'desarrollo_numerico');

create table ninos (
id_nino int(10) PRIMARY key not null AUTO_INCREMENT, 
id_rol int(10) PRIMARY key not null,
id_genero int(10) PRIMARY key not null, 
id_profesional int(10) PRIMARY key not null, 
id_nivel_acceso int(10) PRIMARY key not null, 
id_usuario int(10) PRIMARY key not null,
nombre varchar(50),
apellido varchar(50),
fecha_nacimiento date, 
ultimo_acceso datetime,
FOREIGN key (id_genero) REFERENCES generos (id_genero),
FOREIGN key (id_nivel_acceso) REFERENCES niveles_acceso (id_nivel_acceso),
FOREIGN key (id_rol) REFERENCES roles (id_rol), 
FOREIGN key (id_profesional )REFERENCES profesionales (id_profesional), 
FOREIGN key (id_usuario) REFERENCES usuarios (id_usuario) on delete CASCADE
);

create table cargos(
id_cargo int(10) AUTO_INCREMENT PRIMARY key, 
    cargo varchar(30) 
);

create table profesionales (
id_profesional int(10) PRIMARY key AUTO_INCREMENT,
id_cargo int(10), 
id_usuario int(10),
nombre varchar(50),
apellido varchar(50),
correo_electronico varchar(80) UNIQUE, 
centro_educativo varchar(120),
FOREIGN key (id_cargo) REFERENCES cargos(id_cargo),
FOREIGN key (id_usuario) REFERENCES usuarios(id_usuario) on delete CASCADE
);

create table notificaciones (
id_notificacion int(10) PRIMARY key AUTO_INCREMENT, 
id_nino int(10),
id_profesional int(10),
mensaje varchar(50), 
fecha_hora_envio datetime, 
estado enum('pendiente', 'leido') , 
FOREIGN key (id_nino) REFERENCES ninos(id_nino),
FOREIGN key (id_profesional) REFERENCES profesionales(id_profesional));

create table historiales (
id_historial int(10) PRIMARY key AUTO_INCREMENT, 
id_nino int(10),
id_profesional int(10),
mensaje text, 
fecha_hora datetime, 
FOREIGN key (id_nino) REFERENCES ninos(id_nino),
FOREIGN key (id_profesional) REFERENCES profesionales(id_profesional));


/*Plataforma de aprendizaje*/

create table progresos (
id_progreso int(10) PRIMARY key AUTO_INCREMENT,
id_nivel_acceso int(10) ,
id_usuario int(10),
porcentaje int(11),
diamantes int(100),
FOREIGN key (id_usuario) REFERENCES usuarios(id_usuario) on delete CASCADE,
FOREIGN key (id_nivel_acceso) REFERENCES niveles_acceso(id_nivel_acceso));

create table modulos (
id_modulo int(10) PRIMARY key AUTO_INCREMENT,
id_nivel_acceso int(10), 
modulo varchar(40),
FOREIGN key (id_nivel_acceso) REFERENCES niveles_acceso(id_nivel_acceso));


INSERT INTO `modulos` (`id_modulo`, `id_categoria_actividades`, `modulo`) VALUES
(1, 1, ' Fundamentos Numéricos'),
(2, 2, ' Ampliando el Concepto de Número'),
(3, 3, 'Desarrollo de Habilidades Numéricas');

create table temas (
id_tema int(10) PRIMARY key AUTO_INCREMENT, 
 id_modulo int(10) , 
    tema varchar(40),
   FOREIGN key (id_tema) REFERENCES temas(id_tema));

INSERT INTO `temas` (`id_tema`, `id_modulo`, `tema`) VALUES
(1, 1, 'Conceptos básicos' ),
(2, 1, 'Introducción a los números'),
(3, 2, 'Conteo'),
(4, 2, 'Operaciones básicas'),
(9, 3, 'Operaciones avanzadas'),
(10, 3, 'Fracciones');

create table lecciones (
id_leccion int(10) PRIMARY key AUTO_INCREMENT, 
id_tema int(10),
leccion int(10),
titulo varchar(40),
objetivo varchar(150) ,
   FOREIGN key (id_tema) REFERENCES temas(id_tema));

INSERT INTO `lecciones` (`id_leccion`, `id_tema`, `leccion`, `titulo`, `objetivo`) VALUES
(1, 1, 1, 'Asociación de cantidad con objetos', 'Asociación de cantidad con objetos: ejercicios de contar objetos de diferentes tipos y tamaños.'),
(2, 1, 2, 'Comparación de cantidades', 'Comparación de cantidades: actividades para identificar \"más\", \"menos\" e \"igual\".'),
(3, 2, 1, 'Reconocimiento de números. Parte 1', 'Reconocimiento de números del 1 al 10: ejercicios de identificación auditiva.'),
(4, 2, 2, 'Reconocimiento de números. Parte 2', 'Reconocimiento de números del 1 al 10: ejercicios de identificación visual.'),
(5, 3, 1, 'Conteo hacia adelante y hacia atrás', 'Ejercicios de contar desde un numero inicial'),
(6, 3, 2, 'Conteo con objetos', 'Actividades para comprender las cantidades con objetos'),
(7, 4, 1, 'Suma y resta con objetos', 'Ejercicios manipulativos para visualizar las operaciones.'),
(8, 4, 2, 'Problemas sencillos', 'Resolución de problemas contextualizados.'),
(19, 9, 1, 'Multiplicación y división', 'Introducción a los conceptos básicos.'),
(20, 3, 2, ' Problemas más complejos', 'Resolución de problemas que involucran múltiples operaciones.'),
(21, 10, 1, 'Concepto de fracción', 'Representación gráfica y manipulativa '),
(22, 10, 2, 'Comparación de fracciones', 'Ejercicios para identificar fracciones equivalentes y ordenarlas ');

create table estado_lecciones(
id_estado_leccion int(10) AUTO_INCREMENT PRIMARY key,
id_leccion int(10),
id_usuario int(10),
completado enum('bloqueado', 'completado', 'en_espera'),
porcentaje int(11) ,
diamantes_obtenidos 	int(100) ,
tiempo 	varchar(25) ,
fallida int(20),
FOREIGN key (id_leccion) REFERENCES lecciones(id_leccion),
FOREIGN key (id_usuario) REFERENCES usuarios(id_usuario) on delete CASCADE);