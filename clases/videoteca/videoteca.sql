drop database if exists videoteca;

create database videoteca;
use videoteca;

create table peliculas (
    id_pelicula int(11) not null primary key auto_increment,
    titulo varchar(64) not null,
    director varchar(128) not null,
    actor varchar(128) not null,
    categoria varchar(20),
    imagen varchar(20),
    ranking int(3)
);

create table clientes (
    id_cliente int(11) not null primary key auto_increment,
    cliente varchar(64) not null,
    year int(4),
    usuario varchar(32),
    password varchar(32),
    tipo varchar(1)
);

create table rentas (
    fecha_inicio date not null,
    fecha_fin date not null,
    id_cliente int(11) not null,
    id_pelicula int(11) not null,

    foreign key (id_cliente) references clientes(id_cliente),
    foreign key (id_pelicula) references peliculas(id_peliculas),
    primary key (fecha_inicio, id_cliente, id_pelicula)
);

insert into peliculas (titulo, director, actor, imagen, ranking) values
("Blade Runner","Ridley Scott","Harrison Ford","imagen1.jpg", 22),
("Alien","Ridley Scott","Sigourney Weaver","imagen2.jpg", 67),
("Doce monos","Terry Gilliam","Bruce Willis","imagen3.jpg", 49),
("Contact","Robert Zemeckis","Jodie Foster","imagen4.jpg", 78),
("Tron","Steven Lisberger","Jeff Bridges","imagen5.jpg", 36),
("La guerra de las galaxias","George Lucas","Harrison Ford","imagen6.jpg", 89);

insert into clientes (cliente, year, usuario, password, tipo) values
("Jorge Pérez", 1980, "Jorge", "1234", 1),
("Juan Domínguez", 1950, "Juan", "1234", 1),
("Jose Luis López", 1967, "Jose", "4321", 1),
("Administrador", 1967, "admin", "1234567890", 0);

insert into rentas (fecha_inicio, fecha_fin, id_cliente, id_pelicula) values
("2021-08-20", "2021-08-22", 1, 5),
("2021-08-20", "2021-08-22", 1, 3),
("2021-08-20", "2021-08-22", 1, 4),
("2021-08-20", "2021-08-23", 2, 4);
