/* source C:/wamp64/www/webapp/examen/examen.sql */

/*create database adopcion;
use adopcion;*/

create table if not exists mascotas (
    id_mascota int not null auto_increment primary key,
    id_usuario int,
    tipo_mascota varchar(64) not null,
    nombre_mascota varchar(64) not null,
    edad_mascota int not null,
    raza_mascota varchar(64) not null,
    descripcion_mascota varchar(256) not null,
    foto_mascota varchar(128),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

create table if not exists usuarios (
    id_usuario int not null auto_increment primary key,
    nombre_usuario varchar(64) not null,
    telefono_usuario varchar(64) not null,
    ciudad_usuario varchar(64) not null,
    email_usuario varchar(128) not null,
    edad_usuario int not null,
    mascotas_usuario int not null default 0,
    genero_usuario char(1) not null
);


INSERT INTO usuarios(
    nombre_usuario, telefono_usuario, ciudad_usuario, email_usuario, 
    edad_usuario, genero_usuario) VALUES
('Esiel', '2223154651', "Puebla", "esiel_kar@hotmail.com", 23, 'H'),
('Kevin', '2223154653', "Puebla", "kevin@hotmail.com", 18, 'H'),
('Ameyalli', '7441804020', "Acapulco", "ame_19@hotmail.com", 25, 'M'),
('Leilani', '5562458962', "Ciudad de Mexico", "leilani@hotmail.com", 27, 'M');

INSERT INTO mascotas (tipo_mascota, nombre_mascota, edad_mascota, 
    raza_mascota, descripcion_mascota, foto_mascota) VALUES
("Perro", "Lolo", "4", "Chihuahua", "Muy jugueton y enojon", "chihuahua.jpg"),
("Perro", "Ares", "4", "Husky Siberiano", "Muy jugueton y amigable", "husky.jpg"),
("Perro", "Lola", "4", "Pomeraria", "Muy jugueton y muy peludon", "pomerian.jpg"),
("Gato", "Egip", "4", "Egipcio", "Muy enojon", "egipcio.jpg"),
("Gato", "Fido", "4", "Birmano", "Muy alegre", "birmano.jpg"),
("Gato", "Lego", "4", "Bengala", "Muy agil", "bengala.jpg"),
("Conejo", "Lolo", "4", "Californiano", "Muy saltarin", "californiano.jpg"),
("Conejo", "Lolo", "4", "Holandes enano", "Muy abrazable", "holandes_enano.jpg"),
("Conejo", "Lolo", "4", "Cabeza de leon", "Muy grande", "cabeza_leon.jpg"),
("Pez", "Beta", "1", "Beta", "Muy solitario y enojon", "beta.jpeg"),
("Pez", "Bo", "2", "Globo", "Muy grande y venenoso", "globo.jpg"),
("Pez", "Liu", "6", "Lubina", "Muy grande y comelon", "lubina.jpg");



