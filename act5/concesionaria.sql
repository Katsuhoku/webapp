drop database concesionaria;

create database concesionaria;
use concesionaria;

create table if not exists vendedores_raw (
    id_vendedor int not null auto_increment primary key,
    nombre_vendedor varchar(50) not null
);

create table if not exists automoviles (
    id_automovil int not null auto_increment primary key,
    marca varchar(20) not null,
    modelo varchar(20) not null,
    precio_neto decimal(10,2) not null,
    foto varchar(32) not null,
    id_vendedor int,

    foreign key (id_vendedor) references vendedores(id_vendedor)
);

create view vendedores as
select vr.nombre_vendedor, count(a.id_automovil) as autos_vendidos
from vendedores_raw as vr
left join automoviles as a
on vr.id_vendedor = a.id_vendedor
group by vr.id_vendedor
order by vr.id_vendedor;

create view stock as
select * from automoviles
where id_vendedor is null;

create view ventas as
select * from automoviles
where id_vendedor is not null;

insert into vendedores_raw(nombre_vendedor) values
("Alejando Martínez"),
("Sandra Rojas"),
("Andrea Aguilar"),
("Arturo Meza"),
("Mónica Galino"),
("Josué Tellez");

insert into automoviles (marca, modelo, precio_neto, foto, id_vendedor) values
("Toyota","Prius",500000, "img1.jpg", null),
("Volkswagen","Polo",300000, "img2.jpg", null),
("Mazda","3",800000, "img3.jpg", null),
("Audi","TT",780000, "img4.jpg", null),
("Audi","TT RS",1400000, "img5.jpg", null),
("Volkswagen","Jetta 2021",900000, "img6.jpg", null),
("Volkswagen","Polo",350000, "img7.jpg", null),
("Mazda","Roadster",859000, "img8.jpg", null),
("Mazda","CX-3",1280000, "img9.jpg", null);